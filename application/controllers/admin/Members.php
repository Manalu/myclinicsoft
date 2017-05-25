<?php
require_once ("Permission_check.php");
class Members extends Permission_check {

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
		$this->load->section('sidebar', 'include/admin/sidebar');
		$this->load->section('ribbon', 'include/ribbon');
		$this->load->section('footer', 'include/footer');
		$this->load->section('shortcut', 'include/shortcut');

		$this->output->set_common_meta(get_class(), 'description', 'keyword');
		$this->output->set_meta('author','Randy Rebucas');
		
	}

	function index()
	{

		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = get_class();
			$this->load->view('ajax/admin/members', $data);
        } 
		else
		{
			$this->_init();
		}
	}

	function load_ajax() {
		if ($this->input->is_ajax_request()) 
		{	
			$this->load->library('datatables');
	        $isfiltered = $this->input->post('filter');

	        $this->datatables->select("users.id as id, CONCAT(IF(up.firstname != '', up.firstname, ''),',',IF(up.lastname != '', up.lastname, '')) as fullname, username, email, r.name as rolename, DATE_FORMAT(users.created, '%M %d, %Y') as created, type", false);
	        $this->datatables->join('users_profiles as up', 'users.id = up.user_id', 'left', false);
	        $this->datatables->join('role as r', 'users.role_id = r.id', 'left', false);
	        
	        $this->datatables->from('users');

	        echo $this->datatables->generate('json', 'UTF-8');
    	}else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }

    function create($id = -1){
        if ($this->input->is_ajax_request()) 
		{
	        $data['info'] = $this->Person->get_profile_info($id);
	        $this->load->view("ajax/admin/members_form", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }

    function reset($id = -1){
    	if ($this->input->is_ajax_request()) 
		{
	    	$data['info'] = $this->Person->get_profile_info($id);
	        $this->load->view("ajax/admin/members_reset", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }

    function delete($user_id){

    	if ($this->users->delete_user($user_id)) {
			echo json_encode(array('success' => true, 'message' => 'User successfully deletd!'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'User cannot be deletd!'));
		}

    }

     function update($id = -1){
    	if ($this->input->is_ajax_request()) 
		{
	    	$data['info'] = $this->Person->get_profile_info($id);
	        $this->load->view("ajax/admin/members_update", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }

    function details($id = -1){
    	if ($this->input->is_ajax_request()) 
		{
	    	$data['info'] = $this->Person->get_profile_info($id);
	        $this->load->view("ajax/admin/members_detail", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
}
