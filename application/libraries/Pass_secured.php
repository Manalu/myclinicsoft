<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('phpass-0.1/PasswordHash.php');

define('strength', 8);
define('portable', FALSE);
/**
 * Password Secure
 *
 * password ecryption passwordhash v0.1
 *
 * @author		Randy Rebucas 
 * @version		1.0.0
 * @license		MIT License Copyright (c) 2008 Randy Rebucas
 */
class Pass_secured {
	/**
	 * Encrypt
	 * encrypt password
	 *
	 * @param	string
	 * @return	string
	 */
   	function encrypt($password){
      	$CI =& get_instance();
      	$hasher = new PasswordHash( strength, portable );
      	return $hasher->HashPassword($password);
   	}     

}

?>
