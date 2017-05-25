<?php
class Person extends CI_Model 
{

	function exists_user($id)
	{
		$this->db->from('users');	
		$this->db->where('users.id',$id);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}

	function exists_profile($id)
	{
		$this->db->from('users_profiles');	
		$this->db->join('users','users.id = users_profiles.user_id');	
		$this->db->where('users_profiles.user_id',$id);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}

	
	
	function get_all_patients($limit = 5)
	{
		$this->db->select('up.address_1 as location, COUNT(person_id) as count');	
		$this->db->from('patients as p');
		$this->db->join('users as u','p.person_id=u.id');			
		$this->db->join('users_profiles as up','p.person_id=up.user_id');
		$this->db->where('license_key',$this->tank_auth->get_license_key());		
		$this->db->order_by('up.address_1', 'asc');
		$this->db->group_by('up.address_1');
		$this->db->limit($limit);	
		return $this->db->get();
				
	}
	
	function get_location($limit = false){
		$this->db->select('modified as trns_date, COUNT(address_1) as counter, address_1 as location', false);
		$this->db->from('users_profiles');
		$this->db->join('users','users_profiles.user_id = users.id ', 'left');					
		$this->db->where('license_key', $this->tank_auth->get_license_key());
		$this->db->group_by('address_1');
		$this->db->limit($limit);

		return $this->db->get();
	}
	
	function count_all()
	{
		$this->db->from('users');
		return $this->db->count_all_results();
	}
	
	function get_user_info($id)
	{
		$query = $this->db->get_where('users', array('id' => $id), 1);
		
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			//create object with empty properties.
			$fields = $this->db->list_fields('users');
			$obj = new stdClass;
			
			foreach ($fields as $field)
			{
				$obj->$field='';
			}
			
			return $obj;
		}
	}
	
	function get_email_id($email){
	
		$this->db->select('id');
		$this->db->from('users');	
		$this->db->where('email',$email);
		$qry = $this->db->get();
		
		foreach ($qry->result() as $row)
		{
		    return $row->id;
		}
		
		
	}
	
	function get_profile_info($id)
	{
		$this->db->from('users_profiles');	
		$this->db->join('users','users.id = users_profiles.user_id');
		$this->db->where('users_profiles.user_id',$id);
		$query = $this->db->get();
		
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			$obj=$this->get_user_info($id);
			
			$fields = $this->db->list_fields('users_profiles');
			
			foreach ($fields as $field)
			{
				$obj->$field='';
			}
			
			return $obj;
		}
	}

	function save_user(&$user_data,$id=false)
	{		
		if (!$id or !$this->exists_user($id))
		{
			if ($this->db->insert('users',$user_data))
			{
				$user_data['id']=$this->db->insert_id();
				return true;
			}
			
			return false;
		}
		
		$this->db->where('id', $id);
		return $this->db->update('users',$user_data);
	}

	function save_profile(&$user_data, &$profile_data, $id=false)
	{
		$success=false;

		$this->db->trans_start();
		
		if($this->save_user($user_data,$id))
		{
			if (!$id or !$this->exists_profile($id))
			{
				$profile_data['user_id'] = $user_data['id'];
				$success = $this->db->insert('users_profiles',$profile_data);				
			}
			else
			{
				$this->db->where('user_id', $id);
				$success = $this->db->update('users_profiles',$profile_data);
			}
			
		}
		
		$this->db->trans_complete();		
		return $success;
	}
	
	function save_picture($pic, $id){
		
		$this->db->set('avatar', $pic);
		$this->db->where('id', $id);
		return $this->db->update('users');
	}
}
?>