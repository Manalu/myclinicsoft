<div class="row">	
	<div class="col-md-12">	
		<fieldset>
			<legend>Appointment Info</legend>
			
			<dl class="dl-horizontal">
				<dt>Date :<dt><dd><?php echo $info->schedule_date;?></dd>
				<dt>Time :<dt><dd><?php echo $info->schedule_time;?></dd>
				<dt>Title :<dt><dd><?php echo $info->title;?></dd>
				<dt>Description :<dt><dd><?php echo $info->description;?></dd>
				<dt>Status :<dt><dd><?php 
							if($info->status == 'Cancel'){
								$status = '<span class="label label-danger">Cancel</span>';
							}else if($info->status == 'Pending'){
								$status = '<span class="label label-warning">Pending</span>';
							}else{
								$status = '<span class="label label-success">Approve</span>';
							}
							echo $status;?></dd>
				<dt>Doctor(s) note :<dt><dd><?php echo ($info->doctor_note) ? $info->doctor_note : '--';?></dd>
				<dt>Patient(s) note :<dt><dd><?php echo $info->patient_name;?></dd>
			</dl>
		</fieldset>
		<fieldset>
			<legend>Doctor Info</legend>
			


			<dl class="dl-horizontal">
				<dt></dt><dd>
				<?php if($client_info->avatar){
					echo '<img src="'.$client_info->avatar.'">';
				}else{
					echo '<img src="' . $this->gravatar->get($client_info->email) . '" />';
				}?>
				</dd>
				<dt>Doctor :<dt><dd><?php echo $client_info->firstname.' '.$client_info->mi.' '.$client_info->lastname;?></dd>
				<dt>Clinic :</dt><dd><?php echo ($this->Appconfig->get($client_info->license_key, 'business_name')) ? $this->Appconfig->get($this->license_id, 'business_name') : '--';?></dd>
				<dt>Email :</dt><dd><?php echo ($this->Appconfig->get($client_info->license_key, 'business_email')) ? $this->Appconfig->get($this->license_id, 'business_email') : '--';?></dd>
				<dt>Phone :</dt><dd><?php echo ($this->Appconfig->get($client_info->license_key, 'business_phone')) ? $this->Appconfig->get($this->license_id, 'business_phone') : '--';?></dd>
				<dt>PRC :</dt><dd><?php echo ($this->Appconfig->get($client_info->license_key, 'prc')) ? $this->Appconfig->get($this->license_id, 'prc') : '--';?></dd>
				<dt>Address :</dt><dd><?php echo ($this->Appconfig->get($client_info->license_key, 'business_address')) ? $this->Appconfig->get($this->license_id, 'business_address') : '--';?></dd>
			</dl>
		
		</fieldset>
		<fieldset>
			<legend>Patient Info</legend>
			
				<dl class="dl-horizontal">
					<dt></dt><dd>
					<?php if($patient_info->avatar){
						echo '<img src="'.$patient_info->avatar.'">';
					}else{
						echo '<img src="' . $this->gravatar->get($patient_info->email) . '" />';
					}?>
					</dd>
					<dt>Patient :</dt><dd><?php echo $patient_info->firstname.' '.$patient_info->mi.' '.$patient_info->lastname;?></dd>
					<dt>Email :</dt><dd><?php echo ($patient_info->email) ? '<a href="mailto:'. $patient_info->email.'">'.$patient_info->email.'</a>' : '--';?></dd>
					<dt>Mobile :</dt><dd><?php echo ($patient_info->mobile) ? $patient_info->mobile : '--';?></dd>
					<dt>Address :</dt><dd>
						<address>
							<?php echo ($patient_info->address) ? $patient_info->address : '--';?><br>
							<?php //echo ($patient_info->city) ? $this->location_lib->get_info($patient_info->city)->name : '--'.', '.($patient_info->state) ? $this->location_lib->get_info($patient_info->state)->name : '--';?><br>
							<?php //echo ($patient_info->country) ? $this->location_lib->get_info($patient_info->country)->name : '--'.', '.($patient_info->zip) ? $patient_info->zip : '--';?><br>
							<abbr title="Home Number">T:</abbr> <?php echo ($patient_info->home_phone) ? $patient_info->home_phone : '--';?><br>
						</address>
					</dd>
				</dl>
			
			
		</fieldset>
		
	</div>
	
</div>
<script type="text/javascript">
    //runAllForms();

    
</script>