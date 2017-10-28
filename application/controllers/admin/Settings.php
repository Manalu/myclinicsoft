<?php
require_once ("Permission_check.php");
class Settings extends Permission_check {

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
			$this->load->view('ajax/admin/settings', $data);
        } 
		else
		{
			$this->_init();
		}
	}

	function save_general()
	{
		
		$batch_save_data = array(
			'company' => $this->input->post('company'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'fax' => $this->input->post('fax'),
			'website' => $this->input->post('website')
		);
		
		if ($this->Appconfig->batch_save($batch_save_data)) {
			echo json_encode(array('success' => true, 'message' => 'General config successfully updated!'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'general config cannot be updated!'));
		}

	}

	function save_paypal()
	{
		$batch_save_data = array(
			'paypal_api_username' => $this->input->post('username'),
			'paypal_api_password' => $this->input->post('password'),
			'paypal_api_signature' => $this->input->post('signature'),
			'paypal_currency' => $this->input->post('currency'),
			'paypal_test_mode' => ($this->input->post('mode')) ? 'TRUE' : 'FALSE'
		);

		if ($this->Appconfig->batch_save($batch_save_data)) {
			echo json_encode(array('success' => true, 'message' => 'Paypal config successfully updated!'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Paypal config cannot be updated!'));
		}

	}

	function save_twilio()
	{
		$batch_save_data = array(
			'twilio_account_sid' => $this->input->post('account_sid'),
			'twilio_configuration_sid' => $this->input->post('configuration_sid'),
			'twilio_api_key' => $this->input->post('api_key'),
			'twilio_api_secret' => $this->input->post('api_secret')
		);

		if ($this->Appconfig->batch_save($batch_save_data)) {
			echo json_encode(array('success' => true, 'message' => 'Twilio config successfully updated!'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Twilio config cannot be updated!'));
		}

	}

	public function remove_logo()
	{
		$result = $this->Appconfig->batch_save(array('company_logo' => ''));
		
		echo json_encode(array('success' => $result));
	}
    
    private function _handle_logo_upload()
    {
    	$this->load->helper('directory');

    	// load upload library
    	$config = array('upload_path' => 'uploads',
    			'allowed_types' => 'gif|jpg|png',
    			'max_size' => '1024',
    			'max_width' => '800',
    			'max_height' => '680',
    			'file_name' => 'company_logo');
    	$this->load->library('upload', $config);
    	$this->upload->do_upload('company_logo');

    	return strlen($this->upload->display_errors()) == 0 || !strcmp($this->upload->display_errors(), '<p>'.$this->lang->line('upload_no_file_selected').'</p>');
    }
    
    public function backup_db()
    {

		$this->load->dbutil();

		$prefs = array(
			'format' => 'zip',
			'filename' => 'lms.sql'
		);
		 
		$backup = $this->dbutil->backup($prefs);
		 
		$file_name = 'lms-' . date("Y-m-d-H-i-s") .'.zip';
		$save = 'uploads/' . $file_name;
		$this->load->helper('download');
		while(ob_get_level())
		{
			ob_end_clean();
		}

		force_download($file_name, $backup);
    	
    }
}
