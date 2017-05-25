<?php echo form_open('auth/upload_profile/'.$this->uri->segment(3),array('id'=>'upload_profile','class'=>'smart-form','enctype'=>'multipart/form-data', 'role'=>'form'));?>

	<fieldset>	
		<section>
			<label class="label">Upload profile picture</label>
			<div class="input input-file">
				<span class="button"><input type="file" id="profile_picture" name="profile_picture" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text" readonly="">
			</div>
		</section>
	</section>
									
	<footer>
		
		<button type="submit" id="general-submit" class="btn btn-primary btn-sm">Upload</button>
		
	</footer>
		
	
</form>
<script type="text/javascript">
var validatefunction = function() {

        $("#upload_profile").validate({
            // Rules for form validation
            rules : {
                profile_picture : {
                    required : true
                }
            },

            // Messages for form validation
            messages : {
                profile_picture : {
                    required : '<i class="fa fa-times-circle"></i> Please add your profile picture'
                }
            },
            highlight: function(element) {
                $(element).closest('section').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('section').removeClass('has-error');
            },
            errorElement: 'div',
            errorClass: 'span',
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