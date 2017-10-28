<?php

require_once ("Secure.php");

class Posts extends Secure {
	
	function __construct() {
        parent::__construct();

		$this->load->model('Post');
    }

    function _remap($method, $params = array()) {
 
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        }

        $directory = getcwd();
        $class_name = get_class($this);
        $this->display_error_log($directory,$class_name,$method);
    }
	
	function index()
	{
		
	}
	
	function create(){

		$post_data = array(
			'title' => '',
			'content' => $this->input->post('post_message'),
			'created' => date('Y-m-d H:i:s'),
			'author' => $this->user_id,
		);
		
		if($res = $this->Post->save($post_data)){
			$post_info = $this->Post->get_info($res['post_id']);
			echo json_encode(array('status'=>true, 'msg'=>'success', 'info'=>$post_info));
		}else{
			echo json_encode(array('status'=>false, 'msg'=>'error'));
		}
		
	}
	
	function get_post(){
		
		echo json_encode($this->Post->get_all()->result_array());
		
	}

	function delete_post(){
		
		$post_id = $this->input->post('id');
		
		if($this->Post->delete($post_id)){
			echo json_encode(array('status'=>true, 'msg'=>'success'));
		}else{
			echo json_encode(array('status'=>false, 'msg'=>'error'));
		}
	}
	
	function get_avatar(){
		echo json_encode($this->gravatar->get($this->input->post('email')));
	}
	/**
	* Likes
	*/
	function likes(){
		$post_id = $this->input->post('post_id');
		
		if($this->Post->like($post_id, $this->user_id)){
			echo json_encode(array('status'=>true, 'msg'=>'Success'));
		}else{
			echo json_encode(array('status'=>false, 'msg'=>'Already liked this post.'));
		}
	}
	
	function count_likes(){
		$post_id = $this->input->post('post_id');
		echo json_encode(array('count'=>$this->Post->count_like($post_id)));
	}
	/**
	* Follow
	*/
	function followed(){
		
		$followee = $this->input->post('followee');
		
		if($this->Post->follow($followee, $this->user_id)){
			echo json_encode(array('status'=>true, 'msg'=>'Success'));
		}else{
			echo json_encode(array('status'=>false, 'msg'=>'Already followed this person.'));
		}
	}
	
	function count_follow(){
		$followee = $this->input->post('followee');
		echo json_encode(array('count'=>$this->Post->count_follower($followee)));
	}
	
	function get_followers(){
		echo json_encode($this->Post->get_all_follower($this->input->post('followee'))->result_array());
	}
	/**
	* Connect
	*/
	function requests(){
		
		$requestee = $this->input->post('requestee');
		
		if($this->Post->request($requestee, $this->user_id)){
			echo json_encode(array('status'=>true, 'msg'=>'Success'));
		}else{
			echo json_encode(array('status'=>false, 'msg'=>'Already followed this person.'));
		}
	}
	
	function accepts($requester){
		if($this->Post->accept($requester)){
			echo json_encode(array('status'=>true, 'msg'=>'Success'));
		}else{
			echo json_encode(array('status'=>false, 'msg'=>'Already followed this person.'));
		}
	}
	
	function count_connect(){
		$requestee = $this->input->post('requestee');
		echo json_encode(array('count'=>$this->Post->count_connects($requestee)));
	}
	
	function get_connects(){
		echo json_encode($this->Post->get_all_connects($this->input->post('requestee'))->result_array());
	}
	/**
	* post comment
	*/
	function get_post_comment(){
		$post_id = $this->input->post('post_id');
		echo json_encode($this->Post->get_all_comments($post_id)->result_array());
	}
	
	function create_comment(){

		$comment_data = array(
			'post_id' => $this->input->post('post_id'),
			'comment' => $this->input->post('comment'),
			'date' => date('Y-m-d H:i:s'),
			'commenter' => $this->user_id,
		);
		
		if($res = $this->Post->save_comments($comment_data)){
			$comment_info = $this->Post->get_comment_info($res['comment_id']);
			echo json_encode(array('status'=>true, 'msg'=>'success', 'info'=>$comment_info));
		}else{
			echo json_encode(array('status'=>false, 'msg'=>'error'));
		}
		
	}
	
	function delete_post_comment(){
		
		$comment_id = $this->input->post('id');
		
		if($this->Post->delete_comment($comment_id)){
			echo json_encode(array('status'=>true, 'msg'=>'success'));
		}else{
			echo json_encode(array('status'=>false, 'msg'=>'error'));
		}
	}
}