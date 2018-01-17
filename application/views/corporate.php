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
	<link rel="stylesheet" href="<?php echo site_url();?>assets/css/magister.css">
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<!-- Fonts -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
</head>

<!-- use "theme-invert" class on bright backgrounds, also try "text-shadows" class -->
<body class="theme-invert">

<nav class="mainmenu">
	<div class="container">
		<div class="dropdown">
			<button type="button" class="navbar-toggle" data-toggle="dropdown"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<!-- <a data-toggle="dropdown" href="#">Dropdown trigger</a> -->
			<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
				<li><a href="#head" class="active">Welcome</a></li>
				<li><a href="#features">Features</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Get in touch</a></li>
			</ul>
		</div>
	</div>
</nav>


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
					Join our mailing list <a href="https://goo.gl/forms/tFesbxqIdBPOh7Gh1" target="_blank">HERE</a>
				</h3>
				
				<!-- Nice place to describe your site in a sentence or two -->
				<p class=""><a href="<?php echo site_url('auth/login');?>" class="btn btn-success btn-lg">Login</a> &nbsp; <a href="<?php echo site_url('auth/register');?>" class="btn btn-default btn-lg">Register</a></p>
	
			</div> <!-- /col -->
		</div> <!-- /row -->
	
	</div>
</section>

<!-- Second (About) section -->
<section class="section" id="features">
	<div class="container bg-blur">
	
		<h2 class="text-center title">Features</h2>
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
	</div>
</section>

<!-- Third (Works) section -->
<section class="section" id="about">
	<div class="container bg-blur">
	
		<h2 class="text-center title">About</h2>
		<p class="lead text-center"></p>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-2">
				<div class="thumbnail">
					<img src="<?php echo site_url();?>assets/images/female-profile-blank.png" alt="">
					<div class="caption">
						<h3>Irma Barbara B. Taganas-Guibone <small>M.D </small></h3>
						<p>Founder - [ CEO, CFO ]</p>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="thumbnail">
					<img src="<?php echo site_url();?>assets/images/avatar.png" alt="">
					<div class="caption">
						<h3>Randy Cagabhion Rebucas <br><small>- Senior Analyst</small></h3>
						<p>Co-Founder - [ COO, CTO ]</p>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>

<!-- Fourth (Contact) section -->
<section class="section" id="contact">
	<div class="container bg-blur">
	
		<h2 class="text-center title">Get in touch</h2>

		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 text-center">
				<p class="lead">Have a question about myclinicsoft, or want to suggest a new feature?</p>
				<p>Feel free to email us, or message us Facebook!</p>
				<p><b><a href="mailto:corewen2015@gmail.com">coreweb2015@gmail.com</a></b><br><br></p>
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