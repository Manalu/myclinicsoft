<?php

require_once ("Secure.php");

class Friends extends Secure {

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
		
		$this->output->set_common_meta(get_class(), 'description', 'keyword');
		$this->output->set_meta('author','Randy Rebucas');
		
	}
	//http://www.xarg.org/2011/01/find-friends-of-friends-using-mysql/
	function index()
	{
		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = get_class();
			$this->load->view('ajax/friends', $data);
        } 
		else
		{
			$this->_init();
		}
	}

	function load_ajax() {
	
		$this->load->library('datatables');

        $this->datatables->select("id, name, description, groups.type as types, banner, 0 as members, DATE_FORMAT(created, '%M %d, %Y') as date_created", false);
        $this->datatables->select("CONCAT(IF(up.firstname != '', up.firstname, ''),',',IF(up.lastname != '', up.lastname, '')) as author", false);
        $this->datatables->where('status', 0);
        $this->datatables->join('users_profiles as up', 'groups.author = up.user_id', 'left', false);
        $this->datatables->from('groups');

        echo $this->datatables->generate('json', 'UTF-8');
    }

}
