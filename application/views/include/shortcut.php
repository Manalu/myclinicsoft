<div id="shortcut">
	<ul>
		<li class="hidden">
			<a href="<?php echo site_url('mail/inbox');?>" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span><?php echo $this->lang->line('__mail');?> <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
		</li>
		<li class="hidden">
			<a href="<?php echo site_url('calendar');?>" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span><?php echo $this->lang->line('__calendar');?></span> </span> </a>
		</li>
		<li class="">
			<a href="<?php echo site_url('my-profile/'.$this->encrypt->encode($user_info->id));?>" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span><?php echo $this->lang->line('__my_profile');?> </span> </span> </a>
		</li>
	</ul>
</div>