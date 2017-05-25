<?php
class Record extends CI_Model
{
    private $table              = 'records';              
    private $pk                 = 'record_id';
    private $dOrder             = 'desc';      

    function get_all(){

        $this->db->from($this->table); 
		$this->db->where('access','private'); 
        $this->db->order_by('sort', 'asc');
        return $this->db->get();
    }
	
	function count_all($id)
    {
        $this->db->from($this->table);   
        $this->db->where($this->pk,$id); 
        return $this->db->count_all_results();
    }
	//
	function exists($type, $id)
    {
        $this->db->from('records_'.$type);   
        $this->db->where('id',$id);
        $query = $this->db->get();
        
        return ($query->num_rows()==1);
    }

	function get_all_file_data($type, $user_id){
		$this->db->from('records_'.$type); 
		$this->db->order_by('id', 'desc');
        $this->db->where('user_id', $user_id);
		$qry = $this->db->get();

		return $qry->result_array();
	}
	
	function get_all_data($type, $user_id){
		$this->db->from('records_'.$type); 
		$this->db->order_by('id', 'desc');
        $this->db->where('user_id', $user_id);
		$this->db->group_by('date');
		$qry = $this->db->get();

		return $qry->result_array();
	}

	function get_current_data($type, $user_id, $date){
		
		$this->db->from('records_'.$type); 
		$this->db->where('user_id', $user_id);
		$this->db->where('date', $date);
		$this->db->order_by('id', 'desc');
		
		$qry = $this->db->get();

		return $qry->result_array();
	}
	
    function count_all_by_type($type, $id)
    {
        $this->db->from('records_'.$type);   
        $this->db->where('id',$id); 
        return $this->db->count_all_results();
    }
	
	function get_xeditval($type, $id, $date = null)
    {
        $this->db->from('records_'.$type);   
        $this->db->where('user_id', $id);
		if($date){
			$this->db->where('date', $date);
		}
		
		$this->db->limit(1);
		$this->db->order_by('id', 'desc');
        $query = $this->db->get();
        
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {

            $obj=new stdClass();

            $fields = $this->db->list_fields('records_'.$type);
            
            foreach ($fields as $field)
            {
                $obj->$field='';
            }
            
            return $obj;
        }
    } 
	
    function get_info($type, $id)
    {
        $this->db->from('records_'.$type);   
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {

            $obj=new stdClass();

            $fields = $this->db->list_fields('records_'.$type);
            
            foreach ($fields as $field)
            {
                $obj->$field='';
            }
            
            return $obj;
        }
    } 

    function save($record_data, $type, $id=false)
    {
        if (!$id or !$this->exists($type, $id))
        {
            if($this->db->insert('records_'.$type, $record_data))
            {
                $record_data['id']=$this->db->insert_id();
                return true;
            }
            return false;
        }

        $this->db->where('id', $id);
        return $this->db->update('records_'.$type, $record_data);
    }
	
    function delete($id, $type)
    {
        $this->db->where('id', $id);
        return $this->db->delete('records_'.$type);
    }
	
	function delete_list($ids, $type)
	{
		$this->db->where_in('id', $id);
		return $this->db->delete('records_'.$type);
 	}
}
?>
