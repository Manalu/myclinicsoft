<?php
class Patient extends Person
{
	private $table              = 'users';              
    private $pk                 = 'id';
    private $dOrder             = 'asc'; 
	
	function exists($user_id)
	{
		$this->db->from('users_extend');	
		$this->db->join('users', 'users.id = users_extend.user_id');
		$this->db->join('users_profiles', 'users_profiles.user_id = users_extend.user_id');
		$this->db->where('users.license_key',$this->license_id);
		$this->db->where('users_extend.user_id',$user_id);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}
	
	function get_all()
	{	
		$this->db->from('users_extend as ue');
		$this->db->join('users as u','u.id=ue.user_id');			
		$this->db->join('users_profiles as up','up.user_id=ue.user_id');
		$this->db->where('u.license_key',$this->license_id);
		$this->db->where('u.role_id',82);		
		$this->db->order_by('up.lastname', 'asc');
		return $this->db->get();
				
	}
	
	function get_info($id)
	{
		$this->db->from('users_extend');	
		$this->db->join('users', 'users.id = users_extend.user_id');
		$this->db->join('users_profiles', 'users_profiles.user_id = users_extend.user_id');
		$this->db->where('users_extend.user_id',$id);
		$query = $this->db->get();
		
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			//Get empty base parent object, as $employee_id is NOT an employee
			$person_obj=parent::get_profile_info(-1);
			
			//Get all the fields from employee table
			$fields = $this->db->list_fields('users_extend');
			
			//append those fields to base parent object, we we have a complete empty object
			foreach ($fields as $field)
			{
				$person_obj->$field='';
			}
			
			return $person_obj;
		}
	}

	function save(&$user_data, &$profile_data, &$extend_data, $id=false)
	{
		$success=false;
		
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();
			
		if(parent::save_profile($user_data, $profile_data, $id))
		{
			if (!$id or !$this->exists($id))
			{
				$extend_data['user_id'] = $id = $user_data['id'];
				$success = $this->db->insert('users_extend',$extend_data);
			}
			else
			{
				$this->db->where('user_id', $id);
				$success = $this->db->update('users_extend',$extend_data);		
			}
			
		}
		
		$this->db->trans_complete();		
		return $success;
		
	}
}
?>
