<?php
require_once APPPATH. 'modules/secure/controllers/Secure.php';

class Countries extends Secure {

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
			$this->load->view('ajax/countries', $data);
        } 
		else
		{
			$this->_init();
			$this->output->set_common_meta(get_class(), 'description', 'keyword');
		}
	}
	
	function get_all(){
		echo json_encode($this->location_lib->get_all()->result());
	}
	
	function get_state(){
		echo json_encode($this->location_lib->get_all_state($this->input->post('country_id'))->result_array());
	}
	
	function get_cities(){
		echo json_encode($this->location_lib->get_all_cities($this->input->post('state_id'))->result_array());
	}
	
	function view($type, $parent_id){
        
	        $data['parent_id'] = $parent_id;
			$data['name'] =$this->input->post('thename');
			$data['type'] = $type;
			switch ($type) {
				case "state":
					$link = site_url('countries/create_state');
					break;
				case "city":
					$link = site_url('countries/create_citi');
					break;
				default:
					$link = site_url('countries/create_country');
			}
			$data['form_url'] = $link;
	        $this->load->view("ajax/countries_form", $data);
	    
    }
	
	function create_country(){
		$data = array(
			'name' => $this->input->post('name')
		);
		if($this->location_lib->create_country($data)){
			echo json_encode(array('success'=>true));
		}else{
			echo json_encode(array('success'=>false));
		}
	}
	
	function create_state(){
		$data = array(
			'country_id' => $this->input->post('parent_id'),
			'name' => $this->input->post('name')
		);
		if($this->location_lib->create_state($data)){
			echo json_encode(array('success'=>true));
		}else{
			echo json_encode(array('success'=>false));
		}
	}
	
	function create_citi(){
		$data = array(
			'state_id' => $this->input->post('parent_id'),
			'name' => $this->input->post('name')
		);
		if($this->location_lib->create_citi($data)){
			echo json_encode(array('success'=>true));
		}else{
			echo json_encode(array('success'=>false));
		}
	}
	
    
}
