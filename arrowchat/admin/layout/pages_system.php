			<div class="title_bg"> 
				<div class="title">System</div> 
				<div class="module_content">
					<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?do=<?php echo $do; ?>" enctype="multipart/form-data">

<?php
	if ($do == "configsettings") 
	{
?>
					<div class="subtitle">Configuration Settings</div>
					<fieldset class="firstFieldset">
						<dl class="selectionBox">
							<dt>
								<label for="config_base_url">Base URL</label>
							</dt>
							<dd>
								<input type="text" id="config_base_url" class="selectionText" name="config_base_url" value="<?php echo $base_url; ?>" />
								<p class="explain">
									Enter the path to ArrowChat from your www or public_html directory.  In most cases, this is simply "/arrowchat/".  Be sure to include a trailing slash or it will automatically be added for you.
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="config_login_url">Login URL</label>
							</dt>
							<dd>
								<input type="text" id="config_login_url" class="selectionText" name="config_login_url" value="<?php echo $login_url; ?>" />
								<p class="explain">
									Enter the full URL (with http) to your site's login page.  If this is set, the message telling people to login will take them to the login page.
								</p>
							</dd>
						</dl>
					</fieldset>
					<fieldset>
						<dl class="selectionBox">
							<dt>
								<label for="config_heart_beat">Message Heart Beat</label>
							</dt>
							<dd>
								<input type="text" id="config_heart_beat" class="selectionText" name="config_heart_beat" value="<?php echo $heart_beat; ?>" />
								<p class="explain">
									Making this value smaller will use more server resources but ArrowChat will retrieve new messages faster. This value cannot be greater than the online timeout.  Default: 3
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="config_buddy_list_heart_beat">Buddy List Heart Beat</label>
							</dt>
							<dd>
								<input type="text" id="config_buddy_list_heart_beat" class="selectionText" name="config_buddy_list_heart_beat" value="<?php echo $buddy_list_heart_beat; ?>" />
								<p class="explain">
									Making this value smaller will use more server resources but ArrowChat will update the buddy list more often.  Default: 60
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="config_online_timeout">Online Timeout</label>
							</dt>
							<dd>
								<input type="text" id="config_online_timeout" class="selectionText" name="config_online_timeout" value="<?php echo $online_timeout; ?>" />
								<p class="explain">
									The time in seconds that a user will be considered offline if inactive for this long. This value cannot be lower than the heart beat.  Default: 120
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="config_idle_time">Idle Timeout</label>
							</dt>
							<dd>
								<input type="text" id="config_idle_time" class="selectionText" name="config_idle_time" value="<?php echo $idle_time; ?>" />
								<p class="explain">
									The time in minutes that a user is considered idle after not moving their mouse or pressing a key. An idle user will use less resources.  Default: 3
								</p>
							</dd>
						</dl>
					</fieldset>
					<dl class="selectionBox submitBox">
						<dt></dt>
						<dd>
							<div class="floatr">
								<a class="fwdbutton" onclick="document.forms[0].submit(); return false">
									<span>Save Changes</span>
								</a>
								<input type="hidden" name="config_submit" value="1" />
							</div>
						</dd>
					</dl>
<?php
	}
?>

<?php
	if ($do == "adminsettings") 
	{
?>
					<div class="subtitle">Administrator Settings</div>
					<fieldset class="firstFieldset">
						<dl class="selectionBox">
							<dt>
								<label for="admin_old_password">Old Password</label>
							</dt>
							<dd>
								<input type="password" class="selectionText" id="admin_old_password" name="admin_old_password" value="" />
								<p class="explain">
									You must first enter your old password to update these settings.
								</p>
							</dd>
						</dl>
					</fieldset>
					<fieldset>
						<dl class="selectionBox">
							<dt>
								<label for="admin_new_password">New Password</label>
							</dt>
							<dd>
								<input type="password" class="selectionText" id="admin_new_password" name="admin_new_password" value="" />
								<p class="explain">
									Only enter if you wish to change your password.
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="admin_confirm_password">Confirm Password</label>
							</dt>
							<dd>
								<input type="password" class="selectionText" id="admin_confirm_password" name="admin_confirm_password" value="" />
								<p class="explain">
									Confirm the password above.
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt>
								<label for="admin_email">Admin Email</label>
							</dt>
							<dd>
								<input type="text" class="selectionText" id="admin_email" name="admin_email" value="<?php echo $admin_email; ?>" />
								<p class="explain">
									Change the administration email for this installation.
								</p>
							</dd>
						</dl>
					</fieldset>
					<dl class="selectionBox submitBox">
						<dt></dt>
						<dd>
							<div class="floatr">
								<a class="fwdbutton" onclick="document.forms[0].submit(); return false">
									<span>Save Changes</span>
								</a>
								<input type="hidden" name="admin_submit" value="1" />
							</div>
						</dd>
					</dl>
<?php
	}
