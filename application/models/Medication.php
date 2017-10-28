<?php
class Medication extends CI_Model
{	
	private $table              = 'medication';              
    private $id                 = 'medication_id';
	private $order_field        = 'medication_date';
	private $order_position     = 'desc';
    
	function exists($id)
	{
		$this->db->from($this->table);	
		$this->db->where($this->id,$id);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}

	function get_all($id, $limit = 2)
	{
		$this->db->from($this->table);		
		$this->db->order_by($this->order_field, $this->order_position);
		$this->db->where('user_id', $id);
		$this->db->limit($limit);
		$this->db->group_by($this->order_field);
		$qry = $this->db->get();
		
		return $qry->result_array();		
	}
	
	function get_all_current($id, $current)
	{
		$this->db->from($this->table);		
		$this->db->order_by($this->order_field, 'asc');
		$this->db->where('user_id', $id);
		$this->db->where('medication_date', $current);
		$qry = $this->db->get();
		
		return $qry->result_array();
		
	}
	
	function count_all($id)
	{
		$this->db->from($this->table);
		$this->db->where('user_id', $id);
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
	
	function save($condition_data, $id=false)
	{
		
		$success=false;
		
		$this->db->trans_start();

			if (!$id or !$this->exists($id))
			{
				
				$this->db->insert($this->table, $condition_data);
                		$success = array('weight_id' => $this->db->insert_id());
			}
			else
			{
				$this->db->where($this->id, $id);
				$success = $this->db->update($this->table, $condition_data);		
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
 	
 	function get_medicine_suggestions($search,$limit=25)
	{
		$suggestions = array();
		
		$this->db->from($this->table);
		$this->db->like("medicine",$search);
		$this->db->order_by("medicine", "asc");	
		$this->db->group_by("medicine");	
		$by_name = $this->db->get();
		foreach($by_name->result() as $row)
		{
			$suggestions[]=$row->medicine;		
		}

		//only return $limit suggestions
		if(count($suggestions > $limit))
		{
			$suggestions = array_slice($suggestions, 0,$limit);
		}
		return $suggestions;
	
	}
	
	function get_preperation_suggestions($search,$limit=25)
	{
		$suggestions = array();
		
		$this->db->from($this->table);
		$this->db->like("preparation",$search);
		$this->db->order_by("preparation", "asc");	
		$this->db->group_by("preparation");	
		$by_name = $this->db->get();
		foreach($by_name->result() as $row)
		{
			$suggestions[]=$row->preparation;		
		}

		//only return $limit suggestions
		if(count($suggestions > $limit))
		{
			$suggestions = array_slice($suggestions, 0,$limit);
		}
		return $suggestions;
	
	}
	
	function get_sig_suggestions($search,$limit=25)
	{
		$suggestions = array();
		
		$this->db->from($this->table);
		$this->db->like("sig",$search);
		$this->db->order_by("sig", "asc");	
		$this->db->group_by("sig");	
		$by_name = $this->db->get();
		foreach($by_name->result() as $row)
		{
			$suggestions[]=$row->sig;		
		}

		//only return $limit suggestions
		if(count($suggestions > $limit))
		{
			$suggestions = array_slice($suggestions, 0,$limit);
		}
		return $suggestions;
	
	}

}
?>