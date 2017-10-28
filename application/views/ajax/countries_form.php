<style>
#tbl-records label.checkbox {
    text-align: left;
}
</style>
<?php echo form_open($form_url,'class="smart-form" id="location-form"');?>
   
	<fieldset> 

		<p>You are adding new data to ID : <?php echo $parent_id;?></p>
		<input type="hidden" name="parent_id" id="parent_id" value="<?php echo $parent_id;?>">
		<section class="row">
			<label for="name">Name</label>
			<label class="input">
				<input type="text" name="name" id="name" value="" placeholder="Name" tabindex="1">
				
			</label>
		</section>
		<section class="row">
			<button type="submit" id="submit" class="btn btn-primary btn-sm">Submit</button>
		</section>
	</fieldset>
</form>
  
<script type="text/javascript">
    var BASE_URL = '<?php echo base_url();?>';
    runAllForms();
	
    var validatefunction = function() {

        $("#location-form").validate({
            // Rules for form validation
            rules : {
                name : {
                    required : true
                }
            },

            // Messages for form validation
            messages : {
                name : {
                    required : '<i class="fa fa-times-circle"></i> This field is required'
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
                            location.reload();
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