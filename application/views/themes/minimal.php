<!DOCTYPE html>
<html lang="en-us" id="lock-page">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title; ?></title>
		<meta name="description" content="">
		<meta name="author" content="">
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

		<!-- SmartAdmin RTL Support -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/smartadmin-rtl.min.css"> 

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/demo.min.css">

		<!-- page related CSS -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>css/lockscreen.min.css">

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
		<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
		<style>
			body{
				font-family: 'Orbitron', sans-serif;
			}
			#que h2 {
				margin: 0px;
				font-size: 36px;
			}
			div#counts-1 {
				font-size: 16em;
				line-height: 1em;
				font-weight: 700;
			}
			div#counts-2 {
				font-size: 10em;
				opacity: .7;
			}
			div#counts-3 {
				font-size: 6em;
				opacity: .5;
			}
			.que-number {
				border-bottom: 1px solid #ccc9c9;
			}
			i#serve-arrow {
				position: absolute;
				left: 16%;
			}
			span#name {
				font-size: 26px;
				position: absolute;
				right: 10%;
			}
			
#clock-large {
font-size:30px;
text-shadow:0px 0px 1px #fff;
}

		</style>
	</head>
	
	<body class="animated fadeInDown">
		
		<span id="que-counts" class="hidden">0</span>
		<span id="running-que-counts" class="hidden">0</span>
		<div id="content" class="">
	
			<?php //echo $output;?>

		</div>
		<!--================================================== -->	

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

		<!--[if IE 8]>
			
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
			
		<![endif]-->


		<?php	
			foreach($js as $file){
					echo "\n\t\t";
					?><script src="<?php echo $file; ?>"></script><?php
			} echo "\n\t";

			/** -- to here -- */
		?>
		<!-- MAIN APP JS FILE -->
		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo base_url(); ?>js/app.config.js"></script>
		<script src="<?php echo base_url(); ?>js/app.min.js"></script>
<script type="text/javascript">
	var BASE_URL = '<?php echo base_url();?>';
	
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
		
	}, 500);
	
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
			url: BASE_URL+'queing/get_list',
			type: 'post',   
			dataType: 'html',
			success: function (response) {
				$('#content').html(response);	
			}
		});
	}
	
	function showTime() {
	        var a_p = "";
	        var today = new Date();
	        var curr_hour = today.getHours();
	        var curr_minute = today.getMinutes();
	        var curr_second = today.getSeconds();
	        if (curr_hour < 12) {
	            a_p = "AM";
	        } else {
	            a_p = "PM";
	        }
	        if (curr_hour == 0) {
	            curr_hour = 12;
	        }
	        if (curr_hour > 12) {
	            curr_hour = curr_hour - 12;
	        }
	        curr_hour = checkTime(curr_hour);
	        curr_minute = checkTime(curr_minute);
	        curr_second = checkTime(curr_second);
	        $('#clock-large').html(curr_hour + " : " + curr_minute + " : " + curr_second + " " + a_p);
        }

    	function checkTime(i) {
	        if (i < 10) {
	            i = "0" + i;
	        }
        	return i;
    	}
    	
    	setInterval(showTime, 500);
    
</script>
	</body>
</html>