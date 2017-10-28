<?php

require_once ("Secure.php");

class Patients extends Secure {

	function __construct() {
        parent::__construct();
		$this->load->helper('encrpt');
		$this->load->library('encrypt');
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

		$this->output->set_common_meta('My Patients', 'description', 'keyword');
		$this->output->set_meta('author','Randy Rebucas');
		
	}

	function index()
	{

		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = get_class();
			$this->load->view('ajax/patients', $data);
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

	        $this->datatables->select("users.id as id, CONCAT(IF(up.lastname != '', up.lastname, ''),',',IF(up.firstname != '', up.firstname, '')) as fullname, username, email, r.role_name as rolename, DATE_FORMAT(users.created, '%M %d, %Y') as created, avatar, DATE_FORMAT(CONCAT(IF(up.bYear != '', up.bYear, ''),'-',IF(up.bMonth != '', up.bMonth, ''),'-',IF(up.bDay != '', up.bDay, '')), '%M %d, %Y') as birthday, address, mobile, blood_type, DATE_FORMAT(users.last_login, '%M %d, %Y') as last_login, users.license_key as lic", false);
	        
			$this->datatables->where('users.deleted', 0);
			$this->datatables->where('users.role_id', 82);
			$this->datatables->where('users.license_key', $this->license_id);
			if($isfiltered > 0){
				$this->datatables->where('DATE(created) BETWEEN ' . $this->db->escape($isfiltered) . ' AND ' . $this->db->escape($isfiltered));
			}
			$this->datatables->join('users_profiles as up', 'users.id = up.user_id', 'left', false);
	        $this->datatables->join('users_role as r', 'users.role_id = r.role_id', 'left', false);
	        
	        $this->datatables->from('users');

	        echo $this->datatables->generate('json', 'UTF-8');
    	}else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
   function view($id = -1){
        if ($this->input->is_ajax_request()) 
		{
	        $data['info'] = $this->Patient->get_info($id);
			
			$roles = array('' => 'Select');

			foreach ($this->Role->get_all($this->license_id, $this->admin_role_id, 1)->result_array() as $row) {
				$roles[$row['role_id']] = $row['role_name'];
			}
			$data['roles'] = $roles;
			$data['option'] = $this->session->userdata('option');
	        $this->load->view("ajax/patients_form", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
	function doSave($id = -1){
		
		$bod = explode('/', $this->input->post('bod'));
		$clearpass = random_string('numeric',8);
		$this->load->library('pass_secured');
		if ($id==-1) {
			$user_data=array(
				'username'      =>str_replace(' ', '', $this->input->post('first_name').'_'.$clearpass),        
				'email'         =>strtolower(str_replace(' ', '', $this->input->post('first_name').'_'.$clearpass.'@sample.com')),
				'password'      =>$this->pass_secured->encrypt(date('Ymd')),
				'role_id'		=>82,
				'license_key'	=>$this->license_id,
				'last_ip'       =>$this->input->ip_address(),
				'created'       => date('Y-m-d H:i:s'),
				'token'			=> date('Ymd').'-'.random_string('numeric',8)
			);
		} else {
			$user_data=array();
		}

		$profile_data = array(
			'firstname'		=>$this->input->post('first_name'),
			'mi'			=>$this->input->post('mi'),
			'lastname'		=>$this->input->post('last_name'),
			'bMonth'		=>$bod[1],
			'bDay'			=>$bod[0],
			'bYear'			=>$bod[2],
			'gender'		=>$this->input->post('gender'),
			'blood_type'	=>$this->input->post('blood_type'),
			'home_phone'	=>$this->input->post('home_phone'),
			'mobile'		=>$this->input->post('mobile'),
			'address'		=>$this->input->post('address'),
			'zip'			=>$this->input->post('zip'),
			'city'			=>$this->input->post('city'),
			'state'			=>$this->input->post('state'),
			'country'		=>$this->input->post('country')
		);

		$extend_data = array(
			'other_info'	=>$this->input->post('other_info'),
			'comments'		=>$this->input->post('comments')
		);
		
		if($this->Patient->save($user_data, $profile_data, $extend_data, $id))
		{
			if($id==-1)
			{
				echo json_encode(array('success'=>true,'message'=>$profile_data['lastname']));
			}
			else //previous employee
			{
				echo json_encode(array('success'=>true,'message'=>$profile_data['lastname']));
			}
		}
		else//failure
		{	
			echo json_encode(array('success'=>false,'message'=>$profile_data['lastname']));
		}
			
	}
	
    function reset($id = -1){
    	if ($this->input->is_ajax_request()) 
		{
	    	$data['info'] = $this->Patient->get_profile_info($id);
	        $this->load->view("ajax/patients_reset", $data);
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
	    	$data['info'] = $this->Patient->get_profile_info($id);
	        $this->load->view("ajax/patients_update", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }

    function details($id = -1){
    	if ($this->input->is_ajax_request()) 
		{
	    	$data['info'] = $this->Patient->get_profile_info($id);
	        $this->load->view("ajax/patients_detail", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
	function encode($type, $id){
	
		redirect('patients/records/'.$type.'/'.$this->encrypt->encode($id));
	}
	
	function decoded($type, $id){

		redirect('patients/records/'.$type.'/'.$this->encrypt->encode($id));
		
	}
	
	function records($type = 'summary', $id){
		
		if($id == ''){
			redirect('patients/decoded/summary/'.$id);
		}
		if ($this->input->is_ajax_request()) 
		{
			$patient_id = $this->encrypt->decode($id);
			$data['module'] = 'Patient Records';
			$data['type'] = $type; 
			$data['info'] = $this->Patient->get_profile_info($patient_id);
			
			$this->load->view('ajax/patients_record', $data);
        } 
		else
		{
			$this->_init();
		}
	}
	
	function get_record(){
		if ($this->input->is_ajax_request()) 
		{
			$type = $this->input->post('type');
			$data['id'] = $this->encrypt->decode($this->input->post('id'));
			$data['type'] = $type;
			$data['latest'] = $this->Record->get_current_data($type, $data['id'], date('Y-m-d'));
			$data['pr_result'] = $this->Record->get_all_data($type, $data['id'], 'no');//segment 3 
			$data['m_result'] = $this->Record->get_all_data($type, $data['id'], 'yes');//segment 3 
			
			$this->load->view('ajax/records/'.$type.'/manage', $data);
		}
	}
	
	function get_record_files(){
		if ($this->input->is_ajax_request()) 
		{
			$type = $this->input->post('type');
			$data['id'] = $this->encrypt->decode($this->input->post('id'));
			$data['type'] = $type;
			$data['latest'] = $this->Record->get_current_data($type, $data['id'], date('Y-m-d'));
			$data['result'] = $this->Record->get_all_file_data($type, $data['id']);//segment 3 
			$result  = array();

			foreach ( $data['result']  as $file ) {

				$obj['name'] = $file['file_name'];
				$obj['size'] = 12345;
				$result[] = $obj;
				
			}
			
			header('Content-type: text/json');              //3
			header('Content-type: application/json');
			echo json_encode($result);
	
		}
	}
}
