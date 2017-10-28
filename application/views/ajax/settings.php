<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

	<!-- col -->
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><?php echo $module;?> <small><?php //echo $this->lang->line('module_settings_desc');?></small></h1>
	</div>
	<!-- end col -->

</div>
<!-- end row -->

<!--
The ID "widget-grid" will start to initialize all widgets below
You do not need to use widgets if you dont want to. Simply remove
the <section></section> and you can use wells or panels instead
-->

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->

	<div class="row">
		<div class="col-sm-12 col-lg-12">

			<div class="jarviswidget well" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false" role="widget">
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

				-->
				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-comments"></i> </span>
					
				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

				<!-- widget div-->
				<div role="content">

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">

						<p>
							<?php echo $this->lang->line('config_customize_your_settings');?>
						</p>
						<hr class="simple">			



						<ul id="myTab1" class="nav nav-tabs bordered">
							<li <?php if($filter_option == 'general') echo 'class="active"';?>>
								<a href="<?php echo site_url('settings/general');?>" class="ajaxSoft"><i class="fa fa-fw fa-lg fa-gear"></i> <?php echo $this->lang->line('config_general');?></a>
							</li>
							<li <?php if($filter_option == 'email') echo 'class="active"';?>>
								<a href="<?php echo site_url('settings/email');?>" class="ajaxSoft"><i class="fa fa-fw fa-lg fa-envelope"></i> <?php echo $this->lang->line('config_email');?></a>
							</li>
							<li <?php if($filter_option == 'profile-visibility') echo 'class="active"';?>>
								<a href="<?php echo site_url('settings/profile-visibility');?>" class="ajaxSoft"><i class="fa fa-fw fa-lg fa-eye"></i> <?php echo $this->lang->line('config_profile_visibility');?></a>
							</li>
							<li <?php if($filter_option == 'templates') echo 'class="active"';?>>
								<a href="<?php echo site_url('settings/templates');?>" class="ajaxSoft"><i class="fa fa-fw fa-lg fa-list"></i> <?php echo $this->lang->line('config_templates');?></a>
							</li>
							<li <?php if($filter_option == 'delete-account') echo 'class="active"';?>>
								<a href="<?php echo site_url('settings/delete-account');?>" class="ajaxSoft"><i class="fa fa-fw fa-lg fa-trash-o"></i> <?php echo $this->lang->line('config_delete_account');?></a>
							</li>
							<li class="pull-right">
								<a href="javascript:void(0);">
								<div class="sparkline txt-color-pinkDark text-align-right" data-sparkline-height="18px" data-sparkline-width="90px" data-sparkline-barwidth="7"><canvas width="52" height="18" style="display: inline-block; width: 52px; height: 18px; vertical-align: top;"></canvas></div> </a>
							</li>
						</ul>

						<div id="myTabContent1" class="tab-content padding-10">
							<div class="tab-pane fade <?php if($filter_option == 'general') echo 'in active';?>" id="s1">
								<?php echo form_open('auth/general_update/',array('id'=>'general_udate','class'=>'smart-form','enctype'=>'multipart/form-data', 'role'=>'form'));?>
								
								<legend><?php echo $this->lang->line("config_general_configuration"); ?></legend>
								<fieldset>	
									<?php if($this->config->item('company_logo')) { 
									echo '<img src="'. base_url().'/uploads/'.$this->license_id.'/logo/'.$this->config->item('company_logo').'" />';
									} ?>
									<section>
										<label class="label"><?php echo $this->lang->line('config_business_logo');?></label>
										<div class="input input-file">
											<span class="button"><input type="file" id="logo" name="logo" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text" readonly="">
										</div>
									</section>

									<section>
										<label class="label"><?php echo $this->lang->line('config_business_name'); ?></label>
										<label class="input">
											<input type="text" name="business_name" id="business_name" value="<?php echo $this->config->item('business_name');?>" class=""/>
										</label>
									</section>
									
									<section>
										<label class="label"><?php echo $this->lang->line('config_business_owner'); ?></label>
										<label class="input">
											<input type="text" name="business_owner" id="business_owner" value="<?php echo $this->config->item('business_owner');?>" class="form-control"/>
										</label>
									</section>
									
									<section>
										<label class="label"><?php echo $this->lang->line('config_business_address'); ?></label>
										<label class="textarea textarea-resizable">
											<textarea class="form-control" name="business_address" id="business_address" rows="3"><?php echo $this->config->item('business_address');?></textarea>
										</label>
									</section>
									
									<div class="row">
										<section class="col col-4">
											<label class="label"><?php echo $this->lang->line('config_business_phone'); ?></label>
											<label class="input">
												<input type="text" name="business_phone" id="business_phone" value="<?php echo $this->config->item('business_phone');?>" class="form-control"/>
											</label>
										</section>
										
										<section class="col col-4">
											<label class="label"><?php echo $this->lang->line('config_business_email'); ?></label>
											<label class="input">
												<input type="text" name="business_email" id="business_email" value="<?php echo $this->config->item('business_email');?>" class="form-control"/>
											</label>
										</section>
										
										<section class="col col-4">
											<label class="label"><?php echo $this->lang->line('config_business_fax'); ?></label>
											<label class="input">
												<input type="text" name="business_fax" id="business_fax" value="<?php echo $this->config->item('business_fax');?>" class="form-control"/>
											</label>
										</section>
									</div>
									
									<div class="row">
										<section class="col col-4">
											<label class="label"><?php echo $this->lang->line('config_prc'); ?></label>
											<label class="input">
												<input type="text" name="prc" id="prc" value="<?php echo $this->config->item('prc');?>" class="form-control"/>
											</label>
										</section>
										
										<section class="col col-4">
											<label class="label"><?php echo $this->lang->line('config_ptr'); ?></label>
											<label class="input">
												<input type="text" name="ptr" id="ptr" value="<?php echo $this->config->item('ptr');?>" class="form-control"/>
											</label>
										</section>
										
										<section class="col col-4">
											<label class="label"><?php echo $this->lang->line('config_s2'); ?></label>
											<label class="input">
												<input type="text" name="s2" id="s2" value="<?php echo $this->config->item('s2');?>" class="form-control"/>
											</label>
										</section>
									</div>
									
									<section class="hidden">
										<label class="label"><?php echo $this->lang->line('config_lines_per_page'); ?></label>
										<label class="input">
											<input type="text" name="lines_per_page" id="lines_per_page" value="<?php echo $this->config->item('lines_per_page');?>" class="form-control"/>
										</label>
									</section>
									
									<div class="row">
										<section class="col col-6">
											<label class="label"><?php echo $this->lang->line('config_week_day_morning_open'); ?></label>
											<label class="input"> 
												<input type="text" name="morning_open_time" id="morning_open_time" value="<?php echo $this->config->item('morning_open_time');?>" class="form-control timepicker timepicker-no-seconds">
											</label>
										</section>
										<section class="col col-6">
											<label class="label"><?php echo $this->lang->line('config_week_day_morning_close'); ?></label>
											<label class="input"> 
												<input type="text" name="morning_close_time" id="morning_close_time" value="<?php echo $this->config->item('morning_close_time');?>" class="form-control timepicker timepicker-no-seconds">
											</label>
										</section>
									</div>
									
									<div class="row">
										<section class="col col-6">
											<label class="label"><?php echo $this->lang->line('config_week_day_afternoon_open'); ?></label>
											<label class="input"> 
												<input type="text" name="afternoon_open_time" id="afternoon_open_time" value="<?php echo $this->config->item('afternoon_open_time');?>" class="form-control timepicker timepicker-no-seconds">
											</label>
										</section>
										<section class="col col-6">
											<label class="label"><?php echo $this->lang->line('config_week_day_afternoon_close'); ?></label>
											<label class="input"> 
												<input type="text" name="afternoon_close_time" id="afternoon_close_time" value="<?php echo $this->config->item('afternoon_close_time');?>" class="form-control timepicker timepicker-no-seconds">
											</label>
										</section>
									</div>
									
									<div class="row">
										<section class="col col-6">
											<label class="label"><?php echo $this->lang->line('config_week_end_open'); ?></label>
											<label class="input"> 
												<input type="text" name="week_end_open_time" id="week_end_open_time" value="<?php echo $this->config->item('week_end_open_time');?>" class="form-control timepicker timepicker-no-seconds">
											</label>
										</section>
										<section class="col col-6">
											<label class="label"><?php echo $this->lang->line('config_week_end_close'); ?></label>
											<label class="input"> 
												<input type="text" name="week_end_close_time" id="week_end_close_time" value="<?php echo $this->config->item('week_end_close_time');?>" class="form-control timepicker timepicker-no-seconds">
											</label>
										</section>
									</div>

								</fieldset>
								<legend><?php echo $this->lang->line('config_locale_configuration'); ?></legend>
								<fieldset>
									<div class="row">
										<section class="col col-6">
											<label class="label"><?php echo $this->lang->line('config_language'); ?></label>
											<label class="select">
												<?php echo form_dropdown('language', array(
												'english' => $this->lang->line('common_english')
												),
												$this->config->item('language'),'class="form-control" id="language"');
												?><i></i>
											</label>
										</section>
										
										<section class="col col-6">
											<label class="label"><?php echo $this->lang->line('config_timezone'); ?></label>
											<label class="select">
												<?php echo form_dropdown('timezone', 
											 array(
												'Pacific/Midway'=>'(GMT-11:00) Midway Island, Samoa',
												'America/Adak'=>'(GMT-10:00) Hawaii-Aleutian',
												'Etc/GMT+10'=>'(GMT-10:00) Hawaii',
												'Pacific/Marquesas'=>'(GMT-09:30) Marquesas Islands',
												'Pacific/Gambier'=>'(GMT-09:00) Gambier Islands',
												'America/Anchorage'=>'(GMT-09:00) Alaska',
												'America/Ensenada'=>'(GMT-08:00) Tijuana, Baja California',
												'Etc/GMT+8'=>'(GMT-08:00) Pitcairn Islands',
												'America/Los_Angeles'=>'(GMT-08:00) Pacific Time (US & Canada)',
												'America/Denver'=>'(GMT-07:00) Mountain Time (US & Canada)',
												'America/Chihuahua'=>'(GMT-07:00) Chihuahua, La Paz, Mazatlan',
												'America/Dawson_Creek'=>'(GMT-07:00) Arizona',
												'America/Belize'=>'(GMT-06:00) Saskatchewan, Central America',
												'America/Cancun'=>'(GMT-06:00) Guadalajara, Mexico City, Monterrey',
												'Chile/EasterIsland'=>'(GMT-06:00) Easter Island',
												'America/Chicago'=>'(GMT-06:00) Central Time (US & Canada)',
												'America/New_York'=>'(GMT-05:00) Eastern Time (US & Canada)',
												'America/Havana'=>'(GMT-05:00) Cuba',
												'America/Bogota'=>'(GMT-05:00) Bogota, Lima, Quito, Rio Branco',
												'America/Caracas'=>'(GMT-04:30) Caracas',
												'America/Santiago'=>'(GMT-04:00) Santiago',
												'America/La_Paz'=>'(GMT-04:00) La Paz',
												'Atlantic/Stanley'=>'(GMT-04:00) Faukland Islands',
												'America/Campo_Grande'=>'(GMT-04:00) Brazil',
												'America/Goose_Bay'=>'(GMT-04:00) Atlantic Time (Goose Bay)',
												'America/Glace_Bay'=>'(GMT-04:00) Atlantic Time (Canada)',
												'America/St_Johns'=>'(GMT-03:30) Newfoundland',
												'America/Araguaina'=>'(GMT-03:00) UTC-3',
												'America/Montevideo'=>'(GMT-03:00) Montevideo',
												'America/Miquelon'=>'(GMT-03:00) Miquelon, St. Pierre',
												'America/Godthab'=>'(GMT-03:00) Greenland',
												'America/Argentina/Buenos_Aires'=>'(GMT-03:00) Buenos Aires',
												'America/Sao_Paulo'=>'(GMT-03:00) Brasilia',
												'America/Noronha'=>'(GMT-02:00) Mid-Atlantic',
												'Atlantic/Cape_Verde'=>'(GMT-01:00) Cape Verde Is.',
												'Atlantic/Azores'=>'(GMT-01:00) Azores',
												'Europe/Belfast'=>'(GMT) Greenwich Mean Time : Belfast',
												'Europe/Dublin'=>'(GMT) Greenwich Mean Time : Dublin',
												'Europe/Lisbon'=>'(GMT) Greenwich Mean Time : Lisbon',
												'Europe/London'=>'(GMT) Greenwich Mean Time : London',
												'Africa/Abidjan'=>'(GMT) Monrovia, Reykjavik',
												'Europe/Amsterdam'=>'(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna',
												'Europe/Belgrade'=>'(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague',
												'Europe/Brussels'=>'(GMT+01:00) Brussels, Copenhagen, Madrid, Paris',
												'Africa/Algiers'=>'(GMT+01:00) West Central Africa',
												'Africa/Windhoek'=>'(GMT+01:00) Windhoek',
												'Asia/Beirut'=>'(GMT+02:00) Beirut',
												'Africa/Cairo'=>'(GMT+02:00) Cairo',
												'Asia/Gaza'=>'(GMT+02:00) Gaza',
												'Africa/Blantyre'=>'(GMT+02:00) Harare, Pretoria',
												'Asia/Jerusalem'=>'(GMT+02:00) Jerusalem',
												'Europe/Minsk'=>'(GMT+02:00) Minsk',
												'Asia/Damascus'=>'(GMT+02:00) Syria',
												'Europe/Moscow'=>'(GMT+03:00) Moscow, St. Petersburg, Volgograd',
												'Africa/Addis_Ababa'=>'(GMT+03:00) Nairobi',
												'Asia/Tehran'=>'(GMT+03:30) Tehran',
												'Asia/Dubai'=>'(GMT+04:00) Abu Dhabi, Muscat',
												'Asia/Yerevan'=>'(GMT+04:00) Yerevan',
												'Asia/Kabul'=>'(GMT+04:30) Kabul',
												'Asia/Baku'=>'(GMT+05:00) Baku',
												'Asia/Yekaterinburg'=>'(GMT+05:00) Ekaterinburg',
												'Asia/Tashkent'=>'(GMT+05:00) Tashkent',
												'Asia/Kolkata'=>'(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi',
												'Asia/Katmandu'=>'(GMT+05:45) Kathmandu',
												'Asia/Dhaka'=>'(GMT+06:00) Astana, Dhaka',
												'Asia/Novosibirsk'=>'(GMT+06:00) Novosibirsk',
												'Asia/Rangoon'=>'(GMT+06:30) Yangon (Rangoon)',
												'Asia/Bangkok'=>'(GMT+07:00) Bangkok, Hanoi, Jakarta',
												'Asia/Krasnoyarsk'=>'(GMT+07:00) Krasnoyarsk',
												'Asia/Hong_Kong'=>'(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi',
												'Asia/Irkutsk'=>'(GMT+08:00) Irkutsk, Ulaan Bataar',
												'Australia/Perth'=>'(GMT+08:00) Perth',
												'Australia/Eucla'=>'(GMT+08:45) Eucla',
												'Asia/Tokyo'=>'(GMT+09:00) Osaka, Sapporo, Tokyo',
												'Asia/Seoul'=>'(GMT+09:00) Seoul',
												'Asia/Yakutsk'=>'(GMT+09:00) Yakutsk',
												'Australia/Adelaide'=>'(GMT+09:30) Adelaide',
												'Australia/Darwin'=>'(GMT+09:30) Darwin',
												'Australia/Brisbane'=>'(GMT+10:00) Brisbane',
												'Australia/Hobart'=>'(GMT+10:00) Hobart',
												'Asia/Vladivostok'=>'(GMT+10:00) Vladivostok',
												'Australia/Lord_Howe'=>'(GMT+10:30) Lord Howe Island',
												'Etc/GMT-11'=>'(GMT+11:00) Solomon Is., New Caledonia',
												'Asia/Magadan'=>'(GMT+11:00) Magadan',
												'Pacific/Norfolk'=>'(GMT+11:30) Norfolk Island',
												'Asia/Anadyr'=>'(GMT+12:00) Anadyr, Kamchatka',
												'Pacific/Auckland'=>'(GMT+12:00) Auckland, Wellington',
												'Etc/GMT-12'=>'(GMT+12:00) Fiji, Kamchatka, Marshall Is.',
												'Pacific/Chatham'=>'(GMT+12:45) Chatham Islands',
												'Pacific/Tongatapu'=>'(GMT+13:00) Nuku\'alofa',
												'Pacific/Kiritimati'=>'(GMT+14:00) Kiritimati'
												), $this->config->item('timezone') ? $this->config->item('timezone') : date_default_timezone_get(), 'class="form-control" id="timezone" disabled');
												?><i></i>
											</label>
										</section>
									</div>
								
									<footer>
										
										<button type="submit" id="general-submit" class="btn btn-primary btn-sm"><?php echo $this->lang->line('common_update');?></button>
										
									</footer>
									
								
							</form>
							<!-- END FORM-->
							</div>
							<div class="tab-pane fade <?php if($filter_option == 'email') echo 'in active';?>" id="s2">
								<p><?php echo $this->lang->line('config_send_email_to');?> : <code><?php echo $user_info->email;?></code></p>

								<?php echo form_open('auth/notification_update','class="smart-form" id="notification_udate"');?>
									
										<legend>
											<?php echo $this->lang->line('config_updates');?>
										</legend>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="updates" <?php if($this->Common->has_permission('updates', $this->user_id)) echo 'checked';?>>
											<i></i><?php echo $this->lang->line('config_new_updates');?>
										</label>
									
										<!--<legend>
											<?php echo $this->lang->line('config_message');?>
										</legend>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="new_message" <?php if($this->Common->has_permission('new_message', $this->user_id)) echo 'checked';?>>
											<i></i><?php echo $this->lang->line('config_new_message');?>
										</label>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="private_message" <?php if($this->Common->has_permission('private_message', $this->user_id)) echo 'checked';?>>
											<i></i>Private Messages
										</label>
									
										<legend>
											<?php echo $this->lang->line('config_friends');?>
										</legend>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="friends_sends" <?php if($this->Common->has_permission('friends_sends', $this->user_id)) echo 'checked';?>>
											<i></i><?php echo $this->lang->line('config_sends_friend_request');?>
										</label>-->

									
										<legend>
											<?php echo $this->lang->line('config_appointments');?>
										</legend>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="new_appointments" <?php if($this->Common->has_permission('new_appointments', $this->user_id)) echo 'checked';?>>
											<i></i><?php echo $this->lang->line('config_new_appointments');?>
										</label>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="cancel_appointments" <?php if($this->Common->has_permission('cancel_appointments', $this->user_id)) echo 'checked';?>>
											<i></i><?php echo $this->lang->line('config_cancel_appointments');?>
										</label>
									
										<!--<legend>
											<?php echo $this->lang->line('config_group');?>
										</legend>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="groups_invite" <?php if($this->Common->has_permission('groups_invite', $this->user_id)) echo 'checked';?>>
											<i></i>Group Invite
										</label>
									
										<legend>
											<?php echo $this->lang->line('config_others');?>
										</legend>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="wall_post" <?php if($this->Common->has_permission('wall_post', $this->user_id)) echo 'checked';?>>
											<i></i>Wall Post
										</label>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="event_invite" <?php if($this->Common->has_permission('event_invite', $this->user_id)) echo 'checked';?>>
											<i></i>Event Invite
										</label>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="birthday" <?php if($this->Common->has_permission('birthday', $this->user_id)) echo 'checked';?>>
											<i></i>Birthday
										</label>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="reply" <?php if($this->Common->has_permission('reply', $this->user_id)) echo 'checked';?>>
											<i></i>Reply
										</label>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="like_post" <?php if($this->Common->has_permission('like_post', $this->user_id)) echo 'checked';?>>
											<i></i>Like Post
										</label>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="like_comment" <?php if($this->Common->has_permission('like_comment', $this->user_id)) echo 'checked';?>>
											<i></i>Like Comment
										</label>
										<label class="checkbox">
											<input type="checkbox" name="notifications[]" value="like_photo" <?php if($this->Common->has_permission('like_photo', $this->user_id)) echo 'checked';?>>
											<i></i>Like Photo
										</label>-->
									

										<button type="submit" id="notif-submit" class="btn btn-primary btn-sm"><?php echo $this->lang->line('common_update');?></button>
									
								</form>

							</div>
							<div class="tab-pane fade <?php if($filter_option == 'profile-visibility') echo 'in active';?>" id="s3">
								<p>
									<?php echo $this->lang->line('config_your_account_is_currently');?> : <code><?php echo ($user_info->type == 0) ? $this->lang->line('config_public') : $this->lang->line('config_private');?></code>
								</p>

								<?php echo form_open('auth/update_type','class="smart-form" id="profile_update"');?>
									
										<legend>
											<?php echo $this->lang->line('config_profile_visibility');?>
										</legend>
										<label class="checkbox">
											<input type="checkbox" name="profile_visibility" value="1" <?php if($user_info->type == 1) echo 'checked';?>>
											<i></i><?php echo $this->lang->line('config_make_my_profile_private');?>
										</label>
										<button type="submit" id="profile-submit" class="btn btn-primary btn-sm"><?php echo $this->lang->line('common_update');?></button>
									
								</form>
							</div>
							
							<div class="tab-pane fade <?php if($filter_option == 'templates') echo 'in active';?>" id="s3">
								<p>
									Templates <?php //echo $this->lang->line('config_your_account_is_currently');?> : <code>All templates can be customize. Just clone the template and create new with your design.</code>
								</p>

								<?php echo form_open('auth/update_templates','class="form-horizontal" id="template_update"');?>
									
										<legend>
											Setup Default Templates <?php //echo $this->lang->line('config_profile_visibility');?>
										</legend>
										<div class="form-group">
											<label class="control-label col-md-3">RX Pad <?php //echo $this->lang->line('config_language'); ?>
											</label>
											<div class="col-md-4">
												<?php echo form_dropdown('rx_template', $templates, $this->config->item('rx_template'),'class="form-control" id="rx_template"');?>
											</div>
										</div>
										<button type="submit" id="template-submit" class="btn btn-primary btn-sm"><?php echo $this->lang->line('common_update');?></button>
									
								</form>
							</div>
							
							<div class="tab-pane fade <?php if($filter_option == 'delete-account') echo 'in active';?>" id="s4">
								<p>
									<?php echo $this->lang->line('config_confirmation');?> <code><?php echo $this->lang->line('config_note');?></code>
								</p>
								<a href="<?php echo site_url('auth/delete');?>" id="delete-account" class="btn btn-danger btn-lg"><?php echo $this->lang->line('common_delete_my_account');?></a>
							</div>
						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
		</div>
		
	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">
	var BASE_URL = '<?php echo base_url();?>';
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	pageSetUp();
	/*var currenturl = '<?php echo $this->uri->segment(2);?>';
	function get_tab(){
		$.ajax({
			url: $(this).attr('href'),
			type: 'post',
			success: function (response) {
				  							
			}
		});
	}
	$(".submithash").click(function (e) {
		e.preventDefault();
		get_tab();
	});	*/
	$(".new").click(function (e) {
		var title = $(this).attr('data-original-title');
		var link = $(this).attr('href');
		e.preventDefault();
			$.ajax({
				url: link,
				onError: function () {
					bootbox.alert('<?php echo $this->lang->line('__bootbox_error');?>');
				},
				success: function (response)
				{
					var dialog = bootbox.dialog({
						title: title,
						message: '<p class="text-center"><img src="'+BASE_URL+'img/ajax-loader.gif"/></p>'
					});
					dialog.init(function(){
						setTimeout(function(){
							dialog.find('.bootbox-body').html(response);
						}, 3000);
					});
				}
			});
		return false;
	});
	
	loadScript(BASE_URL+"js/bootbox.min.js");
	
	$("#delete-account").click(function (e) {
	   e.preventDefault();

	   if(confirm("Are you sure?")){           
		   	var _password = prompt("<?php echo $this->lang->line('__common_please_enter_password');?>", "");
		   	
		   	if (_password != null) {
			    
			   	$.ajax({
					url: $(this).attr('href'),
					type: 'post', 
					data: {
						confirm_pass: _password,
						recent_pass : '<?php echo $user_info->password;?>'
					},               
					dataType: 'json',
					success: function (response) {
						if(response.success)
						{
							$.smallBox({
								title : "Success",
								content : response.message,
								color : "#739E73",
								iconSmall : "fa fa-check",
								timeout : 3000
							});
							setTimeout(function () {
	                            window.location.href = BASE_URL+'auth/logout/';
	                        }, 2000);
						}
						else
						{
							$.smallBox({
								title : "Error",
								content : response.message,
								color : "#C46A69",
								iconSmall : "fa fa-warning shake animated",
								timeout : 3000
							});
							//alert(response.message);
						}  							
					}
				});
		   }else{
		   		return false;
		   }
		}
		return false;
	});
	/*
	* ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	* eg alert("my home function");
	*
	* var pagefunction = function() {
	*   ...
	* }
	* loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	*
	* TO LOAD A SCRIPT:
	* var pagefunction = function (){
	*  loadScript(".../plugin.js", run_after_loaded);
	* }
	*
	* OR you can load chain scripts by doing
	*
	* loadScript(".../plugin.js", function(){
	* 	 loadScript("../plugin.js", function(){
	* 	   ...
	*   })
	* });
	*/

	// pagefunction

	var pagefunction = function() {
		// clears the variable if left blank
	};

	// end pagefunction

	// destroy generated instances
	// pagedestroy is called automatically before loading a new page
	// only usable in AJAX version!

	var pagedestroy = function() {

		/*
		 Example below:

		 $("#calednar").fullCalendar( 'destroy' );
		 if (debugState){
		 root.console.log("✔ Calendar destroyed");
		 }

		 For common instances, such as Jarviswidgets, Google maps, and Datatables, are automatically destroyed through the app.js loadURL mechanic

		 */
	}
	// end destroy

	// run pagefunction
	pagefunction();
	
	loadScript(BASE_URL+"js/plugin/clockpicker/clockpicker.min.js", runClockPicker);
	
	function runClockPicker(){
		$('#clockpicker').clockpicker({
			placement: 'top',
			donetext: 'Done'
		});
	}
	
	loadScript(BASE_URL+"js/plugin/bootstrap-timepicker/bootstrap-timepicker.min.js", runTimePicker);
	
	function runTimePicker() {
		$('.timepicker').timepicker();
	}
	
	var validatefunction = function() {
		$("#profile_update").validate({
		
			// Ajax form submition
			submitHandler : function(form) {
				
				$(form).ajaxSubmit({
					beforeSend: function () {
						$('#profile-submit').html('<?php echo $this->lang->line('__common_please_wait');?>');
						$('#profile-submit').attr("disabled", "disabled");
					},
					success:function(response)
					{
						
						$.smallBox({
							title : "Success",
							content : response.message,
							color : "#739E73",
							iconSmall : "fa fa-check",
							timeout : 3000
						});
							
						            
						$('#profile-submit').text('<?php echo $this->lang->line('__common_update');?>');
						$('#profile-submit').removeAttr("disabled");
					},
					dataType:'json'
				});
			}
		});

		$("#notification_udate").validate({
		
			// Ajax form submition
			submitHandler : function(form) {
				
				$(form).ajaxSubmit({
					beforeSend: function () {
						$('#notif-submit').html('<?php echo $this->lang->line('__common_please_wait');?>');
						$('#notif-submit').attr("disabled", "disabled");
					},
					success:function(response)
					{
						if(response.success)
						{
							$.smallBox({
								title : "Success",
								content : response.message,
								color : "#739E73",
								iconSmall : "fa fa-check",
								timeout : 3000
							});
							
						}
						else
						{
							$.smallBox({
								title : "Error",
								content : response.message,
								color : "#C46A69",
								iconSmall : "fa fa-warning shake animated",
								timeout : 3000
							});
							
						}                   
						$('#notif-submit').text('<?php echo $this->lang->line('__common_update');?>');
						$('#notif-submit').removeAttr("disabled");
					},
					dataType:'json'
				});
			}
		});
		
		$("#general_udate").validate({
			rules : {
                business_name : {
                    required : true,
                    maxlength: 300
                },
                business_owner : {
                    required : true,
                    maxlength: 300
                },
				business_address : {
                    required : true,
                    maxlength: 1000
                },
				business_phone : {
                    required : true,
                    maxlength: 12
                },
				business_email : {
                    required : true,
                    maxlength: 300
                },
				business_fax : {
                    required : true,
                    maxlength: 12
                },
				prc : {
                    maxlength: 15
                },
				ptr : {
                    maxlength: 15
                },
				s2 : {
                    maxlength: 15
                },
				/* lines_per_page : {
                    required : true,
					maxlength: 2
                }, */
				morning_open_time : {
                    required : true
                },
				morning_close_time : {
                    required : true
                },
				afternoon_open_time : {
                    required : true
                },
				afternoon_close_time : {
                    required : true
                },
				week_end_open_time : {
                    required : true
                },
				week_end_close_time : {
                    required : true
                },
				default_country : {
                    required : true
                },
            },
            // Messages for form validation
            messages : {
                business_name : {
                    required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'business name');?>',
                    maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 50);?></span>'
                },
                business_owner : {
                    required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'owner name');?>',
                    maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 50);?></span>'
                },
				business_address : {
                    required : '<i class="fa fa-exclamation-circle"></i><?php echo sprintf($this->lang->line('__validate_required'), 'address');?>',
                    maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 150);?>'
                },
				business_phone : {
                    required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'phone');?>',
                    maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 12);?>'
                },
                business_email : {
                    required : '<i class="fa fa-exclamation-circle"></i> Please add business email</span>',
                    maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 50);?>'
                },
				business_fax : {
                    required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'fax');?>',
                    maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 12);?>'
                },
				prc : {
                    maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 15);?>'
                },
                ptr : {
                    maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 15);?>'
                },
				s2 : {
                    maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 15);?>'
                },
                morning_open_time : {
                    required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'morning open time');?>'
                },
				morning_close_time : {
                    required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'morning close time');?>'
                },
				afternoon_open_time : {
                    required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'afternoon open time');?>'
                },
                afternoon_close_time : {
                    required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'afternoon close time');?>'
                },
				week_end_open_time : {
                    required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'week end open time');?>'
                },
				week_end_close_time : {
                    required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'week end close time');?>'
                },
                default_country : {
                    required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'country');?>'
                }
            },
            highlight: function(element) {
                $(element).closest('section').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('section').removeClass('has-error');
            },
            errorElement: 'div',
            errorClass: 'note',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                }else{
                    error.insertAfter(element);
                }
            },
			// Ajax form submition
			submitHandler : function(form) {
				
				$(form).ajaxSubmit({
					beforeSend: function () {
						$('#general-submit').html('<?php echo $this->lang->line('__common_please_wait');?>');
						$('#general-submit').attr("disabled", "disabled");
					},
					success:function(response)
					{
						if(response.success)
						{
							$.smallBox({
								title : "Success",
								content : response.message,
								color : "#739E73",
								iconSmall : "fa fa-check",
								timeout : 3000
							});
							
						}
						else
						{
							$.smallBox({
								title : "Error",
								content : response.message,
								color : "#C46A69",
								iconSmall : "fa fa-warning shake animated",
								timeout : 3000
							});
							
						}                   
						$('#general-submit').text('<?php echo $this->lang->line('__common_update');?>');
						$('#general-submit').removeAttr("disabled");
					},
					dataType:'json'
				});
			}
		});
		
		$("#template_update").validate({
		
			// Ajax form submition
			submitHandler : function(form) {
				
				$(form).ajaxSubmit({
					beforeSend: function () {
						$('#template-submit').html('<?php echo $this->lang->line('__common_please_wait');?>');
						$('#template-submit').attr("disabled", "disabled");
					},
					success:function(response)
					{
						if(response.success)
						{
							$.smallBox({
								title : "Success",
								content : response.message,
								color : "#739E73",
								iconSmall : "fa fa-check",
								timeout : 3000
							});
							
						}
						else
						{
							$.smallBox({
								title : "Error",
								content : response.message,
								color : "#C46A69",
								iconSmall : "fa fa-warning shake animated",
								timeout : 3000
							});
							
						}                   
						$('#template-submit').text('<?php echo $this->lang->line('__common_update');?>');
						$('#template-submit').removeAttr("disabled");
					},
					dataType:'json'
				});
			}
		});

	}
	loadScript(BASE_URL+"js/plugin/jquery-validate/jquery.validate.min.js", function(){
		loadScript(BASE_URL+"js/plugin/jquery-form/jquery-form.min.js", validatefunction);
	});
</script>
