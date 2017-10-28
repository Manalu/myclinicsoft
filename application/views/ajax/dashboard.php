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
<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

	<!-- col -->
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 class="page-title txt-color-blueDark"><?php echo sprintf($this->lang->line('__common_welcome'), $user_info->username);?> </h1>
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
		<div class="col-sm-12 col-md-8 col-lg-8 well" id="post" >

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
		<div class="col-sm-12 col-md-4 col-lg-4" >
			<!--<h1><small>Followers</small></h1>
			<ul class="list-inline followers-list"></ul>

			<h1><small>Connections</small></h1>
			<ul class="list-inline connections-list"></ul>-->
			
			<div class="fb-page" data-href="https://business.facebook.com/myclinicsoftware" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://business.facebook.com/myclinicsoftware" class="fb-xfbml-parse-ignore"><a href="https://business.facebook.com/myclinicsoftware">My Clinic Software</a></blockquote></div>
			
			<hr>
			
		</div>
	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->
<script type="text/javascript">
	var BASE_URL = '<?php echo base_url();?>';
	var lic = '<?php echo $this->license_id;?>';
	var role = '<?php echo $user_info->role_id;?>';
	var user_id = '<?php echo $this->user_id;?>';
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

	//count_follow();
	
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
						console.log(val);
	
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
	
	action_check();
	
	function action_check(){
		var info_id = '<?php echo $user_info->id;?>';
		//post form
		if(user_id != info_id){
			$('#form-post').hide();
		}
	}
	
	//count_connect();
	
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
				console.log(res);
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
				items = '<li class="message message-reply" id="reply-'+val.post_comment_id+'">'+ picture +
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
	pageSetUp();
	
	/*
	 * PAGE RELATED SCRIPTS
	 */

	// pagefunction
	
	var pagefunction = function() {
			

	};
	
	// end pagefunction

	// destroy generated instances 
	// pagedestroy is called automatically before loading a new page
	// only usable in AJAX version!

	var pagedestroy = function(){
		
		

	}

	// end destroy
	
	// run pagefunction on load
	pagefunction();
	
	
</script>
