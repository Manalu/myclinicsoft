<?php

require_once ("Secure.php");

class Records extends Secure {
	
    function __construct() {
        parent::__construct();
		
		$this->load->model('Media_model');
		$this->load->model('Vaccine');
		$this->load->model('Dose');
    }

    function _remap($method, $params = array()) {
 
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        }

        $directory = getcwd();
        $class_name = get_class($this);
        $this->display_error_log($directory,$class_name,$method);
        
    }

    public function index() {
		
		$data['module']	= get_class($this);
		
        $this->template
			//->title('Blog')
			->append_metadata('<link rel="stylesheet" type="text/css" href="'.base_url().'admin_assets/plugins/select2/select2.css"/>')
			->append_metadata('<link rel="stylesheet" type="text/css" href="'.base_url().'admin_assets/plugins/select2/select2-metronic.css"/>')
			->append_metadata('<link rel="stylesheet" href="'.base_url().'admin_assets/plugins/data-tables/DT_bootstrap.css"/>')
			->append_metadata('<script type="text/javascript" src="'.base_url().'admin_assets/plugins/select2/select2.min.js"></script>')
			
			->append_metadata('<script type="text/javascript" src="'.base_url().'admin_assets/plugins/data-tables/jquery.dataTables.js"></script>')
			->append_metadata('<script type="text/javascript" src="'.base_url().'admin_assets/plugins/data-tables/DT_bootstrap.js"></script>')
			
			->append_metadata('<link rel="stylesheet" href="'.base_url().'admin_assets/plugins/dropzone/css/dropzone.css" rel="stylesheet"/>')
			->append_metadata('<script src="'.base_url().'admin_assets/plugins/dropzone/dropzone.js"></script>')
			
			->append_metadata('<script src="'.base_url().'admin_assets/scripts/core/app.js"></script>')
			->append_metadata('<script src="'.base_url().'admin_assets/scripts/core/datatable.js"></script>')
			
			//->append_metadata('<script src="'.base_url().'admin_assets/scripts/custom/form-dropzone.js"></script>')
			
			->append_metadata('<script type="text/javascript" src="'.base_url().'admin_assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>')
			->append_metadata('<script type="text/javascript" src="'.base_url().'admin_assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>')
			
			->append_metadata('<script src="'.base_url().'admin_assets/js/jquery-form.min.js"></script>')

			->set_layout('secure') // application/views/layouts/two_col.php
			->build('secure/records/manage', $data); // views/welcome_message
    }
	
	function types($type, $user_id){
		$data['type'] = $type;
		$data['latest'] = $this->Record->get_current_data($type, $user_id, date('Y-m-d'));
		$data['result'] = $this->Record->get_all_data($type, $user_id);//segment 3 
		$this->load->view('ajax/records/'.$type.'/manage', $data);
	}
	
	function get_all_complaints(){
		$user_id = $this->encrypt->decode($this->input->post('id'));
		echo json_encode($this->Record->get_all_data('conditions', $user_id));
		
	}
	
	function get_complaints(){
		$user_id = $this->input->post('id');
		echo json_encode($this->Record->get_all_data('conditions', $user_id));
		
	}
	
	
	function get_all_medications(){
		$complaint_date = $this->input->post('complaint_date');
		$user_id = $this->input->post('user_id');
		
		echo json_encode($this->Record->get_current_data('medications', $user_id, $complaint_date));
	}
	
	function create($type, $user_id, $cdate = null){ //$id=-1, 
		$data['user_id'] = $user_id;
		$data['title'] = sprintf($this->lang->line('records_title'), $type);
		$data['type'] = $type;
		$data['cdate'] = $cdate;
		
		$this->load->model('Vaccine');
		$this->load->model('Dose');
		$vaccines = array();
		foreach($this->Vaccine->get_all()->result_array() as $row)
		{
			$vaccines[$row['vaccine_name']] = $row['vaccine_name'];
		}
		$data['vaccines']=$vaccines;
			
		$doses = array();
		foreach($this->Dose->get_all()->result_array() as $row)
		{
			$doses[$row['dose_name']] = $row['dose_name'];
		}
		$data['doses']=$doses;

		$this->load->view('ajax/records/'.$type.'/form', $data);
	}
	
	function get_dir($path){
        
        if(!is_dir($path)) //create the folder if it's not already exists
        {
            mkdir($path,0755,TRUE);

        }
        return $path;

    }
	
	function custom_save($type, $field){
		switch ($type) {
			
			case 'blood_glucose'://
				$id 	= $this->input->post('id');
				$_record_data1=array(
					'date'		=>date('Y-m-d'),
					'user_id'	=>$this->input->post('user_id')
				);
				if($field == 'measurement'){
					$_record_data2=array(
						'measurement'	=>$this->input->post('measurement').' mmol/L'
					);
				}elseif($field == 'type'){
					$_record_data2=array(
						'type'		=>$this->input->post('type')
					);
				}
				$record_data = array_merge($_record_data1, $_record_data2);
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))), 'measurements'=>$record_data['measurement'], 'bg_date'=>$date_formated);
			break;
			case 'lab_test_results'://
				$id 	= $this->input->post('id');
				$_record_data1=array(
					'date'		=>date('Y-m-d'),
					'user_id'	=>$this->input->post('user_id')
				);

				if($field == 'test'){
					$_record_data2=array(
						'test'	=>$this->input->post('test'),
					);
				}elseif($field == 'specimen'){
					$_record_data2=array(
						'specimen'	=>$this->input->post('specimen'),
					);
				}elseif($field == 'conventional_units'){
					$_record_data2=array(
						'conventional_units'	=>$this->input->post('conventional_units'),
					);
				}elseif($field == 'si_units'){
					$_record_data2=array(
						'si_units'	=>$this->input->post('si_units'),
					);
				}
				$record_data = array_merge($_record_data1, $_record_data2);
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))), 'systolic'=>$record_data['systolic'], 'diastolic'=>$record_data['diastolic'], 'blood_pressure_date'=>$date_formated);
			
			break;
			case 'immunisation'://
				$id 	= $this->input->post('id');
				$_record_data1=array(
					'date'		=>date('Y-m-d'),
					'user_id'	=>$this->input->post('user_id')
				);

				if($field == 'immunisation'){
					$_record_data2=array(
						'immunisation'	=>$this->input->post('immunisation'),
					);
				}elseif($field == 'doses'){
					$_record_data2=array(
						'doses'	=>$this->input->post('doses'),
					);
				}
				$record_data = array_merge($_record_data1, $_record_data2);
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))), 'systolic'=>$record_data['systolic'], 'diastolic'=>$record_data['diastolic'], 'blood_pressure_date'=>$date_formated);
			
			break;
			default: //blood_pressure
				
				$id 	= $this->input->post('id');
				$_record_data1=array(
					'date'		=>date('Y-m-d'),
					'user_id'	=>$this->input->post('user_id')
				);

				if($field == 'systolic'){
					$_record_data2=array(
						'systolic'	=>$this->input->post('systolic').' mmHg',
					);
				}elseif($field == 'diastolic'){
					$_record_data2=array(
						'diastolic'	=>$this->input->post('diastolic').' mmHg',
					);
				}elseif($field == 'heart_rate'){
					$_record_data2=array(
						'heart_rate'	=>$this->input->post('heart_rate'),
					);
				}
				$record_data = array_merge($_record_data1, $_record_data2);
				
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))),'blood_pressure_date'=>$date_formated);
			
			break;
		}
		
		if($this->Record->save($record_data, $type, $id))
		{
		
			echo json_encode($return_array);
			
		}
		else//failure
		{	
			echo json_encode(array('success'=>false,'message'=>sprintf($this->lang->line('records_response_failed_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type))))));
		}
	}
	
	function save($id=-1, $type){
		$return_array = array();
		switch ($type) {
			case 'lab_test_results'://

				$id 	= $this->input->post('id');
				$record_data=array(
					'date'		=>$this->input->post('lab_date'),
					'test'	=>$this->input->post('test'),
					'specimen'	=>$this->input->post('specimen'),
					'conventional_units'	=>$this->input->post('conventional_units'),
					'si_units'	=>$this->input->post('si_units'),
					'user_id'	=>$this->input->post('user_id')
				);
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))),'test_date'=>$date_formated);
			break;
			case 'immunisation'://

				$id 	= $this->input->post('id');
				$record_data=array(
					'date'		=>$this->input->post('immunization_date'),
					'immunisation'	=>$this->input->post('immunization'),
					'doses'	=>$this->input->post('doses'),
					'user_id'	=>$this->input->post('user_id')
				);
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))),'immunization_date'=>$date_formated);
			break;
			case 'conditions'://

				$id 	= $this->input->post('id');
				$record_data=array(
					'date'		=>date('Y-m-d'),
					'conditions'	=>$this->input->post('conditions'),
					'user_id'	=>$this->input->post('user_id')
				);
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))), 'conditions'=>$record_data['conditions'],'condition_date'=>$date_formated);
			break;
			case 'endorsement'://
				$id 	= $this->input->post('id');
				$record_data=array(
					'date'		=>$this->input->post('endorsement_date'),
					'endorsement'	=>$this->input->post('endorsement'),
					'user_id'	=>$this->input->post('user_id')
				);
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))), 'endorse_date'=>$date_formated);
			break;
			case 'family_history'://

				$id 	= $this->input->post('id');
				$record_data=array(
					'date'		=> $this->input->post('history_date'), //date('Y-m-d'),
					'relation_ship'	=>$this->input->post('relation_ship'),
					'family_history'	=>$this->input->post('condition'),
					'user_id'	=>$this->input->post('user_id')
				);
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))), 'history'=>$record_data['family_history'], 'history_date'=>$date_formated);
			break;
			case 'files'://
			
				$tempFile = $_FILES['file']['tmp_name'];
				$fileName = $_FILES['file']['name'];
				$targetPath = getcwd() . '/uploads/'.$this->license_id.'/';
				if(!is_dir($targetPath)) //create the folder if it's not already exists
				{
					mkdir($targetPath,0755,TRUE);
					$targetFile = $targetPath . $fileName ;
				}else{
					$targetFile = $targetPath . $fileName ;
				}
				move_uploaded_file($tempFile, $targetFile);

				
				$record_data=array(
					'date'	=>date('Y-m-d'),
					'file_name'	=>$fileName,
					'user_id'	=>$this->input->post('user_id')
				);
					
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))), 'media_date'=>$date_formated);
				
			break;
			case 'height'://

				$id 	= $this->input->post('id');
				$record_data=array(
					'date'		=>date('Y-m-d'),
					'height'	=>$this->input->post('height').' cm',
					'user_id'	=>$this->input->post('user_id')
				);
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))), 'height'=>$record_data['height'], 'height_date'=>$date_formated);
			break;
			case 'medications'://
				$record_data=array(
					'date'	=>$this->input->post('medication_date'),
					'medicine'	=>$this->input->post('medicine'),
					'preparation'	=>$this->input->post('preparation'),
					'sig'		=>$this->input->post('sig'),
					'qty'		=>$this->input->post('qty'),
					'user_id'	=>$this->input->post('user_id'),
					'is_mainteinable'	=>($this->input->post('is_mainteinable') == 1) ? 'yes' : 'no',
				);
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))), 'medicine'=>$record_data['medicine'],'medication_date'=>$date_formated);
			break;
			case 'next_visit'://

				$id 	= $this->input->post('id');
				$record_data=array(
					'date'		=>date('Y-m-d'),
					'next_visit'	=>$this->input->post('next_visit'),
					'user_id'	=>$this->input->post('user_id')
				);
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))), 'next_visit_date'=>$date_formated);
			break;
			case 'temperature'://

				$id 	= $this->input->post('id');
				$record_data=array(
					'date'		=>date('Y-m-d'),
					'temperature'	=>$this->input->post('temperature').' (&deg;C)',
					'user_id'	=>$this->input->post('user_id')
				);
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))), 'temperature'=>$record_data['temperature'], 'temperature_date'=>$date_formated);
			break;
			case 'weight'://
				$id 	= $this->input->post('id');
				$record_data=array(
					'date'		=>date('Y-m-d'),
					'weight'	=>$this->input->post('weight').' kg',
					'user_id'	=>$this->input->post('user_id')
				);
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))), 'weight'=>$record_data['weight'], 'weight_date'=>$date_formated);
			
			break;
			default: //allergies

				$id 	= $this->input->post('id');
				$record_data=array(
					'date'		=>$this->input->post('allergy_date'),
					'allergies'	=>$this->input->post('allergy'),
					'user_id'	=>$this->input->post('user_id')
				);
				
				$date_formated = date($this->config->item('dateformat'), strtotime($record_data['date']));
				$return_array = array('success'=>true,'message'=>sprintf($this->lang->line('records_response_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type)))), 'allergy'=>$record_data['allergies'], 'allergy_date'=>$date_formated);
			break;
		}

		if($res = $this->Record->save($record_data, $type, $id))
		{
		
			echo json_encode($return_array);
			
		}
		else//failure
		{	
			echo json_encode(array('success'=>false, 'id'=>$res['id'], 'message'=>sprintf($this->lang->line('records_response_failed_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type))))));
		}
	}
	
	function get_all_test(){
		
		echo json_encode($this->Record->get_test($this->license_id)->result_array());
	}
	
	function view_test(){
		
		$data['title'] = sprintf($this->lang->line('records_title'), 'Test');
		
		$this->load->view('ajax/records/lab_test_results/request', $data);
		
	}
	
	function create_test(){
		
		$test_data = array(
			'name'			=> $this->input->post('lab_test'),
			'license_key'	=> $this->license_id
		);
		
		if($res = $this->Record->save_test($test_data))
		{
		
			echo json_encode(array('success'=>true, 'id'=>$res['test_id'], 'message'=>'Created'));
			
		}
		else//failure
		{	
			echo json_encode(array('success'=>false, 'id'=>$res['test_id'], 'message'=>'Created'));
		}
	}
	
	function delete_test($id){
		
		if($this->Record->delete_test($id))
		{
		
			echo json_encode(array('success'=>true, 'message'=>'deleted'));
			
		}
		else//failure
		{	
			echo json_encode(array('success'=>false, 'message'=>'deleted'));
		}
	}
	
	function delete($id, $type)
	{
		
		
		if($this->Record->delete($id, $type))
		{
			echo json_encode(array('success'=>true,'message'=>sprintf($this->lang->line('records_response_delete_success_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type))))));
			
		}
		else
		{
			echo json_encode(array('success'=>false,'message'=>sprintf($this->lang->line('records_response_delete_failed_message'), $this->lang->line('records_'.strtolower(str_replace(' ', '_', $type))))));
		}
	}
	
	function get_vaccine_source_ajax() {
		
			$_vaccine_sources1 =  array(array('value' => '', 'text' => 'Select'));
			foreach($this->Vaccine->get_all()->result() as $row => $vaccine)
			{
				$_vaccine_sources2[$row]['text'] = $vaccine->vaccine_name;
                $_vaccine_sources2[$row]['value'] = $vaccine->vaccine_name;
			}
			$vaccine_sources = array_merge($_vaccine_sources1, $_vaccine_sources2);
			echo json_encode($vaccine_sources);
		
    }
	
	function get_doses_source_ajax() {
		
			$_doses_sources1 =  array(array('value' => '', 'text' => 'Select'));
			foreach($this->Dose->get_all()->result() as $row => $dose)
			{
				$_doses_sources2[$row]['text'] = $dose->dose_name;
                $_doses_sources2[$row]['value'] = $dose->dose_name;
			}
			$doses_sources = array_merge($_doses_sources1, $_doses_sources2);
			echo json_encode($doses_sources);

    }
	
	function get_suggest_records($type, $fields){
		echo json_encode($this->Record->get_suggest_record($type, $fields)->result_array());
	}
	
	function docs($id){
		
		$templates = array('' => 'Select');
		$array = array($this->license_id, 'system');

		foreach ($this->Template->get_all_forms($array)->result_array() as $row) {
			$templates[$row['tid']] = $row['tname'];
		}

		$data['templates'] = $templates;

		$this->load->view('ajax/print', $data);
	}
}
