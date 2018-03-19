<?php
if (!defined('BASEPATH') && !$this->input->is_ajax_request())
    exit('No direct script access allowed');

class Secure extends CI_Controller {
	
	public $license_id;
	//public $company_info = array();
	//public $subscription_counts;
	public $role_id; 
	public $admin_role_id; 
	public $patient_role_id; 
    public $user_id;
    public $is_login;
    public $is_ajax;
    public $content;
	
    function __construct($module_id = null) {
        parent::__construct();

        $module_id = uri_string();
		//$this->permission_check($module_id, 'view');
		
		$this->role_id = $this->tank_auth->get_role_id();
        $this->license_id = $this->tank_auth->get_license_key();
        $this->user_id = $this->tank_auth->get_user_id();
        $this->is_login = $this->tank_auth->is_logged_in();
        $this->is_ajax = $this->input->is_ajax_request();
        //get subcription information
        $data['user_info'] = $this->Person->get_profile_info($this->user_id);
		
		$this->admin_role_id = $this->Role->get_default_role(2, $this->license_id);
		$this->patient_role_id = $this->Role->get_default_patient_role($this->license_id);
		//$this->company_info = $this->Common->get_subscription_info($this->license_id);
		//$this->subscription_counts = $this->check_subscription($this->company_info);
		if (!$this->is_login) {

            $this->session->set_userdata("currentUrl", current_url());

            $last_url = (isset($_SERVER["HTTP_REFERER"]) && !empty($_SERVER["HTTP_REFERER"]))?$_SERVER["HTTP_REFERER"]:  base_url();

            $this->session->set_userdata('referrer', $last_url);

            if (!$this->is_ajax) {

                redirect('auth/login');

            } else {

                echo '<script>  window.location = "' . base_url() . 'auth/login"; </script>';

            }

        } 

		$this->load->vars($data);
		
    }
	
	function check_subscription($sUserInfo)
	{
		
		if($sUserInfo->subscription_id != 1){
			
			$seconds = strtotime($sUserInfo->expiration_date) - time();
			if($seconds != 0){
				
				$days = floor($seconds / 86400);
				$seconds %= 86400;
				
				$hours = floor($seconds / 3600);
				$seconds %= 3600;
				
				$minutes = floor($seconds / 60);
				$seconds %= 60;
				
			}else{
				
				$days = 0;
				
			}
			
			
			return $days;
			
		}

	}

	function permission_check($module_id, $action) {
			
		if($this->role_id != $this->Module->get_default_role($this->license_id)){
			
			if(!$this->Module->has_permission($module_id, $this->role_id, $action, $this->license_id) == FALSE)
			{
				return false;
			}else{
				return true;
			}
			
		}else{
			return true;
		}
    }
	
    public function display_error_log($directory, $class_name, $method) {
        $page = "'" . $directory . "\\" . $class_name . "\\" . $method . "' is not found";
        show_404($page);
    }
	
	function _remove_duplicate_cookies ()
	{
		//php < 5.3 doesn't have header remove so this function will fatal error otherwise
		if (function_exists('header_remove'))
		{
			$CI = &get_instance();
	
			// clean up all the cookies that are set...
			$headers             = headers_list();
			$cookies_to_output   = array ();
			$header_session_cookie = '';
			$session_cookie_name = $CI->config->item('sess_cookie_name');
	
			foreach ($headers as $header)
			{
				list ($header_type, $data) = explode (':', $header, 2);
				$header_type = trim ($header_type);
				$data        = trim ($data);
	
				if (strtolower ($header_type) == 'set-cookie')
				{
					header_remove ('Set-Cookie');
	
					$cookie_value = current(explode (';', $data));
					list ($key, $val) = explode ('=', $cookie_value);
					$key = trim ($key);
	
					if ($key == $session_cookie_name)
					{
						// OVERWRITE IT (yes! do it!)
						$header_session_cookie = $data;
						continue;
					}
					else
					{
						// Not a session related cookie, add it as normal. Might be a CSRF or some other cookie we are setting
						$cookies_to_output[] = array ('header_type' => $header_type, 'data' => $data);
					}
				}
			}
	
			if ( ! empty ($header_session_cookie))
			{
				$cookies_to_output[] = array ('header_type' => 'Set-Cookie', 'data' => $header_session_cookie);
			}
	
			foreach ($cookies_to_output as $cookie)
			{
				header ("{$cookie['header_type']}: {$cookie['data']}", false);
			}
		}
	}
	
	function setup(){
		
		$this->load->view('ajax/setup');
	}
	
	/**
     * Facebook initialize config
     *
     * @since       1.0.1 First time this was introduced.
     * @return      void
     */

    function fb_init(){
        
        $this->fb = new Facebook\Facebook([
            'app_id' => '224864781343525',
            'app_secret' => '20498c87e89a9d794df97cdac8542192',
            'default_graph_version' => 'v2.9',
        ]);

        return $this->fb;
        // $fb = $this->fb_init();
		// $helper = $fb->getRedirectLoginHelper();
		// $permissions = ['public_profile','email']; // Optional permissions
		// $data['loginUrl'] = $helper->getLoginUrl(site_url().'auth/doFbLogin', $permissions);
    }
}
