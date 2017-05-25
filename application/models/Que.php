<?php
class Que extends CI_Model
{	
	private $table              = 'queing';              
    private $id                 = 'que_id';
	private $order_field        = 'que_id';
	private $order_position     = 'asc';
    
	function exists($id, $license_key)
	{
		$this->db->from($this->table);	
		$this->db->where('que_patient_id',$id);
		$this->db->where('que_license', $license_key);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}
	
	function last_row($license_key){
		return $this->db->select('que_id')->where('que_license', $license_key)->order_by('que_id',"desc")->limit(1)->get('queing')->row();
	}
	
	function get_all($license_key)
	{
		$this->db->from($this->table);	
		$this->db->where('que_license', $license_key);		
		$this->db->order_by($this->order_field, $this->order_position);
		return $this->db->get();
			
	}
	
	function count_all($license_key)
	{
		$this->db->from($this->table);
		$this->db->where('que_license', $license_key);
		return $this->db->count_all_results();
	}
	
	function get_info($id, $license_key)
	{
		$this->db->from($this->table);	
		$this->db->where('que_patient_id',$id);
		$this->db->where('que_license', $license_key);
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
	
	function save($data, $id=false)
	{
		
		$success=false;
		
		$this->db->trans_start();

			if (!$id or !$this->exists($id))
			{
				
				$this->db->insert($this->table, $data);
			}
			else
			{
				$this->db->where($this->id, $id);
				$success = $this->db->update($this->table, $data);		
			}

		$this->db->trans_complete();		
		return $success;
	}

	function delete($id, $status, $license_key)
	{
		$this->db->where('que_patient_id',$id);
		$this->db->where('que_license', $license_key);
		
		if($this->db->delete($this->table)){
			$data = array(
				'visit_type'	=> 'Consultation',
				'visit_date'	=> date('Y-m-d'),
				'user_id'	=> $id,
				'license_key'	=> $license_key,
				'status'	=> $status
			);
			return $this->db->insert('visits', $data);
			
		}
		

	}
	
	function delete_list($license_key)
	{
		$this->db->where('que_license', $license_key);
		return $this->db->delete($this->table);
 	}
	

}
?>