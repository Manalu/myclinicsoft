<?php
class Common extends CI_Model
{
    function get_subscription_info($license_key){
		
		$this->db->from('users_subscriptions_plan');
		$this->db->join('subscriptions','users_subscriptions_plan.subscription_id =subscriptions.subscription_id');
        $this->db->where('users_subscriptions_plan.license_key', $license_key);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
			
            return $query->row();
			
        } else {

            $fields = $this->db->list_fields('users_subscriptions_plan');
            $subscription_obj = new stdClass;

            foreach ($fields as $field) {
                $subscription_obj->$field = '';
            }

            return $subscription_obj;
			
        }
		
	}
	
	function get_all_clients(){
		
		$this->db->from('users_subscriptions_plan'); 
		$this->db->join('users_profiles','users_subscriptions_plan.user_id =users_profiles.user_id');
		$this->db->where('subscription_id !=', 1);
        $this->db->order_by('usp_id', 'ASC');
        return $this->db->get();
	}
	
	function has_permission($name, $id)
    {
        $this->db->from('email_prefferences');
        $this->db->where('name',$name);
        $this->db->where('user_id',$id);
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }

    }
}
?>
