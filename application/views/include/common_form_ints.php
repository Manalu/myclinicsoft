
	

<fieldset>
	<div class="row">
		<section class="col col-5">
			<label for="first_name"><?php echo $this->lang->line('common_first_name');?></label>
			<label class="input">
				<?php if($info->id != ''){ ?>
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="firstname" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="<?php echo $this->lang->line('common_first_name');?>"><?php echo $info->firstname;?></a>
				<?php }else{ ?>
					<input type="text" name="first_name" id="first_name" value="<?php echo set_value('first_name', $info->firstname);?>" placeholder="<?php echo $this->lang->line('common_first_name');?>" tabindex="5">
			
				<?php } ?>
				
			</label>
		</section>
		<section class="col col-2">
			<label for="mi"><?php echo $this->lang->line('common_mi');?></label>
			<label class="input">
				<?php if($info->id != ''){ ?>
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="mi" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="<?php echo $this->lang->line('common_mi');?>"><?php echo $info->mi;?></a>
				<?php }else{ ?>
					<input type="text" name="mi" id="mi" value="<?php echo set_value('mi', $info->mi);?>" placeholder="<?php echo $this->lang->line('common_mi');?>" tabindex="6">
			
				<?php } ?>
				
			</label>
		</section>
		<section class="col col-5">
			<label for="last_name"><?php echo $this->lang->line('common_last_name');?></label>
			<label class="input">
				<?php if($info->id != ''){ ?>
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="lastname" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="<?php echo $this->lang->line('common_last_name');?>"><?php echo $info->lastname;?></a>
				<?php }else{ ?>
					<input type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name', $info->lastname);?>" placeholder="<?php echo $this->lang->line('common_last_name');?>" tabindex="7">
			
				<?php } ?>
				
			</label>
		</section>
	</div>
	<div class="row">
		<section class="col col-4">
			<label for="state"><?php echo $this->lang->line('common_mobile');?></label>
			<label class="input">
				<?php if($info->id != ''){ ?>
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="mobile" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="<?php echo $this->lang->line('common_mobile');?>"><?php echo $info->mobile;?></a>
				<?php }else{ ?>
					<input type="text" name="mobile" id="mobile" value="<?php echo set_value('mobile', $info->mobile);?>" placeholder="<?php echo $this->lang->line('common_mobile');?>" tabindex="8">
			
				<?php } ?>
				
			</label>
		</section>
		<section class="col col-4">
			<label for="gender"><?php echo $this->lang->line('__gender');?></label>
			<label class="select">
				<?php if($info->id != ''){ ?>
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="gender" class="editable xeditable_select" data-type="select" data-pk="<?php echo $info->id;?>" data-original-title="Gender">
					<?php 
					if($info->gender == 1){
						echo 'Male';
					}else{
						echo 'Female';
					}
					?>
					</a>
				<?php }else{ ?>
					<?php $gender = array(
						''=>'select',
						'1'=> $this->lang->line('__common_male'),
						'2'=> $this->lang->line('__common_female')
					);
					echo form_dropdown('gender',$gender, $info->gender,'tabindex="18" id="gender"'); ?>
					<i></i>
				<?php } ?>
				
			</label>
		</section>
		<section class="col col-4">
			<label for="gender"><?php echo $this->lang->line('__birthdate');?></label>
			<label class="input"> 
				<?php if($info->id != ''){ ?>
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="bDay" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="Select day"><?php echo $info->bDay;?></a> /
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="bMonth" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="Select month"><?php echo $info->bMonth;?></a> /
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="bYear" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="Select year"><?php echo $info->bYear;?></a>
				<?php }else{ ?>
				<i class="icon-append fa fa-calendar"></i>
					<input type="text" name="bod" id="bod" placeholder="<?php echo $this->lang->line('__birthdate');?>" tabindex="19" class="datepicker" value="<?php echo set_value('bod', $info->bDay.'/'.$info->bMonth.'/'.$info->bYear);?>" data-dateformat="dd/mm/yy" aria-invalid="false">
			
				<?php } ?>
				
			</label>
		</section>
	</div>
	<div class="row">
		<section class="col col-6">
			<label for="country"><?php echo $this->lang->line('common_country');?></label>
			<label class="select"> 
				<?php if($info->id != ''){ ?>
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="country" class="editable xeditable_select" data-type="select" data-pk="<?php echo $info->id;?>" data-original-title="Enter Country"><?php echo $this->location_lib->info('countries', $info->country)->name;?></a>
				<?php }else{ ?>
					<?php echo form_dropdown('country', $this->location_lib->countries(), $info->country,'id="country"');?> 
				<i></i>
				<?php } ?>
				
			</label>
		</section>
		<section class="col col-6">
			<label for="state"><?php echo $this->lang->line('common_state');?></label>
			<label class="select">
				<?php if($info->id != ''){ ?>
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="state" class="editable xeditable_select" data-type="select" data-pk="<?php echo $info->id;?>" data-original-title="Enter state"><?php echo $this->location_lib->info('states', $info->state)->name;?></a>
				<?php }else{ ?>
					<?php echo form_dropdown('state','', $info->state,'tabindex="11" id="state"'); ?>
				<i></i> 
				<?php } ?>
				
			</label>
		</section>
	</div>
	<div class="row">
		<section class="col col-6">
			<label for="city"><?php echo $this->lang->line('common_city');?></label>
			<label class="select">
				<?php if($info->id != ''){ ?>
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="city" class="editable xeditable_select" data-type="select" data-pk="<?php echo $info->id;?>" data-original-title="Enter City"><?php echo $this->location_lib->info('cities', $info->city)->name;?></a>
				<?php }else{ ?>
					<?php echo form_dropdown('city','', $info->city,'tabindex="12" id="city"'); ?>
				<i></i>
				<?php } ?>
				
			</label>
		</section>
		<section class="col col-6">
			<label for="zip"><?php echo $this->lang->line('common_zip');?></label>
			<label class="input">
				<?php if($info->id != ''){ ?>
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="zip" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="<?php echo $this->lang->line('common_zip');?>"><?php echo $info->zip;?></a>
				<?php }else{ ?>
					<input type="text" name="zip" id="zip" value="<?php echo set_value('zipcode', $info->zip);?>" placeholder="<?php echo $this->lang->line('common_zip');?>" tabindex="13">
			
				<?php } ?>
				
			</label>
		</section>
	</div>
	<section>
		<label for="address"><?php echo $this->lang->line('common_address');?></label>
		<label class="textarea">
			<?php if($info->id != ''){ ?>
				<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="address" class="editable xeditable_textarea" data-type="textarea" data-pk="<?php echo $info->id;?>" data-original-title="<?php echo $this->lang->line('common_address');?>"><?php echo $info->address;?></a>
			<?php }else{ ?>
				<textarea name="address" class="custom-scroll" id="address" placeholder="<?php echo $this->lang->line('common_address');?>" tabindex="15"><?php echo set_value('address', $info->address);?></textarea>
		
			<?php } ?>
			
		</label>
	</section>
	
	<section>
		<input type="checkbox" name="show_advance_form_input" id="show_advance_form_input" value="1" <?php if($option == 1) echo 'checked';?>>	
		<?php echo $this->lang->line('config_show_advance_form_input'); ?>
		<span id="show_advance_form_input_loader" class="pull-right"></span>
	</section>

</fieldset>