<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

	<!-- col -->
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4"> 
		<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><?php echo $module ;?> </h1>
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

			<table class="table table-striped table-forum" id="table-groups">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>Group(s)</th>
						<th class="text-center hidden-xs hidden-sm" style="width: 100px;">Comments(s)</th>
						<th class="text-center hidden-xs hidden-sm" style="width: 100px;">Member(s)</th>
						<th class="hidden-xs hidden-sm" style="width: 200px;">Author</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
		
	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">
var BASE_URL = '<?php echo base_url();?>';
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 */
	// pageSetUp(); //WILL CALL THE FOLLOWING FUNCTIONS
	// *
	 //* // activate tooltips */
	 
	 /*
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

	
	$('input[type=radio]').on('change', function(e) {
		var val = $("input[name='option']:checked").val();
		var url = '<?php echo site_url();?>group/'+val;
		history.pushState(null, null, url);
		checkURL();

		var title = $("input[name='option']:checked").parent().text();

		// change page title from global var
		document.title = (title || document.title);
		
		e.preventDefault();
		
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
	
	var pagefunction = function() {
		//console.log("cleared");
		var option = '<?php echo ($this->uri->segment(2) == 'my-groups')? 1 : 0; ?>';
		var showbtn = '<?php echo ($this->uri->segment(2) == 'my-groups')? false : true; ?>';
		var module = '<?php echo $module;?>';
		/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
		*/	

		/* BASIC ;*/
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};

			$('#table-groups').dataTable({
				'destroy': true,
		        'filter': true,
		        'processing': false, 
		        "serverSide": true,        
		        "paging": true,
		         "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
		        "ajax": {
		            url: BASE_URL + 'admin/groups/load_ajax/',
		            type: 'POST',
		            data: {
		                filter: 0
		            }
		        },
				"oLanguage": {
					"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
				},	
				
				"oTableTools": {
		        	"aButtons": [
			            "copy",
			            "csv",
			            "xls",
			                {
			                    "sExtends": "pdf",
			                    "sTitle": module,
			                    "sPdfMessage": "CRN PDF Export",
			                    "sPdfSize": "letter"
			                },
			             	{
		                    	"sExtends": "print",
		                    	"sMessage": "Generated by CRN <i>(press Esc to close)</i>"
		                	},
		                	{
			                   "sExtends": "text",
			                   "sButtonText": 'Create',
			                    "fnClick": function ( nButton, oConfig, oFlash ) {
						            $.ajax({
						                url: BASE_URL+'admin/groups/create/-1',
						                onError: function () {
						                    bootbox.alert('Some network problem try again later.');
						                },
						                success: function (response)
						                {
						                    var dialog = bootbox.dialog({
											    title: 'Create new',
											    message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>'
											});
											dialog.init(function(){
											    setTimeout(function(){
											        dialog.find('.bootbox-body').html(response);
											    }, 3000);
											});
						                }
						            });
						            return false;
			                    }
			                }
		            	],
		            "sSwfPath": BASE_URL+"js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
		        },
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#table-groups'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
					$('#table-groups').find('td:first').css('width', '40px');
					$(".edit").click(function (e) {
					   e.preventDefault();
					   $.ajax({
			                url: $(this).attr('href'),
			                onError: function () {
			                    bootbox.alert('Some network problem try again later.');
			                },
			                success: function (response)
			                {
			                    var dialog = bootbox.dialog({
								    title: 'Update',
								    message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>'
								});
								dialog.init(function(){
								    setTimeout(function(){
								        dialog.find('.bootbox-body').html(response);
								    }, 3000);
								});
			                }
			            });
			            return false;  
					});

					$("[rel=tooltip]").tooltip();
					
				},
		        //run on first time when datatable create
		        "initComplete": function () {

		        },
		        //End
		        // Internationalisation. For more info refer to http://datatables.net/manual/i18n
		        "language": {
		            "aria": {
		                "sortAscending": ": activate to sort column ascending",
		                "sortDescending": ": activate to sort column descending"
		            },
		            "emptyTable": "No items found..!!",
		            "sLengthMenu": "_MENU_",
		            //"info": "",
		            "infoEmpty": "",
		            "infoFiltered": "(filtered1 from MAX total entries)",
		            "search": "",
		            "zeroRecords": "No matching properties found..!!",
		            //"processing": ajaxLoader('html')
		        },
		        "order": [
		            [0, 'asc']
		        ],
		        "aLengthMenu": [
		            [10, 20, 30, 40, 50],
		            [10, 20, 30, 40, 50] // change per page values here
		        ],
		        // set the initial value
		        "pageLength": 10,
		        //{"id":"1","name":"Test Group","description":"No description yet","types":"public","banner":"","members":"0","date_created":"February 15, 2017","author":"Randy, Rebucas"}
		        aoColumns: [
		            {mData: 'id'},            
		            {mData: 'name'},
		            {mData: 'description'},
		            {mData: 'types'},
		            {mData: 'banner'},
		            {mData: 'members'},
		            {mData: 'date_created'},
		            {mData: 'status'},
		            {mData: 'author'},
		            {mData: null},
		        ],
		        "aoColumnDefs": [
		            {'bSortable': false, 'aTargets': [0, 2, 3, 4]},
		            {'bSortable': true, 'aTargets': [1]},
		            {'bSearchable': false, 'aTargets': [0]},
		            {
		                "targets": [5,6,7,8],
		                "visible": false,
		                "searchable": false,
		            },
		            {
		                // The `data` parameter refers to the data for the cell (defined by the
		                // `data` option, which defaults to the column being worked with, in
		                // this case `data: 0`.
		                "render": function (data, type, row) {
		                    newData = '<i class="fa fa-globe fa-2x text-muted"></i>';
		                    return newData;
		                },
		                "targets": 0
		            },
		            {
		                // The `data` parameter refers to the data for the cell (defined by the
		                // `data` option, which defaults to the column being worked with, in
		                // this case `data: 1`.
		                //row['statuses'] == 1
		                "render": function (data, type, row) {
		                    newData = "";
		                    var status = '';
		                    
		                    if(row['status'] == 1){
		                    	status = '<span class="badge bg-color-blueLight pull-right">Disabled</span>';
		                	} else {
		                		status = '<span class="badge bg-color-greenLight pull-right">Enable</span>';
		                	}
		                    newData = 	'<h4>';
		                    newData += '<a class="ajaxSoft" title="Discussions" href="#">'+ row['name'] + '</a>'+ status ;
		                    	
		                  
							newData += '<small>'+ row['description'] + '</small></h4>';
		                    return newData;
		                },
		                "targets": 1
		            },
		            {
		                // The `data` parameter refers to the data for the cell (defined by the
		                // `data` option, which defaults to the column being worked with, in
		                // this case `data: 0`.
		                "render": function (data, type, row) {
		                    newData = "";
		                    newData = '<div class="text-center"><a href="javascript:void(0);" class="text-center" id="total_replies_'+row['id']+'"><i class="fa fa-spinner fa-pulse"></i></a></div>';
		                    $.ajax({
		                        url: BASE_URL+'groups/count/replies/'+row['id'],
		                        type: "POST",
		                        data: { course_id : row['id'] },
		                        beforeSend: function () {
		                            $("#total_replies_"+row['id']).html('<i class="fa fa-spinner fa-pulse"></i>');
		                        },
		                        success: function (response) {
		                            //console.log(response); 
		                            $("#total_replies_"+row['id']).html('<a href="javascript:void(0);" >' + response + '</a>');
		                        }                                        
		                    }); 
		                    return newData;
		                },
		                "targets": 2
		            },
		            {
		                // The `data` parameter refers to the data for the cell (defined by the
		                // `data` option, which defaults to the column being worked with, in
		                // this case `data: 1`.
		                "render": function (data, type, row) {
		                    newData = "";
		                    newData = '<div class="text-center"><a href="javascript:void(0);" id="total_members_'+row['id']+'"><i class="fa fa-spinner fa-pulse"></i></a></div>';
		                    $.ajax({
		                        url: BASE_URL+'groups/count/members/'+row['id'],
		                        type: "POST",
		                        data: { course_id : row['id'] },
		                        beforeSend: function () {
		                            $("#total_members_"+row['id']).html('<i class="fa fa-spinner fa-pulse"></i>');
		                        },
		                        success: function (response) {
		                            //console.log(response); 
		                            $("#total_members_"+row['id']).html('<a href="javascript:void(0);" > ' + response + '</a>');
		                        }                                        
		                    }); 
		                    return newData;
		                },
		                "targets": 3
		            },
		            {
		                // The `data` parameter refers to the data for the cell (defined by the
		                // `data` option, which defaults to the column being worked with, in
		                // this case `data: 4`.
		                "render": function (data, type, row) {
		                    newData = "";
		                    newData = 	'by <a href="javascript:void(0);">'+ row['author'] + '</a><br><small><i>'+ row['date_created'] + '</i></small>';

		                    return newData;
		                },
		                "targets": 4
		            },
		            {
		                // The `data` parameter refers to the data for the cell (defined by the
		                // `data` option, which defaults to the column being worked with, in
		                // this case `data: 4`.
		                "render": function (data, type, row) {
		                    newData = "";
		                    newData = '<a href="'+BASE_URL+'admin/groups/create/'+row['id']+'/" class="edit btn btn-default btn-xs">Edit</a>';

		                    return newData;
		                },
		                "targets": 9
		            },
		        ],
		        "createdRow": function (row, data, index)
		        {
		            //var temp_split = data['temp_rad'].split(':rad:');
		           
		        }
		    
			});

		/* END BASIC */
		
	};

	loadScript(BASE_URL+"js/bootbox.min.js", function(){
		loadScript(BASE_URL+"js/plugin/datatables/jquery.dataTables.min.js", function(){
			loadScript(BASE_URL+"js/plugin/datatables/dataTables.colVis.min.js", function(){
				loadScript(BASE_URL+"js/plugin/datatables/dataTables.tableTools.min.js", function(){
					loadScript(BASE_URL+"js/plugin/datatables/dataTables.bootstrap.min.js", function(){
						loadScript(BASE_URL+"js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
					});
				});
			});
		});
	});
</script>
