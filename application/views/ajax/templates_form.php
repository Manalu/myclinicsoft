<style>
.modal .modal-dialog {
    width: 95%
}
.var-val{
	display:none;
}
div#template-frm {
    padding: 0 10px;
}
button#submit {
    margin-bottom: 10px;
}
.panel-body {
    padding: 10px 18px;
}
</style>
<link href="<?php echo base_url(); ?>css/summernote.css" rel="stylesheet" type='text/css' media="all" />
<div class="row">
<?php echo form_open('templates/doSave/'.$info->tid,'class="smart-form" id="templates-form"');?>
	<div class="col-md-3">
		
		<section class="">
			<label for="templates">Template Preset</label>
			<label class="select">
				<?php echo form_dropdown('templates',$templates, '','tabindex="" id="templates"'); ?>
				<i></i>
			</label>
		</section>
		<section class="">
			<label for="fname">Name</label>
			<label class="input">
				<input type="text" name="tname" id="tname" value="<?php echo set_value('tname', $info->tname);?>" placeholder="Name" tabindex="1">
				
			</label>
		</section>
		<section class="">
			<label for="ttypes">Type</label>
		
			<label class="select">
				<?php 
				$types = array(
					''=>'Select',
					'rxpad'=>'RX Pad'
				);
				echo form_dropdown('ttypes',$types, $info->ttype,'tabindex="" id="ttypes"'); ?>
				<i></i>
			</label>
		</section>
		<section class="">
			
			<label class="checkbox">
				<input type="checkbox" name="tstatus" id="tstatus" value="1" <?php if($info->tstatus == 1) echo 'checked';?>>
				<i></i>Enable
			</label>
		</section>
		<button type="submit" id="submit" class="btn btn-primary btn-sm">Submit</button>
		<br>
		
		<div class="panel-group smart-accordion-default" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#patients" aria-expanded="true" class=""> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i>Patients </a></h4>
				</div>
				<div id="patients" class="panel-collapse collapse in" aria-expanded="true">
					<div class="panel-body">
						<ul class="list-unstyled">
							<li><a href="javascript:;" class="var">ID <i class="fa fa-code pull-right"></i></a><span class="var-val">{{patient_id}}</span></li>
							<li><a href="javascript:;" class="var">Full Name <i class="fa fa-code pull-right"></i></a><span class="var-val">{{patient_name}}</span></li>
							<li><a href="javascript:;" class="var">Gender <i class="fa fa-code pull-right"></i></a><span class="var-val">{{patient_gender}}</span></li>
							<li><a href="javascript:;" class="var">Birthday <i class="fa fa-code pull-right"></i></a><span class="var-val">{{patient_birthday}}</span></li>
							<li><a href="javascript:;" class="var">Age <i class="fa fa-code pull-right"></i></a><span class="var-val">{{patient_age}}</span></li>
							<li><a href="javascript:;" class="var">Blood Type <i class="fa fa-code pull-right"></i></a><span class="var-val">{{patient_blood_type}}</span></li>
							<li><a href="javascript:;" class="var">Address <i class="fa fa-code pull-right"></i></a><span class="var-val">{{patient_address}}</span></li>
							<li><a href="javascript:;" class="var">Country <i class="fa fa-code pull-right"></i></a><span class="var-val">{{patient_country}}</span></li>
							<li><a href="javascript:;" class="var">City <i class="fa fa-code pull-right"></i></a><span class="var-val">{{patient_city}}</span></li>
							<li><a href="javascript:;" class="var">State <i class="fa fa-code pull-right"></i></a><span class="var-val">{{patient_state}}</span></li>
							<li><a href="javascript:;" class="var">Zip <i class="fa fa-code pull-right"></i></a><span class="var-val">{{patient_zip}}</span></li>
							<li><a href="javascript:;" class="var">Mobile <i class="fa fa-code pull-right"></i></a><span class="var-val">{{patient_mobile}}</span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#configuration" class="collapsed" aria-expanded="false"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i> Configuration</a></h4>
				</div>
				<div id="configuration" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
					<div class="panel-body">
						<ul class="list-unstyled">
							<li><a href="javascript:;" class="var">Business Name <i class="fa fa-code pull-right"></i></a><span class="var-val">{{business_name}}</span></li>
							<li><a href="javascript:;" class="var">Business Owner<i class="fa fa-code pull-right"></i></a><span class="var-val">{{business_owner}}</span></li>
							<li><a href="javascript:;" class="var">Business Address <i class="fa fa-code pull-right"></i></a><span class="var-val">{{business_address}}</span></li>
							<li><a href="javascript:;" class="var">Business Phone<i class="fa fa-code pull-right"></i></a><span class="var-val">{{business_phone}}</span></li>
							<li><a href="javascript:;" class="var">Business Email <i class="fa fa-code pull-right"></i></a><span class="var-val">{{business_email}}</span></li>
							<li><a href="javascript:;" class="var">Business Fax<i class="fa fa-code pull-right"></i></a><span class="var-val">{{business_fax}}</span></li>
							<li><a href="javascript:;" class="var">PRC <i class="fa fa-code pull-right"></i></a><span class="var-val">{{prc}}</span></li>
							<li><a href="javascript:;" class="var">PTR <i class="fa fa-code pull-right"></i></a><span class="var-val">{{ptr}}</span></li>
							<li><a href="javascript:;" class="var">S2 <i class="fa fa-code pull-right"></i></a><span class="var-val">{{s2}}</span></li>
							<li><a href="javascript:;" class="var">Morning Open Time <i class="fa fa-code pull-right"></i></a><span class="var-val">{{business_morning_open_time}}</span></li>
							<li><a href="javascript:;" class="var">Morning Close Time <i class="fa fa-code pull-right"></i></a><span class="var-val">{{business_morning_close_time}}</span></li>
							<li><a href="javascript:;" class="var">Afternoon Open Time <i class="fa fa-code pull-right"></i></a><span class="var-val">{{business_afternoon_open_time}}</span>  </li>
							<li><a href="javascript:;" class="var">Afternoon Close Time <i class="fa fa-code pull-right"></i></a><span class="var-val">{{business_afternoon_close_time}}</span></li>
							<li><a href="javascript:;" class="var">Weekend Open Time <i class="fa fa-code pull-right"></i></a><span class="var-val">{{business_weekend_open_time}}</span></li>
							<li><a href="javascript:;" class="var">Weekend Close Time <i class="fa fa-code pull-right"></i></a><span class="var-val">{{business_weekend_close_time}}</span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#preserve" class="collapsed" aria-expanded="false"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i> Preserve </a></h4>
				</div>
				<div id="preserve" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
					<div class="panel-body">
						<ul class="list-unstyled">
							<li><a href="javascript:;" class="var">Consultation Date <i class="fa fa-code pull-right"></i></a><span class="var-val">{{consultation_date}}</span></li>
							<li><a href="javascript:;" class="var">Next Visit <i class="fa fa-code pull-right"></i></a><span class="var-val">{{next_visit}}</span></li>
							<li><a href="javascript:;" class="var">Prescriptions <i class="fa fa-code pull-right"></i></a><span class="var-val">{{prescriptions}}</span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="hidden panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#custom" class="collapsed" aria-expanded="false"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i> Custom </a></h4>
				</div>
				<div id="custom" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
					<div class="panel-body">
						<ul class="list-unstyled">
							<li><a href="templates/new-var" class="bootbox xnew-var">Add new </a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	
	</div>
	<div class="col-md-9">

		<div id="template-frm">
			<div id="tcontent">
				<?php echo html_entity_decode(html_entity_decode($info->tcontent)); ?>
			</div>	
		</div>
			
	</div>
	</form>
