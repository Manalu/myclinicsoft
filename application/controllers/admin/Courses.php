<?php
require_once ("Permission_check.php");
class Courses extends Permission_check {

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
			$this->load->view('ajax/admin/courses', $data);
        } 
		else
		{
			$this->_init();
		}
	}

	function load_ajax() {
	
		$this->load->library('datatables');
        $isfiltered = $this->input->post('filter');

        $this->datatables->select("courses.id, name, description, 0 as topics, 0 as endrolies, DATE_FORMAT(created, '%M %d, %Y') as date_created, amount, status, ", false);
        $this->datatables->select("CONCAT(IF(up.firstname != '', up.firstname, ''),',',IF(up.lastname != '', up.lastname, '')) as author", false);
        $this->datatables->join('users_profiles as up', 'courses.author = up.user_id', 'left', false);
        $this->datatables->from('courses');

        echo $this->datatables->generate('json', 'UTF-8');
    }
    /**
    * @param 	string
    * @todo 	implement counter
    */
    function count($route, $course_id){

    	switch ($route) {
    		case 'topics':
    			# code...
    			$counts = 0;
    			$counts = $this->Topic->count_all($course_id);
    			echo $counts;
    			break;
    		
    		default:
    			# code...
    			$counts = 0;
    			$counts = $this->Course_enrollee->count_all_enrollee($course_id);
    			echo $counts;
    			break;
    	}

    }

    function create($id = -1){
        $data['info'] = $this->Course->get_info($id);
        $this->load->view("ajax/admin/courses_form", $data);
    }

    function doSave($id = -1){
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'author' => $this->user_id,
            'amount' => $this->input->post('amount'),
            'created' => date('Y-m-d H:i:s'),
            'status' => $this->input->post('status')
        );
        
        if ($this->Course->save($data, $id)) {
            echo json_encode(array('success' => true, 'message' => 'Course successfully updated!'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Course cannot be updated!'));
        }
    }

    function checkexistcourse() {

        $name = $this->input->post('name');
        $id = $this->input->post('id');
        if (!$id) {
            if (!$this->Course->exists_name($name))
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

    function get_topics(){
        $course_id = $this->input->post('course_id');

        $data['topics'] = $this->Topic->get_all($course_id);
        $this->load->view("ajax/admin/courses_topics", $data);
    }

    function get_area(){

        $area = $this->input->post('area');
        $topic_id = $this->input->post('topic_id');

        switch ($area) {
            case 'note-'.$topic_id :
                echo 'note-'.$topic_id;
                break;
            case 'file-'.$topic_id:
                echo 'file-'.$topic_id;
                break;
            case 'quiz-'.$topic_id:
                echo 'quiz-'.$topic_id;
                break;
            default:
                # code...
                break;
        }
        //$data['topics'] = $this->Topic->get_all($course_id);
        //$this->load->view("ajax/admin/courses_topics", $data);

    }
}
