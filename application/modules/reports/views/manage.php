<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

	<!-- col -->
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4"> 
		<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><?php //echo $module ;?> <small><?php //echo $this->lang->line('module_patients_desc');?></small></h1>
	</div>
	<!-- end col -->
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8 text-right">
		
	</div>
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

				<div class="col-sm-3 hidden">
					<table class="highchart table table-hover table-bordered" data-graph-container=".. .. .highchart-container" data-graph-type="line">
		              <caption><?php echo $this->lang->line('__monthly_visit_report');?></caption>
		              <thead>
		                <tr>
		                  <th><?php echo $this->lang->line('__month');?></th>
		                  <th><?php echo $this->lang->line('__visits');?></th>
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
	 * OR
	 * 
	 * loadScript(".../plugin.js", run_after_loaded);
	 */

	// PAGE RELATED SCRIPTS
	
	// pagefunction
	
	var pagefunction = function() {
		
	};
	
	// end pagefunction
	
	// run pagefunction on load
	pagefunction();

</script>
