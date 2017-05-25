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
}

// ------------------------------------------------------------------------
// End of Dynamic_menu Library Class.

// ------------------------------------------------------------------------
/* End of file Dynamic_menu.php */
/* Location: ../application/libraries/Dynamic_menu.php */ 