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

		
		
		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="<?php echo site_url();?>Landing_Page/img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo site_url();?>Landing_Page/img/favicon/favicon.ico" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
		<style>

			@import url('yui-reset.css');
			* {
				border: 0px solid #eee;
				margin: 0;
				padding: 0;
				list-style: none
			}
			html,
			body,
			#bg,
			#bg table,
			#bg td,
			#cont {
				width: 100%;
				height: 100%;
				overflow: hidden
			}
			body {
				font-family: Arial, Helvetica, sans-serif;
				font-size: 10px;
				cursor: default;
				background: url(loading.gif);
				color: #000
			}
			h1,
			h2,
			.large,
			.left {
				font-family: "Century Gothic", "Lucida Grande", Arial, sans-serif;
				font-size: 40px
			}
			h2,
			.box div img {
				padding-bottom: 10px
			}
			a {
				text-decoration: none;
				color: #000;
				outline: 0
			}
			img {
				display: block
			}
			#bg div {
				position: absolute;
				width: 200%;
				height: 200%;
				top: -50%;
				left: -50%
			}
			#bg td {
				vertical-align: middle;
				text-align: center
			}
			#bg img {
				min-height: 50%;
				min-width: 50%;
				margin: 0 auto
			}
			#cont {
				position: absolute;
				top: 0;
				left: 0;
				z-index: 70;
				overflow: auto
			}
			#menu {
				position: absolute;
				bottom: 20px;
				left: 141px;
				z-index: 80;
				width: 100%;
				line-height: 12px
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
				height: 12px;
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
			div#supports ul li:first-child {
				font-weight: bolder;
				font-size: 16px;
				text-decoration: underline;
			}
		</style>
	</head>

	<!--

	TABLE OF CONTENTS.
	
	Use search to find needed section.
	
	===================================================================
	
	|  01. #MENU                                                      |
	|  02. #INTRO                                                     |
	|  03. #PRICING                                                   |
	|  04. #TEAM                                                      |
	|  05. #FEATURES                                                  |
	|  06. #SCREENSHOT                                                |
	|  07. #UPDATES                                                   |
	|  08. #QUOTES                                                    |
	|  09. #CONTACT                                                   |
	|  10. #BOTTOM CONTENT                                            |
	|  11. #FOOTER                                                    |
	|  12. #Core Javascript                                           |
	|  13. #REVOLUITION SLIDER                                        |
	|  14. #PAGE SCRIPT                                               |
	
	===================================================================
	
	-->

	<body>

		
		<div id="menu">
			<h1><a href="<?php echo site_url('auth/login');?>"><b>LOGIN</b> </a></h1>
			<div>
				<ul>
					<li><a href="http://myclinicsoft.com/blog/" target="_blank">BLOG</a></li>
					<li><a href="https://business.facebook.com/myclinicsoftware/?business_id=1569918473257009" target="_blank">FACEBOOK</a></li>
					<li><a href="javascript:;">TWITTER</a></li>
					<li><a href="javascript:;">YOUTUBE</a></li>
				</ul>
			</div>
		</div>
		<div id="cont" class="col-md-12">
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
		<div id="bg">
			<div>
				<table cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td><img alt="" src="<?php echo base_url();?>img/clinic-slider.jpg"></td>
						</tr>
					</tbody>
				</table>
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

		<!-- BOOTSTRAP JS -->
		<script src="<?php echo site_url();?>Landing_Page/js/bootstrap/bootstrap.min.js"></script>

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
