<?php
namespace App\PushNotification\Providers;
/**
 * 
 */
use Illuminate\Support\Facades\Validator;
use App\PushNotification\Exception\PushNotificationParameterMissingException;
use App\PushNotification\Exception\PushNotificationFailedException;

class FirebaseCloudMessaging implements PushNotificationInterface
{
	protected $url;
	
	protected $registration_id;
	
	protected $data = [];
	
	protected $large_icon;

	protected $header;

	protected $api_key;
	
	protected $validator;

	public function __construct(){
		$this->url = config('pushnotification.firebase.url');
		$this->api_key = config('pushnotification.firebase.api_key');
		$this->header=[
			'Content-Type: application/json',
		    'Authorization: key='.config('pushnotification.firebase.api_key'),
		];
	}

	public function setMessage($title,$body){
		$this->content=[
			'body' 	=> $body,
			'title'	=> $title,
            'icon'	=> 'myicon',/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
          ];
	}
	
	public function to($to){
		$this->registration_id = $to;
	}

	public function setValidator(){
		$this->validator=[
			'api_key'=>$this->api_key,
			'title'=>$this->content['title'],
			'body'=>$this->content['body'],
			'register_id'=>$this->registration_id,
		];
	}

	public function sendMessage(){
	    $this->setValidator();
	    $this->checkData($this->validator);
	    $data = json_encode([
            'to' => $this->registration_id,
	    	'notification'  => $this->content,
	    ]);
		// print("\nJSON sent:\n");
		return $this->request($data);
	    
	}

	/**
     * @param $data
     * @throws PushNotificationParameterMissingException
     */
	public function checkData($data){
		$validator = Validator::make($data, [
            'api_key' => 'required',
            'title' => 'required',
            'body' => 'required',
            'register_id' => 'required',
        ]);
        if ($validator->fails()) {
			throw new PushNotificationParameterMissingException;
        }
	}

	/**
     * @param $data
     * @return string
     */
	public function request($data){

		$ch = curl_init();

		curl_setopt( $ch,CURLOPT_URL, $this->url);
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $this->header);
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, $data );    

	    $response = curl_exec($ch);
	    curl_close($ch);
		// if($response!=200){
		    return $response;
		// }
		// throw new PushNotificationFailedException;
	}
}

?>