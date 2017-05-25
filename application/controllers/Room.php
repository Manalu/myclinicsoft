<?php
require_once ("Secure.php");

class Room extends Secure {

	function __construct() {
        parent::__construct();
    }

    function _remap($method, $params = array()) {
 
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        }

        $directory = getcwd();
        $class_name = get_class($this);
        $this->display_error_log($directory,$class_name,$method);
    }
    /**
    * @link 	https://github.com/TwilioDevEd/video-quickstart-php
    * @link 	https://media.twiliocdn.com/sdk/js/video/releases/1.0.0-beta3/docs/LocalVideoTrack.html
    * @link 	https://www.twilio.com/blog/2015/05/twilio-video-at-signal-nt.html
    * @link 	https://www.twilio.com/video
    * @link 	https://www.twilio.com/stun-turn/pricing
    * @link 	https://www.sitepoint.com/real-time-video-chat-room/
    * @link 	https://github.com/sitepoint-editors/quick-start-your-webrtc-project-with-twilio
    * @link 	https://www.twilio.com/docs/api/video/changelogs/ios
    * @link 	https://twilio.radicalskills.com/projects/video-connect-browser/3.html#video-app-html
    * @link 	https://twilio.radicalskills.com/projects/video-connect-browser/3.html#video-app-html
    * @link 	https://twilio.radicalskills.com/projects/twilio-overview/2.html
    */
    //php -S 127.0.0.1:8000
	function index()
	{
		
		$this->output->set_template('room');	
		$this->output->set_common_meta(get_class(), 'description', 'keyword');
		$this->output->set_meta('author','Randy Rebucas');

		$data['room_name'] = '';
		$data['room_key'] = '';
		$data['module'] = get_class();

		$this->load->view('ajax/room', $data);
	}

	function start_broadcasting(){

		$user_infos = $this->Person->get_profile_info($this->tank_auth->get_user_id());
		$twilio_response = $this->twilio_lib->access_video($user_infos->username);
		// return serialized token and the user's randomly generated ID
		echo json_encode(array(
		    'identity' => $twilio_response['identity'],
		    'token' => $twilio_response['token'],
		));
	}
	
}
