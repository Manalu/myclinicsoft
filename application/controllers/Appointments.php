<?php

require_once ("Secure.php");

class Appointments extends Secure {

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
		$this->output->set_common_meta('Appointments', 'description', 'keyword');
		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = 'Appointments';
			$this->load->view('ajax/appointments', $data);
        } 
		else
		{
			$this->_init();
			
		}
	}
	
	function get(){
		echo json_encode($this->Appointment->get_all($this->license_id)->result_array());
	}
	
	function load_ajax() {
	
		if ($this->input->is_ajax_request()) 
		{	
			$this->load->library('datatables');
	       
	        $this->datatables->select("a.app_id as id,  schedule_date,  schedule_time, patient_name, CONCAT(IF(ups.lastname != '', ups.lastname, ''),',',IF(ups.firstname != '', ups.firstname, '')) as doctor_fullname, title, status, a.license_key as license", false);
	        
			if($this->admin_role_id == $this->role_id){
				$this->datatables->where('a.license_key', $this->license_id);
			}else{
				$this->datatables->where('a.user_id', $this->user_id);
			}

			$this->datatables->join('users_subscriptions_plan as usp', 'a.license_key = usp.license_key', 'left', false);
			$this->datatables->join('users_profiles as ups', 'usp.user_id = ups.user_id', 'left', false);
			
	        $this->datatables->from('appoinments as a');

	        echo $this->datatables->generate('json', 'UTF-8');
    	}else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
	function view($id = -1){
        if ($this->input->is_ajax_request()) 
		{

			$data['info'] = $this->Appointment->get_info($id);
			
			$doctors = array('' => 'Select');

			foreach ($this->Common->get_all_clients()->result_array() as $row) {
				$doctors[$row['license_key']] = $row['firstname'].', '.$row['lastname'];
			}
			$data['doctors'] = $doctors;
			
			$patients = array('' => 'Select');

			foreach ($this->Patient->get_all()->result_array() as $row) {
				$patients[$row['id']] = $row['firstname'].', '.$row['lastname'];
			}
			$data['patients'] = $patients;
			
	        $this->load->view("ajax/appointments_form", $data);
			
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
	function doSave($id = -1){
		
		$appointment_data = array(
			'schedule_date'		=>$this->input->post('schedule_date'),
			'schedule_time'		=>$this->input->post('schedule_time'),
			'description'		=>$this->input->post('description'),
			'title'				=>$this->input->post('title'),
			'user_id'			=>$this->input->post('user_id') ? $this->input->post('user_id') : $this->user_id,
			'license_key'		=>$this->input->post('license_key'),
			'status'			=>$this->input->post('status'),
			'doctor_note'		=>$this->input->post('doctor_note'),
			'patient_note'		=>$this->input->post('patient_note')
		);
		
		if($this->Appointment->save($appointment_data, $this->license_id, $id))
		{
			if($id==-1)
			{
				echo json_encode(array('success'=>true,'message'=>$appointment_data['title']));
			}
			else 
			{
				echo json_encode(array('success'=>true,'message'=>$appointment_data['title']));
			}
		}
		else//failure
		{	
			echo json_encode(array('success'=>false,'message'=>$appointment_data['title']));
		}
			
	}
	
	function details($id = -1){
    	if ($this->input->is_ajax_request()) 
		{
	    	$data['info'] = $this->Appointment->get_info($id);
			$data['client_id'] = $this->Common->get_subscription_info($data['info']->license_key);
			//$data['patient_info'] = $this->Patient->get_info($data['info']->user_id);
			$data['client_info'] = $this->Patient->get_info($data['client_id']->user_id);
			
	        $this->load->view("ajax/appointments_detail", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
    function delete($id){

    	if ($res = $this->Appointment->delete($id)) {
			echo json_encode(array('success' => true, 'message' => 'Appointment successfully deletd!'));
		} else {
			echo json_encode(array('success' => false, 'message' => $res ));
		}

    }

}
