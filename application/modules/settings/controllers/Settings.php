<?php
require_once APPPATH. 'modules/secure/controllers/Secure.php';

class Settings extends Secure {

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

		$this->template
			->title('Dashboard') //$article->title
			->prepend_metadata('<script src="/js/jquery.js"></script>')
			->append_metadata('<script src="/js/jquery.flot.js"></script>')
			// application/views/some_folder/header
			->set_partial('header', 'include/header') //third param optional $data
			->set_partial('sidebar', 'include/sidebar') //third param optional $data
			->set_partial('ribbon', 'include/ribbon') //third param optional $data
			->set_partial('footer', 'include/footer') //third param optional $data
			->set_partial('shortcut', 'include/shortcut') //third param optional $data
			->set_metadata('author', 'Randy Rebucas')
			// application/views/some_folder/header
			//->inject_partial('header', '<h1>Hello World!</h1>')  //third param optional $data
			->set_layout('full-column') // application/views/layouts/two_col.php
			->build('manage'); // views/welcome_message
		
	}

	function index($type = null)
	{
		if($type == null || $type == ''){
			redirect('settings/general');
		}
		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = $this->lang->line('module_settings'); 
			$data['filter_option'] = $type;
			
			$templates = array('' => 'Select');
			$array = array($this->license_id, 'system');

			foreach ($this->Template->get_all($array)->result_array() as $row) {
				$templates[$row['tid']] = $row['tname'];
			}

			$data['templates'] = $templates;
			
			$this->load->view('ajax/settings', $data);
        } 
		else
		{
			$this->_init();
			$this->template->set_metadata('keyword', 'Randy Rebucas');
			$this->template->set_metadata('description', 'Randy Rebucas');
		}
	}

	function my_profile($enc_id){
		
		// $id = $this->encrypt->decode($enc_id);
		
		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = $this->lang->line('common_my_profile');
			$data['info'] = $this->Person->get_profile_info($id);

			$this->load->view('ajax/profile', $data);
        } 
		else
		{
			$this->_init();
			// $this->output->set_common_meta('My Profile', 'description', 'keyword'); //set config data
		}
	}
	
	function encryptID($user_id){
		// redirect('my-profile/'.$this->encrypt->encode($user_id));
	}
}
