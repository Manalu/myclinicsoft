<header id="header">
	<div id="logo-group">

		<!-- PLACE YOUR LOGO HERE -->
		<span id="logo"> <?php echo $this->config->item('app_name');?> <span id="running-que-counts" class="hidden"></span></span>
		<!-- END LOGO PLACEHOLDER -->

		<!-- Note: The activity badge color changes when clicked and resets the number to 0
			 Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
		<span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 0 </b> </span>

		<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
		<div class="ajax-dropdown">

			<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
			<div class="btn-group btn-group-justified" data-toggle="buttons">
				<label class="btn btn-default">
					<input type="radio" name="activity" id="<?php echo site_url('messages/get');?>">
					Msgs (0) 
				</label>
				<label class="btn btn-default">
					<input type="radio" name="activity" id="<?php echo site_url('notifications/get');?>">
					notify (0)
				</label>
			</div>

			<!-- notification content -->
			<div class="ajax-notifications custom-scroll">

				<div class="alert alert-transparent">
					<h4>Click a button to show messages here</h4>
					This blank page message helps protect your privacy, or you can show the first message here automatically.
				</div>

				<i class="fa fa-lock fa-4x fa-border"></i>

			</div>
			<!-- end notification content -->

			<!-- footer: refresh area -->
			<span> Last updated on: 12/12/2013 9:43AM
				<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
					<i class="fa fa-refresh"></i>
				</button> </span>
			<!-- end footer -->

		</div>
		<!-- END AJAX-DROPDOWN -->
	</div>

	<!-- projects dropdown -->
	<div class="project-context hidden-xs">

		
		<span class="label" id="que-counts"></span>
		<span class="project-selector dropdown-toggle" data-toggle="dropdown">
			<?php echo $this->lang->line('__waiting_lists');?> <i class="fa fa-angle-down"></i>
		</span>

		<!--waiting list-->

	</div>
	<!-- end projects dropdown -->
	
	<!-- #TOGGLE LAYOUT BUTTONS -->
	<!-- pulled right: nav area -->
	<div class="pull-right">
		
		<!-- collapse menu button -->
		<div id="hide-menu" class="btn-header pull-right">
			<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
		</div>
		<!-- end collapse menu -->
		
		<!-- #MOBILE -->
		<!-- Top menu profile link : this shows only when top menu is active -->
		<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
			<li class="">
				<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
					<?php if(!empty($user_info->avatar))
					{
						$img = base_url().'/uploads/'.$this->license_id.'/profile-picture/'.$user_info->avatar;
					}
					else
					{ 
						$img = $this->gravatar->get($user_info->email);
					} ?>
					<img src="<?php echo $img;?>" alt="<?php echo $user_info->username;?>" class="online">
				</a>

			</li>
		</ul>

		<!-- logout button -->
		<div id="logout" class="btn-header transparent pull-right">
			<span> <a href="<?php echo site_url('auth/logout');?>" title="<?php echo $this->lang->line('__sign_out');?>" data-action="userLogout" data-logout-msg="<?php echo $this->lang->line('__logout_info');?>"><i class="fa fa-sign-out"></i></a> </span>
		</div>
		<!-- end logout button -->

		<!-- search mobile button (this is hidden till mobile view port) -->
		<div id="search-mobile" class="btn-header transparent pull-right">
			<span> <a href="javascript:void(0)" title="<?php echo $this->lang->line('__search');?>"><i class="fa fa-search"></i></a> </span>
		</div>
		<!-- end search mobile button -->

		<!-- fullscreen button -->
		<div id="fullscreen" class="btn-header transparent pull-right">
			<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="<?php echo $this->lang->line('__full_screen');?>"><i class="fa fa-arrows-alt"></i></a> </span>
		</div>
		<!-- end fullscreen button -->

		<!-- fullscreen button -->
		<div id="mini-cart" class="btn-header transparent pull-right">
			<span> <a href="<?php echo site_url('queing');?>" target="_blank"  title="<?php echo $this->lang->line('__view_queing');?>"><i class="fa fa-users"></i></a> </span>
		</div>
		<!-- end fullscreen button -->

		<!-- #Voice Command: Start Speech -->
		<!-- NOTE: Voice command button will only show in browsers that support it. Currently it is hidden under mobile browsers. 
				   You can take off the "hidden-sm" and "hidden-xs" class to display inside mobile browser-->
		<div id="speech-btn" class="hidden btn-header transparent pull-right hidden-sm hidden-xs">
			<div> 
				<a href="javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a> 
				<div class="popover bottom"><div class="arrow"></div>
					<div class="popover-content">
						<h4 class="vc-title">Voice command activated <br><small>Please speak clearly into the mic</small></h4>
						<h4 class="vc-title-error text-center">
							<i class="fa fa-microphone-slash"></i> Voice command failed
							<br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
							<br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
						</h4>
						<a href="javascript:void(0);" class="btn btn-success" onclick="commands.help()">See Commands</a> 
						<a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a> 
					</div>
				</div>
			</div>
		</div>
		<!-- end voice command -->

		<!-- multiple lang dropdown : find all flags in the flags page -->
		<ul class="hidden header-dropdown-list hidden-xs">
			<li>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo base_url(); ?>img/blank.gif" class="flag flag-us" alt="United States"> <span> US</span> <i class="fa fa-angle-down"></i> </a>
				<ul class="dropdown-menu pull-right">
					<li class="active">
						<a href="javascript:void(0);"><img src="<?php echo base_url(); ?>img/blank.gif" class="flag flag-us" alt="United States"> English (US)</a>
					</li>
										
					
				</ul>
			</li>
		</ul>
		<!-- end multiple lang -->

	</div>
	<!-- end pulled right: nav area -->

</header>