<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('cmail');
	}

	public function index()
	{
		$this->load->view('corporate');
	}

	function get_doctors(){
		
		echo json_encode($this->Person->get_doctors()->result_array());
	}

	function confirm(){
		
		$schedule = $this->session->userdata('schedule');
		$doctor = $this->session->userdata('doctor_details');
		$patient = $this->session->userdata('patient_details');
		
		$err = explode('/',$schedule['theDate']);
		$token = date('Ymd');
		$appointment_data = array(
			'schedule_date'		=>$err[2].'-'.$err[0].'-'.$err[1],
			'schedule_time'		=>$schedule['theTime'],
			'description'		=>$schedule['theDescription'],
			'title'				=>$schedule['theTitle'],
			'patient_name'		=>$patient['firstname'].', '.$patient['lastname'],
			'license_key'		=>$doctor['license_key'],
			'status'			=>'Pending',
			'doctor_note'		=>'',
			'patient_note'		=>'',
			'token'				=> $token
		);
		
		if($this->Appointment->save($appointment_data, $doctor['license_key'], $patient['id'])){

			$content = html_entity_decode(html_entity_decode($this->load->view('email/appointment-html', '', TRUE)));
            $html = str_replace(array(
				"{{sitename}}",
                "{{app_url}}",
				"{{pid}}",
                "{{paddress}}",
                "{{pavatar}}",
                "{{pcontact}}",
                "{{pfirstname}}",
                "{{plastname}}",
                "{{daddress}}",
                "{{davatar}}",
                "{{dcontact}}",
                "{{dfirstname}}",
                "{{dlastname}}",
				"{{demail}}",
				"{{theDate}}",
                "{{theDescription}}",
                "{{theTime}}",
				"{{theTitle}}",
				"{{appointment_token}}",
                ), array(
				$this->config->item('website_name', 'tank_auth'),
                site_url(),
				$patient['id'],
				$patient['address'],
				$patient['avatar'],
				$patient['contact'],
				$patient['firstname'],
				$patient['lastname'],
				$doctor['address'],
				$doctor['avatar'],
				$doctor['contact'],
				$doctor['firstname'],
				$doctor['lastname'],
				$doctor['email'],
				$schedule['theDate'],
				$schedule['theDescription'],
				$schedule['theTime'],
				$schedule['theTitle'],
				$token
            ), $content);
            $email_content = html_entity_decode(html_entity_decode($html));

            $args = array(
                'email'   	 =>$doctor['email'],
                'firstname'  =>$patient['firstname'],
                'lastname'   =>$patient['lastname']
            );
	
            if($this->cmail->send('appointment', $args, $email_content))
			{
                
                echo json_encode(array('status' => true, 'msg' => 'Success! We well send information to your doctor notifying your appointment.'));
                
				$this->clear_schedule();
				$this->clear_doctor();
				$this->clear_patient();
				$this->clear_option();
			
            }
            else
            {   
               
                echo json_encode(array('status' => false, 'msg' => 'Unable to send message! But the doctor still see your appointment on this dashboard.'));
                
            }
			
		}else{
			
			echo json_encode(array('status'=>false, 'msg'=>'Ooopppsss!!! Sorry we cannot set your appointment at this momment!'));
			
		} 
	}
	
	function get_schedule()
	{
		
		$this->clear_schedule();

		if(!$this->session->userdata('schedule'))
		{
			$details = array(
				'theTitle'		=> $this->input->post('theTitle'),
				'theDescription'=> $this->input->post('theDescription'),
				'theTime'		=> $this->input->post('theTime'),
				'theDate'		=> $this->input->post('theDate')
			);
			
			$this->set_schedule($details);
		}
		echo json_encode($this->session->userdata('schedule'));
	}
	
	function set_schedule($details)
	{
		$this->session->set_userdata('schedule', $details);
	}
	
	function clear_schedule()
	{
		
		return $this->session->unset_userdata('schedule');
	}
	
	function get_info_doctor()
	{
		
		$this->clear_doctor();
		
		$row = $this->Person->get_info_doctor($this->input->post('id'));
		
		if(!$this->session->userdata('doctor_details'))
		{
			$details = array(
				'firstname'		=> $row->firstname,
				'lastname'		=> $row->lastname,
				'address'		=> $row->address,
				'contact' 		=> $row->mobile,
				'id'			=> $row->id,
				'avatar'		=> $row->avatar,
				'license_key'	=> $row->license_key,
				'email'			=> $row->email,
			);
			
			$this->set_doctor($details);
		}
		echo json_encode($this->session->userdata('doctor_details'));

	}
	
	public function set_doctor($details)
	{
		$this->session->set_userdata('doctor_details', $details);
	}
	
	function clear_doctor()
	{
		
		return $this->session->unset_userdata('doctor_details');
	}
	
	function get_info_patient()
	{
		
		$this->clear_patient();
		
		$row = $this->Person->get_user_by_token($this->input->post('patient_token'));
		
		if(!$this->session->userdata('patient_details'))
		{
			$details = array(
				'firstname'		=> $row->firstname,
				'lastname'		=> $row->lastname,
				'address'		=> $row->address,
				'contact' 		=> $row->mobile,
				'id'			=> $row->id,
				'avatar'		=> $row->avatar,
				'license_key'	=> $row->license_key,
			);
			$this->set_patient($details);
		}
		echo json_encode($this->session->userdata('patient_details'));
		
	}
	
	function get_option()
	{
		
		$this->clear_option();
		
		if(!$this->session->userdata('option'))
		{
			$details = $this->input->post('option') ? $this->input->post('option') : '';
			$this->set_option($details);
		}
		echo json_encode($this->session->userdata('option'));
		
	}
	
	function set_option($option)
	{
		
		$this->session->set_userdata('option', $option);
	}
	
	function clear_option()
	{
		
		return $this->session->unset_userdata('option');
		
	}
	
	public function get_patient()
	{
		//$this->clear_patient();
		
		if(!$this->session->userdata('patient_details'))
		{
			$details = array(
				'firstname'		=> $this->input->post('firstname'),
				'lastname'		=> $this->input->post('lastname'),
				'address'		=> $this->input->post('address'),
				'contact' 		=> $this->input->post('contact'),
				'id'			=> $this->input->post('id'),
				'avatar'		=> '',
				'license_key'	=> ''
			);
			$this->set_patient($details);
		}
		echo json_encode($this->session->userdata('patient_details'));
	}

	public function set_patient($details)
	{
		$this->session->set_userdata('patient_details', $details);
	}
	
	function clear_patient()
	{
		
		return $this->session->unset_userdata('patient_details');

	}
}
