<?php
class Template extends CI_Model
{	
	private $table              = 'templates';              
    private $id                 = 'tid';
	private $order_field        = 'tname';
	private $order_position     = 'asc';
    
	function exists($id)
	{
		$this->db->from($this->table);	
		$this->db->where($this->id,$id);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}

	function get_all($array)
	{
		$this->db->from($this->table);	
		$this->db->where_in('license_key',$array);		
		$this->db->order_by($this->order_field, $this->order_position);
		return $this->db->get();
			
	}
	
	function load($id) {
        $this->db->from($this->table); 
        $this->db->where($this->id, $id);
        $query = $this->db->get();
        
       	return $query->row();
    }

	function get_default($name){
		
		$this->db->from($this->table);		
		$this->db->where('ttype', $name);
		$this->db->where('isDefault', 1);
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
	
	function save($template_data, $id=false)
	{
		if (!$id or !$this->exists($id))
        {
            return $this->db->insert($this->table,$template_data);
        }else{
			$this->db->where($this->id, $id);
			return $this->db->update($this->table,$template_data);
		}

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