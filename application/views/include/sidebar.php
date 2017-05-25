<!-- Note: This width of the aside area can be adjusted through LESS/SASS variables -->
<aside id="left-panel">

	<!-- User info -->
	<div class="login-info">
		<span> <!-- User image size is adjusted inside CSS, it should stay as is --> 
			
			<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
				<?php 
				if($user_info->avatar){
					echo '<img src="'.base_url().'uploads/'.$this->license_id.'/profile-picture/'.$user_info->avatar.'" alt="me" class="online" />';
				}else{
					echo '<img src="' . $this->gravatar->get($user_info->email) . '" alt="me" class="online" />';
				}?>
				
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
				<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('dashboard', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<li>
					<a title="Dashboard" href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
				</li>
				<?php } ?>
				<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('patient', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<li>
					<a title="My Patients" href="<?php echo site_url('my-patients'); ?>"><i class="fa fa-lg fa-fw fa-users"></i> <span class="menu-item-parent">My Patients</span></a>
				</li>
				<?php } ?>
				<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('users', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<li>
					<a title="Users" href="<?php echo site_url('user'); ?>"><i class="fa fa-lg fa-fw fa-users"></i> <span class="menu-item-parent">Users</span></a>
				</li>
				<?php } ?>
				<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('role', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<li>
					<a title="Roles" href="<?php echo site_url('roles'); ?>"><i class="fa fa-lg fa-fw fa-key"></i> <span class="menu-item-parent">Roles</span></a>
				</li>
				<?php } ?>
				<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('templates', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<li>
					<a title="Templates" href="<?php echo site_url('templates'); ?>"><i class="fa fa-lg fa-fw fa-list"></i> <span class="menu-item-parent">Templates</span></a>
				</li>
				<?php } ?>
				<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('reports', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<!--<li>
					<a title="Reports" href="<?php echo site_url('reports'); ?>"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Reports</span></a>
				</li>-->
				<?php } ?>
				<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('appointments', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<li>
					<a title="Appointments" href="<?php echo site_url('appointments'); ?>"><i class="fa fa-lg fa-fw fa-calendar"></i> <span class="menu-item-parent">Appointments</span></a>
				</li>
				<?php } ?>
				<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('settings', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<li>
					<a title="Settings" href="<?php echo site_url('settings'); ?>"><i class="fa fa-lg fa-fw fa-cogs"></i> <span class="menu-item-parent">Settings</span></a>
				</li>
				<?php } ?>
			</ul>
		</nav>
		
	<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>