<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

	<!-- col -->
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<h1 class="page-title txt-color-blueDark">Hello <?php echo $user_info->username;?> </h1>
	</div>
	<!-- end col -->

</div>
<!-- end row -->

<!--
The ID "widget-grid" will start to initialize all widgets below
You do not need to use widgets if you dont want to. Simply remove
the <section></section> and you can use wells or panels instead
-->
<div class="alert alert-info alert-block">
	<a class="close" data-dismiss="alert" href="#">×</a>
	<h4 class="alert-heading">Welcome to <?php echo $this->config->item('app_name');?></h4>
	<p><strong>Today : </strong><?php echo date('Y-m-d h:m:i A');?> </p>
	<p><strong>Last Login : </strong><?php echo date('Y-m-d h:m:i A', strtotime($user_info->last_login));?></p>
	<ul class="">
		<?php if($this->admin_role_id != $this->role_id) { ?>
		<li class="hidden"><a href="<?php echo site_url();?>">View My Record</a> page allows you to print and check your medical record.</li>
		<?php } ?>
		<li><a href="<?php echo site_url('my-profile/'.$user_info->id);?>">View My Profile</a> page allows you update your informations</li>
		<li class="hidden"><a href="<?php echo site_url();?>">My Appointments</a> page allows you to review and manage your appointments.</li>
		<li class="hidden"><a href="<?php echo site_url('settings');?>">Configurations</a> page allows you to configure default values and company branding.</li>
	</ul>
</div>
<?php if($this->admin_role_id == $this->role_id) { ?>
<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
<?php
$start_ts = date('Y-m-d', strtotime('-8 month', strtotime(date('Y-m-d'))));
$end_ts = date('Y-m-d');

$diff = abs(strtotime($end_ts) - strtotime($start_ts));
$years = floor($diff / (365 * 60 * 60 * 24));
$months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
$days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
//echo 'Years : '.$years. ' Months : '.$months. ' Days : '.$days;


?>
	<div class="row">
		<div class="col-sm-12 col-lg-12">
			<div class="col-sm-12 well">
				<form class="form-inline" role="form">

					<!--<div class="form-group">
						<label class="sr-only" for="s123">Show From</label>
						<input type="text" class="form-control input-sm" id="s123" value="<?php //echo $start_ts;?>" placeholder="Show From">
					</div>
					<div class="form-group">
						<input type="text" class="form-control input-sm" id="s124" value="<?php //echo $end_ts;?>" placeholder="To">
					</div>-->

					<div class="btn-group hidden-phone pull-right">
						<a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="<?php echo site_url('reports/export/pdf/visits');?>" target="_blank" class="export-to-pdf"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
							</li>
						</ul>
					</div>

				</form>
				<div class="col-sm-3 hidden">
					<table class="highchart table table-hover table-bordered" data-graph-container=".. .. .highchart-container" data-graph-type="line">
		              <caption>Monthly Visit Report</caption>
		              <thead>
		                <tr>
		                  <th>Month</th>
		                  <th>Visits</th>
		                </tr>
		              </thead>
		              <tbody>
						<?php for($i = 0; $i < $months + 1; $i++){ ?>
							<tr>
								<td><?php echo date('F', strtotime($start_ts . ' + ' . $i . 'month'));?></td>
								<td><?php echo $this->Report->count_all(date('Y-m-d', strtotime($start_ts . ' + ' . $i . 'month')), $this->license_id);?></td>
							</tr>
						<?php } ?>
		                
		              </tbody>
		            </table>
				</div>
				<div class="col-sm-12">
					<div class="highchart-container"></div>
				</div>
			</div>

		</div>
		
	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->
<?php } ?>
<!-- widget grid -->

<script type="text/javascript">
	var BASE_URL = '<?php echo base_url();?>';
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

	var highchart = function() {
		// clears the variable if left blank
		$('table.highchart').highchartTable();
		//console.log("execute highchart")
	};
	loadScript(BASE_URL+"js/plugin/highChartCore/highcharts-custom.min.js", function(){
	  	loadScript(BASE_URL+"js/plugin/highchartTable/jquery.highchartTable.min.js", highchart); 
	});
	pageSetUp();
	
	/*
	 * PAGE RELATED SCRIPTS
	 */

	// pagefunction
	
	var pagefunction = function() {
			

	};
	
	// end pagefunction

	// destroy generated instances 
	// pagedestroy is called automatically before loading a new page
	// only usable in AJAX version!

	var pagedestroy = function(){
		
		

	}

	// end destroy
	
	// run pagefunction on load
	pagefunction();
	
	
</script>
