<?php
namespace Belbase\PushNotification\Providers;
/**
 * 
 */
use Illuminate\Support\Facades\Validator;
use Belbase\PushNotification\Exception\PushNotificationParameterMissingException;
use Belbase\PushNotification\Exception\PushNotificationFailedException;

class FirebaseCloudMessaging implements PushNotificationInterface
{
	protected $url;

	protected $header_data;
	
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
		    'Authorization: key='.config('pushnotification.firebase.server_key'),
		];
	}

	public function setMessage($title,$body,$data){
		$this->content=[
			'body' 	=> $body,
			'title'	=> $title,
            'icon'	=> 'myicon',/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
          ];
        $this->data($data);
        return $this;
	}
	private function data($data){
		$this->header_data = $data;

	}
	public function to($to){
		$this->registration_id = $to;
		return $this;
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
            'data'=> $this->header_data,
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
		if($response && $this->isJson($response)){
			$response = json_decode($response);
			if($response->success == 1)return $response;
			else throw new PushNotificationFailedException($response->results);
		}
		throw new PushNotificationFailedException;
	}
	private function isJson($string) {
   		 json_decode($string);
    	return (json_last_error() == JSON_ERROR_NONE);
  	}
}

?>