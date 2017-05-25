<?php
class Appointment extends CI_Model
{
    private $table              = 'appoinments';              
    private $pk                 = 'app_id';
    private $dOrder             = 'asc';      

    function exists($id, $license_key)
    {
        $this->db->from($this->table);   
        $this->db->where($this->pk,$id);
        $query = $this->db->get();
        
        return ($query->num_rows()==1);
    }
	
	function get_all($license_key){

        $this->db->from($this->table); 
		$this->db->where('license_key',$license_key);
        $this->db->order_by($this->pk, $this->dOrder);
        return $this->db->get();
    }

    function count_all($license_key)
    {
        $this->db->from($this->table);
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

    function save(&$appointment_data, $license_key, $id=false)
    {
        $success=false;
		
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();

		if (!$id or !$this->exists($id, $license_key))
        {
            
			$success = $this->db->insert($this->table,$appointment_data);
			$id = $this->db->insert_id();
        }

        $this->db->where($this->pk, $id);
        $success = $this->db->update($this->table,$appointment_data);

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
	
}
?>
