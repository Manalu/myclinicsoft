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
	
	function get_all_data($type, $user_id, $maintainable = null){
		$this->db->from('records_'.$type); 
		$this->db->order_by('id', 'desc');
		$this->db->where('user_id', $user_id);
		if($maintainable){
			$this->db->where('is_mainteinable', $maintainable);
		}
		$this->db->group_by('date');
		$qry = $this->db->get();

		return $qry->result_array();
	}

	function get_current_data($type, $user_id, $date, $maintainable = null){
		
		$this->db->from('records_'.$type); 
		$this->db->where('user_id', $user_id);
		$this->db->where('date', $date);
		
		if($type == 'medications'){
			$this->db->order_by('is_mainteinable', 'desc');
		}else{
			$this->db->order_by('id', 'desc');
		}
		
		if($maintainable){
			//$this->db->where('is_mainteinable', $maintainable);
			
		}
		$this->db->limit(8);
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
        $this->db->where('id', $id); //lab_test_results
        return $this->db->delete('records_'.$type);
    }
	
	function delete_list($ids, $type)
	{
		$this->db->where_in('id', $id);
		return $this->db->delete('records_'.$type);
 	}
	
	function get_suggest_record($type, $fields){
		
		switch ($fields) {
			case "preparation":
				$this->db->select('id, preparation AS name', FALSE);
				$group = 'preparation';
				break;
			case "sig":
				$this->db->select('id, sig AS name', FALSE);
				$group = 'sig';
				break;
			default:
				$this->db->select('id, medicine AS name', FALSE);
				$group = 'medicine';
		}

		$this->db->from('records_'.$type); 
		$this->db->order_by('id', 'asc');
		$this->db->group_by($group);
		return $this->db->get();

	}
	/**/
	function save_test($test_data){
		
		if ($this->db->insert('lab_test', $test_data)) {

			$id = $this->db->insert_id();

			return array('test_id' => $id);
		}
		return NULL;
        
	}
	
	function get_test($license){
		$this->db->from('lab_test'); 
		$this->db->where('license_key', $license);
		
		return $this->db->get();
	}
	
	function delete_test($id){
		$this->db->where('id', $id); //lab_test_results
        return $this->db->delete('lab_test');
	}
}
?>
