<?php
class Module extends CI_Model
{
    private $table              = 'module';              
    private $pk                 = 'module_id';
    private $dOrder             = 'asc';      

    function exists($id, $license_key)
    {
        $this->db->from($this->table);   
        $this->db->where($this->pk,$id);
        $this->db->where('license_key',$license_key);
        $query = $this->db->get();
        
        return ($query->num_rows()==1);
    }

    function get_all($license_key){

        $this->db->from($this->table); 
		$this->db->where('show_menu', '1');
		$this->db->where('license_key',$license_key);
        $this->db->order_by($this->pk, $this->dOrder);
        return $this->db->get();
    }

    function count_all($id)
    {
        $this->db->from($this->table);   
        $this->db->where($this->pk,$id); 
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

    function save($data,$id=false)
    {
        if (!$id or !$this->exists($id))
        {
            if($this->db->insert($this->table,$data))
            {
                $data[$this->pk]=$this->db->insert_id();
                return true;
            }
            return false;
        }

        $this->db->where($this->pk, $id);
        return $this->db->update($this->table,$data);
    }

    function delete($id)
    {
        $this->db->where($this->pk, $id);
        return $this->db->delete($this->table);
    }
	/**extend*/
	
	function get_default_role($license_key){
		
		$this->db->from('users_role');
        $this->db->where('role_name', 'Admins');
		$this->db->where('license_key', $license_key);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row()->role_id;
        }else{
			return false;
		}
		
	}
	
	function has_permission($module, $role_id, $action, $license_key)
	{

		$this->db->where('module',$module);
		$this->db->where('role_id',$role_id);
		$this->db->where('action',$action);
		$this->db->where('license_key',$license_key);
		$query = $this->db->get('module_permissions');
		
		if( $query->num_rows() > 0 ){ 
			return TRUE;
		} else { 
			return FALSE; 
		}

	}
	
	function update_permision($chkpermACS, $license_key, $role_id)
	{	
	
		$success=false; 

		$this->db->trans_start();	

			$success=$this->db->delete('module_permissions', array('license_key' =>$license_key,'role_id' => $role_id));

			if($success)
			{
				foreach($chkpermACS as $chkpermAC)
				{
					$key = explode('_', $chkpermAC);
					$success = $this->db->insert('module_permissions',
						array(
							'role_id'	=>$role_id,
							'module'	=>$key[1],
							'action'	=>$key[0],
							'license_key'	=>$license_key
						)
					);
				}		
			}

		$this->db->trans_complete();	

		return $success;			
	}
}
?>
