
<!-- MAIN CONTENT -->
	<div id="content" class="container">

		<div class="row">
			
			<div class="col-sm-6 col-md-offset-3">
				<div class="well no-padding">
					<?php echo form_open('auth/doForgot','id="login-form" class="smart-form client-form"'); ?>
						<header>
							Forgot Password
						</header>

						<fieldset>
							
							
							<section>
								<label class="label">Enter your email</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="email" name="email" id="email" value="<?php echo set_value('email');?>">
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Enter your email</b> </label>
								<div class="note">
									<a href="<?php echo site_url('auth/login');?>">I remembered my password!</a>
								</div>
							</section>

						</fieldset>
						<footer>
							<button type="submit" id="submit" class="btn btn-primary">
								<i class="fa fa-refresh"></i> Reset Password
							</button>
						</footer>
					</form>

				</div>
				
				
				
			</div>
		</div>
	</div>
<script type="text/javascript">

	runAllForms();

	$(function() {
		$("#login-form input:first").focus();
		// Validation
		$("#login-form").validate({
			// Rules for form validation
			rules : {
				email : {
					required : true,
					email : true,
					remote: {
                        url: BASE_URL+'auth/checkexistemail1',
                        type: "post",
                        data: {
                            email: function(){ 
                            	return $("#email").val();
                            }
                        }
                    }
				}
			},
			// Messages for form validation
			messages : {
				email : {
					required : '<i class="fa fa-times-circle"></i> Please enter your email address',
					email : '<i class="fa fa-times-circle"></i> Please enter a VALID email address',
					remote: '<i class="fa fa-times-circle"></i> Email is not found in our system'
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
						$('#submit').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Please wait...');
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
							$('#submit').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Redirecting...');
							setTimeout(function () {
								window.location.href = BASE_URL+'auth/login';
							}, 5000);
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
							$('#submit').text('Submit');
							$('#submit').removeAttr("disabled");
						}                   
						
					},
					dataType:'json'
				});
			}
		});
	});
</script>