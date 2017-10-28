<?php
class Role extends CI_Model
{
    private $table              = 'users_role';              
    private $pk                 = 'role_id';
    private $dOrder             = 'asc';      

    function exists($id, $license_key)
    {
        $this->db->from($this->table);   
        $this->db->where($this->pk,$id);
        $query = $this->db->get();
        
        return ($query->num_rows()==1);
    }
	
	function get_all($license_key, $selected, $status = null){

        $this->db->from($this->table); 
		$this->db->where('role_status',$status);
		$this->db->where('license_key',$license_key);
		$this->db->where('role_id !=', $selected);
        $this->db->order_by($this->pk, $this->dOrder);
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
        $this->db->from($this->table);   
        $this->db->where($this->pk,$id);
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

    function save(&$role_data, $module_data, $license_key, $id=false)
    {
        $success=false;
		
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();

		if (!$id or !$this->exists($id, $license_key))
        {
            
			$success = $this->db->insert($this->table,$role_data);
			$id = $this->db->insert_id();
        }

        $this->db->where($this->pk, $id);
        $success = $this->db->update($this->table,$role_data);

		$success = $this->db->delete('module_permissions', array('role_id' => $id, 'license_key' => $license_key));
		if($success)
		{
			foreach($module_data as $module)
			{
				$arr = explode('_', $module);
				$success = $this->db->insert('module_permissions', array('role_id' => $id, 'module' => $arr[0], 'action' => $arr[1], 'license_key' => $license_key));
			}
		}
		
		$this->db->trans_complete();		
		return $success;		
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
	
	function get_default_role($role_id, $license_key){
		
		$this->db->from($this->table);
        $this->db->where('role_id', $role_id);
		$this->db->where_in('license_key', array($license_key, 'system'));
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row()->role_id;
        }else{
			return false;
		}
		
	}
	
	function get_default_patient_role($license_key){
		
		$this->db->from($this->table);
        $this->db->where('isDefault', 1);
		$this->db->where('license_key', $license_key);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row()->role_id;
        }else{
			return false;
		}
		
	}
	
	function get_all_permited($role_id, $action, $license_key){

        $this->db->from('module_permissions'); 
		$this->db->where('role_id',$role_id);
		$this->db->where('license_key',$license_key);
		$this->db->where('action', $action);
        $this->db->order_by('module', 'asc');
        return $this->db->get();
    }
	
	function populate_role(){
		$this->ci->db->select('role_id as value, role_name as text');
        $this->ci->db->from('users_role');
        return $this->ci->db->get();
	}
}
?>