?>

<?php
	if ($do == "repair") 
	{
?>
					<div class="subtitle">Repair ArrowChat</div>
                    <div class="subExplain">
                        <i>Clicking the repair button will attempt to repair your ArrowChat database. If your ArrowChat suddenly does not work after upgrading to a new version, this repair feature may fix it. It should not delete your exisiting information, but please backup your database just in case.<br /><br />

This feature will not overwrite any files or modification you've made; it attempts to repair the database only.</i>
                    </div>
					<dl class="selectionBox submitBox">
						<dt>
                        </dt>
						<dd>
							<div class="floatr" style="float: right;">
								<a class="fwdbutton" onclick="document.forms[0].submit(); return false">
									<span>Repair Database</span>
								</a>
								<input type="hidden" name="repair_submit" value="1" />
							</div>
						</dd>
					</dl>
<?php
	}
?>

<?php
	if ($do == "maintenance") 
	{
?>
					<div class="subtitle">ArrowChat Maintenance</div>
                    <div class="subExplain">
                        <i>Your database can start to get large after running ArrowChat for a while with all the messages, guest users, etc.  It is highly recommended that you clear all this data out periodicly to make ArrowChat run like the first day you installed it.</i>
                    </div>
					<fieldset>
						<dl class="selectionBox">
							<dt>
								<label for="clean_private_messages"><b>Messages</b></label>
							</dt>
							<dd>
								<ul>
									<li>
										<label for="clean_private_messages">
											<input type="checkbox" id="clean_private_messages" name="clean_private_messages" checked="checked" value="1" />
											Clean Private Messages
										</label>
									</li>
								</ul>
								<p class="explain">
									This will remove read messages more than 2 weeks old and unread messages more than 4 weeks old.
								</p>
							</dd>
						</dl>
					</fieldset>
					<fieldset>
						<dl class="selectionBox">
							<dt>
								<label for="clean_inactive_guests"><b>Users</b></label>
							</dt>
							<dd>
								<ul>
									<li>
										<label for="clean_inactive_guests">
											<input type="checkbox" id="clean_inactive_guests" name="clean_inactive_guests" checked="checked" value="1" />
											Clean Inactive Guests
										</label>
									</li>
								</ul>
								<p class="explain">
									This will remove all guest accounts (they will be assisgned a new number if they come back later) that have been inactive for 2 weeks or more.
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt></dt>
							<dd>
								<ul>
									<li>
										<label for="clean_inactive_users">
											<input type="checkbox" id="clean_inactive_users" name="clean_inactive_users" checked="checked" value="1" />
											Clean Inactive Users
										</label>
									</li>
								</ul>
								<p class="explain">
									This will remove all inactive users accounts for 4 weeks or more.  If they come back, they'll lose their settings (hide bar, chat sounds, etc).
								</p>
							</dd>
						</dl>
					</fieldset>
					<fieldset>
						<dl class="selectionBox">
							<dt>
								<label for="clean_cr_messages"><b>Chat Rooms</b></label>
							</dt>
							<dd>
								<ul>
									<li>
										<label for="clean_cr_messages">
											<input type="checkbox" id="clean_cr_messages" name="clean_cr_messages" checked="checked" value="1" />
											Clean Chat Room Messages
										</label>
									</li>
								</ul>
								<p class="explain">
									This will remove all chat room messages more than a week old.
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt></dt>
							<dd>
								<ul>
									<li>
										<label for="clean_cr_rooms">
											<input type="checkbox" id="clean_cr_rooms" name="clean_cr_rooms" checked="checked" value="1" />
											Clean User Created Chat Rooms
										</label>
									</li>
								</ul>
								<p class="explain">
									Removes all inactive user created chat rooms.
								</p>
							</dd>
						</dl>
						<dl class="selectionBox">
							<dt></dt>
							<dd>
								<ul>
									<li>
										<label for="clean_cr_users">
											<input type="checkbox" id="clean_cr_users" name="clean_cr_users" checked="checked" value="1" />
											Clean Inactive Chat Room Users
										</label>
									</li>
								</ul>
								<p class="explain">
									Removes all inactive chat rooms users more than 2 weeks old.
								</p>
							</dd>
						</dl>
					</fieldset>
					<fieldset>
						<dl class="selectionBox">
							<dt>
								<label for="admin_confirm_password"><b>Miscellaneous</b></label>
							</dt>
							<dd>
								<ul>
									<li>
										<label for="clean_notifications">
											<input type="checkbox" id="clean_notifications" name="clean_notifications" checked="checked" value="1" />
											Clean Notifications
										</label>
									</li>
								</ul>
								<p class="explain">
									Removes all notifications more than 4 weeks old.
								</p>
							</dd>
						</dl>
					</fieldset>
					<dl class="selectionBox submitBox">
						<dt>
                        </dt>
						<dd>
							<div class="floatr" style="float: right;">
								<a class="fwdbutton" onclick="document.forms[0].submit(); return false">
									<span>Clean Database</span>
								</a>
								<input type="hidden" name="maintenance_submit" value="1" />
							</div>
						</dd>
					</dl>
<?php
	}
