<?php

require_once ("Secure.php");

class Templates extends Secure {

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
		$this->output->set_common_meta('Templates', 'description', 'keyword');
		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = 'Templates';
			$this->load->view('ajax/templates', $data);
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
	       
	        $this->datatables->select("tid as id, tname as name, ttype as type, tstatus as status, tcreated as created, license_key as license", false);
	        
			$this->datatables->where_in('license_key', array($this->license_id, 'system'));
	        
	        $this->datatables->from('templates');

	        echo $this->datatables->generate('json', 'UTF-8');
    	}else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
	function view($id = -1){
        if ($this->input->is_ajax_request()) 
		{

			$data['info'] = $this->Template->get_info($id);
			
			$templates = array('' => 'Select');
			$array = array($this->license_id, 'system');

			foreach ($this->Template->get_all($array)->result_array() as $row) {
				$templates[$row['tid']] = $row['tname'];
			}

			$data['templates'] = $templates;
			
	        $this->load->view("ajax/templates_form", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
	function preset($id = 0){
		if ($id) {

            $preset = $this->Template->load($id);

            echo html_entity_decode(html_entity_decode($preset->tcontent));
        } else {
            echo '';
        }
	}
	function doSave($id = -1){
		
		$template_data = array(
			'tname'			=>$this->input->post('name'),
			'tcontent'		=>$this->input->post('content'),
			'ttype'			=>$this->input->post('types'),
			'tstatus'		=>$this->input->post('status') ? 1 : 0,
			'license_key'	=>$this->license_id
		);
		
		if($this->Template->save($template_data, $id))
		{
			if($id==-1)
			{
				echo json_encode(array('success'=>true,'message'=>$template_data['tname']));
			}
			else 
			{
				echo json_encode(array('success'=>true,'message'=>$template_data['tname']));
			}
		}
		else//failure
		{	
			echo json_encode(array('success'=>false,'message'=>$template_data['tname']));
		}
			
	}
	
	function details($id = -1){
    	if ($this->input->is_ajax_request()) 
		{
	    	$data['info'] = $this->Template->get_info($id);
	        $this->load->view("ajax/templates_detail", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
    function delete($id){

    	if ($res = $this->Template->delete($id)) {
			echo json_encode(array('success' => true, 'message' => 'Template successfully deletd!'));
		} else {
			echo json_encode(array('success' => false, 'message' => $res ));
		}

    }

}
