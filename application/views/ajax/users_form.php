
<?php echo form_open('user/doSave/'.$info->id,'class="smart-form" id="members-form"');?>
   
	<?php $this->load->view('include/common_form_ints');?>
	<fieldset>
		<section class="">
			<label for="role_id"><?php echo $this->lang->line('__role');?></label>
			<label class="select">
				<?php if($info->id != ''){ ?>
					<a href="#" data-table="users" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="role_id" class="editable xeditable_select" data-type="select" data-pk="<?php echo $info->id;?>" data-original-title="Select Role"><?php echo $this->Role->get_info($info->role_id)->role_name;?></a>
				<?php }else{ ?>
					<?php echo form_dropdown('role_id', $roles, $info->role_id,'tabindex="" id="role_id"');?>
					<i></i>
				<?php } ?>
			</label>
		</section>

		<div class="row advance">
			<section class="col col-6">
				<label for="blood_type"><?php echo $this->lang->line('__blood_type');?></label>
				<label class="input">
					<?php if($info->id != ''){ ?>
						<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="blood_type" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="<?php echo $this->lang->line('__blood_type');?>"><?php echo $info->blood_type;?></a>
					<?php }else{ ?>
						<input type="text" name="blood_type" id="blood_type" value="<?php echo set_value('blood_type', $info->blood_type);?>" placeholder="<?php echo $this->lang->line('__blood_type');?>" tabindex="17">
					
					<?php } ?>
					
				</label>
			</section>
			<section class="col col-6">
				<label for="country"><?php echo $this->lang->line('common_home_phone');?></label>
				<label class="input">
					<?php if($info->id != ''){ ?>
						<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="home_phone" class="editable xeditable_text" data-type="text" data-pk="<?php echo $info->id;?>" data-original-title="<?php echo $this->lang->line('common_home_phone');?>"><?php echo $info->home_phone;?></a>
					<?php }else{ ?>
						<input type="text" name="home_phone" id="home_phone" value="<?php echo set_value('home_phone', $info->home_phone);?>" placeholder="<?php echo $this->lang->line('common_home_phone');?>" tabindex="8">
				
					<?php } ?>
					
				</label>
			</section>
		</div>
	
		<section class="advance">
			<label for="address"><?php echo $this->lang->line('__other_info');?></label>
			<label class="textarea">
				<?php if($info->id != ''){ ?>
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="other_info" class="editable xeditable_textarea" data-type="textarea" data-pk="<?php echo $info->id;?>" data-original-title="<?php echo $this->lang->line('__other_info');?>"><?php echo $info->other_info;?></a>
				<?php }else{ ?>
					<textarea name="other_info" class="custom-scroll" id="other_info" placeholder="<?php echo $this->lang->line('__other_info');?>" tabindex="16"><?php echo set_value('other_info', $info->other_info);?></textarea>
			
				<?php } ?>
				
			</label>	
		</section>
		
		<section class="advance">
			<label for="address"><?php echo $this->lang->line('__comments');?></label>
			<label class="textarea">
				<?php if($info->id != ''){ ?>
					<a href="#" data-table="users_profiles" data-placement="top" data-url="<?php echo site_url('user/do_update');?>" data-name="comments" class="editable xeditable_textarea" data-type="textarea" data-pk="<?php echo $info->id;?>" data-original-title="<?php echo $this->lang->line('__comments');?>"><?php echo $info->comments;?></a>
				<?php }else{ ?>
					<textarea name="comments" class="custom-scroll" id="comments" placeholder="<?php echo $this->lang->line('__comments');?>" tabindex="17"><?php echo set_value('comments', $info->comments);?></textarea>
			
				<?php } ?>
				
			</label>	
		</section>		
	
		
		<button type="submit" id="submit" class="btn btn-primary btn-sm">Submit</button>
	</fieldset>
</form>
  
