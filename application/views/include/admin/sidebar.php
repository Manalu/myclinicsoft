<!-- Note: This width of the aside area can be adjusted through LESS/SASS variables -->
<aside id="left-panel">

	<!-- User info -->
	<div class="login-info">
		<span> <!-- User image size is adjusted inside CSS, it should stay as is --> 
			
			<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
				<img src="<?php echo base_url(); ?>img/avatars/sunny.png" alt="me" <?php if($user_info->isonline == 1) echo 'class="online"';?> /> 
				<span>
					<?php echo $user_info->username;?>
				</span>
				<i class="fa fa-angle-down"></i>
			</a> 
			
		</span>
	</div>
	<!-- end user info -->

	<!-- NAVIGATION : This navigation is also responsive

	To make this navigation dynamic please make sure to link the node
	(the reference to the nav > ul) after page load. Or the navigation
	will not initialize.
	-->
		<nav>
			<!-- 
			NOTE: Notice the gaps after each icon usage <i></i>..
			Please note that these links work a bit different than
			traditional href="" links. See documentation for details.
			-->

			<ul>
				<li>
					<a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
				</li>
				<li>
					<a href="<?php echo site_url('admin/courses'); ?>"><i class="fa fa-lg fa-fw fa-list"></i> <span class="menu-item-parent">Courses</span></a>
				</li>
				<li>
					<a href="<?php echo site_url('admin/groups'); ?>"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">Groups</span></a>
				</li>
				<li>
					<a href="<?php echo site_url('admin/members'); ?>"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Members</span></a>
				</li>
				<li>
					<a href="<?php echo site_url('admin/settings'); ?>"><i class="fa fa-lg fa-fw fa-cogs"></i> <span class="menu-item-parent">Settings</span></a>
				</li>
			</ul>
		</nav>
		
	<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>