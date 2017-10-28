<style>
#tbl-records label.checkbox {
    text-align: left;
}
</style>
<?php echo form_open('roles/doSave/'.$info->role_id,'class="smart-form" id="role-form"');?>
   
	<fieldset> 


		<section class="row">
			<label for="role_name">Name</label>
			<label class="input">
				<input type="text" name="role_name" id="role_name" value="<?php echo set_value('role_name', $info->role_name);?>" placeholder="Name" tabindex="1">
				
			</label>
		</section>
			
		<section class="row">
			<label for="address">Description</label>
			<label class="textarea">
				<textarea name="role_desc" class="custom-scroll" id="role_desc" placeholder="Description" tabindex="2"><?php echo set_value('role_desc', $info->role_desc);?></textarea>
				
		</section>
		<section class="row">
			<label class="checkbox">
				<input type="checkbox" name="role_status" value="1" <?php if($info->role_status == 1) echo 'checked';?>>
				<i></i>Enable
			</label>
		</section>
		<div class="row">
		<legend>Resources</legend>

			<table class="table">
				<tbody>
					<tr>
						<td style="width:40%">Dashboard</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="dashboard_view" <?php if($this->Module->has_permission('dashboard', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
						<td style="width:15%"></td>
						<td style="width:15%"></td>
						<td style="width:15%"></td>
					</tr>
					<tr>
						<td style="width:40%">Patients</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="patient_view" <?php if($this->Module->has_permission('patient', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="patient_create" <?php if($this->Module->has_permission('patient', $info->role_id, 'create', $this->license_id)) echo 'checked';?>>
								<i></i>Create
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="patient_delete" <?php if($this->Module->has_permission('patient', $info->role_id, 'delete', $this->license_id)) echo 'checked';?>>
								<i></i>Delete
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="patient_update" <?php if($this->Module->has_permission('patient', $info->role_id, 'update', $this->license_id)) echo 'checked';?>>
								<i></i>Update
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:40%">Users</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="users_view" <?php if($this->Module->has_permission('users', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="users_create" <?php if($this->Module->has_permission('users', $info->role_id, 'create', $this->license_id)) echo 'checked';?>>
								<i></i>Create
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="users_delete" <?php if($this->Module->has_permission('users', $info->role_id, 'delete', $this->license_id)) echo 'checked';?>>
								<i></i>Delete
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="users_update" <?php if($this->Module->has_permission('users', $info->role_id, 'update', $this->license_id)) echo 'checked';?>>
								<i></i>Update
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:40%">Role</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="role_view" <?php if($this->Module->has_permission('role', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="role_create" <?php if($this->Module->has_permission('role', $info->role_id, 'create', $this->license_id)) echo 'checked';?>>
								<i></i>Create
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="role_delete" <?php if($this->Module->has_permission('role', $info->role_id, 'delete', $this->license_id)) echo 'checked';?>>
								<i></i>Delete
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="role_update" <?php if($this->Module->has_permission('role', $info->role_id, 'update', $this->license_id)) echo 'checked';?>>
								<i></i>Update
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:40%">Templates</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="templates_view" <?php if($this->Module->has_permission('templates', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="templates_create" <?php if($this->Module->has_permission('templates', $info->role_id, 'create', $this->license_id)) echo 'checked';?>>
								<i></i>Create
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="templates_delete" <?php if($this->Module->has_permission('templates', $info->role_id, 'delete', $this->license_id)) echo 'checked';?>>
								<i></i>Delete
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="templates_update" <?php if($this->Module->has_permission('templates', $info->role_id, 'update', $this->license_id)) echo 'checked';?>>
								<i></i>Update
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:40%">Appointments</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="appointments_view" <?php if($this->Module->has_permission('appointments', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="appointments_create" <?php if($this->Module->has_permission('appointments', $info->role_id, 'create', $this->license_id)) echo 'checked';?>>
								<i></i>Create
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="appointments_delete" <?php if($this->Module->has_permission('appointments', $info->role_id, 'delete', $this->license_id)) echo 'checked';?>>
								<i></i>Delete
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="appointments_update" <?php if($this->Module->has_permission('appointments', $info->role_id, 'update', $this->license_id)) echo 'checked';?>>
								<i></i>Update
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:40%">Settings</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="settings_view" <?php if($this->Module->has_permission('settings', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
						<td style="width:15%"></td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="role_delete" <?php if($this->Module->has_permission('settings', $info->role_id, 'delete', $this->license_id)) echo 'checked';?>>
								<i></i>Delete
							</label>
						</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="settings_update" <?php if($this->Module->has_permission('settings', $info->role_id, 'update', $this->license_id)) echo 'checked';?>>
								<i></i>Update
							</label>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="row">
		<legend>Records</legend>

			<table class="table" id="tbl-records">
				<tbody>
					<tr>
						<td style="width:80%">Allergies</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="allergies_view" <?php if($this->Module->has_permission('allergies', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:80%">Blood Glucose</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="bloodglucose_view" <?php if($this->Module->has_permission('bloodglucose', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:80%">Blood Pressure</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="bloodpressure_view" <?php if($this->Module->has_permission('bloodpressure', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:80%">Conditions</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="conditions_view" <?php if($this->Module->has_permission('conditions', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:80%">Family History</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="familyhistory_view" <?php if($this->Module->has_permission('familyhistory', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:80%">Files</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="files_view" <?php if($this->Module->has_permission('files', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:80%">Height</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="height_view" <?php if($this->Module->has_permission('height', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:80%">Immunisation</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="immunisation_view" <?php if($this->Module->has_permission('immunisation', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:80%">Lab test Results</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="labtestresult_view" <?php if($this->Module->has_permission('labtestresult', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:80%">Next visit</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="nextvisit_view" <?php if($this->Module->has_permission('nextvisit', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:80%">Endorsement</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="endorsement_view" <?php if($this->Module->has_permission('endorsement', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:80%">Weight</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="weight_view" <?php if($this->Module->has_permission('weight', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
					</tr>
					<tr>
						<td style="width:80%">Temperature</td>
						<td style="width:15%">
							<label class="checkbox">
								<input type="checkbox" name="module[]" value="temperature_view" <?php if($this->Module->has_permission('temperature', $info->role_id, 'view', $this->license_id)) echo 'checked';?>>
								<i></i>View
							</label>
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>	
		<button type="submit" id="submit" class="btn btn-primary btn-sm">Submit</button>
	</fieldset>
</form>
  
<script type="text/javascript">
    var BASE_URL = '<?php echo base_url();?>';
    runAllForms();
	
    var validatefunction = function() {

        $("#role-form").validate({
            // Rules for form validation
            rules : {
                role_name : {
                    required : true,
                    maxlength: 50
                },
                role_desc : {
                    required : true,
                    maxlength: 500
                }
            },

            // Messages for form validation
            messages : {
                role_name : {
                    required : '<i class="fa fa-times-circle"></i> Please add role name',
                    maxlength: '<i class="fa fa-times-circle"></i> The role name can not exceed 50 characters in length.'
                },
                role_desc : {
                    required : '<i class="fa fa-times-circle"></i> Please add description',
                    maxlength: '<i class="fa fa-times-circle"></i> The description can not exceed 500 characters in length.'
                }
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'text-danger',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                }else{
                    error.insertAfter(element);
                }
            },
            // Ajax form submition
            submitHandler : function(form) {
                
                $(form).ajaxSubmit({
                    beforeSend: function () {
                        $('#submit').html('Please wait...');
                        $('#submit').attr("disabled", "disabled");
                    },
                    success:function(response)
                    {
                        if(response)
                        {
                            $.smallBox({
                                title : "Success",
                                content : response.message,
                                color : "#739E73",
                                iconSmall : "fa fa-check",
                                timeout : 3000
                            });
                            $('.bootbox-close-button').trigger('click');
                            checkURL();
                        }
                        else
                        {
                            $.smallBox({
                                title : "Error",
                                content : response.message,
                                color : "#C46A69",
                                iconSmall : "fa fa-warning shake animated",
                                timeout : 3000
                            });
                            
                        }                   
                        $('#submit').text('Submit');
                        $('#submit').removeAttr("disabled");
                    },
                    dataType:'json'
                });
            }
        });
    }

	loadScript(BASE_URL+"js/plugin/jquery-validate/jquery.validate.min.js", function(){
		loadScript(BASE_URL+"js/plugin/jquery-form/jquery-form.min.js", validatefunction);
	});
	
</script>