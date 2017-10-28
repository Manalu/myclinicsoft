<?php
class Post extends CI_Model
{
    private $table              = 'post';              
    private $pk                 = 'id';
    private $dOrder             = 'desc';      

    function exists($id, $license_key)
    {
        $this->db->from($this->table);   
        $this->db->where($this->pk,$id);
        $query = $this->db->get();
        
        return ($query->num_rows()==1);
    }
	
	function get_all(){
		$this->db->select('p.id as post_id, u.id as user_id, email, avatar, username, firstname, lastname, isonline, isStick, visibility, p.created as post_created, content, u.license_key as lic');
        $this->db->from($this->table.' as p');
		$this->db->join('users as u', 'p.author=u.id');
		$this->db->join('users_profiles as up',	'p.author=up.user_id');
		//join network
		//$this->db->where('p.author',$user_id);
		$this->db->limit(5);
        $this->db->order_by('p.'.$this->pk, $this->dOrder);
        return $this->db->get();
    }

    function count_all($license_key, $id = null)
    {
        $this->db->from($this->table);
			if($id != null){
				$this->db->where($this->pk,$id); 
			}
        return $this->db->count_all_results();
    }
    
    function get_info($id)
    {
        $this->db->select('p.id as post_id, u.id as user_id, email, avatar, username, firstname, lastname, isonline, isStick, visibility, p.created as post_created, content');
		$this->db->from($this->table.' as p'); 
		$this->db->join('users as u','u.id=p.author');
		$this->db->join('users_profiles as up',	'up.user_id=p.author');		
        $this->db->where('p.'.$this->pk,$id);
        $query = $this->db->get();
        
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {

            $obj=new stdClass();

            $fields = $this->db->list_fields($this->table);
            
            foreach ($fields as $field)
            {
                $obj->$field='';
            }
            
            return $obj;
        }
    } 

    function save($post_data)
    {

		$this->db->insert($this->table, $post_data);
		return array('post_id' => $this->db->insert_id());
    }

    function delete($id)
    {
        $this->db->where($this->pk, $id);
        if($this->db->delete($this->table)){
			return true;
		}else{
			return $this->db->error();
		}
    }
	/**extend*/
	
	function get_all_comments($post_id){
		$this->db->select('pc.id as post_comment_id, u.id as user_id, email, avatar, username, firstname, lastname, isonline, pc.date as post_comment_created, comment, u.license_key as lic');
        $this->db->from('post_comments as pc');
		$this->db->join('users as u', 'pc.commenter=u.id');
		$this->db->join('users_profiles as up',	'pc.commenter=up.user_id');		
		$this->db->where('pc.post_id',$post_id);
		$this->db->limit(5);
        $this->db->order_by('pc.id', 'asc');
        return $this->db->get();
	}
	
	function save_comments($comment_data)
    {
		$this->db->insert('post_comments', $comment_data);
		return array('comment_id' => $this->db->insert_id());
    }
		
	function get_comment_info($id)
    {
        $this->db->select('pc.id as post_comment_id, u.id as user_id, email, avatar, username, firstname, lastname, isonline, pc.date as post_comment_created, comment');
		$this->db->from('post_comments as pc'); 
		$this->db->join('users as u','u.id=pc.commenter');
		$this->db->join('users_profiles as up',	'up.user_id=pc.commenter');		
        $this->db->where('pc.id', $id);
        $query = $this->db->get();
        
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {
            $obj=new stdClass();

            $fields = $this->db->list_fields($this->table);
            
            foreach ($fields as $field)
            {
                $obj->$field='';
            }
            
            return $obj;
        }
    } 
	
	function delete_comment($id)
    {
        $this->db->where('id', $id);
        if($this->db->delete('post_comments')){
			return true;
		}else{
			return $this->db->error();
		}
    }
	//==================
	function exists_like($post_id, $user_id)
	{
		$this->db->from('post_like');	
		$this->db->where('post_id',$post_id);
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}
	
	function like($post_id, $user_id){
		
		if (!$this->exists_like($post_id, $user_id)){
			return $this->db->insert('post_like', array('post_id'=>$post_id, 'user_id'=>$user_id));
		}else{
			return false;
		}
		
	}
	
	function count_like($post_id){
		$this->db->from('post_like');
		$this->db->where('post_id',$post_id); 
        return $this->db->count_all_results();
	}
	//=========================
	function exists_follwer($followee, $follower)
	{
		$this->db->from('followers');	
		$this->db->where('followee',$followee);
		$this->db->where('follower',$follower);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}
	
	function follow($followee, $follower){
		if (!$this->exists_follwer($followee, $follower)){
			return $this->db->insert('followers', array('followee'=>$followee, 'follower'=>$follower));
		}else{
			return false;
		}
	}

	function count_follower($followee){
		$this->db->from('followers');
		$this->db->where('followee',$followee); 
        return $this->db->count_all_results();
	}
	
	function count_following($follower){
		$this->db->from('followers');
		$this->db->where('follower',$follower); 
        return $this->db->count_all_results();
	}
	
	function get_all_follower($followee){
		$this->db->select('f.id as follwer_id, email, avatar, username, firstname, lastname, u.license_key as lic');
        $this->db->from('followers as f');
		$this->db->join('users as u', 'f.follower=u.id');
		$this->db->join('users_profiles as up',	'f.follower=up.user_id');		
		$this->db->where('f.followee',$followee);
        $this->db->order_by('f.id', 'asc');
        return $this->db->get();
	}
	//===========
	function exists_connect($requestee, $requester)
	{
		$this->db->from('networks');	
		$this->db->where('requestee',$requestee);
		$this->db->where('requester',$requester);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}
	
	function request($requestee, $requester){
		if (!$this->exists_connect($requestee, $requester)){
			return $this->db->insert('networks', array('requestee'=>$requestee, 'requester'=>$requester, 'request_date'=>date('Y-m-d H:i:s')));
		}else{
			return false;
		}
	}
	
	function accept($requester){
		$this->db->where('requester',$requester);
		return $this->db->update('networks', array('status'=>'accepted'));
	}
	
	function leave($requester){
		$this->db->where('requester',$requester);
		return $this->db->delete('networks');
	}
	
	function count_connects($requestee){
		$this->db->from('networks');
		$this->db->where('requestee',$requestee); 
        return $this->db->count_all_results();
	}
	
	function get_all_connects($requestee){
		$this->db->select('n.id as network_id, email, avatar, username, firstname, lastname, n.request_date as request_created, license_key as lic');
        $this->db->from('networks as n');
		$this->db->join('users as u', 'n.requester=u.id');
		$this->db->join('users_profiles as up',	'n.requester=up.user_id');		
		$this->db->where('n.requestee',$requestee);
		$this->db->where('n.status','accepted');
        $this->db->order_by('n.id', 'asc');
        return $this->db->get();
	}
}
?>
