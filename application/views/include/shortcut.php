<div id="shortcut">
	<ul>
		<li>
			<a href="<?php echo site_url('mail/inbox');?>" class="hidden jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
		</li>
		<li class="hidden">
			<a href="<?php echo site_url('calendar');?>" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
		</li>
		<li class="">
			<a href="<?php echo site_url('my-profile/'.$user_info->id);?>" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
		</li>
	</ul>
</div>