<?php

require_once ("Secure.php");

class Calendar extends Secure {

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
		
		
		$this->output->set_meta('author','Randy Rebucas');
		
	}

	function index()
	{
		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = get_class();
			$this->load->view('ajax/calendar', $data);
        } 
		else
		{
			$this->_init();
			$this->output->set_common_meta(get_class(), 'description', 'keyword');
		}
	}

}
