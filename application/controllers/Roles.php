<?php

require_once ("Secure.php");

class Roles extends Secure {

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

		$this->output->set_common_meta('Roles', 'description', 'keyword');
		$this->output->set_meta('author','Randy Rebucas');
		
	}

	function index()
	{

		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = get_class();
			$this->load->view('ajax/roles', $data);
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
	       
	        $this->datatables->select("role_id, role_name, role_desc, role_status, role_created, license_key as license", false);
	        
			$this->datatables->where_in('license_key', array($this->license_id, 'system'));
	        $this->datatables->where('role_id !=', 1);
			
	        $this->datatables->from('users_role');

	        echo $this->datatables->generate('json', 'UTF-8');
    	}else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
    function view($id = -1){
        if ($this->input->is_ajax_request()) 
		{

			$data['info'] = $this->Role->get_info($id);
			
			$roles = array('' => 'Select');

			foreach ($this->Role->get_all($this->license_id, $this->admin_role_id, 1)->result_array() as $row) {
				$roles[$row['role_id']] = $row['role_name'];
			}
			$data['roles'] = $roles;
		
	        $this->load->view("ajax/roles_form", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
	function doSave($id = -1){
		
		$role_data = array(
			'role_name'	=>$this->input->post('role_name'),
			'role_desc'		=>$this->input->post('role_desc'),
			'role_status'		=>$this->input->post('role_status') ? 1 : 0,
			'license_key'		=>$this->license_id
		);
		
		$module_data = $this->input->post('module') != NULL ? $this->input->post('module') : array();
		
		if($this->Role->save($role_data, $module_data, $this->license_id, $id))
		{
			if($id==-1)
			{
				echo json_encode(array('success'=>true,'message'=>$role_data['role_name']));
			}
			else 
			{
				echo json_encode(array('success'=>true,'message'=>$role_data['role_name']));
			}
		}
		else//failure
		{	
			echo json_encode(array('success'=>false,'message'=>$role_data['role_name']));
		}
			
	}
	
	function details($id = -1){
    	if ($this->input->is_ajax_request()) 
		{
	    	$data['info'] = $this->Role->get_info($id);
	        $this->load->view("ajax/roles_detail", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
    function delete($id){

    	if ($res = $this->Role->delete($id)) {
			echo json_encode(array('success' => true, 'message' => 'Role successfully deletd!'));
		} else {
			echo json_encode(array('success' => false, 'message' => $res ));
		}

    }

}
