<?php
class Appconfig extends CI_Model 
{
	
	function exists($license_key, $key)
	{
		$this->db->from('app_config');	
		$this->db->where('license_key',$license_key);
		$this->db->where('app_config.key',$key);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}
	
	function get_all($license_key)
	{
		$this->db->from('app_config');
		$this->db->where('license_key',$license_key);
		$this->db->order_by("key", "asc");
		return $this->db->get();		
	}
	
	function get($license_key, $key)
	{
		$query = $this->db->get_where('app_config', array('license_key'=> $license_key, 'key' => $key), 1);
		
		if($query->num_rows()==1)
		{
			return $query->row()->value;
		}
		
		return "";
		
	}
	
	public function save($key, $value)
	{
		$config_data=array(
			'license_key'=>$this->tank_auth->get_license_key(),
			'key'=>$key,
			'value'=>$value
		);

		if(!$this->exists($this->tank_auth->get_license_key(), $key))
		{
			return $this->db->insert('app_config', $config_data);
		}

		$this->db->where('key', $key);

		return $this->db->update('app_config', $config_data);
	}
	
	
	function batch_save($license_key, $data)
	{
		$success=true;
		
		//Run these queries as a transaction, we want to make sure we do all or nothing
		$this->db->trans_start();
		
		foreach($data as $key=>$value)
		{
			if(!$this->save($key,$value))
			{
				$success=false;
				break;
			}
		}
		
		$this->db->trans_complete();		
		return $success;
		
	}
		
	function delete($key)
	{
		return $this->db->delete('app_config', array('license_key'=> $license_key, 'key' => $key)); 
	}
	
	function delete_all()
	{
		return $this->db->empty_table('app_config'); 
	}
}

?>