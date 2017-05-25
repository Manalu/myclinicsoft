<?php
class Dose extends CI_Model
{	
	private $table              = 'doses';              
    	private $id                 = 'dose_id';
	private $order_field        = 'dose_id';
	private $order_position     = 'asc';
    
	function exists($id)
	{
		$this->db->from($this->table);	
		$this->db->where($this->id,$id);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}

	function get_all()
	{
		$this->db->from($this->table);		
		$this->db->order_by($this->order_field, $this->order_position);
		return $this->db->get();
			
	}
	
	function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
	function get_info($id)
	{
		$this->db->from($this->table);	
		$this->db->where($this->id, $id);
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
	
	function save($immunization_data, $id=false)
	{
		
		$success=false;
		
		$this->db->trans_start();

			if (!$id or !$this->exists($id))
			{
				
				$this->db->insert($this->table, $immunization_data);
                		$success = array('weight_id' => $this->db->insert_id());
			}
			else
			{
				$this->db->where($this->id, $id);
				$success = $this->db->update($this->table, $immunization_data);		
			}

		$this->db->trans_complete();		
		return $success;
	}

	function delete($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->delete($this->table);
	}
	
	function delete_list($ids)
	{
		$this->db->where_in($this->id, $ids);
		return $this->db->delete($this->table);
 	}

}
?>