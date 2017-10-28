<style>
.content-error{
	color:red !important;
}
.chat-body ul li.message img {
    width: 50px;
    height: auto;
}
.editable.editable-click {
    color: #383838 !important;
    border-bottom: dashed 1px #383838;
}
.connections-list img, .followers-list img {
    width: 35px;
    height: auto;
}
</style>
<!-- row -->
<div class="row">

	<!-- col -->
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><?php echo $module;?> </h1>
	</div>
	<!-- end col -->

</div>
<!-- end row -->

<div class="row">

	<div class="col-sm-12">


			<div class="well well-sm">

				<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-6">
						<div class="well well-light well-sm no-margin no-padding">

							<div class="row">

								<div class="col-sm-12">
									<div id="myCarousel" class="carousel fade profile-carousel">
										<div class="air air-bottom-right padding-10">
											<a href="javascript:void(0);" class="follow btn txt-color-white bg-color-teal btn-sm" id="<?php echo $info->id;?>"><i class="fa fa-check"></i> <?php echo $this->lang->line('__common_follow');?></a>&nbsp; 
											<a href="javascript:void(0);" class="connect btn txt-color-white bg-color-pinkDark btn-sm" id="<?php echo $info->id;?>"><i class="fa fa-link"></i> <?php echo $this->lang->line('__common_connect');?></a>
										</div>
										<div class="air air-top-left padding-10">
											<h4 class="txt-color-white font-md"><?php echo date('l jS \of F Y', strtotime($info->created));?></h4>
										</div>
										<ol class="carousel-indicators">
											<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
											<li data-target="#myCarousel" data-slide-to="1" class=""></li>
											<li data-target="#myCarousel" data-slide-to="2" class=""></li>
										</ol>
										<div class="carousel-inner">
											<!-- Slide 1 -->
											<div class="item active">
												<img src="<?php echo base_url();?>img/demo/s1.jpg" alt="">
											</div>
											<!-- Slide 2 -->
											<div class="item">
												<img src="<?php echo base_url();?>img/demo/s2.jpg" alt="">
											</div>
											<!-- Slide 3 -->
											<div class="item">
												<img src="<?php echo base_url();?>img/demo/m3.jpg" alt="">
											</div>
										</div>
									</div>
								</div>

								<div class="col-sm-12">

									<div class="row">
										<div class="col-sm-3 profile-pic">
											<?php if(!empty($info->avatar) || $info->avatar != '')
											{
												$img = base_url().'/uploads/'.$info->license_key.'/profile-picture/'.$info->avatar;
											}
											else
											{ 
												$img = base_url().'img/avatars/blank.png';
											} ?>
											
					
											<img src="<?php echo $img;?>" alt="Profile Picture" style="width:100px; height:100px;">
											<a href="<?php echo site_url('auth/upload_picture/'.$info->id);?>" data-original-title="Upload" class="bootbox"><i class="fa fa-pencil"></i></a>
											
											<div class="padding-10">
												<h4 class="font-md"><strong id="count-followers-<?php echo $info->id;?>">0</strong>
												<br>
												<small>Followers</small></h4>
												<br>
												<h4 class="font-md"><strong id="count-connections-<?php echo $info->id;?>">0</strong>
												<br>
												<small>Connections</small></h4>
											</div>
										</div>
										
										<div class="col-sm-6">
											<h1>
											<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="firstname" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="Enter Firstname"><?php echo $info->firstname;?></a>
												<span class="semi-bold">
													<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="lastname" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="Enter Lastname"><?php echo $info->lastname;?></a>
												</span>
											<br>
											<small> 
											<a href="#" data-table="users" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="username" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="Enter Username"><?php echo $info->username;?></a>
											</small></h1>

											<ul class="list-unstyled">
												<li>
													<p class="text-muted">
														<i class="fa fa-mobile fa-fw"></i>&nbsp;&nbsp;<span class="txt-color-darken">
														<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="mobile" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="Enter Mobile"><?php echo $info->mobile;?></a>
														</span>
													</p>
												</li>
												<li>
													<p class="text-muted">
														<i class="fa fa-envelope fa-fw"></i>&nbsp;&nbsp;
														<a href="#" data-table="users" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="email" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="Enter Email"><?php echo $info->email;?></a>
													</p>
												</li>
												<li>
													<p class="text-muted">
														<span class="txt-color-darken">
														<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="address" class="editable xeditable_textarea" data-type="textarea" data-pk="<?php echo $info->id;?>" data-original-title="Enter Address"><?php echo $info->address;?></a>
														<br/>
														<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="country" class="editable xeditable_select" data-type="select" data-pk="<?php echo $info->id;?>" data-original-title="Enter Country"><?php echo $this->location_lib->info('countries', $info->country)->name;?></a>
														<br/>
														<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="state" class="editable xeditable_select" data-type="select" data-pk="<?php echo $info->id;?>" data-original-title="Enter state"><?php echo $this->location_lib->info('states', $info->state)->name;?></a>
														<br/>
														<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="city" class="editable xeditable_select" data-type="select" data-pk="<?php echo $info->id;?>" data-original-title="Enter City"><?php echo $this->location_lib->info('cities', $info->city)->name;?></a>
														<br/>
														<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="zip" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="Enter Zip"><?php echo $info->zip;?></a>
														</span>
													</p>
												</li>
												<li>
													<p class="text-muted">
														<i class="fa fa-crosshairs fa-fw"></i>&nbsp;&nbsp;<span class="txt-color-darken">
														<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="gender" class="editable xeditable_select" data-type="select" data-pk="<?php echo $info->id;?>" data-original-title="Enter Gender"><?php echo ($info->gender == 1) ? 'Male' : 'Female';?></a>
														</span>
													</p>
												</li>
												<li id="change_pass">
													<p class="text-muted">
														<i class="fa fa-key fa-fw"></i>&nbsp;&nbsp;<span class="txt-color-darken">
														<a href="<?php echo site_url('auth/change_password/');?>" class="bootbox" id="<?php echo $info->id;?>"><?php echo $this->lang->line('__change_password');?></a></span>
													</p>
												</li>
											</ul>
											<br>
											<!--<p class="font-md">
												<i>Bio</i>
											</p>
											<p>

												Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio
												cumque nihil impedit quo minus id quod maxime placeat facere

											</p>
											<br>-->
											<a href="javascript:void(0);" class="btn btn-default btn-xs"><i class="fa fa-envelope-o"></i> <?php echo $this->lang->line('__send_message');?></a>
											<br>
											<br>

										</div>
										<div class="col-sm-3">
											<h1><small>Followers</small></h1>
											<ul class="list-inline followers-list"></ul>

											<h1><small>Connections</small></h1>
											<ul class="list-inline connections-list"></ul>
										</div>

									</div>

								</div>

							</div>

							<div class="row" id="activity-log">

								<div class="col-sm-12">

									<hr>

									<div class="padding-10">

										<ul class="nav nav-tabs tabs-pull-right">
											<li class="hidden">
												<a href="#a1" data-toggle="tab"><?php echo $this->lang->line('__recent_articles');?></a>
											</li>
											<li class="active">
												<a href="#a2" data-toggle="tab"><?php echo $this->lang->line('__new_patients');?></a>
											</li>
											<li class="pull-left">
												<span class="margin-top-10 display-inline"><i class="fa fa-rss text-success"></i> <?php echo $this->lang->line('__activity');?></span>
											</li>
										</ul>

										<div class="tab-content padding-top-10">
											<div class="tab-pane fade" id="a1">

												<div class="row">

													<div class="col-xs-2 col-sm-1">
														<time datetime="2014-09-20" class="icon">
															<strong>Jan</strong>
															<span>10</span>
														</time>
													</div>

													<div class="col-xs-10 col-sm-11">
														<h6 class="no-margin"><a href="javascript:void(0);">Allice in Wonderland</a></h6>
														<p>
															Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi Nam eget dui.
															Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero,
															sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel.
														</p>
													</div>

													<div class="col-sm-12">

														<hr>

													</div>

													<div class="col-xs-2 col-sm-1">
														<time datetime="2014-09-20" class="icon">
															<strong>Jan</strong>
															<span>10</span>
														</time>
													</div>

													<div class="col-xs-10 col-sm-11">
														<h6 class="no-margin"><a href="javascript:void(0);">World Report</a></h6>
														<p>
															Morning our be dry. Life also third land after first beginning to evening cattle created let subdue you'll winged don't Face firmament.
															You winged you're was Fruit divided signs lights i living cattle yielding over light life life sea, so deep.
															Abundantly given years bring were after. Greater you're meat beast creeping behold he unto She'd doesn't. Replenish brought kind gathering Meat.
														</p>
													</div>

													<div class="col-sm-12">

														<br>

													</div>

												</div>

											</div>
											<div class="tab-pane fade  in active" id="a2">
												
												<div class="alert alert-info fade in">
													<button class="close" data-dismiss="alert">
														×
													</button>
													<i class="fa-fw fa fa-info"></i>
													<strong id="result-count">0 </strong><?php echo $this->lang->line('__added_today');?>
												</div>

												<div id="result"></div>
											</div><!-- end tab -->
										
										</div>

									</div>

								</div>

							</div>
							<!-- end row -->

						</div>

					</div>
					<div class="col-sm-12 col-md-12 col-lg-6" id="post" >

						<?php echo form_open('posts/create','class="well padding-bottom-10" id="form-post"');?>	
							<textarea rows="2" class="form-control" name="post_message" id="post_message" placeholder="What are you thinking?"></textarea>
							<div class="margin-top-10">
								<button type="submit" class="btn btn-sm btn-primary pull-right" id="post-submit">
									Post
								</button>
								<a href="javascript:void(0);" class="btn btn-link profile-link-btn hidden" rel="tooltip" data-placement="bottom" title="Add Location"><i class="fa fa-location-arrow"></i></a>
								<a href="javascript:void(0);" class="btn btn-link profile-link-btn hidden" rel="tooltip" data-placement="bottom" title="Add Voice"><i class="fa fa-microphone"></i></a>
								<a href="javascript:void(0);" class="btn btn-link profile-link-btn hidden" rel="tooltip" data-placement="bottom" title="Add Photo"><i class="fa fa-camera"></i></a>
								<a href="javascript:void(0);" class="btn btn-link profile-link-btn hidden" rel="tooltip" data-placement="bottom" title="Add File"><i class="fa fa-file"></i></a>
								<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="" data-placement="bottom" title="empty">&nbsp;</a>
							</div>
						<?php echo form_close();?>

						<!-- append post here -->

					</div>
				</div>

			</div>


	</div>

