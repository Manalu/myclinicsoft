
	

<fieldset>
	<div class="row">
		<section class="col col-5">
			<label for="first_name"><?php echo $this->lang->line('common_first_name');?></label>
			<label class="input">
				<input type="text" name="first_name" id="first_name" value="<?php echo set_value('first_name', $info->firstname);?>" placeholder="<?php echo $this->lang->line('common_first_name');?>" tabindex="5">
			</label>
		</section>
		<section class="col col-2">
			<label for="mi"><?php echo $this->lang->line('common_mi');?></label>
			<label class="input">
				<input type="text" name="mi" id="mi" value="<?php echo set_value('mi', $info->mi);?>" placeholder="<?php echo $this->lang->line('common_mi');?>" tabindex="6">
			</label>
		</section>
		<section class="col col-5">
			<label for="last_name"><?php echo $this->lang->line('common_last_name');?></label>
			<label class="input">
				<input type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name', $info->lastname);?>" placeholder="<?php echo $this->lang->line('common_last_name');?>" tabindex="7">
			</label>
		</section>
	</div>
	<div class="row">
		<section class="col col-4">
			<label for="state"><?php echo $this->lang->line('common_mobile');?></label>
			<label class="input">
				<input type="text" name="mobile" id="mobile" value="<?php echo set_value('mobile', $info->mobile);?>" placeholder="<?php echo $this->lang->line('common_mobile');?>" tabindex="8">
			</label>
		</section>
		<section class="col col-4">
			<label for="gender">Gender</label>
			<label class="select">
				<?php $gender = array(
					''=>'select',
					'1'=>'Male',
					'2'=>'Female',
					'3'=>'Undefine'
				);
				echo form_dropdown('gender',$gender, $info->gender,'tabindex="18" id="gender"'); ?>
				<i></i>
			</label>
		</section>
		<section class="col col-4">
			<label for="gender">Birthdate</label>
			<label class="input"> <i class="icon-append fa fa-calendar"></i>
				<input type="text" name="bod" id="bod" placeholder="Birthdate" tabindex="19" class="datepicker" value="<?php echo set_value('bod', $info->bDay.'/'.$info->bMonth.'/'.$info->bYear);?>" data-dateformat="dd/mm/yy" aria-invalid="false">
			</label>
		</section>
	</div>
	<section>
		<label for="address"><?php echo $this->lang->line('common_address');?></label>
		<label class="textarea">
			<textarea name="address" class="custom-scroll" id="address" placeholder="<?php echo $this->lang->line('common_address');?>" tabindex="15"><?php echo set_value('address', $info->address);?></textarea>
	</section>
	<?php if($this->role_id == $this->admin_role_id) { ?>
		<?php //if(!$info->id){ ?>
		<section>
		<label for="username">Username</label>
			<label class="input"> <i class="icon-append fa fa-user"></i>
				<input type="text" name="username" id="username" value="<?php echo set_value('username', $info->username);?>" placeholder="Username" tabindex="1">
				<b class="tooltip tooltip-bottom-right">Needed to enter the website</b> </label>
		</section>

		<section>
		<label for="email">Email</label>
			<label class="input"> <i class="icon-append fa fa-envelope"></i>
				<input type="email" name="email" id="email" value="<?php echo set_value('email', $info->email);?>" placeholder="Email" tabindex="2">
				<b class="tooltip tooltip-bottom-right">Needed to verify your account</b> </label>
		</section>
		<div class="row">
			<section class="col col-6">
			<label for="password">Password</label>
				<label class="input"> <i class="icon-append fa fa-lock"></i>
					<input type="password" name="password" id="password" value="<?php echo set_value('password');?>" placeholder="Password" tabindex="3">
					<b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
			</section>

			<section class="col col-6">
			<label for="confirm_password">Confirm Password</label>
				<label class="input"> <i class="icon-append fa fa-lock"></i>
					<input type="password" name="confirm_password" id="confirm_password" value="<?php echo set_value('confirm_password');?>" placeholder="Confirm Password" tabindex="4">
					<b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
			</section>
		</div>
		<?php //} ?>
		<section>
			<label for="role_id">Role</label>
			<label class="select">
				<?php echo form_dropdown('role_id', $roles, $info->role_id,'tabindex="" id="role_id"');?>
				<i></i>
			</label>
		</section>
	<?php } ?>
	<section>
		<input type="checkbox" name="show_advance_form_input" id="show_advance_form_input" value="1" <?php if($this->config->item('show_advance_form_input') == 1) echo 'checked';?>>	
		<?php echo $this->lang->line('config_show_advance_form_input'); ?>
		<span id="show_advance_form_input_loader" class="pull-right"></span>
	</section>
	
	<div class="row advance">
		<section class="col col-6">
			<label for="country"><?php echo $this->lang->line('common_country');?></label>
			<label class="select">
				<?php echo form_dropdown('country', $this->location_lib->populate(), $info->country,'data-id="1/state" tabindex="10" id="country"');?> 
				<i></i>
			</label>
		</section>
		<section class="col col-6">
			<label for="state"><?php echo $this->lang->line('common_state');?></label>
			<label class="select">
				
				<?php echo form_dropdown('state',$this->location_lib->populate(), $info->state,'data-id="2/city" tabindex="11" id="state"'); ?>
				<i></i> 
			</label>
		</section>
	</div>
	<div class="row advance">
		<section class="col col-6">
			<label for="city"><?php echo $this->lang->line('common_city');?></label>
			<label class="select">
				<?php echo form_dropdown('city',$this->location_lib->populate(), $info->city,'tabindex="12" id="city"'); ?>
                <i></i>
			</label>
		</section>
		<section class="col col-6">
			<label for="zip"><?php echo $this->lang->line('common_zip');?></label>
			<label class="input">
				<input type="text" name="zip" id="zip" value="<?php echo set_value('zipcode', $info->zip);?>" placeholder="<?php echo $this->lang->line('common_zip');?>" tabindex="13">
			</label>
		</section>
	</div>

</fieldset>