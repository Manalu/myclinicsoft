<div id="main" role="main">

	<!-- MAIN CONTENT -->
	<div id="content" class="container">


<div class="row">
	
	<div class="col-sm-6 col-md-offset-3">
		<div class="well no-padding">
			<?php echo form_open('auth/register', 'id="smart-form-register" class="smart-form client-form"'); ?>
				<header>
					<?php echo $this->lang->line('__register');?>
				</header>
					<fieldset>
						<section>
						<label for="username"><?php echo $this->lang->line('__username');?></label>
							<label class="input"> <i class="icon-append fa fa-user"></i>
								<input type="text" name="username" id="username" value="<?php echo set_value('username');?>" placeholder="<?php echo $this->lang->line('__username');?>" tabindex="1">
								<b class="tooltip tooltip-bottom-right"><?php echo $this->lang->line('__enter_username');?></b> </label>
						</section>

						<section>
						<label for="email"><?php echo $this->lang->line('__email');?></label>
							<label class="input"> <i class="icon-append fa fa-envelope"></i>
								<input type="email" name="email" id="email" value="<?php echo set_value('email', $this->session->userdata('email')); ?>" placeholder="<?php echo $this->lang->line('_email');?>" tabindex="2" <?php if($this->session->userdata('islogin')) echo 'readonly';?>>
								<b class="tooltip tooltip-bottom-right"><?php echo $this->lang->line('__enter_email');?></b> </label>
						</section>
						<div class="row">
							<section class="col col-6">
							<label for="password"><?php echo $this->lang->line('__enter_password');?></label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="password" id="password" value="<?php echo set_value('password');?>" placeholder="<?php echo $this->lang->line('__password');?>" tabindex="3">
									<b class="tooltip tooltip-bottom-right"><?php echo $this->lang->line('__enter_password');?></b> </label>
							</section>

							<section class="col col-6">
							<label for="confirm_password"><?php echo $this->lang->line('__password_confirm');?></label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="confirm_password" id="confirm_password" value="<?php echo set_value('confirm_password');?>" placeholder="<?php echo $this->lang->line('__password_confirm');?>" tabindex="4">
									<b class="tooltip tooltip-bottom-right"><?php echo $this->lang->line('__enter_password_confirm');?></b> </label>
							</section>
						</div>
					
					
					
						<label class="checkbox">
							<input type="checkbox" name="terms" id="terms" value="1">
							<i></i><?php echo $this->lang->line('__agree');?> <a href="javascript:;" data-toggle="modal" data-target="#myModal"> <?php echo $this->lang->line('__terms_and_conditions');?> </a></label>
					</section>
				</fieldset>
				<footer>
					<button type="submit" id="submit" class="btn btn-primary">
						<?php echo $this->lang->line('__register');?>
					</button>
				</footer>

				
			</form>

		</div>
		<?php if($this->session->userdata('islogin')){ ?>

			<a href="<?php echo $this->session->userdata('logoutUrl') ;?>">← <?php echo $this->lang->line('__cancel_and_return');?></a>
		    
		<?php }else{ ?>
			<a href="<?php echo site_url('auth/login');?>">← Cancel <?php echo $this->lang->line('__cancel_and_return');?></a>
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
					required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'username');?>',
					maxlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_maxlength'), 50);?>',
					remote: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_remote_exist'), 'username');?>'
				},
				email : {
					required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'email');?>',
					email : '<i class="fa fa-exclamation-circle"></i> <?php echo $this->lang->line('__validate_email');?>',
					remote: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_remote_exist'), 'email');?>'
				},
				password : {
					required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'password');?>',
					minlength: '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_minlength'), 6);?>',
					maxlength: '<i class="fa fa-exclamation-circle"></i><?php echo sprintf($this->lang->line('__validate_maxlength'), 20);?>.'
				},
				confirm_password : {
					required : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_required'), 'confirm password');?>',
					equalTo : '<i class="fa fa-exclamation-circle"></i> <?php echo sprintf($this->lang->line('__validate_equalTo'), 'password');?>'
				},
				terms : {
					required : '<i class="fa fa-exclamation-circle"></i> <?php echo $this->lang->line('__agree_terms_and_conditions');?>'
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
						$('#submit').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> <?php echo $this->lang->line('__common_please_wait');?>');
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
							$('#submit').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> <?php echo $this->lang->line('__common_redirecting');?>');
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
							$('#submit').text('<?php echo $this->lang->line('__common_submit');?>');
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
