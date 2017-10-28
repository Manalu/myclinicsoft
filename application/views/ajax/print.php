<?php echo form_open('records/print_file/'.$this->uri->segment(3),array('id'=>'print_docs', 'class'=>'form-horizontal', 'role'=>'form')); ?>
<fieldset>
	<div class="form-body">
		<div class="form-group">
			<label class="col-md-3 control-label"><?php echo $this->lang->line('__form_template');?></label>
			<div class="col-md-9">
				<?php echo form_dropdown('form_type', $templates, '','class="form-control input-medium" id="form_type"');?>
			</div>
		</div>
	</div>
	<hr>
	<button type="submit" id="submit" class="btn btn-primary btn-sm">Submit</button>
</fieldset>
</form>		
<script type='text/javascript'>

$(document).ready(function()
{
	
	runAllForms();
	
	var validatefunction = function() {

		$('#record_form').validate({
			rules: {
				form_type: {required: true}
			},
			highlight: function(element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			errorElement: 'span',
			errorClass: 'help-block',
			errorPlacement: function(error, element) {
				if(element.parent('.input-group').length) {
					error.insertAfter(element.parent());
				}else{
					error.insertAfter(element);
				}
			},
			submitHandler:function(form)
			{
				$(form).ajaxSubmit({
					beforeSend: function () {
						$('#submit').html('Please wait...');
						$('#submit').attr("disabled", "disabled");
					},
					success:function(response)
					{
						if(response.success)
						{
							$('.close').trigger('click');
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
						$('#submit').html('Submit');
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
	
});
</script>
