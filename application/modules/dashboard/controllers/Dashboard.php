<?php
require_once APPPATH. 'modules/secure/controllers/Secure.php';

class Dashboard extends Secure {

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

	function index()
	{
		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = get_class();
			
			$this->load->view('ajax/dashboard', $data);
        } 
		else
		{
			$this->_init();
			$this->template->set_metadata('keyword', 'Randy Rebucas');
			$this->template->set_metadata('description', 'Randy Rebucas');
		}
		
	}

}
