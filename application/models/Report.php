<?php
class Report extends CI_Model
{	
	private $table              = 'visits';              
    private $id                 = 'visit_id';
	private $order_field        = 'visit_date';
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
		//$this->db->where('ttype', $name);
		//$this->db->where('isDefault', 1);
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
	function count_all($dates, $license_key)
	{
		$this->db->from($this->table);
		$this->db->where('license_key', $license_key);
		$this->db->where('status', 1);
		$this->db->where('month(visit_date)', date('m', strtotime($dates)));
		return $this->db->count_all_results();
	}
	
	function get_sum($dates, $license_key){

		$this->db->select('sum(status) as total');
		$this->db->from($this->table);
		$this->db->where('license_key', $license_key);
		$this->db->where('status', 1);
		$this->db->where('visit_date', $dates);
		$qry = $this->db->get();

            if ($qry->num_rows() === 0)
            {
              return FALSE;
            }

        return $qry->row('total');
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