</div>

<script type="text/javascript">
	var BASE_URL = '<?php echo base_url();?>';
	var lic = '<?php echo $this->license_id;?>';
	var role = '<?php echo $info->role_id;?>';
	var user_id = '<?php echo $this->user_id;?>';
	$("[rel=tooltip]").tooltip();
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
	 * OR
	 * 
	 * loadScript(".../plugin.js", run_after_loaded);
	 */

	// PAGE RELATED SCRIPTS

	// pagefunction
	
	var bootboxfunction = function() {
		$(".bootbox").click(function (e) {
			var href = $(this).attr('href');
			var title = $(this).text();
			e.preventDefault();
			$.ajax({
				url: href,
				onError: function () {
					bootbox.alert('Some network problem try again later.');
				},
				success: function (response)
				{
					var dialog = bootbox.dialog({
						title: title,
						message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>'
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

	};
	
	// end pagefunction
	
	// run pagefunction on load

	loadScript(BASE_URL+"js/bootbox.min.js", bootboxfunction);
	
	console.log('role '+role);
	
	if(role != 2){

		$('#activity-log').hide();
	}
	
	patients();
	
	function patients(){
		$.ajax({
			url: BASE_URL+'patients/load_ajax/',
			type: 'post', 
			data: {
				filter: '<?php echo date('Y-m-d');?>'
			},               
			dataType: 'json',
			success: function (response) {
				
				var items = [];
				$.each(response.data, function(index, val) {
					
					if(val.avatar){
						picture =  '<img src="'+BASE_URL+'uploads/'+lic+'/profile-picture/'+val.avatar+'" alt="'+val.username+'" class="online" />';
					}else{
						picture =  '<img src="'+BASE_URL+'img/avatars/blank.png" alt="'+val.username+'" class="online" />';
					}
						
					item =	'<div class="user" title="'+val.email+'">'+
								picture+'<a href="javascript:void(0);">'+val.fullname+'</a>'+
								'<div class="email">'+val.email+'</div>'+
							'</div>';	

					items.push(item);
				});

				$('#result-count').html(response.recordsTotal +' new patients ');
				$('#result').append(items);

			}
		});
	}
	
	var post_count = 0;
	
	function count_post(){
		return $('.chat-body').length;
	}
	
	post();
	
	function post(){
		$.ajax({
			url: BASE_URL+'posts/get_post/',
			type: 'post', 
			data: {},               
			dataType: 'json',
			success: function (response) {

				if (response.length === 0) {
					
					$('<div class="alert alert-info text-center empty-post">Create your first post.</div>').appendTo('#post');
					
				}else{

					var items = [];
					$(response).each(function( index, val ) {

						var user_link = '<?php echo site_url('settings/encryptID/');?>';
		
						if(val.avatar){
							picture =  '<img src="'+BASE_URL+'uploads/'+val.lic+'/profile-picture/'+val.avatar+'" alt="'+val.username+'" class="online" />';
						}else{
							picture =  '<img src="'+BASE_URL+'img/avatars/blank.png" alt="'+val.username+'" class="online" />';
						}
							
						items += '<span class="timeline-seperator text-center" id="timeline-'+val.post_id+'"> <span>'+moment(val.post_created).format('MMMM Do YYYY, h:mm a')+'</span>'+
								'<div class="btn-group pull-right">';
									if(user_id === val.user_id){
										items += '<a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret single"></span></a>'+
										'<ul class="dropdown-menu text-left">'+
											'<li><a href="javascript:void(0);" class="sticky_post" id="'+val.post_id+'">Stick on top</a></li>'+
											'<li><a href="javascript:void(0);" class="delete_post" id="'+val.post_id+'">Delete</a></li>'+
										'</ul>';
									}
								items +='</div>'+
							'</span>'+
							'<div class="chat-body no-padding profile-message" id="body-'+val.post_id+'">'+
								'<ul id="comment-stream-'+val.post_id+'">'+
									'<li class="message">'+ picture +
										'<span class="message-text"> <a href="'+user_link+'/'+val.user_id+'" class="username" >'+val.firstname+' '+val.lastname+' &nbsp;<small class="text-muted pull-right ultra-light" style="float:right;"> '+moment(val.post_created).fromNow()+' </small></a> '+val.content+' </span>'+
										'<ul class="list-inline font-xs">'+
											'<li>'+
												'<a href="javascript:void(0);" class="text-info reply" id="'+val.post_id+'"><i class="fa fa-reply"></i> Reply</a>'+
											'</li>'+
											'<li>'+
												'<a href="javascript:void(0);" class="text-danger like" id="'+val.post_id+'"><i class="fa fa-thumbs-up"></i> Like <span id="count-like-'+val.post_id+'"></span></a>'+
											'</li>'+
											'<li>'+
												'<a href="javascript:void(0);" class="text-muted show" id="'+val.post_id+'">Comments (<span id="comment-counts-'+val.post_id+'">0</span>)</a>'+
											'</li>'+
										'</ul>'+
									'</li>'+
									'<li class="reply-wrapper" id="reply-wrapper-'+val.post_id+'" style="display:none;">'+
										'<form action="'+BASE_URL+'posts/create" method="post" accept-charset="utf-8" class="comment-form" id="post-comment-form-'+val.post_id+'" data-id="'+val.post_id+'">'+
										'<div class="input-group wall-comment-reply">'+
											'<input name="comment" id="comment-'+val.post_id+'" type="text" class="form-control" placeholder="Type your message here...">'+
											'<input name="post_id" id="post_id-'+val.post_id+'" type="hidden" value="'+val.post_id+'">'+
											'<span class="input-group-btn">'+
												'<button type="submit" class="btn btn-primary comment_btn" id="'+val.post_id+'">'+
													'<i class="fa fa-reply"></i> Reply'+
												'</button> </span>'+
										'</div>'+
										'</form>'+
									'</li>'+
								'</ul>'+
							'</div>';
						//retrieve any comments
						$.ajax({
							url: BASE_URL+'posts/get_post_comment/',
							type: 'post', 
							data: {
								post_id : val.post_id
							},               
							dataType: 'json',
							success: function (comment_response) {
								console.log(comment_response);
								
								var item = [];
								
								$(comment_response).each(function( i, v ) {

									var ul = '<?php echo site_url('settings/encryptID/');?>';
									
									if(v.avatar){
										p =  '<img src="'+BASE_URL+'uploads/'+v.lic+'/profile-picture/'+v.avatar+'" alt="'+v.username+'" class="online" />';
									}else{
										p =  '<img src="'+BASE_URL+'img/avatars/blank.png" alt="'+v.username+'" class="online" />';
									} 
									
									item += '<li class="message message-reply" id="reply-'+v.post_comment_id+'">'+ p +
											'<span class="message-text"> <a href="'+ul+'/'+v.user_id+'" class="username">'+v.firstname+' '+v.lastname+' &nbsp;<small class="text-muted pull-right ultra-light" style="float:right;"> '+moment(v.post_comment_created).fromNow()+' </small></a> '+v.comment+' </span>'+
											'<div class="btn-group pull-right">';
												if(user_id === v.user_id){
													item += '<a href="javascript:void(0);" class="delete_post_comment" id="'+v.post_comment_id+'"><i class="fa fa-close"></i></a>';
												}
											item +='</div>'+
											'<ul class="list-inline font-xs">'+
												'<li>'+
													'<a href="javascript:void(0);" class="text-muted">'+moment(v.post_created).fromNow()+' </a>'+
												'</li>'+
											'</ul>'+
										'</li>';
								});
								
								$('#reply-wrapper-'+val.post_id).before( item );
								$('#comment-counts-'+val.post_id).text( $('.message-reply').length );
								count_likes();
							}
						});
					});
					
					$(items).appendTo('#post');

				}
				
				post_count = count_post();

			}
		});
	}
	
	$(document).on('click', '.reply', function (e) {
		var ID = $(this).attr('id');
		$('.reply-wrapper').hide();
		$('#reply-wrapper-'+ID).show();
		e.preventDefault();
	});
	
	$(document).on('click', '.like', function (e) {
		var ID = $(this).attr('id');

		$.ajax({
			url: BASE_URL+'posts/likes/',
			type: 'post', 
			data: {
				post_id : ID
			},               
			dataType: 'json',
			success: function (res) {
				if(res){
					alert(res.msg);
				}else{
					alert(res.msg);
				}
				count_likes();
			}
		});	
	
		e.preventDefault();
	});
	
	function count_likes(){
		$('.like').each(function( index ) {
			var ID = $(this).attr('id');
			$.ajax({
				url: BASE_URL+'posts/count_likes/',
				type: 'post', 
				data: {
					post_id : ID
				},               
				dataType: 'json',
				success: function (res) {
					$('#count-like-'+ID).text(res.count);
				}
			});
		});
		
	}
	
	$(document).on('click', '.follow', function (e) {
		var ID = $(this).attr('id');
				
		if(user_id === ID){
			alert('you can not like your own');
		}else{
			
			$.ajax({
				url: BASE_URL+'posts/followed/',
				type: 'post', 
				data: {
					followee : ID
				},               
				dataType: 'json',
				success: function (res) {
					if(res){
						alert(res.msg);
					}else{
						alert(res.msg);
					}
					count_follow();
				}
			});
		}
		e.preventDefault();
	});
	
	count_follow();
	
	function count_follow(){
		var ID = $('.follow').attr('id');
		$.ajax({
			url: BASE_URL+'posts/count_follow/',
			type: 'post', 
			data: {
				followee : ID
			},               
			dataType: 'json',
			success: function (res) {
				$('#count-followers-'+ID).text(res.count);
			}
		});
		
		$.ajax({
			url: BASE_URL+'posts/get_followers/',
			type: 'post', 
			data: {
				followee : ID //followee
			},               
			dataType: 'json',
			beforeSend: function () {
				$('.followers-list').empty();
			},
			success: function (res) {
				//console.log(res);
				if(res.length === 0) {
					
					$('<li>--</li>').appendTo('.followers-list');
					
				}else{
					
					var item = [];
					$(res).each(function( index, val ) {
						console.log(val.lic);
	
						if(val.avatar){
							picture =  '<img src="'+BASE_URL+'uploads/'+val.lic+'/profile-picture/'+val.avatar+'" alt="'+val.username+'" />';
						}else{
							picture =  '<img src="'+BASE_URL+'img/avatars/blank.png" alt="'+val.username+'" />';
						} 
						item +=	'<li>'+picture+'</li>';
						
					});

					$(item).appendTo('.followers-list');
				}
			}
		});
	}
	
	$(document).on('click', '.connect', function (e) {
		var ID = $(this).attr('id');
		
		$.ajax({
			url: BASE_URL+'posts/requests/',
			type: 'post', 
			data: {
				requestee : ID
			},               
			dataType: 'json',
			success: function (res) {
				if(res){
					alert(res.msg);
				}else{
					alert(res.msg);
				}
				
				count_connect();
			}
		});	
		
		e.preventDefault();
	});
	
	action_check();
	
	function action_check(){
		var info_id = '<?php echo $info->id;?>';
		
		//hide button connect if active user is viewing
		$('.connect').each(function( index ) {
			var ID = $(this).attr('id');
			if(user_id === ID){
				$(this).hide();
			}
		});
		//hide button follow if active user is viewing
		$('.follow').each(function( index ) {
			var ID = $(this).attr('id');
			if(user_id === ID){
				$(this).hide();
			}
		}); 
		//remove xeditable
		$('.editable').each(function( index ) {
			var ID = $(this).attr('data-pk');
			if(user_id != ID){
				if($(this).hasClass('xeditable_text')){
					$(this).removeClass('xeditable_text');
				}
				if($(this).hasClass('xeditable_select')){
					$(this).removeClass('xeditable_select');
				}
				if($(this).hasClass('xeditable_textarea')){
					$(this).removeClass('xeditable_textarea');
				}
			}
		});
		//xeditable
		$('.bootbox').each(function( index ) {

			if(user_id != info_id){
				$(this).hide();
				$('#change_pass').hide();
				$('.editable').attr('href','javascript:;');
				$('#activity-log').hide();
			}
		});

		//post form
		if(user_id != info_id){
			$('#form-post').hide();
		}
	}
	
	count_connect();
	
	function count_connect(){
		var ID = $('.follow').attr('id');
		$.ajax({
			url: BASE_URL+'posts/count_connect/',
			type: 'post', 
			data: {
				requestee : ID
			},               
			dataType: 'json',
			success: function (res) {
				$('#count-connections-'+ID).text(res.count);
			}
		});
		
		$.ajax({
			url: BASE_URL+'posts/get_connects/',
			type: 'post', 
			data: {
				requestee : ID //
			},               
			dataType: 'json',
			beforeSend: function () {
				$('.connections-list').empty();
			},
			success: function (res) {

				if(res.length === 0) {
					
					$('<li>--</li>').appendTo('.connections-list');
					
				}else{
					
					var item = [];
					$(res).each(function( index, val ) {

						if(val.avatar){
							picture =  '<img src="'+BASE_URL+'uploads/'+val.lic+'/profile-picture/'+val.avatar+'" alt="'+val.username+'" />';
						}else{
							picture =  '<img src="'+BASE_URL+'img/avatars/blank.png" alt="'+val.username+'" />';
						} 
						item +=	'<li>'+picture+'</li>';
						
					});

					$(item).appendTo('.connections-list');
				}
				
			}
		});
	}
	
	$(document).on('click', '.delete_post', function (e) {
		var ID = $(this).attr('id');
		$.ajax({
			url: BASE_URL+'posts/delete_post/',
			type: 'post', 
			data: {
				id : ID
			},               
			dataType: 'json',
			success: function (response) {
				console.log(response);
				if(post_count === 1){
					$('<div class="alert alert-info text-center empty-post">You don\'t any post.Create one</div>').appendTo('#post');
				}
				$('#timeline-'+ID).slideUp('fast').remove();
				$('#body-'+ID).slideUp('fast').remove();
			}
		});	
		e.preventDefault();
	});
	
	$(document).on('click', '.delete_post_comment', function (e) {
		var ID = $(this).attr('id');
		$.ajax({
			url: BASE_URL+'posts/delete_post_comment/',
			type: 'post', 
			data: {
				id : ID
			},               
			dataType: 'json',
			success: function (response) {
				console.log(response);
				$('#reply-'+ID).fadeOut('slow').remove();
			}
		});	
		e.preventDefault();
	});
	
	$(document).on('click', '.comment_btn', function (e) {
		var ID = $(this).attr('id');
		console.log(ID);
		$.ajax({
			url: BASE_URL+'posts/create_comment/',
			type: 'post', 
			data: {
				post_id : $('#post_id-'+ID).val(),
				comment : $('#comment-'+ID).val()
			},               
			beforeSend: function () {
				$(this).html('<?php echo $this->lang->line('__common_please_wait');?>');
				$(this).attr("disabled", "disabled");
			},
			success:function(res)
			{ 
				var val = res.info;
				var ul = '<?php echo site_url('settings/encryptID/');?>';
				
				if(val.avatar){
					picture =  '<img src="'+BASE_URL+'uploads/'+lic+'/profile-picture/'+val.avatar+'" alt="'+val.username+'" class="online" />';
				}else{
					picture =  '<img src="'+BASE_URL+'img/avatars/blank.png" alt="'+val.username+'" class="online" />';
				} 
				items = '<li class="message message-reply">'+ picture +
						'<span class="message-text"> <a href="'+ul+'/'+val.user_id+'" class="username">'+val.firstname+' '+val.lastname+'&nbsp;<small class="text-muted pull-right ultra-light" style="float:right;"> '+moment(val.post_comment_created).fromNow()+' </small></a> '+val.comment+' </span>'+
						'<div class="btn-group pull-right">';
							if(user_id === val.user_id){
								items += '<a href="javascript:void(0);" class="delete_post_comment" id="'+val.post_comment_id+'"><i class="fa fa-close"></i></a>';
							}
						items +='</div>'+
						'<ul class="list-inline font-xs">'+
							'<li>'+
								'<a href="javascript:void(0);" class="text-muted">'+moment(val.post_created).fromNow()+' </a>'+
							'</li>'+
							'<li>'+
								'<a href="javascript:void(0);" class="text-danger like" id="'+val.post_comment_id+'"><i class="fa fa-thumbs-up"></i> Like</a>'+
							'</li>'+
						'</ul>'+
					'</li>';
				$('#reply-wrapper-'+ID).before( items );
				$('#comment-'+ID).val('');
				$(this).html('<i class="fa fa-reply"></i> Reply');
				$(this).removeAttr("disabled");
			},
			dataType:'json'
		});
		e.preventDefault();
	});
	
	var validatefunction = function() {
					
		$("#form-post").validate({
			rules : {
				post_message : {
					required : true,
					maxlength: 350
				}
			},
			// Messages for form validation
			messages : {
				post_message : {
					required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'post message');?>',
					maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 350);?></span>'
				}
			},
			highlight: function(element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
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
			submitHandler : function(form, element) {
				
				$(form).ajaxSubmit({
					beforeSend: function () {
						$('#post-submit').html('<?php echo $this->lang->line('__common_please_wait');?>');
						$('#post-submit').attr("disabled", "disabled");
					},
					success:function(res)
					{ 

						var val = res.info;
						var user_link = '<?php echo site_url('settings/encryptID/');?>';
						
						if(val.avatar){
							picture =  '<img src="'+BASE_URL+'uploads/'+lic+'/profile-picture/'+val.avatar+'" alt="'+val.username+'" class="online" />';
						}else{
							picture =  '<img src="'+BASE_URL+'img/avatars/blank.png" alt="'+val.username+'" class="online" />';
						}  
						items = '<span class="timeline-seperator text-center" id="timeline-'+val.post_id+'"> <span>'+moment(val.post_created).format('MMMM Do YYYY, h:mm a')+'</span>'+
								'<div class="btn-group pull-right">'+
									'<a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret single"></span></a>'+
									'<ul class="dropdown-menu text-left">'+
										'<li><a href="javascript:void(0);" class="sticky_post" id="'+val.post_id+'">Stick on top</a></li>'+
										'<li><a href="javascript:void(0);" class="delete_post" id="'+val.post_id+'">Delete</a></li>'+
									'</ul>'+
								'</div>'+
							'</span>'+
							'<div class="chat-body no-padding profile-message" id="body-'+val.post_id+'">'+
								'<ul id="comment-stream-'+val.post_id+'">'+
									'<li class="message">'+ picture +
										'<span class="message-text"> <a href="'+user_link+'/'+val.user_id+'" class="username">'+val.firstname+' '+val.lastname+'<small class="text-muted pull-right ultra-light"> '+moment(val.post_created).fromNow()+' </small></a> '+val.content+' </span>'+
										'<ul class="list-inline font-xs">'+
											'<li>'+
												'<a href="javascript:void(0);" class="text-info reply" id="'+val.post_id+'"><i class="fa fa-reply"></i> Reply</a>'+
											'</li>'+
											'<li>'+
												'<a href="javascript:void(0);" class="text-danger like" id="'+val.post_id+'"><i class="fa fa-thumbs-up"></i> Like <span id="count-like-'+val.post_id+'"></span></a>'+
											'</li>'+
											'<li>'+
												'<a href="javascript:void(0);" class="text-muted show" id="'+val.post_id+'">Comments (<span id="comment-counts-'+val.post_id+'">0</span>)</a>'+
											'</li>'+
										'</ul>'+
									'</li>'+
									'<li class="reply-wrapper" id="reply-wrapper-'+val.post_id+'" style="display:none;">'+
										'<form action="'+BASE_URL+'posts/create" method="post" accept-charset="utf-8" class="comment-form" id="post-comment-form-'+val.post_id+'" data-id="'+val.post_id+'">'+
										'<div class="input-group wall-comment-reply">'+
											'<input name="comment" id="comment" type="text" class="form-control" placeholder="Type your message here...">'+
											'<input name="post_id" id="post_id" type="hidden" value="'+val.post_id+'">'+
											'<span class="input-group-btn">'+
												'<button type="submit" class="btn btn-primary comment_btn" id="comment-btn-'+val.post_id+'">'+
													'<i class="fa fa-reply"></i> Reply'+
												'</button> </span>'+
										'</div>'+
										'</form>'+
									'</li>'+
								'</ul>'+
							'</div>';
						
						$('#form-post').after( items );
						$('#post-submit').html('Post');
						$('#post-submit').removeAttr("disabled");
						$('#post_message').val('');
	
						if ($('.empty-post').length > 0) {
							$('.empty-post').hide().remove();
						}
						
					},
					dataType:'json'
				});
			}
		});
			
	}
				
	loadScript(BASE_URL+"js/plugin/jquery-validate/jquery.validate.min.js", function(){
		loadScript(BASE_URL+"js/plugin/jquery-form/jquery-form.min.js", validatefunction);
	});
				
	/*
	 * X-Ediable
	 */

	loadScript(BASE_URL+"js/plugin/x-editable/moment.min.js", loadMockJax);

	function loadMockJax() {
		loadScript(BASE_URL+"js/plugin/x-editable/jquery.mockjax.min.js", loadXeditable);
	}

	function loadXeditable() {
		loadScript(BASE_URL+"js/plugin/x-editable/x-editable.min.js", loadTypeHead);
	}

	function loadTypeHead() {
		loadScript(BASE_URL+"js/plugin/typeahead/typeahead.min.js", loadTypeaheadjs);
	}

	function loadTypeaheadjs() {
		loadScript(BASE_URL+"js/plugin/typeahead/typeaheadjs.min.js", runXEditDemo);
	}

	function runXEditDemo() {

		/*
		 * X-EDITABLES
		 */

		//defaults
		$.fn.editable.defaults.url = '/post';
		//$.fn.editable.defaults.mode = 'inline'; use this to edit inline

		$('.xeditable_text').each(function () {
			var obj = $(this);
			var type = obj.attr('data-name');
			obj.editable({
				emptytext: '--',
				validate: function (value) {
					if ($.trim(value) == '')
						return type+' field is required';
				},
				success: function(response) {
					console.log(response);
				} ,
				params: function(params) {  //params already contain `name`, `value` and `pk`
					var data = {};
					data['pk'] = params.pk;
					data['name'] = params.name;
					data['value'] = params.value;
					data['table'] = $(this).attr('data-table');
					return data;
					
				} 
			});
			
		});
		
		$('.xeditable_textarea').each(function () {
			var obj = $(this);
			var type = obj.attr('data-name');
			obj.editable({
				emptytext: '--',
				validate: function (value) {
					if ($.trim(value) == '')
						return type+' field is required';
				},
				success: function(response) {
					console.log(response);
				} ,
				params: function(params) {  //params already contain `name`, `value` and `pk`
					var data = {};
					data['pk'] = params.pk;
					data['name'] = params.name;
					data['value'] = params.value;
					data['table'] = $(this).attr('data-table');
					return data;
					
				} 
			});
			
		});
		
		$('.xeditable_select').each(function () {
			var obj = $(this);
			var type = obj.attr('data-name');
			var val = obj.attr('data-value');
			var source_data = [];
			if(type === 'country'){
				source_data = '<?php echo json_encode($this->location_lib->populate_countries()->result_array(), JSON_HEX_APOS);?>';
			}else if(type === 'state'){
				source_data = '<?php echo json_encode($this->location_lib->_populate_states($info->country)->result_array(), JSON_HEX_APOS);?>';
			}else if(type === 'city') {
				source_data = '<?php echo json_encode($this->location_lib->_populate_cities($info->state)->result_array(), JSON_HEX_APOS);?>';
			}else{
				source_data = [{value: 1,text: 'Male'}, {value: 2,text: 'Female'}]
			}

			obj.editable({
				source: source_data,
				validate: function (value) {
					if ($.trim(value) == '')
						return type+' field is required';
				},
				value: val,
				emptytext: '--',
				params: function(params) {  //params already contain `name`, `value` and `pk`
					var data = {};
					data['pk'] = params.pk;
					data['name'] = params.name;
					data['value'] = params.value;
					data['table'] = $(this).attr('data-table');
					return data;
				},
				success: function(response) {
					console.log(response);
					checkURL();
				}
			});
			
		});

		
	}
		
</script>
