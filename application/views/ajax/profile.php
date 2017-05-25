<!-- Bread crumb is created dynamically -->
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
											<a href="javascript:void(0);" class="hidden btn txt-color-white bg-color-teal btn-sm"><i class="fa fa-check"></i> Follow</a>&nbsp; 
											<a href="javascript:void(0);" class="connect btn txt-color-white bg-color-pinkDark btn-sm"><i class="fa fa-link"></i> Connect</a>
										</div>
										<div class="air air-top-left padding-10">
											<h4 class="txt-color-white font-md">Jan 1, 2014</h4>
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
											<?php if($info->avatar)
											{
												$img = base_url().'/uploads/'.$this->license_id.'/profile-picture/'.$info->avatar;
											}
											else
											{ 
												$img = $this->gravatar->get($info->email);
											} ?>
											<img src="<?php echo $img;?>" alt="Profile Picture" style="width:100px; height:100px;">
											<a href="<?php echo site_url('auth/upload_picture/'.$info->id);?>" data-original-title="Upload" class="bootbox"><i class="fa fa-pencil"></i></a>
											<div class="hidden padding-10">
												<h4 class="font-md"><strong>0</strong>
												<br>
												<small>Friends</small></h4>
											</div>
										</div>
										
										<div class="col-sm-6">
											<h1><?php echo $user_info->firstname;?> <span class="semi-bold"><?php echo $user_info->lastname;?></span>
											
											
											<br>
											<small> <?php echo $user_info->username;?></small></h1>

											<ul class="list-unstyled">
												<li>
													<p class="text-muted">
														<i class="fa fa-mobile"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?php echo ($user_info->mobile) ? $user_info->mobile :'--';?></span>
													</p>
												</li>
												<li>
													<p class="text-muted">
														<i class="fa fa-envelope"></i>&nbsp;&nbsp;<?php echo ($user_info->email) ? '<a href="mailto:'.$user_info->email.'">'.$user_info->email.'</a>' :'--';?>
													</p>
												</li>
												<li>
													<p class="text-muted">
														<i class="fa fa-map"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?php echo ($user_info->address) ? $user_info->address.'<br>'.$user_info->country.' '.$user_info->city.' '.$user_info->state.' '.$user_info->zip : '--';?></span>
													</p>
												</li>
												<li>
													<p class="text-muted">
														<i class="fa fa-crosshairs"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?php echo ($user_info->gender) ? $user_info->gender : '--';?></span>
													</p>
												</li>
												<li>
													<p class="text-muted">
														<i class="fa fa-calendar"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?php echo ($user_info->gender) ? $user_info->gender : '--';?></span>
													</p>
												</li>
												<li>
													<p class="text-muted">
														<i class="fa fa-key"></i>&nbsp;&nbsp;<span class="txt-color-darken">
														<a href="<?php echo site_url('auth/change_password/');?>" class="bootbox">Change password</a></span>
														
													</p>
												</li>
												<!--<li>
													<p class="text-muted">
														<i class="fa fa-pencil"></i>&nbsp;&nbsp;<span class="txt-color-darken">
														<a href="<?php echo site_url('admin/members/create/'.$user_info->id);?>" class="bootbox">
														Edit</a></span>
													</p>
												</li>-->
											</ul>
											<br>
											<!--<p class="font-md">
												<i>A little about me...</i>
											</p>
											<p>

												Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio
												cumque nihil impedit quo minus id quod maxime placeat facere

											</p>
											<br>-->
											<a href="javascript:void(0);" class="btn btn-default btn-xs"><i class="fa fa-envelope-o"></i> Send Message</a>
											<br>
											<br>

										</div>
										<div class="col-sm-3">
											<!--<h1><small>Friends</small></h1>
											<ul class="list-inline friends-list">
												<li><img src="img/avatars/1.png" alt="friend-1">
												</li>
												<li><img src="img/avatars/2.png" alt="friend-2">
												</li>
												<li><img src="img/avatars/3.png" alt="friend-3">
												</li>
												<li><img src="img/avatars/4.png" alt="friend-4">
												</li>
												<li><img src="img/avatars/5.png" alt="friend-5">
												</li>
												<li><img src="img/avatars/male.png" alt="friend-6">
												</li>
												<li>
													<a href="javascript:void(0);">413 more</a>
												</li>
											</ul>

											<h1><small>Recent visitors</small></h1>
											<ul class="list-inline friends-list">
												<li><img src="img/avatars/male.png" alt="friend-1">
												</li>
												<li><img src="img/avatars/female.png" alt="friend-2">
												</li>
												<li><img src="img/avatars/female.png" alt="friend-3">
												</li>
											</ul>-->

										</div>

									</div>

								</div>

							</div>

							<div class="row">

								<div class="col-sm-12">

									<hr>

									<div class="padding-10">

										<ul class="nav nav-tabs tabs-pull-right">
											<li class="hidden">
												<a href="#a1" data-toggle="tab">Recent Articles</a>
											</li>
											<li class="active">
												<a href="#a2" data-toggle="tab">New Patients</a>
											</li>
											<li class="pull-left">
												<span class="margin-top-10 display-inline"><i class="fa fa-rss text-success"></i> Activity</span>
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
													<strong id="result-count">0 new patients </strong>added today!
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
					<div class="col-sm-12 col-md-12 col-lg-6" id="future-updates" title="future updates">

						<form method="post" class="well padding-bottom-10" onsubmit="return false;">
							<textarea rows="2" class="form-control" placeholder="What are you thinking?"></textarea>
							<div class="margin-top-10">
								<button type="submit" class="btn btn-sm btn-primary pull-right">
									Post
								</button>
								<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="Add Location"><i class="fa fa-location-arrow"></i></a>
								<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="Add Voice"><i class="fa fa-microphone"></i></a>
								<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="Add Photo"><i class="fa fa-camera"></i></a>
								<a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="Add File"><i class="fa fa-file"></i></a>
							</div>
						</form>

						<span class="timeline-seperator text-center"> <span>10:30PM January 1st, 2013</span>
							<div class="btn-group pull-right">
								<a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret single"></span></a>
								<ul class="dropdown-menu text-left">
									<li>
										<a href="javascript:void(0);">Hide this post</a>
									</li>
									<li>
										<a href="javascript:void(0);">Hide future posts from this user</a>
									</li>
									<li>
										<a href="javascript:void(0);">Mark as spam</a>
									</li>
								</ul>
							</div> </span>
						<div class="chat-body no-padding profile-message">
							<ul>
								<li class="message">
									<img src="img/avatars/sunny.png" class="online">
									<span class="message-text"> <a href="javascript:void(0);" class="username">John Doe <small class="text-muted pull-right ultra-light"> 2 Minutes ago </small></a> Can't divide were divide fish forth fish to. Was can't form the, living life grass darkness very
										image let unto fowl isn't in blessed fill life yielding above all moved </span>
									<ul class="list-inline font-xs">
										<li>
											<a href="javascript:void(0);" class="text-info"><i class="fa fa-reply"></i> Reply</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="text-muted">Show All Comments (14)</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="text-primary">Edit</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="text-danger">Delete</a>
										</li>
									</ul>
								</li>
								<li class="message message-reply">
									<img src="img/avatars/3.png" class="online">
									<span class="message-text"> <a href="javascript:void(0);" class="username">Serman Syla</a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>

									<ul class="list-inline font-xs">
										<li>
											<a href="javascript:void(0);" class="text-muted">1 minute ago </a>
										</li>
										<li>
											<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
										</li>
									</ul>

								</li>
								<li class="message message-reply">
									<img src="img/avatars/4.png" class="online">
									<span class="message-text"> <a href="javascript:void(0);" class="username">Sadi Orlaf </a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>

									<ul class="list-inline font-xs">
										<li>
											<a href="javascript:void(0);" class="text-muted">a moment ago </a>
										</li>
										<li>
											<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
										</li>
									</ul>
									<input class="form-control input-xs" placeholder="Type and enter" type="text">
								</li>
							</ul>

						</div>

						<span class="timeline-seperator text-center"> <span>11:30PM November 27th, 2013</span>
							<div class="btn-group pull-right">
								<a href="javascript:void(0);" data-toggle="dropdown" class="btn btn-default btn-xs dropdown-toggle"><span class="caret single"></span></a>
								<ul class="dropdown-menu text-left">
									<li>
										<a href="javascript:void(0);">Hide this post</a>
									</li>
									<li>
										<a href="javascript:void(0);">Hide future posts from this user</a>
									</li>
									<li>
										<a href="javascript:void(0);">Mark as spam</a>
									</li>
								</ul>
							</div> </span>
						<div class="chat-body no-padding profile-message">
							<ul>
								<li class="message">
									<img src="img/avatars/1.png" class="online">
									<span class="message-text"> <a href="javascript:void(0);" class="username">John Doe <small class="text-muted pull-right ultra-light"> 2 Minutes ago </small></a> Can't divide were divide fish forth fish to. Was can't form the, living life grass darkness very image let unto fowl isn't in blessed fill life yielding above all moved </span>
									<ul class="list-inline font-xs">
										<li>
											<a href="javascript:void(0);" class="text-info"><i class="fa fa-reply"></i> Reply</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="text-muted">Show All Comments (14)</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="text-primary">Hide</a>
										</li>
									</ul>
								</li>
								<li class="message message-reply">
									<img src="img/avatars/3.png" class="online">
									<span class="message-text"> <a href="javascript:void(0);" class="username">Serman Syla</a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>

									<ul class="list-inline font-xs">
										<li>
											<a href="javascript:void(0);" class="text-muted">1 minute ago </a>
										</li>
										<li>
											<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
										</li>
									</ul>

								</li>
								<li class="message message-reply">
									<img src="img/avatars/4.png" class="online">
									<span class="message-text"> <a href="javascript:void(0);" class="username">Sadi Orlaf </a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>

									<ul class="list-inline font-xs">
										<li>
											<a href="javascript:void(0);" class="text-muted">a moment ago </a>
										</li>
										<li>
											<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
										</li>
									</ul>

								</li>
								<li class="message message-reply">
									<img src="img/avatars/4.png" class="online">
									<span class="message-text"> <a href="javascript:void(0);" class="username">Sadi Orlaf </a> Haha! Yeah I know what you mean. Thanks for the file Sadi! <i class="fa fa-smile-o txt-color-orange"></i> </span>

									<ul class="list-inline font-xs">
										<li>
											<a href="javascript:void(0);" class="text-muted">a moment ago </a>
										</li>
										<li>
											<a href="javascript:void(0);" class="text-danger"><i class="fa fa-thumbs-up"></i> Like</a>
										</li>
									</ul>

								</li>
								<li>
									<div class="input-group wall-comment-reply">
										<input id="btn-input" type="text" class="form-control" placeholder="Type your message here...">
										<span class="input-group-btn">
											<button class="btn btn-primary" id="btn-chat">
												<i class="fa fa-reply"></i> Reply
											</button> </span>
									</div>
								</li>
							</ul>

						</div>


					</div>
				</div>

			</div>


	</div>

</div>

<script type="text/javascript">
var BASE_URL = '<?php echo base_url();?>';
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

	load_patients();

	function load_patients(){
		$.ajax({
			url: BASE_URL+'patients/load_ajax/',
			type: 'post', 
			data: {
				filter: '<?php echo date('Y-m-d');?>'
			},               
			dataType: 'json',
			success: function (response) {
				
				console.log(response.draw);
				console.log(response.recordsTotal);
				console.log(response.recordsFiltered);

				var items = [];
				$.each(response.data, function(index, val) {
					var source = '<?php echo $this->gravatar->get("'+val.email+'");?>';
		                    
					if(val.avatar){
						picture =  '<img src="'+BASE_URL+'img/avatars/'+val.avatar+'" alt="'+val.username+'" class="img-responsive" />';
					}else{
						picture =  '<img src="'+source+'" alt="'+val.username+'" class="img-responsive" />';
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

</script>
