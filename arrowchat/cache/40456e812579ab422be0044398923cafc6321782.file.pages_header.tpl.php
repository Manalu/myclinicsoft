<?php /* Smarty version Smarty 3.1.4, created on 2017-03-29 12:22:50
         compiled from "/home/myclinicsoft/public_html/arrowchat/admin/layout/pages_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191355298458dba71a31a9d9-72407478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40456e812579ab422be0044398923cafc6321782' => 
    array (
      0 => '/home/myclinicsoft/public_html/arrowchat/admin/layout/pages_header.tpl',
      1 => 1420095600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191355298458dba71a31a9d9-72407478',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'login_post' => 0,
    'admin_username' => 0,
    'applications_have_update' => 0,
    'applications_update_count' => 0,
    'themes_have_update' => 0,
    'themes_update_count' => 0,
    'install' => 0,
    'write' => 0,
    'error' => 0,
    'msg' => 0,
    'feature_disabled' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1.4',
  'unifunc' => 'content_58dba71a62c03',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58dba71a62c03')) {function content_58dba71a62c03($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr"> 
<head profile="http://gmpg.org/xfn/11"> 
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="expires" content="-1">
	
	<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? "ArrowChat Administration Panel" : $tmp);?>
</title> 

	<link rel="stylesheet" type="text/css" href="includes/css/style.css" /> 
	<link rel="stylesheet" href="includes/css/menu/core.css" type="text/css" media="screen">
	<link rel="stylesheet" href="includes/css/menu/styles/sblue.css" type="text/css" media="screen">
	<link rel="stylesheet" href="includes/css/itip/itip.css" type="text/css" media="screen">
	<link rel="stylesheet" href="includes/css/itip/animate.css" type="text/css" media="screen">
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script type="text/javascript" src="includes/css/itip/modernizr.js"></script>
	<script type="text/javascript" src="includes/css/itip/itip.min.js"></script>
	
	<!--[if (gt IE 9)|!(IE)]><!-->
		<link rel="stylesheet" href="includes/css/menu/effects/slide.css" type="text/css" media="screen">
	<!--<![endif]-->

	<!-- This piece of code, makes the CSS3 effects available for IE -->
	<!--[if lte IE 9]>
		<script src="includes/js/menu.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8">
			$(function() {
				$("#menu").menu({ 'effect' : 'slide' });
			});
		</script>
	<![endif]-->
	
	<script type="text/javascript">
		$(document).ready(function() {
<?php if (!empty($_smarty_tpl->tpl_vars['login_post']->value)){?>
			$('#logo').animate({ 'marginLeft':'0%'}, 500, function () {});
<?php }?>
			$('.admin_title_bg ul li').hover(
				function () {
					if (!$(this).hasClass('active_nav') && !$(this).hasClass('navHead')) {
						$(this).animate({
							marginLeft:5
						}, 150);
					}
				},
				function () {
					if (!$(this).hasClass('active_nav') && !$(this).hasClass('navHead')) {
						$(this).animate({
							marginLeft:0
						}, 150);
					}
				}
			);
		});
	</script>
</head> 
<body>
<div id="wrapper">
	<div id="topnav">
		<div id="topnavcontent">
			<div style="float: left; padding-top:8px; padding-left:20px;">
				<img id="logo" style="<?php if (!empty($_smarty_tpl->tpl_vars['login_post']->value)){?>margin-left: -400%; <?php }?>width: 196px; height: 26px;" src="images/img-logo.png" height="26" width="196" border="0" alt="" />
			</div>
			<div style="float: left; position: relative; top: 17px; padding-left: 20px;">
				<a href="../../">Visit Site &#187;</a>
			</div>
			<div style="float: right; padding-top:17px;">
				Howdy, <a href="system.php?do=adminsettings"><?php echo $_smarty_tpl->tpl_vars['admin_username']->value;?>
</a> | <a href="index.php?do=logout">Log Out</a>
			</div>
		</div>
	</div>
	<div id="subnavwrapper">
		<div id="subnav">
			<ul class="menu sblue" id="menu">
			  <li><a href="./">Overview</a>
				<ul>
					<li><a href="./general.php?do=embedcodes">Embed Codes</a></li>
					<li><a href="./general.php?do=chatfeatures">General Features</a></li>
					<li><a href="./general.php?do=chatsettings">General Settings</a></li>
				</ul>
			  </li>
			  <?php if (@ARROWCHAT_EDITION!="lite"){?>
			  <li><a href="./manage.php?do=appsettings">Manage<?php if ($_smarty_tpl->tpl_vars['applications_have_update']->value){?><span class="bubble-top"><?php echo $_smarty_tpl->tpl_vars['applications_update_count']->value;?>
</span><?php }?></a>
				<ul>
					<li><a href="./manage.php?do=appsettings">Applications<?php if ($_smarty_tpl->tpl_vars['applications_have_update']->value){?><span class="bubble"><?php echo $_smarty_tpl->tpl_vars['applications_update_count']->value;?>
</span><?php }?></a></li>
					<li><a href="./manage.php?do=traylinks">Bar Links</a></li>
					<li><a href="./manage.php?do=chatroomsettings">Chat Rooms</a></li>
					<li><a href="./manage.php?do=notificationsettings">Notifications</a></li>
				</ul>
			  </li>
			  <?php }?>
			  <li><a href="./users.php?do=manageusers">Users</a>
				<ul>
					<li><a href="./users.php?do=manageusers">Manage Users</a></li>
					<li><a href="./users.php?do=manageadmins">Manage Mods/Admins</a></li>
					<li><a href="./users.php?do=banusernames">Ban Usernames</a></li>
					<li><a href="./users.php?do=banip">Ban IP Addresses</a></li>
				</ul>
			  </li>
			  <li><a href="./general.php?do=chatstyle">Appearance<?php if ($_smarty_tpl->tpl_vars['themes_have_update']->value){?><span class="bubble-top"><?php echo $_smarty_tpl->tpl_vars['themes_update_count']->value;?>
</span><?php }?></a>
				<ul>
					<li><a href="./general.php?do=chatstyle">General Settings</a></li>
					<li><a href="./themes.php?do=smilies">Smilies</a></li>
					<li><a href="./themes.php?do=templates">Templates</a></li>
					<li><a href="./themes.php?do=managethemes">Themes<?php if ($_smarty_tpl->tpl_vars['themes_have_update']->value){?><span class="bubble"><?php echo $_smarty_tpl->tpl_vars['themes_update_count']->value;?>
</span><?php }?></a></li>
				</ul>
			  </li>
			  <li><a href="./system.php?do=configsettings">System</a>
				<ul>
					<li><a href="./system.php?do=adminsettings">Admin Settings</a></li>
					<li><a href="./system.php?do=configsettings">Configuration</a></li>
					<li><a href="./system.php?do=language">Languages</a></li>
					<li><a href="./system.php?do=maintenance">Maintenance</a></li>
					<li><a href="./system.php?do=repair">Repair ArrowChat</a></li>
				</ul>
			  </li>
			<ul>
		</div>
	</div>
	<?php if (!$_smarty_tpl->tpl_vars['install']->value){?>
	<div class="notify-msg">
		You should immediately delete or rename the ArrowChat install directory for security reasons.
	</div>
	<?php }?>
	<?php if (!$_smarty_tpl->tpl_vars['write']->value){?>
	<div class="notify-msg">
		It is highly recommended that you CHMOD the includes/config.php file to 644 or 444 before using ArrowChat.
	</div>
	<?php }?>
	<?php if (!empty($_smarty_tpl->tpl_vars['error']->value)){?>
	<div class="error-msg-wrapper">
		<div class="error-msg">
			<?php echo $_smarty_tpl->tpl_vars['error']->value;?>

		</div>
	</div>
	<?php }?>
	<?php if (!empty($_smarty_tpl->tpl_vars['msg']->value)){?>
	<div class="success-msg-wrapper">
		<div class="success-msg">
			<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

		</div>
	</div>
	<?php }?>
	<div id="content">
		<div id="leftcontent">
				<?php if (empty($_GET['do'])||$_GET['do']=='chatfeatures'||$_GET['do']=='chatsettings'||$_GET['do']=='delete_history'||$_GET['do']=='embedcodes'){?>
				<div class="admin_title_bg"> 
					<ul id ="menu-general"> 
						<li class="navHead">Home</li>
						<li <?php if (empty($_GET['do'])||$_GET['do']=='delete_history'){?>class="active_nav"<?php }?>><a href="./">Overview</a></li> 
						<li <?php if ($_GET['do']=='embedcodes'){?>class="active_nav"<?php }?>><a href="general.php?do=embedcodes">Embed Codes</a></li> 
						<li <?php if ($_GET['do']=='chatfeatures'){?>class="active_nav"<?php }?>><a href="general.php?do=chatfeatures">General Features</a></li> 
						<li <?php if ($_GET['do']=='chatsettings'){?>class="active_nav"<?php }?>><a href="general.php?do=chatsettings">General Settings</a></li> 
					</ul> 
				</div>
				<?php }?>
				<?php if ($_GET['do']=='appsettings'||$_GET['do']=='traylinks'||$_GET['do']=='traylinksedit'||$_GET['do']=='chatroomsettings'||$_GET['do']=='notificationsettings'||$_GET['do']=='appsedit'||$_GET['do']=='chatroomedit'||$_GET['do']=='chatroomlogs'||$_GET['do']=='notificationsedit'){?>
				<div class="admin_title_bg">
					<ul id ="menu-manage">
						<li class="navHead">Manage</li>
						<li <?php if ($_GET['do']=='appsettings'||$_GET['do']=='appsedit'){?>class="active_nav"<?php }?>><a href="manage.php?do=appsettings">Applications<?php if ($_smarty_tpl->tpl_vars['applications_have_update']->value){?> (<?php echo $_smarty_tpl->tpl_vars['applications_update_count']->value;?>
)<?php }?></a></li> 
						<li <?php if ($_GET['do']=='traylinks'||$_GET['do']=='traylinksedit'){?>class="active_nav"<?php }?>><a href="manage.php?do=traylinks">Bar Links</a></li> 
						<li <?php if ($_GET['do']=='chatroomsettings'||$_GET['do']=='chatroomedit'||$_GET['do']=='chatroomlogs'){?>class="active_nav"<?php }?>><a href="manage.php?do=chatroomsettings">Chat Rooms</a></li> 
						<li <?php if ($_GET['do']=='notificationsettings'||$_GET['do']=='notificationsedit'){?>class="active_nav"<?php }?>><a href="manage.php?do=notificationsettings">Notifications</a></li> 
					</ul>
					<?php if (!empty($_smarty_tpl->tpl_vars['feature_disabled']->value)){?>
						<div class="feature-disabled">
							<b><?php echo $_smarty_tpl->tpl_vars['feature_disabled']->value;?>
 Disabled</b><br />This feature is disabled and will not display in the bar regardless of these settings.  You can enable it under general features.
						</div>
					<?php }?>
				</div>
				<?php }?>
				<?php if ($_GET['do']=='banip'||$_GET['do']=='banusernames'||$_GET['do']=='manageusers'||$_GET['do']=='manageadmins'||$_GET['do']=='logs'||$_GET['do']=='view'||$_GET['do']=='actions'){?>
				<div class="admin_title_bg"> 
					<ul id ="menu-users"> 
						<li class="navHead">Users</li>
						<li <?php if ($_GET['do']=='manageusers'||$_GET['do']=='logs'||$_GET['do']=='view'){?>class="active_nav"<?php }?>><a href="users.php?do=manageusers">Manage Users</a></li>
						<li <?php if ($_GET['do']=='manageadmins'||$_GET['do']=='actions'){?>class="active_nav"<?php }?>><a href="users.php?do=manageadmins">Manage Mods/Admins</a></li>
						<li <?php if ($_GET['do']=='banusernames'){?>class="active_nav"<?php }?>><a href="users.php?do=banusernames">Ban Usernames</a></li>
						<li <?php if ($_GET['do']=='banip'){?>class="active_nav"<?php }?>><a href="users.php?do=banip">Ban IP Addresses</a></li>
					</ul> 
				</div>
				<?php }?>
				<?php if ($_GET['do']=='managethemes'||$_GET['do']=='smilies'||$_GET['do']=='templates'||$_GET['do']=='chatstyle'||$_GET['do']=='install'||$_GET['do']=='edit'){?>
				<div class="admin_title_bg"> 
					<ul id ="menu-themes"> 
						<li class="navHead">Appearance</li>
						<li <?php if ($_GET['do']=='chatstyle'){?>class="active_nav"<?php }?>><a href="general.php?do=chatstyle">General Settings</a></li> 
						<li <?php if ($_GET['do']=='smilies'){?>class="active_nav"<?php }?>><a href="themes.php?do=smilies">Smilies</a></li> 
						<li <?php if ($_GET['do']=='templates'){?>class="active_nav"<?php }?>><a href="themes.php?do=templates">Templates</a></li> 
						<li <?php if ($_GET['do']=='managethemes'||$_GET['do']=='install'||$_GET['do']=='edit'){?>class="active_nav"<?php }?>><a href="themes.php?do=managethemes">Themes<?php if ($_smarty_tpl->tpl_vars['themes_have_update']->value){?> (<?php echo $_smarty_tpl->tpl_vars['themes_update_count']->value;?>
)<?php }?></a></li> 
					</ul> 
				</div>
				<?php }?>
				<?php if ($_GET['do']=='adminsettings'||$_GET['do']=='configsettings'||$_GET['do']=='language'||$_GET['do']=='update'||$_GET['do']=='repair'||$_GET['do']=='maintenance'||$_GET['do']=='maintenance2'||$_GET['do']=='step1'||$_GET['do']=='step2'||$_GET['do']=='step3'||$_GET['do']=='step5'){?>
				<div class="admin_title_bg"> 
					<ul id ="menu-system"> 
						<li class="navHead">System</li>
						<li <?php if ($_GET['do']=='adminsettings'){?>class="active_nav"<?php }?>><a href="system.php?do=adminsettings">Admin Settings</a></li> 
						<li <?php if ($_GET['do']=='configsettings'){?>class="active_nav"<?php }?>><a href="system.php?do=configsettings">Configuration</a></li> 
						<li <?php if ($_GET['do']=='language'){?>class="active_nav"<?php }?>><a href="system.php?do=language">Languages</a></li> 
						<li <?php if ($_GET['do']=='maintenance'||$_GET['do']=='maintenance2'){?>class="active_nav"<?php }?>><a href="system.php?do=maintenance">Maintenance</a></li> 
						<li <?php if ($_GET['do']=='repair'){?>class="active_nav"<?php }?>><a href="system.php?do=repair">Repair ArrowChat</a></li> 
					</ul> 
				</div>
				<?php }?>
		</div>
		<div id="rightcontent"><?php }} ?>