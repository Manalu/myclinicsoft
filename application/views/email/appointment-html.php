<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Myclinicsoft Appointment notification!</title>
	</head>
	<body>
		<div style="max-width: 800px; margin: 0; padding: 30px 0;">
			<table width="80%" border="0" cellpadding="0" cellspacing="0">
				<tr>

					<td width="5%"></td>
					<td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
						Greetings from <a href="{{app_url}}">{{sitename}}</a>!<br/><br/>
						<h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">
							Hi {{dfirstname}}, {{dlastname}} 
						</h2>
						<br /><br />
						
						We send you this email informing that you have an ongoing appointment this coming {{theDate}} {{theTime}}
						
						<h3>Appointment Details</h3>
						From : {{pfirstname}}, {{plastname}}<br />
						Address : {{paddress}} <br />
						Contact : {{pcontact}} <br />
						<hr>
						{{theTitle}}<br />
						{{theDescription}}<br /> <br /> <br />
						
						<big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="<?php echo site_url(); ?>appointment/verify/{{appointment_token}}" style="color: #3366cc;">Verify</a></b></big><br />
						<br />
						Link doesn't work? Copy the following link to your browser address bar:<br />
						<nobr><a href="<?php echo site_url(); ?>appointment/verify/{{appointment_token}}" style="color: #3366cc;"><?php echo site_url(); ?>appointment/verify/{{appointment_token}}</a></nobr><br />
						<br />
						
						Cheers !<br />
						{{sitename}} Team
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>