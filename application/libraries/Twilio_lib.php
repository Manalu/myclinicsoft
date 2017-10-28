<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
use Twilio\Rest\Client;
/**
 * Twilio Library
 *
 *
 * @package		Twilio
 * @author		Randy Rebucas 
 * @version		1.0
 * @license		MIT License Copyright (c) 2017
 */
class Twilio_lib
{
	//private $error = array();

	function __construct()
	{
		$this->ci =& get_instance();

		$this->ci->load->config('twilio');

	}
	/**
	* initialize config
	* 
	* @param   string $identity 	
	*/
	function twilio_init($identity){
		// Create access token, which we will serialize and send to the client
		return new AccessToken(
		    $this->ci->config->item('twilio_account_sid'),
		    $this->ci->config->item('twilio_api_key'), 
		    $this->ci->config->item('twilio_api_secret'), 
		    3600, 
		    $identity
		);
	}
	/**
	* set twilio app name
	* 
	* @return   void
	*/
	function twilio_set_app_name(){
		
		// An identifier for your app - can be anything you'd like
		return $this->ci->config->item('app_name');
		
	}
	/**
	* grant video
	* 
	* @param   string $identity 	collect all users in the room [$identity]
	*/
	function grant_video($identity){
		
		$token = $this->twilio_init($identity);

		// Grant access to Video
		$grant = new VideoGrant();
		$grant->setConfigurationProfileSid($this->ci->config->item('twilio_configuration_sid'));
		$token->addGrant($grant);

		return array(
			'identity' 	=> $identity,
			'token'		=> $token->toJWT()
		);
		
	}
	/**
	* get service twilio
	* 
	* @return   void
	*/
    function get_twilio(){
		
		$account_sid = $this->ci->config->item('twilio_account_sid');
		$auth_token = $this->ci->config->item('twilio_api_key');
		return new Services_Twilio($account_sid, $auth_token);
		
	}
	/**
	* send sms
	* @params $args | array 
	* 
	* @return   void
	*/
	function send_sms($args = array()){
		
		$client = $this->get_twilio();

		if($client->account->messages->create(array(
		  'To' => $args['to'],
		  'From' => $args['from'],
		  'Body' => $args['message'],
		))){
			//log message here
			return true;
		}else{
			//log message here
			return false;
		}
		
		// this line loads the library require('/path/to/twilio-php/Services/Twilio.php');

		// Step 4: make an array of people we know, to send them a message. 
	    // Feel free to change/add your own phone number and name here.
	    //$people = array(
	    //    "+15558675309" => "Curious George",
	    //    "+15558675308" => "Boots",
	    //    "+15558675307" => "Virgil"
	    //);
	    
		/*$client = $this->get_client();
	    // Step 5: Loop over all our friends. $number is a phone number above, and 
	    // $name is the name next to it
	    foreach ($people as $number => $name) {

	        $sms = $client->account->messages->create(

	            // the number we are sending to - Any phone number
	            $number,

	            array(
	                // Step 6: Change the 'From' number below to be a valid Twilio number 
	                // that you've purchased
	                'from' => "+15017250604", 
	                
	                // the sms body
	                'body' => "Hey $name, Monkey Party at 6PM. Bring Bananas!"
	            )
	        );

	        // Display a confirmation message on the screen
	        echo "Sent message to $name";
	    }*/
	}
	
	
    function get_client(){
		// Step 2: set our AccountSid and AuthToken from https://twilio.com/console
	    $AccountSid = $this->ci->config->item('twilio_account_sid');
	    $AuthToken = $this->ci->config->item('twilio_api_key');
	    // Step 3: instantiate a new Twilio Rest Client
	    return new Client($AccountSid, $AuthToken);
	}
    
}

/* End of file Twilio_lib.php */
/* Location: ./application/libraries/Twilio_lib.php */