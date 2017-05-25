<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include('./vendor/autoload.php');
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
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

		//$this->ci->load->config('twilio');

	}

	/**
	* access video
	* 
	* @param   string $user 	collect all users in the room [$identity]
	*/
	function access_video($user){
		
		// An identifier for your app - can be anything you'd like
		$appName = $this->ci->config->item('app_name');

		// choose a random username for the connecting user

		$identity = $user;

		// Create access token, which we will serialize and send to the client
		$token = new AccessToken(
		    $this->ci->config->item('twilio_account_sid'),
		    $this->ci->config->item('twilio_api_key'), 
		    $this->ci->config->item('twilio_api_secret'), 
		    3600, 
		    $identity
		);

		// Grant access to Video
		$grant = new VideoGrant();
		$grant->setConfigurationProfileSid($this->ci->config->item('twilio_configuration_sid'));
		$token->addGrant($grant);

		return array(
				'identity' 	=> $identity,
				'token'		=> $token->toJWT()
			);
		
	}
	
}

/* End of file Twilio_lib.php */
/* Location: ./application/libraries/Twilio_lib.php */