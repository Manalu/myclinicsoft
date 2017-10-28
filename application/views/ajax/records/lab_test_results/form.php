<?php echo form_open('records/save/-1/'.$type,array('id'=>'record_form', 'class'=>'form-horizontal', 'role'=>'form')); ?>
<fieldset>  
            <input type="hidden" name="user_id" value="<?php echo $user_id;?>"/>
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo $this->lang->line('records_date');?></label>
					<div class="col-md-9">
						<input name="lab_date" id="lab_date" class="form-control input-medium datepicker" type="text" value="<?php echo date('Y-m-d');?>" data-dateformat="yy-mm-dd" aria-invalid="false"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo $this->lang->line('records_test');?></label>
					<div class="col-md-9">
						<?php echo form_input(array(
				'name'=>'test',
				'id'=>'test',
				'class'=>'form-control')
			);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo $this->lang->line('records_conventional_specimen');?></label>
					<div class="col-md-9">
						<?php echo form_input(array(
				'name'=>'specimen',
				'id'=>'specimen',
				'class'=>'form-control')
			);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo $this->lang->line('records_conventional_units');?></label>
					<div class="col-md-9">
						<?php echo form_input(array(
				'name'=>'conventional_units',
				'id'=>'conventional_units',
				'class'=>'form-control')
			);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo $this->lang->line('records_si_units');?></label>
					<div class="col-md-9">
						<?php echo form_input(array(
				'name'=>'si_units',
				'id'=>'si_units',
				'class'=>'form-control')
			);?>
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
				lab_date: {required: true},
				test: {required: true},
				specimen: {required: true},
				conventional_units: {required: true},
				si_units: {required: true}
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
				
						console.log(response.res);
						
						if(response.success)
						{
							$('.close').trigger('click');
							
							$.smallBox({
								title : "Success",
								content : response.message,
								color : "#739E73",
								iconSmall : "fa fa-check",
								timeout : 3000
							});
							
							var _date = $('#lab_date').val();
							var _test = $('#test').val();
							var _specimen = $('#specimen').val();
							var _conventional_units = $('#conventional_units').val();
							var _si_units = $('#si_units').val();
				
							var item = '<tr id="row-lab-'+ response.id +'">'+
								'<td>'+ _date +'</td>'+
								'<td>'+ _test +'</td>'+
								'<td>'+ _specimen +'</td>'+
								'<td>'+ _conventional_units +'</td>'+
								'<td>'+ _si_units +'</td>'+
								'<td class="text-right">'+
									'<a href="'+BASE_URL+'records/delete/'+ response.id +'/lab_test_results" id="lab-'+ response.id +'" class="delete_record btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>'+
								'</td>'+
							'</tr>';
							$('#lab-test-record tbody tr').before( item );
							$('#empty-content-lab').remove();
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
