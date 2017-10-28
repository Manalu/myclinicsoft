<?php

	/*
	|| #################################################################### ||
	|| #                             ArrowChat                            # ||
	|| # ---------------------------------------------------------------- # ||
	|| #    Copyright ©2010-2012 ArrowSuites LLC. All Rights Reserved.    # ||
	|| # This file may not be redistributed in whole or significant part. # ||
	|| # ---------------- ARROWCHAT IS NOT FREE SOFTWARE ---------------- # ||
	|| #                NULLED BY DARKGOTH | NCP TEAM 2014                # ||
	|| #################################################################### ||
	*/

	// ########################## INCLUDE BACK-END ###########################
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "includes/admin_init.php");
	
	// Get the page to process
	if (empty($do))
	{
		$do = "manageusers";
	}

	// ####################### START SUBMIT/POST DATA ########################
	
	// Ban IP Submit Processor
	if (var_check('ban_ip_submit')) 
	{
		$ip_addys = explode("\\r\\n", get_var('ban_ip'));
		
		foreach ($ip_addys as $addy) 
		{
			$result = $db->execute("
				SELECT ban_ip 
				FROM arrowchat_banlist 
				WHERE ban_ip = '" . $db->escape_string($addy) . "'
			");

			if ($result AND $db->count_select() > 0) 
			{
				$error = "This IP is already banned.";
			}
			
			if (empty($_POST['ban_ip_submit']))
			{
				$error = "You must enter an IP to ban.";
			}
			
			if (empty($error)) 
			{
				$result = $db->execute("
					INSERT INTO arrowchat_banlist (ban_ip, banned_by, banned_time) 
					VALUES ('" . $db->escape_string($addy) . "', '0', '" . time() . "')
				");

				if (!$result) 
				{
					$error = "There was a database error.  Please try again.";
				}
			}
		}
		
		if (empty($error)) 
		{
			$msg = "IPs successfully banned.";
			update_config_file();
		}
	}
	
	// Unban IP Submit Processor
	if (var_check('unban_ip_submit')) 
	{
		$ips = get_var('unban_ip');
		
		if ($ips) 
		{
			foreach ($ips as $unbans) 
			{
				$result = $db->execute("
					DELETE FROM arrowchat_banlist 
					WHERE ban_id = '" . $unbans . "'
				");

				if (!$result) 
				{
					$error = "There was a database error";
				}
			}
			
			if (empty($error)) 
			{
				$msg = "The IPs were successfully unbaned.";
				update_config_file();
			}
		} 
		else 
		{
			$error = "You did not select any IPs";
		}
	}
	
	// Ban Username Submit Processor
	if (var_check('ban_username_submit')) 
	{
		$usernames = explode("\\r\\n", get_var('ban_username'));
		
		foreach ($usernames as $username) 
		{
			$result = $db->execute("
				SELECT " . DB_USERTABLE_USERID . " 
				FROM " . TABLE_PREFIX . DB_USERTABLE . " 
				WHERE LOWER(" . DB_USERTABLE_NAME . ") = '" . strtolower($db->escape_string($username)) . "'
			");

			$row = $db->fetch_array($result);
			
			if (!$result OR $db->count_select() < 1) 
			{
				$error = "We could not find a user with that username.";
			}
			
			$result = $db->execute("
				SELECT ban_userid 
				FROM arrowchat_banlist 
				WHERE ban_userid = '" . $row[DB_USERTABLE_USERID] . "'
			");

			if ($result AND $db->count_select() > 0) 
			{
				$error = "This username is already banned.";
			}
			
			if (empty($error)) 
			{
				$result = $db->execute("
					INSERT INTO arrowchat_banlist (ban_userid, banned_by, banned_time) 
					VALUES ('" . $row[DB_USERTABLE_USERID] . "', '0', '" . time() . "')
				");

				if ($result) 
				{
					$msg = "Usernames successfully banned.";
					update_config_file();
				}
				else
				{
					$error = "There was a database error.  Please try again.";
				}
			}
		}
	}
	
	// Unban Username Submit Processor
	if (var_check('unban_username_submit')) 
	{
		$usernames = get_var('unban_username');
		
		if ($usernames) 
		{
			foreach ($usernames as $unbans) 
			{
				$result = $db->execute("
					DELETE FROM arrowchat_banlist 
					WHERE ban_id = '" . $db->escape_string($unbans) . "'
				");

				if ($result) 
				{
					$msg = "The Usernames were successfully unbaned.";
					update_config_file();
				}
				else
				{
					$error = "There was a database error";
				}
			}
		} 
		else 
		{
			$error = "You did not select any IPs";
		}
	}
	
	// User Edit Submit Processor
	if (var_check('user_submit')) 
	{
		$result = $db->execute("
			UPDATE arrowchat_status
			SET hide_bar = '" . get_var('hide_bar') . "',
				play_sound = '" . get_var('play_sound') . "', 
				window_open = '" . get_var('window_open') . "', 
				only_names = '" . get_var('only_names') . "', 
				announcement = '" . get_var('announcement') . "', 
				is_admin = '" . get_var('is_admin') . "',
				is_mod = '" . get_var('is_mod') . "'
			WHERE userid = '" . get_var('user_id') . "'
		");

		if ($result) 
		{
			$hide_bar = get_var('hide_bar');
			$play_sound = get_var('play_sound');
			$window_open = get_var('window_open');
			$only_names = get_var('only_names');
			$announcement = get_var('announcement');
			$is_admin = get_var('is_admin');
			$is_mod = get_var('is_mod');
			
			if (empty($is_mod))
			{
				$db->execute("
					UPDATE arrowchat_chatroom_users
					SET is_mod = '0'
					WHERE user_id = '" . get_var('user_id') . "'
				");
			}
			
			$msg = "User settings successfully saved.";
		} 
		else 
		{
			$error = "There was an error saving the user's settings.";
		}
	}
	
	// Delete Guest Name
	if (var_check('guest_name')) 
	{
		$db->execute("
			UPDATE arrowchat_status
			SET guest_name = NULL
			WHERE userid = '" . get_var('id') . "'
		");
		
		if ($result) 
		{
			$msg = "The user's name was deleted.";
		}
		else 
		{
			$error = "There was an error deleting the user's name.";
		}
	}

	$smarty->assign('msg', $msg);
	$smarty->assign('error', $error);

	$smarty->display(dirname(__FILE__) . DIRECTORY_SEPARATOR . "layout/pages_header.tpl");
	require(dirname(__FILE__) . DIRECTORY_SEPARATOR . "layout/pages_users.php");
	$smarty->display(dirname(__FILE__) . DIRECTORY_SEPARATOR . "layout/pages_footer.tpl");
	
?>