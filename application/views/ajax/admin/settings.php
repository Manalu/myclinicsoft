<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

	<!-- col -->
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><?php echo $module;?> </h1>
	</div>
	<!-- end col -->

</div>
<!-- end row -->

<!--
The ID "widget-grid" will start to initialize all widgets below
You do not need to use widgets if you dont want to. Simply remove
the <section></section> and you can use wells or panels instead
-->

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->

	<div class="row">
		<div class="col-sm-12 col-lg-12">

			<div class="jarviswidget well" id="wid-id-3" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false" role="widget">
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

				-->
				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-comments"></i> </span>
					<h2>Default Tabs with border </h2>

				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

				<!-- widget div-->
				<div role="content">

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">

						<p>
							All Settings are actively in used in CRN System.
						</p>
						<hr class="simple">			



						<ul id="myTab1" class="nav nav-tabs bordered">
							<li class="active">
								<a href="#s1" data-toggle="tab" class="submithash"><i class="fa fa-fw fa-lg fa-gear"></i> General</a>
							</li>
							<li>
								<a href="#s2" data-toggle="tab" class="submithash"><i class="fa fa-fw fa-lg fa-paypal"></i> Paypal API</a>
							</li>
							<li>
								<a href="#s3" data-toggle="tab" class="submithash"><i class="fa fa-fw fa-lg fa-video-camera"></i> Twilio API</a>
							</li>
							<li class="pull-right">
								<a href="javascript:void(0);">
								<div class="sparkline txt-color-pinkDark text-align-right" data-sparkline-height="18px" data-sparkline-width="90px" data-sparkline-barwidth="7"><canvas width="52" height="18" style="display: inline-block; width: 52px; height: 18px; vertical-align: top;"></canvas></div> </a>
							</li>
						</ul>

						<div id="myTabContent1" class="tab-content padding-10">
							<div class="tab-pane fade in active" id="s1">
								<div class="row">
									<div class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
										<?php echo form_open('admin/settings/save_general','class="smart-form" id="genral_config"');?>
										
											<section>
												<label class="label">Company</label>
												<label class="input">
													<input type="text" name="company" id="company" value="<?php echo $this->config->item('company');?>" >
												</label>
												
											</section>
											
											<section>
												<label class="label">Address</label>
												<label class="input">
													<input type="text" name="address" id="address" value="<?php echo $this->config->item('address');?>" >
												</label>
												
											</section>
											<section>
												<label class="label">Website</label>
												<label class="input">
													<input type="text" name="website" id="website" value="<?php echo $this->config->item('website');?>" >
												</label>
												
											</section>
											<section>
												<label class="label">Email</label>
												<label class="input">
													<input type="email" name="email" id="email" value="<?php echo $this->config->item('email');?>" >
												</label>
												
											</section>
											<section>
												<label class="label">Phone</label>
												<label class="input">
													<input type="text" name="phone" id="phone" value="<?php echo $this->config->item('phone');?>" >
												</label>
												
											</section>
											<section>
												<label class="label">Fax</label>
												<label class="input">
													<input type="text" name="fax" id="fax" value="<?php echo $this->config->item('fax');?>" >
												</label>
												
											</section>
											<button type="submit" id="general-submit" class="btn btn-primary btn-sm">Submit</button>
										</form>
										
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="s2">
								<div class="row">
									<div class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
										<?php echo form_open('admin/settings/save_paypal','class="smart-form" id="paypal_config"');?>
											
											<section>
												<label class="label">API Username</label>
												<label class="input">
													<input type="text" name="username" id="username" value="<?php echo $this->config->item('paypal_api_username');?>" >
												</label>
												
											</section>
											<section>
												<label class="label">API Password</label>
												<label class="input">
													<input type="text" name="password" id="password" value="<?php echo $this->config->item('paypal_api_password');?>" >
												</label>
												
											</section>
											<section>
												<label class="label">API Signature</label>
												<label class="input">
													<input type="text" name="signature" id="signature" value="<?php echo $this->config->item('paypal_api_signature');?>" >
												</label>
												
											</section>
											<section>
												<label class="label">Currency</label>
												<label class="input">
													<input type="text" name="currency" id="currency" value="<?php echo $this->config->item('paypal_currency');?>" >
												</label>
												
											</section>
											<section>
												<label class="checkbox"><input type="checkbox" name="mode" id="mode" value="TRUE" <?php if($this->config->item('paypal_test_mode') == FALSE) echo 'checked';?>><i></i>Test Mode</label>
											</section>
											<button type="submit" id="paypal-submit" class="btn btn-primary btn-sm">Submit</button>
										</form>
										
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="s3">
								<div class="row">
									<div class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">
										<?php echo form_open('admin/settings/save_twilio','class="smart-form" id="twilio_config"');?>
											
											<section>
												<label class="label">Account SID</label>
												<label class="input">
													<input type="text" name="account_sid" id="account_sid" value="<?php echo $this->config->item('twilio_account_sid');?>" >
												</label>
												
											</section>
											<section>
												<label class="label">Configuration SID</label>
												<label class="input">
													<input type="text" name="configuration_sid" id="configuration_sid" value="<?php echo $this->config->item('twilio_configuration_sid');?>" >
												</label>
												
											</section>
											<section>
												<label class="label">API Key</label>
												<label class="input">
													<input type="text" name="api_key" id="api_key" value="<?php echo $this->config->item('twilio_api_key');?>" >
												</label>
												
											</section>
											<section>
												<label class="label">API Secret</label>
												<label class="input">
													<input type="text" name="api_secret" id="api_secret" value="<?php echo $this->config->item('twilio_api_secret');?>" >
												</label>
												
											</section>

											<button type="submit" id="twilio-submit" class="btn btn-primary btn-sm">Submit</button>
										</form>
										
									</div>
								</div>
							</div>
						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
		</div>
		
	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	pageSetUp();
	var BASE_URL = '<?php echo base_url();?>';
	$("#delete-account").click(function (e) {
	   e.preventDefault();

	   if(confirm("Are you sure?")){           
		   	var _password = prompt("Please enter your password", "");
		   	
		   	if (_password != null) {
			    
			   	$.ajax({
					url: $(this).attr('href'),
					type: 'post', 
					data: {
						confirm_pass: _password,
						recent_pass : '<?php echo $user_info->password;?>'
					},               
					dataType: 'json',
					success: function (response) {
						if(response.success)
						{
							$.smallBox({
								title : "Success",
								content : response.message,
								color : "#739E73",
								iconSmall : "fa fa-check",
								timeout : 3000
							});
							setTimeout(function () {
	                            window.location.href = BASE_URL+'auth/logout/';
	                        }, 2000);
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
							//alert(response.message);
						}  							
					}
				});
		   }else{
		   		return false;
		   }
		}
		return false;
	});
	/*
	* ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	* eg alert("my home function");
	*
	* var pagefunction = function() {
	*   ...
	* }
	* loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	*
	* TO LOAD A SCRIPT:
	* var pagefunction = function (){
	*  loadScript(".../plugin.js", run_after_loaded);
	* }
	*
	* OR you can load chain scripts by doing
	*
	* loadScript(".../plugin.js", function(){
	* 	 loadScript("../plugin.js", function(){
	* 	   ...
	*   })
	* });
	*/

	// pagefunction

	var pagefunction = function() {
		// clears the variable if left blank
	};

	// end pagefunction

	// destroy generated instances
	// pagedestroy is called automatically before loading a new page
	// only usable in AJAX version!

	var pagedestroy = function() {

		/*
		 Example below:

		 $("#calednar").fullCalendar( 'destroy' );
		 if (debugState){
		 root.console.log("✔ Calendar destroyed");
		 }

		 For common instances, such as Jarviswidgets, Google maps, and Datatables, are automatically destroyed through the app.js loadURL mechanic

		 */
	}
	// end destroy

	// run pagefunction
	pagefunction();
	var validatefunction = function() {
		//Paypal
		$("#paypal_config").validate({
			rules: {
	            username: {required: true,maxlength: 150},
	            password: {required: true},
	            signature: {required: true},
	            currency: {required: true}
	        },
	        messages: {
                username: {
                    required : '<i class="fa fa-times-circle"></i> The api username field is required.',
                    maxlength : '<i class="fa fa-times-circle"></i> The api username can not exceed 150 characters in length.'
                },
                password: {
                    required : '<i class="fa fa-times-circle"></i> The api password field is required.'
                },
                signature: {
                    required : '<i class="fa fa-times-circle"></i> The api signature field is required.'
                },
                currency: {
                    required : '<i class="fa fa-times-circle"></i> The currency field is required.'
                }
            },
            highlight: function(element) {
                $(element).addClass('error');
            },
            unhighlight: function(element) {
                $(element).removeClass('error');
            },
            errorElement: 'label',
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
						$('#paypal-submit').html('Please wait...');
						$('#paypal-submit').attr("disabled", "disabled");
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
						$('#paypal-submit').text('Submit');
						$('#paypal-submit').removeAttr("disabled");
					},
					dataType:'json'
				});
			}
		});

		//twillio
		$("#twilio_config").validate({
			rules: {
	            account_sid: {required: true,maxlength: 150},
	            configuration_sid: {required: true,maxlength: 150},
	            api_key: {required: true,maxlength: 150},
	            api_secret: {required: true,maxlength: 150}
	        },
	        messages: {
                account_sid: {
                    required : '<i class="fa fa-times-circle"></i> The twilio account sid field is required.',
                    maxlength : '<i class="fa fa-times-circle"></i> The twilio account sid can not exceed 150 characters in length.'
                },
                configuration_sid: {
                    required : '<i class="fa fa-times-circle"></i> The twilio configuration sid field is required.',
                    maxlength : '<i class="fa fa-times-circle"></i> The twilio configuration sid can not exceed 150 characters in length.'
                },
                api_key: {
                    required : '<i class="fa fa-times-circle"></i> The twilio api key field is required.',
                    maxlength : '<i class="fa fa-times-circle"></i> The twilio api key can not exceed 150 characters in length.'
                },
                api_secret: {
                    required : '<i class="fa fa-times-circle"></i> The twilio api secret field is required.',
                    maxlength : '<i class="fa fa-times-circle"></i> The twilio api secret can not exceed 150 characters in length.'
                }
            },
            highlight: function(element) {
                $(element).addClass('error');
            },
            unhighlight: function(element) {
                $(element).removeClass('error');
            },
            errorElement: 'label',
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
						$('#twilio-submit').html('Please wait...');
						$('#twilio-submit').attr("disabled", "disabled");
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
						$('#twilio-submit').text('Submit');
						$('#twilio-submit').removeAttr("disabled");
					},
					dataType:'json'
				});
			}
		});

		//genral config
		$("#genral_config").validate({
			rules: {
	            company: {required: true,maxlength: 150},
	            address: {required: true,maxlength: 150},
	            phone: {required: true,maxlength: 150},
	            email: {required: true,maxlength: 150}
	        },
	        messages: {
                company: {
                    required : '<i class="fa fa-times-circle"></i> The company sid field is required.',
                    maxlength : '<i class="fa fa-times-circle"></i> The company sid can not exceed 150 characters in length.'
                },
                address: {
                    required : '<i class="fa fa-times-circle"></i> The address sid field is required.',
                    maxlength : '<i class="fa fa-times-circle"></i> The address sid can not exceed 150 characters in length.'
                },
                phone: {
                    required : '<i class="fa fa-times-circle"></i> The phone key field is required.',
                    maxlength : '<i class="fa fa-times-circle"></i> The phone key can not exceed 150 characters in length.'
                },
                email: {
                    required : '<i class="fa fa-times-circle"></i> The email secret field is required.',
                    maxlength : '<i class="fa fa-times-circle"></i> The email secret can not exceed 150 characters in length.'
                }
            },
            highlight: function(element) {
                $(element).addClass('error');
            },
            unhighlight: function(element) {
                $(element).removeClass('error');
            },
            errorElement: 'label',
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
						$('#general-submit').html('Please wait...');
						$('#general-submit').attr("disabled", "disabled");
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
						$('#general-submit').text('Submit');
						$('#general-submit').removeAttr("disabled");
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