<script type="text/javascript">
    var BASE_URL = '<?php echo base_url();?>';
    runAllForms();
	
	if($("#show_advance_form_input").is(':checked')){
		$('.advance').show();
	} else {
		$('.advance').hide();
	}

	var check;
	var option;
	$("#show_advance_form_input").on("click", function(){
		check = $(this).is(":checked");
		if(check) {
			option = 1;
		} else {
			option = 0;
		}
		$.ajax({
			url: BASE_URL+'auth/switch_advance/'+option,
			beforeSend: function () {
				$('#show_advance_form_input_loader').html('<i class="fa fa-spin fa-spinner"></i>');
			},
			success: function (response)
			{
				if(check) {
					$('.advance').show();
				} else {
					$('.advance').hide();
				}
				$('#show_advance_form_input_loader').html('');
			}
		}); 
	});

    var validatefunction = function() {

        $("#members-form").validate({
            // Rules for form validation
            rules : {
                first_name : {
                    required : true,
                    maxlength: 50
                },
                mi : {
                    required : true,
                    maxlength: 1
                },
                last_name : {
                    required : true,
                    maxlength: 50
                },
                mobile : {
                    required : true
                },
                gender : {
                    required : true
                },
				country : {
                    required : true
                },
				state : {
                    required : true
                },
				city : {
                    required : true
                },
				zip : {
                    required : true,
					maxlength : 6
                },
                address : {
                    required : true,
                    maxlength : 250
                },
				bod : {
                    required : true
                }
            },

            // Messages for form validation
            messages : {
                first_name : {
                    required : '<i class="fa fa-times-circle"></i> Please add your first name',
                    maxlength: '<i class="fa fa-times-circle"></i> The first name can not exceed 50 characters in length.'
                },
                mi : {
                    required : '<i class="fa fa-times-circle"></i> Please add your middle initial',
                    maxlength: '<i class="fa fa-times-circle"></i> The middle initial can not exceed 1 characters in length.'
                },
                last_name : {
                    required : '<i class="fa fa-times-circle"></i> Please add your last name',
                    maxlength: '<i class="fa fa-times-circle"></i> The last name can not exceed 50 characters in length.'
                },
                mobile : {
                    required : '<i class="fa fa-times-circle"></i> Please add your country'
                },
                gender : {
                    required : '<i class="fa fa-times-circle"></i> Please select your state'
                },
				country : {
                    required : '<i class="fa fa-times-circle"></i> Please select a country'
                },
				state : {
                    required : '<i class="fa fa-times-circle"></i> Please select a state'
                },
				city : {
                    required : '<i class="fa fa-times-circle"></i> Please select a city'
                },
				zip : {
                    required : '<i class="fa fa-times-circle"></i> Please add your zip code',
                    maxlength: '<i class="fa fa-times-circle"></i> The zip code can not exceed 6 characters in length.'
                },
                address : {
                    required : '<i class="fa fa-times-circle"></i> Please add your address',
                    maxlength: '<i class="fa fa-times-circle"></i> The address can not exceed 250 characters in length.'
                },
				bod : {
                    required : '<i class="fa fa-times-circle"></i> Please add birthdate'
                },
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
                        if(response.success)
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
	
	/*
	 * X-Ediable
	 */

	loadScript(BASE_URL+"js/plugin/x-editable/moment.min.js", loadMockJax);

	function loadMockJax() {
		loadScript(BASE_URL+"js/plugin/x-editable/jquery.mockjax.min.js", loadXeditable);
	}

	function loadXeditable() {
		loadScript(BASE_URL+"js/plugin/x-editable/x-editable.min.js", loadTypeHead);
	}

	function loadTypeHead() {
		loadScript(BASE_URL+"js/plugin/typeahead/typeahead.min.js", loadTypeaheadjs);
	}

	function loadTypeaheadjs() {
		loadScript(BASE_URL+"js/plugin/typeahead/typeaheadjs.min.js", runXEditDemo);
	}

	function runXEditDemo() {

		/*
		 * X-EDITABLES
		 */

		//defaults
		$.fn.editable.defaults.url = '/post';
		//$.fn.editable.defaults.mode = 'inline'; use this to edit inline

		$('.xeditable_text').each(function () {
			var obj = $(this);
			var type = obj.attr('data-name');
			obj.editable({
				emptytext: '--',
				validate: function (value) {
					if ($.trim(value) == '')
						return type+' field is required';
				},
				success: function(response) {
					console.log(response);
				} ,
				params: function(params) {  //params already contain `name`, `value` and `pk`
					var data = {};
					data['pk'] = params.pk;
					data['name'] = params.name;
					data['value'] = params.value;
					data['table'] = $(this).attr('data-table');
					return data;
					
				} 
			});
			
		});
		
		$('.xeditable_textarea').each(function () {
			var obj = $(this);
			var type = obj.attr('data-name');
			obj.editable({
				emptytext: '--',
				validate: function (value) {
					if ($.trim(value) == '')
						return type+' field is required';
				},
				success: function(response) {
					console.log(response);
				} ,
				params: function(params) {  //params already contain `name`, `value` and `pk`
					var data = {};
					data['pk'] = params.pk;
					data['name'] = params.name;
					data['value'] = params.value;
					data['table'] = $(this).attr('data-table');
					return data;
					
				} 
			});
			
		});
		
		$('.xeditable_select').each(function () {
			var obj = $(this);
			var type = obj.attr('data-name');
			var val = obj.attr('data-value');
			var source_data = [];
			if(type === 'country'){
				source_data = '<?php echo json_encode($this->location_lib->populate_countries()->result_array(), JSON_HEX_APOS);?>';
			}else if(type === 'state'){
				source_data = '<?php echo json_encode($this->location_lib->_populate_states($info->country)->result_array(), JSON_HEX_APOS);?>';
			}else if(type === 'city') {
				source_data = '<?php echo json_encode($this->location_lib->_populate_cities($info->state)->result_array(), JSON_HEX_APOS);?>';
			}else if(type === 'role_id') {
				source_data = '<?php echo json_encode($this->Role->populate_role($info->state)->result_array());?>';
			}else{
				source_data = [{value: 1,text: 'Male'}, {value: 2,text: 'Female'}]
			}

			obj.editable({
				source: source_data,
				validate: function (value) {
					if ($.trim(value) == '')
						return type+' field is required';
				},
				value: val,
				emptytext: '--',
				params: function(params) {  //params already contain `name`, `value` and `pk`
					var data = {};
					data['pk'] = params.pk;
					data['name'] = params.name;
					data['value'] = params.value;
					data['table'] = $(this).attr('data-table');
					return data;
				},
				success: function(response) {
					console.log(response);
					//checkURL();
				}
			});
			
		});

		
	}
</script>