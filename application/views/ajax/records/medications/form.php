<?php echo form_open('records/save/-1/'.$type,array('id'=>'record_form', 'class'=>'form-horizontal', 'role'=>'form')); ?>
<fieldset>  
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>"/>
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo $this->lang->line('records_date');?></label>
					<div class="col-md-9">
						<input name="medication_date" id="medication_date" class="form-control input-medium datepicker" type="text" value="<?php echo ($cdate) ? $cdate : date('Y-m-d');?>" data-dateformat="yy-mm-dd" aria-invalid="false" <?php if(isset($cdate)) echo 'readonly';?>/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo $this->lang->line('records_medicine');?></label>
					<div class="col-md-9">
						<?php echo form_input(array(
				'name'=>'medicine',
				'id'=>'medicine',
				'class'=>'form-control typeahead')
			);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo $this->lang->line('records_preparation');?></label>
					<div class="col-md-9">
						<?php echo form_input(array(
				'name'=>'preparation',
				'id'=>'preparation',
				'class'=>'form-control')
			);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo $this->lang->line('records_sig');?></label>
					<div class="col-md-9">
						<?php echo form_input(array(
				'name'=>'sig',
				'id'=>'sig',
				'class'=>'form-control')
			);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo $this->lang->line('records_qty');?></label>
					<div class="col-md-9">
						<?php echo form_input(array(
				'name'=>'qty',
				'id'=>'qty',
				'class'=>'form-control')
			);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label"><?php echo $this->lang->line('records_mainteinable');?></label>
					<div class="col-md-9">
						<input type="checkbox" name="is_mainteinable" id="is_mainteinable" value="1" style="margin-top: 10px;">
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
				medication_date: {required: true},
				medicine: {required: true},
				preparation: {required: true},
				sig: {required: true},
				qty: {required: true,maxlength: 5}
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
						$('.empty-post').remove();
					},
					success:function(response)
					{
						
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
							
							//checkURL();
							//complaints-2017-08-09
							var _date = $('#medication_date').val();
							var _user_id = $('#user_id').val();
							var _medicine = $('#medicine').val();
							var _preparation = $('#preparation').val();
							var _sig = $('#sig').val();
							var _qty = $('#qty').val();
							var _is_mainteinable = $('#is_mainteinable').val();
							
							var item = [];
							var xnum = 1;
							var count = $('.group-'+_date+' .medication_block .list-group-item').length + 1;
							
							item += '<li class="list-group-item onece">'+
										'<label class="num">'+ count +'. </label> '+
										'<label class="medicine">'+_medicine+'</label>'+
										'<label class="prep">'+_preparation+'</label> '+
										'<label class="sig">'+_sig+'</label>'+
										'<label class="qty"># '+_qty+'</span></label>'+
										'<label class="print-action"><a title="Rx Preview" href="'+BASE_URL+'queing/preview/'+ _user_id +'/'+_date+'/no" class="ajax-btn btn btn-success btn-xs" ><i class="fa fa-print"></i> Print</a></label>'+
									'</li>';

								$(item).appendTo('#complaints-'+_date+ ' .medication_block');

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

		
	var typeahead = function() {
		
		$('#medicine').typeahead({
			ajax: {
				url: BASE_URL +'records/get_suggest_records/medications/medications', //var type = $(this).attr('id');
				timeout: 500,
				displayField: "name",
				valueField: "id",
				triggerLength: 1,
				method: "get",
				dataType: "json",
				preDispatch: function (query) {
					//showLoadingMask(true);
					return {
						search: query
					}
				},
				preProcess: function (data) {

					if (data.success === false) {
						return false;
					}else{
						return data;    
					}                
				}               
			}
		});
		
		$('#preparation').typeahead({
			ajax: {
				url: BASE_URL +'records/get_suggest_records/medications/preparation', //var type = $(this).attr('id');
				timeout: 500,
				displayField: "name",
				valueField: "id",
				triggerLength: 1,
				method: "get",
				dataType: "json",
				preDispatch: function (query) {
					//showLoadingMask(true);
					return {
						search: query
					}
				},
				preProcess: function (data) {

					if (data.success === false) {
						return false;
					}else{
						return data;    
					}                
				}               
			}
		});
		
		$('#sig').typeahead({
			ajax: {
				url: BASE_URL +'records/get_suggest_records/medications/sig', //var type = $(this).attr('id');
				timeout: 500,
				displayField: "name",
				valueField: "id",
				triggerLength: 1,
				method: "get",
				dataType: "json",
				preDispatch: function (query) {
					//showLoadingMask(true);
					return {
						search: query
					}
				},
				preProcess: function (data) {

					if (data.success === false) {
						return false;
					}else{
						return data;    
					}                
				}               
			}
		});
	}
	
	loadScript(BASE_URL+"js/plugin/bootstrap-ajax-typeahead/js/bootstrap-typeahead.min.js", typeahead);
	
});
</script>
