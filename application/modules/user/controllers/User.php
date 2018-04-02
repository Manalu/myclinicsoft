<?php
require_once APPPATH. 'modules/secure/controllers/Secure.php';

class User extends Secure {

	function __construct() {
        parent::__construct();
		// $this->load->helper('encrpt');
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
		
		$this->template
			->title('User') //$article->title
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
			$this->load->view('ajax/users', $data);
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
			$this->datatables->where('users.role_id !=', 82);
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

			foreach ($this->Role->get_all($this->license_id, 82, 1)->result_array() as $row) {
				$roles[$row['role_id']] = $row['role_name'];
			}
			$data['roles'] = $roles;
			$data['option'] = $this->session->userdata('option');
	        $this->load->view("ajax/users_form", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
	function doSave($id = -1){
		
		$bod = explode('/', $this->input->post('bod'));

		$this->load->library('pass_secured');
		if ($id==-1) {
			$user_data=array(
				'username'      =>str_replace(' ', '', $this->input->post('first_name').'_'.$clearpass),        
				'email'         =>strtolower(str_replace(' ', '', $this->input->post('first_name').'_'.$clearpass.'@sample.com')),
				'password'      =>$this->pass_secured->encrypt(date('Ymd')),
				'role_id'		=>$this->input->post('role_id'),
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
	
    function doReset($email){
    	if ($this->input->is_ajax_request()) 
		{
	    	//send
			//$email;
			
			echo json_encode(array('success' => true, 'message' => 'Reset link send!'));
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
	        $this->load->view("ajax/users_update", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
	function do_update(){

		$name = $this->input->post('name');
		$pk = $this->input->post('pk');
		$value = $this->input->post('value');
		$table = $this->input->post('table');

		$data = array(
			$name => $value
		);
		if($this->Person->update($data, $table, $pk))
		{
		
			echo json_encode(array(
				'success'=>true,
				'message'=>'Success'
			));
			
		}
		else//failure
		{	
			echo json_encode(array(
				'success'=>false,
				'message'=>'Failed'
			));
		} 
	}
	
    function details($id = -1){
    	if ($this->input->is_ajax_request()) 
		{
	    	
			$data['info'] = $this->Patient->get_profile_info($id);
	        $this->load->view("ajax/users_detail", $data);
	    }else{
	    	$this->session->set_flashdata('alert_error', 'Sorry! Page cannot open by new tab');
            redirect('');
	    }
    }
	
}
