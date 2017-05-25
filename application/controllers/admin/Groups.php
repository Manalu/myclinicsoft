<?php
require_once ("Permission_check.php");
class Groups extends Permission_check {

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
			$this->load->view('ajax/admin/groups', $data);
        } 
		else
		{
			$this->_init();
		}
	}

	function load_ajax() {
	
		$this->load->library('datatables');
		$isfiltered = $this->input->post('filter');

        $this->datatables->select("groups.id, name, description, groups.type as types, banner, 0 as members, DATE_FORMAT(created, '%M %d, %Y') as date_created, status", false);
        $this->datatables->select("CONCAT(IF(up.firstname != '', up.firstname, ''),',',IF(up.lastname != '', up.lastname, '')) as author", false);
        //$this->datatables->where('groups.status', 0);
        $this->datatables->join('users_profiles as up', 'groups.author = up.user_id', 'left', false);
        if ($isfiltered == 1) {
            	$this->datatables->select("gm.status as statuses", false);
                $this->datatables->where('gm.user_id', $this->user_id);
                $this->datatables->join('group_members as gm', 'groups.id = gm.group_id', 'left', false);
            
        }
        $this->datatables->from('groups');

        echo $this->datatables->generate('json', 'UTF-8');
    }
    /**
    * @param 	string
    * @todo 	implement counter
    */
    function count($course_id){

		$counts = 0;
		$counts = $this->Topic->count_all($course_id);
		echo $counts;
    			
    }

    function create($id = -1){
        $data['info'] = $this->Group->get_info($id);
        $this->load->view("ajax/admin/groups_form", $data);
    }

    function doSave($id = -1){
    	$data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'author' => $this->user_id,
			'type' => $this->input->post('type'),
			'created' => date('Y-m-d H:i:s'),
			'status' => $this->input->post('status')
		);
		
		if ($this->Group->save($data, $id)) {
			echo json_encode(array('success' => true, 'message' => 'Group successfully updated!'));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Group cannot be updated!'));
		}
    }

    function checkexistgroup() {

        $name = $this->input->post('name');
        $id = $this->input->post('id');
        if (!$id) {
        	if (!$this->Group->exists_name($name))
			{
	            echo(json_encode(true));
	            exit();
	        } else {
	            echo(json_encode(false));
	            exit();
	        }
        }else{
        	echo(json_encode(true));
	            exit();
        }
		
        
    }
}
