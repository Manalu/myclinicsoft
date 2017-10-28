<?php

/**
 *
 * Location Library.php
 *
 */
class Location_lib {

    private $ci;                // for CodeIgniter Super Global Reference.
    // --------------------------------------------------------------------

    /**
     * PHP5        Constructor
     *
     */
    function __construct() {
        $this->ci = & get_instance();    // get a reference to CodeIgniter.
    }

    function populate(){
        $this->ci->db->from('location');
        $this->ci->db->where('location_type',0);
        $this->ci->db->order_by('name', 'asc');
        $query = $this->ci->db->get();
        $location  = array(''=>'select');
        foreach ($query->result_array() as $row) {
            $location[$row['location_id']] = ucfirst(strtolower($row['name']));
        }
        return $location;
    }

    function get_types($location_type, $id) {
        $this->ci->db->select('location_id, name');
        $this->ci->db->from('location');
        $this->ci->db->where('location_type', $location_type);
        $this->ci->db->where('parent_id', $id);
        return $this->ci->db->get();
    }
    
    function get_info($id)
    {  
        $this->ci->db->where('location_id', $id);
		$this->ci->db->from('location');
        $query = $this->ci->db->get();
        
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {

            return false;
        }
    } 
	
	function get_all(){
		$this->ci->db->from('countries');
        $this->ci->db->order_by('name', 'asc');
        return $this->ci->db->get();
	}
	
	function get_all_state($country_id){
		$this->ci->db->from('states');
		$this->ci->db->where('country_id', $country_id);
        $this->ci->db->order_by('name', 'asc');
        return $this->ci->db->get();
	}
	
	function get_all_cities($state_id){
		$this->ci->db->from('cities');
		$this->ci->db->where('state_id', $state_id);
        $this->ci->db->order_by('name', 'asc');
        return $this->ci->db->get();
	}
	
	function countries(){
		$this->ci->db->from('countries');
        $this->ci->db->order_by('name', 'asc');
        $query = $this->ci->db->get();
        $location  = array(''=>'select');
        foreach ($query->result_array() as $row) {
            $location[$row['id']] = ucfirst(strtolower($row['name']));
        }
        return $location;
	}
	
	function create_country($data){
		return $this->ci->db->insert('countries', $data);
	}
	
	function create_state($data){
		return $this->ci->db->insert('states', $data);
	}
	
	function create_citi($data){
		return $this->ci->db->insert('cities', $data);
	}
	
	function info($tbl, $id)
    {  
        $this->ci->db->where('id', $id);
		$this->ci->db->from($tbl);
		$query = $this->ci->db->get();
        
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else
        {

            $obj=new stdClass();

            $fields = $this->ci->db->list_fields($tbl);
            
            foreach ($fields as $field)
            {
                $obj->$field='';
            }
            
            return $obj;
        }
    }
	
	function populate_countries(){
		$this->ci->db->select('id as value, name as text');
        $this->ci->db->from('countries');
        return $this->ci->db->get();
	}
	
	function _populate_states($id){
		$this->ci->db->select('id as value, name as text');
        $this->ci->db->from('states');
        $this->ci->db->where('country_id', $id);
        return $this->ci->db->get();
	}
	
	function _populate_cities($id){
		$this->ci->db->select('id as value, name as text');
        $this->ci->db->from('cities');
        $this->ci->db->where('state_id', $id);
        return $this->ci->db->get();
	}
	
	function populate_states($id){
		$this->ci->db->select('id, name');
        $this->ci->db->from('states');
        $this->ci->db->where('country_id', $id);
        return $this->ci->db->get();
	}
	
	function populate_cities($id){
		$this->ci->db->select('id, name');
        $this->ci->db->from('cities');
        $this->ci->db->where('state_id', $id);
        return $this->ci->db->get();
	}
	
	
}

// ------------------------------------------------------------------------
// End of Dynamic_menu Library Class.

// ------------------------------------------------------------------------
/* End of file Dynamic_menu.php */
/* Location: ../application/libraries/Dynamic_menu.php */ 