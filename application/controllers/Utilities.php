<?php

require_once ("Secure.php");

class Utilities extends Secure {
	
	function __construct() {
        parent::__construct();
		$this->load->dbutil();
		$this->load->dbforge();
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
		
		
		$this->output->set_meta('author','Randy Rebucas'); //set config data
		
	}

	function index()
	{
		
		if ($this->input->is_ajax_request()) 
		{
			$data['module'] = get_class();
			$this->load->view('ajax/utility', $data);
        } 
		else
		{
			$this->_init();
			$this->output->set_common_meta(get_class(), 'description', 'keyword'); //set config data
		}
	}
	
	function create_db(){
		
		if ($this->dbforge->create_database('my_db'))
		{
			echo json_encode(array('status'=>true));
		}
	}
	
	function drop_db(){
		if ($this->dbforge->drop_database('my_db'))
		{
			echo json_encode(array('status'=>true));
		}
	}
	
	// gives id INT(9) NOT NULL AUTO_INCREMENT
	function add_field(){
		$fields = array(
			'users' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
		);
		if ($this->dbforge->add_field($fields))
		{
			echo json_encode(array('status'=>true));
		}
	}
	
	function add_key(){
		$this->dbforge->add_key('blog_id', TRUE);
		// gives PRIMARY KEY `blog_id` (`blog_id`)

		$this->dbforge->add_key('blog_id', TRUE);
		$this->dbforge->add_key('site_id', TRUE);
		// gives PRIMARY KEY `blog_id_site_id` (`blog_id`, `site_id`)

		$this->dbforge->add_key('blog_name');
		// gives KEY `blog_name` (`blog_name`)

		$this->dbforge->add_key(array('blog_name', 'blog_label'));
		// gives KEY `blog_name_blog_label` (`blog_name`, `blog_label`)
	}
	
	// gives CREATE TABLE IF NOT EXISTS table_name
	function create_table(){
		$this->dbforge->create_table('table_name', TRUE);
	}
	
	// gives DROP TABLE IF EXISTS table_name
	function drop_table(){
		$this->dbforge->drop_table('table_name');
	}
	
	// gives ALTER TABLE old_table_name RENAME TO new_table_name
	function rename_table(){
		$this->dbforge->rename_table('old_table_name', 'new_table_name');
	}
	
	// gives ALTER TABLE table_name ADD preferences TEXT
	function add_column(){
		$fields = array(
            'preferences' => array('type' => 'TEXT')
		);
		$this->dbforge->add_column('table_name', $fields);
	}
	
	//$this->dbforge->drop_column('table_name', 'column_to_drop');
	function drop_column(){
		$this->dbforge->drop_column('table_name', 'column_to_drop');
	}
	
	// gives ALTER TABLE table_name CHANGE old_name new_name TEXT
	function modify_column(){
		$fields = array(
            'old_name' => array(
				'name' => 'new_name',
				'type' => 'TEXT',
			),
		);
		$this->dbforge->modify_column('table_name', $fields);
	}
	
	function optimize_db(){
		$result = $this->dbutil->optimize_database();

		if ($result !== FALSE)
		{
			echo json_encode(array('status'=>true, 'result'=>$result));
		}
	}
	
	function optimize_table(){
		if ($this->dbutil->optimize_table('table_name'))
		{
			echo json_encode(array('status'=>true));
		}
	}
	
	function repair_table(){
		
		if ($this->dbutil->repair_table('table_name'))
		{
			echo json_encode(array('status'=>true));
		}
	}
	
}