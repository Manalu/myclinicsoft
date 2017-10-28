<?php
require_once(APPPATH.'controllers/Secure.php');

class Permission_check extends Secure {

	function __construct() {
        	parent::__construct();
	        if($this->role_id != 1){
	       		redirect('dashboard');
	       	}
       
    	}
}