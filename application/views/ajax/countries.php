<style>
.tree tr {
    cursor: pointer;
}
.tree tr:hover {
    background: #e6e6e5;
}
tr.sub-node {
    background: #d4d4d4;
}
tr.sub-node:hover {
    background: #c7c7c7;
}
.third-node td:first-child {
    padding-left: 65px;
}
a.btn.btn-success.btn-xs.pull-right.new {
    z-index: 9999;
}
</style>
<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

	<!-- col -->
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
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

			<table class="table tree">
				
			</table>
		</div>
		
	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->
<link rel="stylesheet" href="<?php echo base_url();?>js/plugin/treegrid/css/jquery.treegrid.css">
<script type="text/javascript">
	var BASE_URL = '<?php echo base_url();?>';
	
	$(document).on('click', '.new', function (e) {
		var title = $(this).attr('data-original-title');
		var link = $(this).attr('href');
		$.ajax({
			url: link,
			onError: function () {
				bootbox.alert('<?php echo $this->lang->line('__bootbox_error');?>');
			},
			success: function (response)
			{
				var dialog = bootbox.dialog({
					title: title,
					message: '<p class="text-center"><img src="'+BASE_URL+'img/ajax-loader.gif"/></p>'
				});
				dialog.init(function(){
					setTimeout(function(){
						dialog.find('.bootbox-body').html(response);
					}, 3000);
				});
			}
		});
		e.preventDefault();
	});
	
	loadScript(BASE_URL+"js/bootbox.min.js");
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
	loadScript(BASE_URL+"js/plugin/treegrid/js/jquery.treegrid.js", tree);
	function tree(){
		$('.tree').treegrid();
	}
	get_countries();
	
	function get_countries(){
		$.ajax({ 
			type: 'POST', 
			url: BASE_URL +'countries/get_all', 
			data: {}, 
			dataType:'json',
			success: function (res) { 
				console.log(res);
				var countries = [];
				
				$(res).each(function( index, val ) {
					countries += '<tr class="parents treegrid-'+val.id+'" id="'+val.id+'">'+
									'<td>'+val.name+'</td>'+
									'<td>'+val.sortname+'</td>'+
									'<td><a href="'+BASE_URL+'countries/view/state/'+val.id+'" data-original-title="Add state" class="btn btn-success btn-xs pull-right new"><i class="fa fa-plus"></i></a></td>'+
								'</tr>';

						
				});
					
				$(countries).appendTo('.tree');

			}
			
		}); 
	}
	
	$(document).on('click', '.parents td:first-child', function (e) {
		
		var id = $(this).closest('tr').attr('id');
		//retrieve any states
		$.ajax({
			url: BASE_URL+'countries/get_state/',
			type: 'post', 
			data: {
				country_id : id
			},               
			dataType: 'json',
			beforeSend: function () {
				$('.sub-node').hide().remove();
			},
			success: function (state_response) {
				console.log(state_response);
				
				var item = [];
				
				$(state_response).each(function( i, v ) {
					item += '<tr class="sub-node sub-treegrid-'+v.id+' treegrid-parent-'+id+'" id="'+v.id+'">'+
								'<td>'+v.name+'</td><td>&nbsp;</td><td><a href="'+BASE_URL+'countries/view/city/'+v.id+'" data-original-title="Add city" class="btn btn-success btn-xs pull-right new"><i class="fa fa-plus"></i></a></td>'+
							'</tr>';
				});
				
				$('.treegrid-'+id).after( item );
				tree();
			}
		});
		e.preventDefault();
	});
	
	$(document).on('click', '.sub-node', function (e) {
		
		var id = $(this).attr('id');
		//retrieve any states
		$.ajax({
			url: BASE_URL+'countries/get_cities/',
			type: 'post', 
			data: {
				state_id : id
			},               
			dataType: 'json',
			beforeSend: function () {
				$('.third-node').hide().remove();
			},
			success: function (state_response) {
				console.log(state_response);
				
				var item = [];
				
				$(state_response).each(function( i, v ) {

					item += '<tr class="third-node third-treegrid-'+v.id+' sub-treegrid-parent-'+id+'" id="'+v.id+'">'+
								'<td>'+v.name+'</td><td>&nbsp;</td><td>&nbsp;</td>'+
							'</tr>';
				});

				$('.sub-treegrid-'+id).after( item );
				tree();
			}
		});
		e.preventDefault();
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

</script>
