
<?php echo form_open('auth/doRegister','class="smart-form" id="members-form"');?>
    <fieldset>
        <div class="row">
            <section class="col col-5">
                <label for="first_name">Firstname</label>
                <label class="input">
                    <input type="text" name="first_name" id="first_name" value="<?php //echo set_value('first_name', $info->firstname);?>" placeholder="Firstname" tabindex="5">
                    <b class="tooltip tooltip-bottom-right">Don't forget your firstname</b> 
                </label>
            </section>
            <section class="col col-2">
                <label for="mi">MI</label>
                <label class="input">
                    <input type="text" name="mi" id="mi" value="<?php //echo set_value('mi', $info->mi);?>" placeholder="MI" tabindex="6">
                    <b class="tooltip tooltip-bottom-right">Don't forget your middle initial</b> 
                </label>
            </section>
            <section class="col col-5">
                <label for="last_name">Lastname</label>
                <label class="input">
                    <input type="text" name="last_name" id="last_name" value="<?php //echo set_value('last_name');?>" placeholder="Lastname" tabindex="7">
                    <b class="tooltip tooltip-bottom-right">Don't forget your lastname</b> 
                </label>
            </section>
        </div>
    </fieldset>
    <hr>
    <button type="submit" id="submit" class="btn btn-primary btn-sm">Submit</button>
</form>
  
<script type="text/javascript">
    //runAllForms();

    var validatefunction = function() {

        $("#members-form").validate({
            // Rules for form validation
            rules : {
                username : {
                    required : true,
                    maxlength: 50,
                    remote: {
                        url: BASE_URL+'auth/checkexistusername',
                        type: "post",
                        data: {
                            username: function(){ 
                                return $("#username").val();
                            }
                        }
                    }
                },
                email : {
                    required : true,
                    email : true,
					remote: {
						url: BASE_URL+'auth/checkexistemail',
						type: "post",
						data: {
							email: function(){ 
								return $("#email").val();
							}
						}
					}       
                },
                password : {
                    required : true,
                    minlength : 3,
                    maxlength : 20
                },
                confirm_password : {
                    equalTo : '#password'
                },
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
                country : {
                    required : true
                },
                state : {
                    required : true
                },
                city : {
                    required : true
                },
                zipcode : {
                    required : true,
                    maxlength : 6
                },
                street : {
                    required : true,
                    maxlength : 250
                },
                address : {
                    required : true,
                    maxlength : 250
                },
                terms : {
                    required : true
                }
            },

            // Messages for form validation
            messages : {
                username : {
                    required : '<i class="fa fa-times-circle"></i> Please enter your username',
                    maxlength: '<i class="fa fa-times-circle"></i> The username can not exceed 50 characters in length.',
                    remote: '<i class="fa fa-times-circle"></i> The username already in use.'
                },
                email : {
                    required : '<i class="fa fa-times-circle"></i> Please enter your email address',
                    email : '<i class="fa fa-times-circle"></i> Please enter a VALID email address',
                    remote: '<i class="fa fa-times-circle"></i> The email already in use.'
                },
                password : {
                    required : '<i class="fa fa-times-circle"></i> Please enter your password',
                    minlength: '<i class="fa fa-times-circle"></i> The password minimum 20 characters in length.',
                    maxlength: '<i class="fa fa-times-circle"></i> The password can not exceed 20 characters in length.'
                },
                confirm_password : {
                    required : '<i class="fa fa-times-circle"></i> Please enter your password one more time',
                    equalTo : '<i class="fa fa-times-circle"></i> Please enter the same password as above'
                },
                first_name : {
                    required : '<i class="fa fa-times-circle"></i> Please select your first name',
                    maxlength: '<i class="fa fa-times-circle"></i> The first name can not exceed 50 characters in length.'
                },
                mi : {
                    required : '<i class="fa fa-times-circle"></i> Please select your middle initial',
                    maxlength: '<i class="fa fa-times-circle"></i> The middle initial can not exceed 1 characters in length.'
                },
                last_name : {
                    required : '<i class="fa fa-times-circle"></i> Please select your last name',
                    maxlength: '<i class="fa fa-times-circle"></i> The last name can not exceed 50 characters in length.'
                },
                country : {
                    required : '<i class="fa fa-times-circle"></i> Please select your country'
                },
                state : {
                    required : '<i class="fa fa-times-circle"></i> Please select your state'
                },
                city : {
                    required : '<i class="fa fa-times-circle"></i> Please select your city'
                },
                zipcode : {
                    required : '<i class="fa fa-times-circle"></i> Please select your zipcode',
                    maxlength: '<i class="fa fa-times-circle"></i> The ZIP code can not exceed 6 characters in length.'
                },
                street : {
                    required : '<i class="fa fa-times-circle"></i> Please select your street',
                    maxlength: '<i class="fa fa-times-circle"></i> The street can not exceed 250 characters in length.'
                },
                address : {
                    required : '<i class="fa fa-times-circle"></i> Please select your address',
                    maxlength: '<i class="fa fa-times-circle"></i> The address can not exceed 250 characters in length.'
                },
                terms : {
                    required : '<i class="fa fa-times-circle"></i> You must agree with Terms and Conditions'
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