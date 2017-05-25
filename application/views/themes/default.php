<!DOCTYPE html>
<html lang="en-us">
	
	<head>
<link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="/arrowchat/external.php?type=css" charset="utf-8" />
<script type="text/javascript" src="/arrowchat/includes/js/jquery.js"></script>
<script type="text/javascript" src="/arrowchat/includes/js/jquery-ui.js"></script>
		<meta charset="utf-8">
		<title><?php echo $title; ?></title>
		<meta name="google-site-verification" content="rWQKdkTjUlQrUfn2u19c2VIi8j8mcVFi7P3YUd_JqA4" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<?php
		/** -- Copy from here -- */
		if(!empty($meta))
		foreach($meta as $name=>$content){
			echo "\n\t\t";
			?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
				 }
		echo "\n";

		if(!empty($canonical))
		{
			echo "\n\t\t";
			?><link rel="canonical" href="<?php echo $canonical?>" /><?php

		}
		echo "\n\t";

		foreach($css as $file){
		 	echo "\n\t\t";
			?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
		} echo "\n\t";
		?>
		<!-- #CSS Links -->
		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/smartadmin-skins.min.css">

		<!-- DEV links : turn this on when you like to develop directly -->
		<!--<link rel="stylesheet" type="text/css" media="screen" href="../Source_UNMINIFIED_CSS/smartadmin-production.css">-->
		<!--<link rel="stylesheet" type="text/css" media="screen" href="../Source_UNMINIFIED_CSS/smartadmin-skins.css">-->

		<!-- SmartAdmin RTL Support -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/smartadmin-rtl.min.css"> 

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/demo.min.css">

		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url(); ?>img/favicon/favicon.ico" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- #APP SCREEN / ICONS -->
		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="<?php echo base_url(); ?>img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>img/splash/touch-icon-ipad-retina.png">
		
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		
		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="<?php echo base_url(); ?>img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="<?php echo base_url(); ?>img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="<?php echo base_url(); ?>img/splash/iphone.png" media="screen and (max-device-width: 320px)">
		<style type="text/css">

			.user {
			    width: 45% !important;
			}
			div#future-updates {
			    opacity: .2;
			    cursor: help;
			}
			div#empty-content {
				text-align: center;
				    padding: 10%;
			}
			div#details-bottom {
				background: #fafafa;
				margin: 10px auto;
				padding: 18px 0px 0px 0px;
				border: 1px solid #c2c2c2;
			}
			div#details-top img {
				margin-right: 10px;
			}
			div#details-top h1 {
				margin-bottom: 10px;
			}
			div#details-top span {
				color: darkred;
				font-size: 22px;
			}
			li.list-group-item label.medicine,
			li.list-group-item label.prep,
			li.list-group-item label.sig{
				width: 31%;
				margin: 0px !important;
			}
			.table>tbody>tr>td:last-child, .table>tbody>tr>th:last-child, .table>thead>tr>td:last-child, .table>thead>tr>th:last-child {
				text-align: right;
			}
			#table-patients>thead, #table-role>thead, #table-appointment>thead, #table-templates>thead{
				display: none;
			}
			.table {
				width: 100%;
			}
			.dt-toolbar .dataTables_length {
				float: right;
			}
			.dataTables_wrapper .dataTables_processing {
				position: absolute;
				top: 100%;
				left: 50%;
				width: 30%;
				height: 65px;
				margin-left: -20%;
				margin-top: -25px;
				padding-top: 20px;
				text-align: center;
				font-size: 1.2em;
				background: #3a3633;
				color: #fff;
			}
			td.dataTables_empty {
			    text-align: center !important;
			}
			.profile-pic a {
			    visibility: hidden;
			    position: absolute;
			    top: -24px;
			    right: 9px;
			    z-index: 4;
			    background: white;
			    padding: 1px 4px;
			}
			.profile-pic:hover a {
			    visibility: visible;
			}
		</style>


	</head>

	<!--

	TABLE OF CONTENTS.
	
	Use search to find needed section.
	
	===================================================================
	
	|  01. #CSS Links                |  all CSS links and file paths  |
	|  02. #FAVICONS                 |  Favicon links and file paths  |
	|  03. #GOOGLE FONT              |  Google font link              |
	|  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
	|  05. #BODY                     |  body tag                      |
	|  06. #HEADER                   |  header tag                    |
	|  07. #PROJECTS                 |  project lists                 |
	|  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
	|  09. #MOBILE                   |  mobile view dropdown          |
	|  10. #SEARCH                   |  search field                  |
	|  11. #NAVIGATION               |  left panel & navigation       |
	|  12. #MAIN PANEL               |  main panel                    |
	|  13. #MAIN CONTENT             |  content holder                |
	|  14. #PAGE FOOTER              |  page footer                   |
	|  15. #SHORTCUT AREA            |  dropdown shortcuts area       |
	|  16. #PLUGINS                  |  all scripts and plugins       |
	
	===================================================================
	
	-->
	
	<!-- #BODY -->
	<!-- Possible Classes

		* 'smart-style-{SKIN#}'
		* 'smart-rtl'         - Switch theme mode to RTL
		* 'menu-on-top'       - Switch to top navigation (no DOM change required)
		* 'no-menu'			  - Hides the menu completely
		* 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
		* 'fixed-header'      - Fixes the header
		* 'fixed-navigation'  - Fixes the main menu
		* 'fixed-ribbon'      - Fixes breadcrumb
		* 'fixed-page-footer' - Fixes footer
		* 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
	-->
	<body class="smart-style-0">

		<!-- #HEADER -->
		<?php echo $this->load->get_section('header'); ?>
		
		<!-- END HEADER -->

		<!-- #NAVIGATION -->
		<!-- Left panel : Navigation area -->
		
		<?php echo $this->load->get_section('sidebar'); ?>
	
		<!-- END NAVIGATION -->
		
		<!-- #MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<?php echo $this->load->get_section('ribbon'); ?>
			<!-- END RIBBON -->

			<!-- #MAIN CONTENT -->
			<div id="content">
					<h1><i class="fa fa-cog fa-spin"></i> Loading...</h1>
			</div>
			
			<!-- END #MAIN CONTENT -->

		</div>
		<!-- END #MAIN PANEL -->

		<!-- #PAGE FOOTER -->
		<?php echo $this->load->get_section('footer'); ?>
		
		<!-- END FOOTER -->

		<!-- #SHORTCUT AREA : With large tiles (activated via clicking user name tag)
			 Note: These tiles are completely responsive, you can add as many as you like -->
		<?php echo $this->load->get_section('shortcut'); ?>
		
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->
		<script type="text/javascript">
		var BASE_URL = '<?php echo base_url();?>';
			var countrySelected = '<?php echo $this->config->item('default_country');?>';
			var stateSelected = '<?php echo $this->config->item('default_state');?>';
			var citySelected = '<?php echo $this->config->item('default_city');?>';
		</script>
		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->
		
		<!-- #PLUGINS -->
		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="<?php echo base_url(); ?>js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?php echo base_url(); ?>js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo base_url(); ?>js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="<?php echo base_url(); ?>js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url(); ?>js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?php echo base_url(); ?>js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?php echo base_url(); ?>js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?php echo base_url(); ?>js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="<?php echo base_url(); ?>js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?php echo base_url(); ?>js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?php echo base_url(); ?>js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="<?php echo base_url(); ?>js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?php echo base_url(); ?>js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="<?php echo base_url(); ?>js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices: you can disable this in app.js -->
		<script src="<?php echo base_url(); ?>js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
		<![endif]-->

		<!-- Demo purpose only -->
		<!-- <script src="<?php echo base_url(); ?>js/demo.min.js"></script>-->

		<!-- MAIN APP JS FILE -->
		<script src="<?php echo base_url(); ?>js/app.min.js"></script>

		<!-- MAIN APP JS FILE -->
		<script src="<?php echo base_url(); ?>js/ajaxnav.js"></script>
		<script src="<?php echo base_url(); ?>js/locations.js"></script>
		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="<?php echo base_url(); ?>js/speech/voicecommand.min.js"></script>

		<!-- SmartChat UI : plugin -->
		<script src="<?php echo base_url(); ?>js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="<?php echo base_url(); ?>js/smart-chat-ui/smart.chat.manager.min.js"></script>
		<?php foreach($js as $file){
			echo "\n\t\t";
			?><script src="<?php echo $file; ?>"></script>
		<?php } echo "\n\t"; ?>
		<!-- Your GOOGLE ANALYTICS CODE Below -->

		<script type="text/javascript">
			BASE_URL = '<?php echo base_url();?>';
			
			que_counts();
			que_get();
			
			setInterval(function(){
				var counts = $('span#que-counts').html();
				var xcounts = $('span#running-que-counts').html();
				$.ajax({
					url: BASE_URL+'queing/get_counts',
					type: 'post',   
					dataType: 'json',
					success: function (res) {
						$('#running-que-counts').html(res.counts);
					}
				});

				if(counts != xcounts){
					que_get();
					$('span#que-counts').text($('#running-que-counts').html());
				}
				
			},3000);
			
			function que_counts(){
				$.ajax({
					url: BASE_URL+'queing/get_counts',
					type: 'post',   
					dataType: 'json',
					success: function (res) {
						$('#que-counts').html(res.counts);
					}
				});
			}
			
			function que_get(){
				$.ajax({
					url: BASE_URL+'queing/get_in',
					type: 'post',   
					dataType: 'html',
					beforeSend: function () {
						$('.project-context').find('ul.dropdown-menu').remove();
					},
					success: function (response) {
						$(response).appendTo( $( ".project-context" ) );
					}
				});
			}
			
		</script>
		
		<script type="text/javascript" src="/arrowchat/external.php?type=djs" charset="utf-8"></script>
<script type="text/javascript" src="/arrowchat/external.php?type=js" charset="utf-8"></script>

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