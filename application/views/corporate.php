<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">

	<meta name="description" content="MyClinicSoft is a Web Apllication Software for Small to Big Clinics.">
	<meta name="author" content="Randy Rebucas (randycrebucas.com)">
	<meta name="keywords" content="clinic, myclinicsoft, clinic web application, clinical application">
	
	<title>MyClinicSoft</title>
	<meta name="robots" content="index, follow" />
	<meta name="google-site-verification" content="rWQKdkTjUlQrUfn2u19c2VIi8j8mcVFi7P3YUd_JqA4" />
	<meta name="msvalidate.01" content="" />
	<link rel="canonical" href="<?php echo site_url();?>">
	
	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<!-- Bootstrap itself -->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/magister.css">
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- Fonts -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
	<style>
		* {
			color: #fff !important;
		}
		.bg-blur {
			background: rgb(39, 59, 66);
			background: rgba(39, 59, 66, 0.4);
		}
		.tagline {
			margin-bottom: 1em;
		}

	</style>
</head>

<!-- use "theme-invert" class on bright backgrounds, also try "text-shadows" class -->
<body class="theme-invert">


<!-- Main (Home) section -->
<section class="section" id="head">
	<div class="container bg-blur">

		<div class="row">
			<div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 text-center">	

				<!-- Site Title, your name, HELLO msg, etc. -->
				<h1 class="title">MyClinicSoft</h1>
				<h2 class="subtitle">Multi Clinical Web Application</h2>

				<!-- Short introductory (optional) -->
				<h3 class="tagline">
					Welcome to myclinicsoft – were doctors are in.<br>
				</h3>
				
				<!-- Nice place to describe your site in a sentence or two -->
				<p class=""><a href="<?php echo site_url('auth/login');?>" class="btn btn-success btn-lg">Login</a> &nbsp; <a href="<?php echo site_url('auth/register');?>" class="btn btn-default btn-lg">Register</a></p>
	
			</div> <!-- /col -->
		</div> <!-- /row -->
		<div class="row">
			<div class="col-sm-4 col-sm-offset-2">    
				<h5><strong>Other Supports</strong></h5>
				<div class="col-md-6">
					<ul class="list-unstyled">
						<li>Fullscreen Ability</li>
						<li>Layouts and Skins</li>
						<li>Responsive</li>
						<li>Chats</li>
						<li>Print RX</li>
						<li>Queing</li>
						<li>Import / Export</li>
					</ul>
				</div>
				<div class="col-md-6">
					<ul class="list-unstyled">	
						<li>SMS</li>
						<li>Patients Portal</li>
						<li>Templates</li>
						<li>Roles & Permissions</li>
						<li>Appointments</li>
						<li>Multi Language</li>
						<li>Notifications</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-4">
				<h5><strong>Record Supports</strong></h5>    
				<div class="col-md-6">
					<ul class="list-unstyled">
						<li>Temperature</li>
						<li>Weight</li>
						<li>Endorsement</li>
						<li>Next visit</li>
						<li>Medications</li>
						<li>Lab test Results</li>
						<li>Immunisation</li>
					</ul>
				</div>
				<div class="col-md-6">
					<ul class="list-unstyled">	
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
		
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 text-center">
				<ul class="list-inline list-social">
					<li class="hidden"><a href="https://twitter.com/serggg" class="btn btn-link"><i class="fa fa-twitter fa-fw"></i> Twitter</a></li>
					<li class="hidden"><a href="https://github.com/pozhilov" class="btn btn-link"><i class="fa fa-github fa-fw"></i> Github</a></li>
					<li class="hidden"><a href="http://linkedin/in/pozhilov" class="btn btn-link"><i class="fa fa-linkedin fa-fw"></i> LinkedIn</a></li>
					<li><a href="https://business.facebook.com/myclinicsoftware/" class="btn btn-link" target="_blank"><i class="fa fa-facebook fa-fw"></i> Facebook</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>


<!-- Load js libs only when the page is loaded. -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="assets/js/modernizr.custom.72241.js"></script>
<!-- Custom template scripts -->
<script src="assets/js/magister.js"></script>

</body>
</html>