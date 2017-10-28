<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="MyClinicSoft is a Web Apllication Software for Small to Big Clinics.">
		<meta name="author" content="Randy Rebucas">
		<meta name="keywords" content="clinic, myclinicsoft, clinic web application, clinical application">

		<title>Myclnicsoft</title>
		<meta name="robots" content="index, follow" />
		<meta name="google-site-verification" content="rWQKdkTjUlQrUfn2u19c2VIi8j8mcVFi7P3YUd_JqA4" />
		<meta name="msvalidate.01" content="" />
		<link rel="canonical" href="<?php echo site_url();?>">
		
		<!-- #Bootstrap Core CSS -->
		<link type="text/css" href="<?php echo site_url();?>Landing_Page/css/bootstrap.min.css" rel="stylesheet">
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/font-awesome.min.css">
		
		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="<?php echo site_url();?>Landing_Page/img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo site_url();?>Landing_Page/img/favicon/favicon.ico" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
		<style>
			body {
				background: url('/img/clinic-slider.jpg') no-repeat center center fixed;
				background-size: cover;
				-o-background-size: cover;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 10px;
				cursor: default;
				color: #000
			}
			
			#menu {
				position: fixed;
				bottom: 0px;
				left: 141px;
				z-index: 80;
				width: 100%;
				line-height: 12px;
			}
			#menu div {
				height: 63px;
				background: #000;
				opacity: 0.6;
				filter: alpha(opacity=60);
				padding: 7px 0 0 7px
			}
			h1 {
				position: relative;
				left: -141px;
				margin-bottom: -63px;
				width: 140px;
				opacity: 0.99
			}
			h1 a {
				padding: 41px 10px 10px 0;
				color: #fff;
				background: #000 url(go.gif) 0 -30px repeat-x;
				font-size: 11px;
				text-align: right;
				display: block
			}
			h1 a:hover {
				background: #000 url(go.gif) 0 43px repeat-x
			}
			ul {
				float: left;
				width: 50%;
			}
			li a {
				
				padding: 0 5px;
				font-weight: bold;
				color: #999;
				display: block
			}
			li a:hover,
			li.cur a {
				color: #fff
			}
			.box {
				position: absolute;
				top: 15%;
				right: 200px;
				width: 500px;
				padding-bottom: 20px;
			}
			.box div {
				line-height: 1.5em;
				background: #fff;
				padding: 20px 0px;
			}
			.box div a {
				text-decoration: underline
			}
			.large {
				text-align: right;
				top: 20%;
				right: 120px;
				font-size: 14px;
				background: #fff;
				opacity: 0.7;
				padding-right: 24px;
			}
			}
			.left {
				text-align: left;
				right: auto;
				left: 180px;
				font-size: 13px
			}
			.large h2 {
				font-size: 60px
			}
			.white {
				color: #fff
			}
			#beijing {
				top: 15%
			}
			h3 {
				position: relative;
				border-bottom-width: 1px;
				padding: 30px 30px 10px 30px;
				margin: 0 -30px 20px -30px;
				text-transform: uppercase;
				line-height: 20px;
				font-weight: bold
			}
			h3 span {
				position: absolute;
				right: 510px;
				top: 29px;
				background: #000;
				text-align: center;
				padding: 0 5px;
				white-space: nowrap;
				display: block;
				color: #fff;
				font-weight: normal
			}
			dl {
				margin: 10px 0
			}
			dt,
			dd p {
				padding: 15px 0 25px 0;
				display: block;
				border-top-width: 1px;
				width: 440px
			}
			dt {
				text-transform: uppercase;
				padding: 0 5px;
				cursor: pointer;
				line-height: 20px;
				height: 20px;
				font-weight: bold;
				width: 430px
			}
			dd {
				height: 0px;
				overflow: hidden;
				width: 440px
			}
			#photos {
				position: absolute;
				z-index: 90;
				bottom: 41px;
				right: 40px;
				height: 20px;
				overflow: hidden
			}
			#photos a,
			#float {
				z-index: 90;
				height: 20px;
				line-height: 20px;
				text-align: center;
				width: 40px;
				background: #000 url(gal.gif) -6px 5px no-repeat;
				cursor: pointer;
				color: #fff
			}
			#photos a {
				width: 20px;
				float: left;
				margin-left: 1px;
				background: #000;
				font-weight: bold;
				overflow: hidden
			}
			#photos a:hover,
			#photos a.cur {
				background: #fff;
				color: #000
			}
			#float {
				display: none;
				position: absolute
			}
			#float.nxt,
			#float.prv {
				display: block
			}
			#float.nxt {
				background-position: -16px 5px
			}
			#float.prv {
				background-position: 7px 5px
			}
			div#supports {
				position: relative;
				font-size: 12px;
			}
			div#supports ul li {
				list-style: none;
			}
			div#supports ul li:first-child {
				font-weight: bolder;
				font-size: 16px;
				text-decoration: underline;
			} 
			/**/
			div#ap-wrapper {
				width: 60%;
				margin-left: 10%;
				top: 10px;
				position: absolute;
				background: #fff;
				padding: 20px 10px;
				text-align: center;
				overflow-y: scroll;
				height: 300px;
			}
			div#ap-option {
				background: #2d414a;
				color: #fff;
				font-size: 18px;
				padding: 10px;
			}
			div#ap-option .option {
				width: 40%;
				display: inline-block;
				border: 1px solid;
				padding: 10px;
				cursor: pointer;
			}
			div#ap-option .option:hover {
				background: #767777;
			}
			div#ap-option .selected {
				background: #767777;
				color: #000;
			}
			div#ap-patient-details, #ap-doctors-details, #ap-date-details, #ap-confirm-details {
				padding: 10px;
			}
			fieldset {
				border: 1px solid #2d4149;
				padding: 3px 18px;
			}
			fieldset legend {
				text-align: left;
				font-size: 14px;
				border-bottom: none;
				padding: 0px 10px;
				margin: 0px;
				width: auto;
				background: #2d414a;
				color: #fff;
			}

			.media {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-align: start;
				-webkit-align-items: flex-start;
				-ms-flex-align: start;
				align-items: flex-start;
				position: relative;
			}
			.mr-3 {
				margin-right: 1rem!important;
				margin-bottom: 10px !important;
			}
			.d-flex {
				display: -webkit-box!important;
				display: -webkit-flex!important;
				display: -ms-flexbox!important;
				display: flex!important;
			}
			.media-body {
				-webkit-box-flex: 1;
				-webkit-flex: 1 1 0%;
				-ms-flex: 1 1 0%;
				flex: 1 1 0%;
					text-align: left;
			}
			.mt-0 {
				margin-top: 0!important;
			}
			.note {
				text-align: left;
				font-size: 12px;
				color: darkred;
			}
			.remove {
				position: absolute;
				right: 0px;
				background: red;
				color: #fff;
				padding: 3px 5px;
				border-radius: 100%;
				cursor: pointer;
			}
			div#ui-datepicker-div {
				width: 20%;
				font-size: 14px;
			}
			p.schedule {
				font-size: 14px;
				text-align: left;
			}
			span.time {
				float: right;
			}
			div#ap-date-details p {
				font-size: 14px;
				text-align: left;
			}
		</style>
	</head>
	<body>

		
		<div id="menu">
			<h1><a href="<?php echo site_url('auth/login');?>"><b>LOGIN</b> </a></h1>
			<div>
				<ul>
					<li><a href="javascript:;">BLOG</a></li>
					<li><a href="https://business.facebook.com/myclinicsoftware/?business_id=1569918473257009" target="_blank">FACEBOOK</a></li>
					<li><a href="javascript:;">TWITTER</a></li>
					<li><a href="javascript:;">YOUTUBE</a></li>
				</ul>
			</div>
		</div>
		<div  id="cont" class="row">
			<div class="col-md-8">
				<div id="ap-wrapper" class="">
					<h4>Book an Appointment </h4>
					
					<div id="ap-option">
						<div id="new" class="option" >Guest</div>
						<div id="registered" class="option" >Registered</div>
					</div>
					
					<div id="ap-patient-details">
						<div id="form-new" class="forms" style="display:none;">
							<?php echo form_open('welcome/get_patient','class="smart-form" id="step-1"');?>
							<input type="hidden" name="id" id="id" value="-1"/>
							<fieldset>
								<legend>My Details</legend>
								<div class="form-group fields">
									<input type="text" name="firstname" id="firstname" value="" class="form-control" placeholder="Firstname"/>
								</div>
								<div class="form-group fields">
									<input type="text" name="lastname" id="lastname" value="" class="form-control" placeholder="Lastname"/>
								</div>
								<div class="form-group fields">
									<textarea name="address" id="address" value="" class="form-control" placeholder="Address"></textarea>
								</div>
								<div class="form-group fields">
									<input type="text" name="contact" id="contact" value="" class="form-control" placeholder="Contact"/>
								</div>
								<div class="form-group fields">
									<button type="submit" class="btn btn-success btn-block " id="submit-patient-info">Continue</button>
								</div>
								<div class="patient-new-details">
								
								</div>
							</fieldset>
							<?php echo form_close();?>
						</div>
						<div id="form-registered" class="forms" style="display:none;">
							<?php echo form_open('welcome/get_info_patient','class="smart-form" id="step-2"');?>
							<fieldset>
								<legend>Find Patient Token</legend>
								<div class="form-group fields">
									<p style="font-size:12px; text-align:left;"><strong><span class="label label-success">NOTE : </span></strong><code>00000000-00000000</code> is the format of token. <br>Ask your Doctor or Nurse In-Charge.</p>
								</div>
								<div class="form-group fields">
									<input name="patient_token" id="patient_token" value="" class="form-control"  placeholder="Patient Token"/>
								</div>
								<div class="form-group fields">
									<button type="submit" class="btn btn-success btn-block " id="button-patient-info">Find</button>
								</div>
								<div class="patient-registered-details">
								
								</div>
							</fieldset>
							<?php echo form_close();?>
						</div>
						
					</div>
					
					<div id="ap-doctors-details" style="display:none;">
						<fieldset>
							<legend>Find my Doctor</legend>
							<div class="form-group dfields">
								<input name="doctor" value="" class="form-control typeahead" placeholder="Find Doctor"/>
							</div>
							<div class="doctor-details">
								
							</div>
							
						</fieldset>
					</div>
					
					<div id="ap-date-details" style="display:none;">
						<fieldset>
							<legend>Pick my schedule</legend>
							<div class="form-group datefields">
								<input type="text" name="title" id="title" value="" class="form-control" placeholder="Title" required/>
							</div>
							<div class="form-group datefields">
								<textarea name="description" id="description" value="" class="form-control" placeholder="Description" required></textarea>
							</div>
							<div class="form-group datefields">
								<div class="row">
									<div class="col-md-6 ">
										<input type="text" name="schedule_date" id="schedule_date" class="form-control datepicker" value="" data-dateformat="yy-mm-dd" aria-invalid="false">
									</div>
									<div class="col-md-6 ">
										<select name="schedule_time" id="schedule_time" class="form-control" disabled="disabled">
											<option value="8:00 AM">8:00 AM</option>
											<option value="8:30 AM">8:30 AM</option>
											<option value="9:00 AM">9:00 AM</option>
											<option value="9:30 AM">9:30 AM</option>
											<option value="10:00 AM">10:00 AM</option>
											<option value="10:30 AM">10:30 AM</option>
											<option value="11:00 AM">11:00 AM</option>
											<option value="11:30 AM">11:30 AM</option>
											<option value="1:00 PM">1:00 PM</option>
											<option value="1:30 PM">1:30 PM</option>
											<option value="2:00 PM">2:00 PM</option>
											<option value="2:30 PM">2:30 PM</option>
											<option value="3:00 PM">3:00 PM</option>
											<option value="3:30 PM">3:30 PM</option>
											<option value="4:00 PM">4:00 PM</option>
											<option value="4:30 PM">4:30 PM</option>
											<option value="5:00 PM">5:00 PM</option>
											<option value="5:30 PM">5:30 PM</option>
										</select>
									</div>
								</div>
							</div>
							<div class="date-details">
								
							</div>
							
						</fieldset>
					</div>
					
					<div id="ap-confirm-details" style="display:none;">
						<fieldset>
							<legend>Confirmation</legend>
							<div class="form-group">
								<p style="font-size:12px; text-align:left;"><strong><span class="label label-success">Info</span> : After confirming your appointment.<br> 
								You will recieve email for verification process.</p>
							
								<button type="button" class="btn btn-success btn-block " id="confirm-proceed">Confirm and Proceed</button>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box large">
					<h2>MyClinicSoft</h2>
					Welcome to myclinicsoft – were doctors are in.<br>
					Join our mailing list <a href="https://goo.gl/forms/tFesbxqIdBPOh7Gh1" target="_blank">HERE</a>
					<div id="supports">
						<ul>
							<li>Other Supports</li>
							<li>Fullscreen Ability</li>
							<li>Layouts and Skins</li>
							<li>Responsive</li>
							<li>Chats</li>
							<li>Print RX</li>
							<li>Queing</li>
							<li>Import / Export</li>
							<li>SMS</li>
							<li>Patients Portal</li>
							<li>Templates</li>
							<li>Roles & Permissions</li>
							<li>Appointments</li>
							<li>Multi Language</li>
							<li>Notifications</li>
						</ul>
						<ul>
							<li>Record Supports</li>
							<li>Temperature</li>
							<li>Weight</li>
							<li>Endorsement</li>
							<li>Next visit</li>
							<li>Medications</li>
							<li>Lab test Results</li>
							<li>Immunisation</li>
							<li>Height</li>
							<li>Files</li>
							<li>Family History</li>
							<li>Conditions</li>
							<li>Blood Pressure</li>
							<li>Blood Glucose</li>
							<li>Allergies</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<!-- # Core JavaScript Files -->

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="<?php echo site_url();?>Landing_Page/js/libs/jquery-2.0.2.min.js"><\/script>');
			}
		</script>

		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?php echo site_url();?>Landing_Page/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>
		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo base_url(); ?>js/app.config.js"></script>
		<!-- MAIN APP JS FILE -->
		<script src="<?php echo base_url(); ?>js/app.min.js"></script>
		<!-- BOOTSTRAP JS -->
		<script src="<?php echo site_url();?>Landing_Page/js/bootstrap/bootstrap.min.js"></script>

		<!--js/plugin/bootstrap-ajax-typeahead/demo/assets/js/bootstrap.min.js
		js/plugin/bootstrap-ajax-typeahead/demo/assets/js/jquery.mockjax.js-->
		<!--<link href="<?php echo site_url();?>css/bootstrap.min.css" rel="stylesheet">-->
		<script src="<?php echo site_url();?>js/plugin/bootstrap-ajax-typeahead/js/bootstrap-typeahead.min.js"></script>
		<!--<script src="<?php echo site_url();?>js/typeahead.bundle.js"></script>-->
		
		<script type="text/javascript">

			var site = '<?php echo site_url();?>';
			var base = '<?php echo base_url();?>';
			
			$( document ).ready(function() {
				$('.datepicker').datepicker( {
					onSelect: function(date) {
						$('#schedule_time').removeAttr('disabled').focus();
					},
					selectWeek: true,
					changeMonth: true,
					changeYear: true,
					showWeek: true,
					firstDay: 1
				});
				
				$(document).on('change', '#schedule_time', function (e) {
					var stime = $('#schedule_time option:selected').val();
					var sdate = $('#schedule_date').val();
					var stitle = $('#title').val();
					var sdesc = $('#description').val();
					
					$.ajax({ 
						type: 'POST', 
						url: site +'welcome/get_schedule', 
						data: {
							theTime : stime,
							theDate : sdate,
							theTitle : stitle,
							theDescription : sdesc
						}, 
						dataType:'json',
						success: function (res) { 
							console.log(res);

							$('.datefields').slideUp('fast');
							
							var tempt = '<div class="media">'+
											'<div class="media-body">'+
												'<span class="remove" id="date-schedule"><i class="fa fa-close"></i></span>'+
												'<h5 class="mt-0">'+res.theTitle+'</h5>'+
												'<p>Description : '+res.theDescription+'</p>'+
												'<p>Date : '+res.theDate+'<span>'+res.theTime+'</span></p>'+
											'</div>'+
										'</div>';

							$(tempt).appendTo('.date-details');

							check_all_details();
						}
					});

					e.preventDefault();
				});

				$(document).on('click', '.option', function (e) {

					var option_id = $(this).attr('id');
					$.ajax({ 
						type: 'POST', 
						url: site +'welcome/get_option', 
						data: {
							option : option_id
						}, 
						dataType:'json',
						success: function (res) { 
							console.log(res);
							
							$('.option').removeClass('selected');
							$('#'+option_id).addClass('selected');
							$('.forms').slideUp('fast');
							$('#form-'+option_id).slideDown('fast');
							$('.fields').slideDown('fast');
							$('#ap-patient-details').slideDown('fast');
							$(".patient-new-details").empty();
							$(".patient-registered-details").empty();
							
							check_all_details();
						}
					});
					
					e.preventDefault();
				});
				
				$(document).on('click', '#remove-patient', function (e) {
					
					$.ajax({ 
						type: 'POST', 
						url: site +'welcome/clear_patient', 
						data: {}, 
						success: function (res) { 
							console.log(res);
							
							$('.option').each(function(i, obj) {
								if($(this).hasClass('selected')){
									var option_id = $(this).attr('id');
									$('#'+option_id).removeClass('selected');
								}
							});

							if($.trim($(".doctor-details").html()) == ''){
								$('#ap-doctors-details').slideUp('fast');
							}
							$('#ap-patient-details').slideUp('fast');
							$('.patient-registered-details').empty();
							$('.patient-new-details').empty();
							
							check_all_details();
						}
					});

					e.preventDefault();
				});
				
				$(document).on('click', '#remove-doctor', function (e) {
						
					$.ajax({ 
						type: 'POST', 
						url: site +'welcome/clear_doctor', 
						data: {}, 
						success: function (res) { 
							console.log(res);
							if($.trim($(".date-details").html()) == ''){
								$('#ap-date-details').slideUp('fast');
								$('.date-details').empty();
								$('#ap-confirm-details').hide();
							}
							
							$('.dfields').slideDown('fast');
							$('.datefields').slideUp('fast');
							$('.doctor-details').empty();
							
							check_all_details();
						}
					});
					e.preventDefault();
					
				});
				
				$(document).on('click', '#date-schedule', function (e) {
					
					$.ajax({ 
						type: 'POST', 
						url: site +'welcome/clear_schedule', 
						data: {}, 
						success: function (res) { 
							console.log(res);
							$('.datefields').slideDown('fast');
							$('.date-details').empty();
							$('#ap-confirm-details').hide();
							
							check_all_details();
						}
					});
					e.preventDefault();
				});

				$(document).on('click', '#confirm-proceed', function (e) {

					$.ajax({ 
						type: 'POST', 
						url: site +'welcome/confirm', 
						data: {}, 
						dataType:'json',
						success: function (res) { 
							console.log(res);
							if(res.status){
								
								$('#ap-confirm-details').hide();
								$('#ap-date-details').hide();
								$('#ap-doctors-details').hide();
								$('#ap-patient-details').hide();
								
								$('.date-details').empty();
								$('.doctor-details').empty();
								$('.patient-registered-details').empty();
								$('.patient-new-details').empty();

								if($('#ap-option').find('.option').hasClass('selected')){
									$(this).removeClass('selected');
								}
								
								alert(res.msg);
								
							}else{
								
								alert(res.msg);
								
							}
							
						}
					}); 
					e.preventDefault();
					
				});

				var validatefunction = function() {
					
					$("#step-1").validate({
						rules : {
							firstname : {
								required : true,
								maxlength: 50
							},
							lastname : {
								required : true,
								maxlength: 50
							},
							address : {
								required : true,
								maxlength: 300
							},
							contact : {
								required : true,
								maxlength: 12
							}
						},
						// Messages for form validation
						messages : {
							firstname : {
								required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'firstname');?>',
								maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 50);?></span>'
							},
							lastname : {
								required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'lastname');?>',
								maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 50);?></span>'
							},
							address : {
								required : '<i class="fa fa-exclamation-circle"></i><?php echo sprintf($this->lang->line('__validate_required'), 'address');?>',
								maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 300);?>'
							},
							contact : {
								required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'contact');?>',
								maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 12);?>'
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
						submitHandler : function(form) {
							
							$(form).ajaxSubmit({
								beforeSend: function () {
									$('#submit-patient-info').html('<?php echo $this->lang->line('__common_please_wait');?>');
									$('#submit-patient-info').attr("disabled", "disabled");
								},
								success:function(res)
								{
									console.log(res);
										
									$('#submit-patient-info').text('Continue');
									$('#submit-patient-info').removeAttr("disabled");
									//firstname: "Shaunjoe", lastname: "Rebucas", address: "try", contact: "09303383236", id: "-1"
									var temp = '<div class="media">'+
										'<img class="d-flex mr-3" src="'+ base +'/img/avatars/blank.png" alt="64x64" style="width: 64px; height: 64px;" data-holder-rendered="true">'+
										'<div class="media-body">'+
											'<span class="remove" id="remove-patient"><i class="fa fa-close"></i></span>'+
											'<h5 class="mt-0">'+res.firstname+' '+res.lastname+'</h5>'+
											'<p>Contact : '+res.contact+'</p>'+
											'<p>Address : '+res.address+'</p>'+
										'</div>'+
									'</div>';
									$(temp).appendTo('.patient-new-details');
									
									if($.trim($(".doctor-details").html()) == ''){
										$('#ap-doctors-details').slideDown('fast');
									}
									
									$('.fields').slideUp('fast');
									
									check_all_details();
								},
								dataType:'json'
							});
						}
					});
					
					$("#step-2").validate({  //20170604-24851369
						rules : {
							patient_token : {
								required : true,
								maxlength: 17
							}
						},
						// Messages for form validation
						messages : {
							patient_token : {
								required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'patient token');?>',
								maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 17);?></span>'
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
						submitHandler : function(form) {
							
							$(form).ajaxSubmit({
								beforeSend: function () {
									$('#submit-patient-info').html('<?php echo $this->lang->line('__common_please_wait');?>');
									$('#submit-patient-info').attr("disabled", "disabled");
								},
								success:function(res)
								{

									if($.trim(res.id).length == 0){

										var temp = '<p class="text-center alert alert-info"><span><i class="fa fa-exclamation-circle"></i> Sorry this token are not found in our records!<span></p>';
									
									}else{
										
										$('.fields').slideUp('fast');

										if($.trim(res.avatar).length == 0){ 
											img = '<img class="d-flex mr-3" src="'+ base +'/img/avatars/blank.png" alt="64x64" style="width: 64px; height: 64px;" data-holder-rendered="true">';
										}else{
											img = '<img class="d-flex mr-3" src="'+ base +'/uploads/'+ res.license_key + '/profile-picture/'+ res.avatar+'" alt="64x64" style="width: 64px; height: 64px;" data-holder-rendered="true">';
										}
										var temp = '<div class="media">'+
											img +
											'<div class="media-body">'+
												'<span class="remove" id="remove-patient"><i class="fa fa-close"></i></span>'+
												'<h5 class="mt-0">'+res.firstname+' '+res.lastname+'</h5>'+
												'<p>Contact : '+res.mobile+'</p>'+
												'<p>Address : '+res.address+'</p>'+
											'</div>'+
										'</div>';
									}
									
									$(temp).appendTo('.patient-registered-details');
									
									if($.trim($(".doctor-details").html()) == ''){
										$('#ap-doctors-details').slideDown('fast');
									}
									
									check_all_details();
									
								},
								dataType:'json'
							});
						}
					});
					
				}
				loadScript(base+"js/plugin/jquery-validate/jquery.validate.min.js", function(){
					loadScript(base+"js/plugin/jquery-form/jquery-form.min.js", validatefunction);
				});
				
				loadScript(base+"js/plugin/bootstrap-timepicker/bootstrap-timepicker.min.js", runTimePicker);
	
				function runTimePicker() {
					$('.timepicker').timepicker();
				}
	
				$('.typeahead').typeahead({
					onSelect: function(item) {
						displayResult(item);
					},
					ajax: {
						url: site +'welcome/get_doctors',
						timeout: 500,
						displayField: "name",
						valueField: "id",
						triggerLength: 1,
						method: "get",
						dataType: "json",
						preDispatch: function (query) {
							//showLoadingMask(true);
							return {
								search: query
							}
						},
						preProcess: function (data) {

							if (data.success === false) {
								return false;
							}else{
								return data;    
							}                
						}               
					}
				});

				function displayResult(item) {
					
					$.ajax({ 
						type: 'POST', 
						url: site +'welcome/get_info_doctor', 
						data: {
							id : item.value
						}, 
						dataType:'json',
						success: function (res) { 
							console.log(res);
							
							if(res.subscription_id != 1){
	
								var temp = '<div class="media">'+
										'<img class="d-flex mr-3" src="'+ base +'/uploads/'+ res.license_key + '/profile-picture/'+ res.avatar+'" alt="64x64" style="width: 64px; height: 64px;" data-holder-rendered="true">'+
										'<div class="media-body">'+
											'<span class="remove" id="remove-doctor"><i class="fa fa-close"></i></span>'+
											'<h5 class="mt-0">'+res.firstname+' '+res.lastname+'</h5>'+
											'<p>Contact : '+res.mobile+'</p>'+
											'<p>Address : '+res.address+'</p>'+
										'</div>'+
									'</div>';
							}else{
								
								var temp = '<p class="text-center alert alert-info"><span><i class="fa fa-exclamation-circle"></i> This doctor is not yet ready!<span></p>';
								
							}
							
							$(temp).appendTo('.doctor-details');

							if($.trim($(".date-details").html()) == ''){
								$('#ap-date-details').slideDown('fast');
								$('.datefields').slideDown('fast');
								$('.date-details').empty();
							}
							$('.dfields').slideUp('fast');
							check_all_details();
						}
					});

				} 
				
				function check_all_details(){ // 
					if($.trim($(".date-details").html()) != '' && $.trim($(".doctor-details").html()) != '' && $.trim($(".patient-new-details").html()) != ''){
						$('#ap-confirm-details').show();
					}else if($.trim($(".date-details").html()) != '' && $.trim($(".doctor-details").html()) != '' && $.trim($(".patient-registered-details").html()) != ''){
						$('#ap-confirm-details').show();
					} else {
						$('#ap-confirm-details').hide();
					}
					
				}
			});
			

		</script>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-97921472-1', 'auto');
		  ga('send', 'pageview');

		</script>

	</body>

</html>
