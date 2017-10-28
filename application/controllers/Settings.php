<?php

require_once ("Secure.php");

class Settings extends Secure {

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

    private function _init()
	{
		
		$this->output->set_template('default');	
		$this->load->section('header', 'include/header');
		$this->load->section('sidebar', 'include/sidebar');
		$this->load->section('ribbon', 'include/ribbon');
		$this->load->section('footer', 'include/footer');
		$this->load->section('shortcut', 'include/shortcut');
		
		
		$this->output->set_meta('author','Randy Rebucas'); //set config data
		
	}

	function index($type)
	{
		if($type == null || $type == ''){
			redirect('settings/general');
		}
		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = $this->lang->line('module_settings'); 
			$data['filter_option'] = $type;
			
			$templates = array('' => 'Select');
			$array = array($this->license_id, 'system');

			foreach ($this->Template->get_all($array)->result_array() as $row) {
				$templates[$row['tid']] = $row['tname'];
			}

			$data['templates'] = $templates;
			
			$this->load->view('ajax/settings', $data);
        } 
		else
		{
			$this->_init();
			$this->output->set_common_meta(get_class(), 'description', 'keyword'); //set config data
		}
	}

	function my_profile($enc_id){
		
		$id = $this->encrypt->decode($enc_id);
		
		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = $this->lang->line('common_my_profile');
			$data['info'] = $this->Person->get_profile_info($id);

			$this->load->view('ajax/profile', $data);
        } 
		else
		{
			$this->_init();
			$this->output->set_common_meta('My Profile', 'description', 'keyword'); //set config data
		}
	}
	
	function encryptID($user_id){
		redirect('my-profile/'.$this->encrypt->encode($user_id));
	}
}