?>

<?php
	if ($do == "maintenance2") 
	{
?>
				<?php
					if(!empty($_SESSION['counter'])) {
				?>
					<script type="text/javascript">
						setTimeout(function () {
						   window.location.href= 'system.php?do=maintenance2';
						},1000);
					</script>
				<?php
					}
				?>
					<div class="subtitle">ArrowChat Maintenance</div>
                    <div class="subExplain" style="text-align:center">
					<?php if(empty($_SESSION['counter'])) { ?>
						<p style="margin: 25px 0 15px">
							<img src="./images/img-check.png" alt="Done" width="48" height="48" />
						</p>
						<p style="margin: 0 0 25px">Your database has been cleaned.</p>
					<?php } else { ?>
						<p style="margin: 25px 0 15px">
							<img src="./images/img-loading.gif" alt="Loading" width="32" height="32" />
						</p>
						<p style="margin: 20px 0 5px"><?php echo $cleaning_message; ?> (<?php echo $cleaning_percent; ?>%)...</p>
						<p style="margin: 0 0 25px">Cleaning the database. Do not change or refresh the page.</p>
					<?php } ?>
                    </div>
					<dl class="selectionBox submitBox">
						<dt>
                        </dt>
						<dd>
							<div class="floatr" style="float: right;">
								<input type="hidden" name="repair_submit" value="1" />
							</div>
						</dd>
					</dl>
<?php
	}
?>

<?php
	if ($do == "language") 
	{
?>
					<div class="subtitle">Languages</div>
                    <div class="subExplain">
                        <i>If you'd like to add another language, copy the /language/en folder and rename the folder and filename to something else.  The folder and filename MUST be the same.  For example, language/french/french.php or language/fr/fr.php.</i>
                    </div>
					<table cellspacing="0" cellpadding="0" class="table_table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
<?php
		$folders = get_folders(AC_FOLDER_LANGUAGE);
		
		$result = $db->execute("
			SELECT config_value 
			FROM arrowchat_config
			WHERE config_name = 'language'
		");

		$row = $db->fetch_array($result);
		
		foreach ($folders as $folder) 
		{
?>
							<tr>
								<td><?php echo $folder['name']; ?></td>
<?php
			if (strtolower($row['config_value']) == strtolower($folder['name'])) 
			{
?>
								<td>Currently Activated</td>
<?php
			} 
			else 
			{
?>
								<td><a href="system.php?do=language&activate=<?php echo $folder['name']; ?>">Activate</a></td>
<?php
			}
?>
							</tr>
<?php
		}
?>
						</tbody>
					</table>
<?php
	}
?>
					</form>

				</div>
			</div>