</div>  
<script type="text/javascript">
    var BASE_URL = '<?php echo base_url();?>';
	//var $j = jQuery.noConflict();
	
    runAllForms();

	var pagefunction = function() {
		
		// summernote
		$('#tcontent').summernote({
			height: 450, // set editor height	
			minHeight: null, // set minimum height of editor
			maxHeight: null, // set maximum height of editor
			focus: true,
			toolbar: [
		    ['style', ['style']],
		    ['font', ['bold', 'italic', 'underline', 'clear']],
		    ['fontname', ['fontname']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['height', ['height']],
		    ['table', ['table']],
		    ['insert', ['link', 'picture', 'hr']],
		    ['view', ['fullscreen', 'codeview']]

		  ]
		});
		
		
		$('#templates').change(function () {
			// show loader
			$("#tcontent").code('<img src="'+BASE_URL+'img/ajax-loader.gif"/>');

			var id = $(this).val();

			$.ajax({
				url: BASE_URL+'templates/preset/' + id,
				type: "POST",
				success: function (data, textStatus, jqXHR) {
					$("#tcontent").code(data); //.summernote('code');
				},
				error: function (jqXHR, textStatus, errorThrown) {
					//if fails    
					alert(request.responseText);
				}
			});

			return false;
		});
	
	};
	
	// selected identifier
	var selected;

	$(document).on('click', '.var', function () {
		var toInsert = $(this).next('.var-val').html();
		var sel = document.getSelection();
		var temptext = '';
		//console.log(document.selection.type);
		if (selected == 'input') {
			if (($('.selected').get(0).tagName) == "TEXTAREA") {
				//console.log("df");
				temptext = $('.selected').val();
				$('.selected').val('').insertAtCaret(temptext + toInsert).html(temptext + toInsert);
			}
			else { //console.log("f");
				temptext = $('.selected').val();
				$('.selected').val('').insertAtCaret(temptext + toInsert).attr('value', temptext + toInsert);
			}
		} else {
			var toInsert = $(this).next('.var-val').html();
			var selection = document.getSelection();
			var cursorPos = selection.anchorOffset;
			var oldContent = selection.anchorNode.nodeValue;
			if (cursorPos > 0) {
				var newContent = oldContent.substring(0, cursorPos) + toInsert + oldContent.substring(cursorPos);
				//console.log(newContent);
				selection.anchorNode.nodeValue = unescape(newContent);
			} else {
				var newContent = toInsert;
				$('.note-editable').append(newContent);
			}
		}

		return false;
	});

	// reset selected
	$(document).on('click', function () {
		$('.selected').removeClass('selected');
		selected = '';
	});
	
	

	var pagedestroy = function(){
		
		// destroy summernote
		$("#tcontent").summernote( 'destroy' );

	}
	
	// load summernote, and all markdown related plugins
	loadScript(BASE_URL+"js/summernote.js", pagefunction);
	
	//loadScript(BASE_URL+"js/jquery-1.10.2.min.js");
	//loadScript(BASE_URL+"js/jqueryui-1.10.3.min.js");

    var validatefunction = function() {

        $("#templates-form").validate({
            // Rules for form validation
            rules : {
                tname : {
                    required : true,
                    maxlength: 50
                },
                ttypes : {
                    required : true
                }
            },

            // Messages for form validation
            messages : {
                tname : {
                    required : '<i class="fa fa-times-circle"></i> Please add template name',
                    maxlength: '<i class="fa fa-times-circle"></i> The template name can not exceed 50 characters in length.'
                },
                ttypes : {
                    required : '<i class="fa fa-times-circle"></i> Please select template types'
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
                var _name = $("#tname").val();
				var _content = $("#tcontent").code();
				var _type = $("#ttypes").val();
				var _status = $("#tstatus").val();
			
                $(form).ajaxSubmit({
					data: {
						name: _name, 
						content: _content, 
						types: _type, 
						status: _status
					},
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
	
	jQuery.fn.extend({
		insertAtCaret: function (myValue) {
			return this.each(function (i) {
				if (document.selection) {
					//For browsers like Internet Explorer
					this.focus();
					sel = document.selection.createRange();
					sel.text = myValue;
					this.focus(myValue);
				}
				else if (this.selectionStart || this.selectionStart == '0') {
					//For browsers like Firefox and Webkit based
					var startPos = this.selectionStart;
					var endPos = this.selectionEnd;
					var scrollTop = this.scrollTop;
					this.value = this.value.substring(0, startPos) + myValue + this.value.substring(endPos, this.value.length);
					this.focus();
					this.selectionStart = startPos + myValue.length;
					this.selectionEnd = startPos + myValue.length;
					this.scrollTop = scrollTop;
				} else {
					this.value += myValue;
					this.focus();
				}
			})
		}
	});
</script>