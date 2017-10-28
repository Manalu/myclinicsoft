<?php

class Cmail {

    private $ci;
    
    function __construct()
    {
        $this->ci =& get_instance();    // get a reference to CodeIgniter.
    }	
	/**
	 * Send email
	 * This 
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function send($type, $args, $email_content)
	{
		
		// Appointment
		// Sender [Sysyem]
		// To client [Doctor]

      	$this->ci->load->library('email');
		$this->ci->email->from($this->ci->config->item('webmaster_email', 'tank_auth'), $this->ci->config->item('website_name', 'tank_auth'));
		$this->ci->email->reply_to($this->ci->config->item('webmaster_email', 'tank_auth'), $this->ci->config->item('website_name', 'tank_auth'));
		$this->ci->email->to($args['email']);
		$this->ci->email->cc('rebucasrandy1986@gmail.com');
		$this->ci->email->bcc('coreweb2015@gmail.com');
		$this->ci->email->subject(sprintf($this->ci->lang->line('auth_subject_'.$type), $args['firstname'].', '.$args['lastname']));
		$this->ci->email->message($email_content);
		//$this->ci->email->set_alt_message($this->ci->load->view('email/'.$type.'-txt', $data, TRUE));
		return $this->ci->email->send();

	}
	
}