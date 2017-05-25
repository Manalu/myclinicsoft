<div id="main" role="main">

	<!-- MAIN CONTENT -->
	<div id="content" class="container">


<div class="row">
	
	<div class="col-sm-6 col-md-offset-3">
		<div class="well no-padding">
			<?php echo form_open('auth/register', 'id="smart-form-register" class="smart-form client-form"'); ?>
				<header>
					Register
				</header>
					<fieldset>
						<section>
						<label for="username">Username</label>
							<label class="input"> <i class="icon-append fa fa-user"></i>
								<input type="text" name="username" id="username" value="<?php echo set_value('username', $info->username);?>" placeholder="Username" tabindex="1">
								<b class="tooltip tooltip-bottom-right">Needed to enter the website</b> </label>
						</section>

						<section>
						<label for="email">Email</label>
							<label class="input"> <i class="icon-append fa fa-envelope"></i>
								<input type="email" name="email" id="email" value="<?php echo set_value('email', $this->session->userdata('email')); ?>" placeholder="Email" tabindex="2" <?php if($this->session->userdata('islogin')) echo 'readonly';?>>
								<b class="tooltip tooltip-bottom-right">Needed to verify your account</b> </label>
						</section>
						<div class="row">
							<section class="col col-6">
							<label for="password">Password</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="password" id="password" value="<?php echo set_value('password');?>" placeholder="Password" tabindex="3">
									<b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
							</section>

							<section class="col col-6">
							<label for="confirm_password">Confirm Password</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="confirm_password" id="confirm_password" value="<?php echo set_value('confirm_password');?>" placeholder="Confirm Password" tabindex="4">
									<b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
							</section>
						</div>
					
					
					
						<label class="checkbox">
							<input type="checkbox" name="terms" id="terms" value="1">
							<i></i>I agree with the <a href="#" data-toggle="modal" data-target="#myModal"> Terms and Conditions </a></label>
					</section>
				</fieldset>
				<footer>
					<button type="submit" id="submit" class="btn btn-primary">
						Register
					</button>
				</footer>

				
			</form>

		</div>
		<?php if($this->session->userdata('islogin')){ ?>

			<a href="<?php echo $this->session->userdata('logoutUrl') ;?>">← Cancel log in and return to Myclinicsoft</a>
		    
		<?php }else{ ?>
			<a href="<?php echo site_url('auth/login');?>">← Cancel log in and return to Myclinicsoft</a>
		<?php } ?>
	</div>
</div>

	</div>

</div>
<script type="text/javascript">
	runAllForms();
	
	// Model i agree button
	$("#i-agree").click(function(){
		$this=$("#terms");
		if($this.checked) {
			$('#myModal').modal('toggle');
		} else {
			$this.prop('checked', true);
			$('#myModal').modal('toggle');
		}
	});

	// Validation
	$(function() {
		$("#smart-form-register input:first").focus();
		// Validation
		$("#smart-form-register").validate({

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
					required : true,
					equalTo : '#password'
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
						$('html, body').animate({
							scrollTop : 0
						}, "fast");
					},
					dataType:'json'
				});
			}
		});

	});
</script>
