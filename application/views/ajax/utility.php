<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

	<!-- col -->
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4"> 
		<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><?php echo $module ;?> <small><?php //echo $this->lang->line('module_patients_desc');?></small></h1>
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


	<div class="row">
	
		<div class="col-sm-12 col-lg-12">
			
				
			<h2>On progress...</h2>	
			
			<?php
			echo '<div class="hidden panel-group smart-accordion-default" id="accordion">';
			
			if ($this->dbutil->database_exists('myclinicsoft'))
			{
				$tables = $this->db->list_tables();

				foreach ($tables as $table)
				{ ?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#<?php echo 'tbl-'.$table;?>" aria-expanded="false" class="collapsed"> <i class="fa fa-lg fa-angle-down pull-right"></i> <i class="fa fa-lg fa-angle-up pull-right"></i> <?php echo $table;?></a></h4>
						</div>
						<div id="<?php echo 'tbl-'.$table;?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
							<div class="panel-body">
								<form class="smart-form">
								<?php 
								$fields = $this->db->list_fields($table);

								foreach ($fields as $field)
								{
								   
								   echo '<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>'.$field.'</label>';
								}
								?>
								</form>
							</div>
						</div>
					</div>
				   
				<?php    
					
				}
				
			}
			echo '</div>';
			
			?>
		
			
		</div>
		
	</div>

	<!-- end row -->

</section>

<!-- end widget grid -->
<script type="text/javascript">
console.log("Your location is: " + geoplugin_countryName() + ", " + geoplugin_region() + ", " + geoplugin_city());
console.log(geoplugin_request());
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
