
<?php echo form_open('user/doSave/'.$info->id,'class="smart-form" id="members-form"');?>
   
	<?php $this->load->view('include/common_form_ints');?>
	
	<fieldset> 

		<div class="row advance">
			<section class="col col-6">
				<label for="blood_type">Blood Type</label>
				<label class="input">
					<input type="text" name="blood_type" id="blood_type" value="<?php echo set_value('blood_type', $info->blood_type);?>" placeholder="Blood Typr" tabindex="17">
					
				</label>
			</section>
			<section class="col col-6">
				<label for="country"><?php echo $this->lang->line('common_home_phone');?></label>
				<label class="input">
					<input type="text" name="home_phone" id="home_phone" value="<?php echo set_value('home_phone', $info->home_phone);?>" placeholder="<?php echo $this->lang->line('common_home_phone');?>" tabindex="8">
				</label>
			</section>
		</div>
	
		<section class="advance">
			<label for="address">Other Info</label>
			<label class="textarea">
				<textarea name="other_info" class="custom-scroll" id="other_info" placeholder="Other info" tabindex="16"><?php echo set_value('other_info', $info->other_info);?></textarea>
				
		</section>
		
		<section class="advance">
			<label for="address">Comments</label>
			<label class="textarea">
				<textarea name="comments" class="custom-scroll" id="comments" placeholder="Comments" tabindex="17"><?php echo set_value('comments', $info->comments);?></textarea>
				
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
	
</script>