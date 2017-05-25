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


	<div class="row">
	
		<div class="col-sm-12 col-lg-12">

			<table class="table table-striped table-forum" id="table-members">
				<thead>
					<tr>
						<th>ID's</th>
						<th>Fullname</th>
						<th>Username</th>
						<th>Email</th>
						<th>Role</th>
						<th>Created</th>
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
	$('input[type=radio]').on('change', function(e) {
		var val = $("input[name='option']:checked").val();
		var url = '<?php echo site_url();?>course/'+val;
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
			
			$('#table-members').dataTable({
				'destroy': true,
		        'filter': true,
		        'processing': false, 
		        "serverSide": true,        
		        "paging": true,
		        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
		        "ajax": {
		            url: BASE_URL + 'admin/members/load_ajax/',
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
			                    "sPdfSize": "letter",
			                    "sPdfOrientation": "landscape"
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
						                url: BASE_URL+'admin/members/create/-1',
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
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#table-members'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
					$('#table-members').find('td:first').css('width', '40px');
					
					$(".bootbox").click(function (e) {
						var title = $(this).attr('data-original-title');
					   	e.preventDefault();
					   	$.ajax({
			                url: $(this).attr('href'),
			                onError: function () {
			                    bootbox.alert('Some network problem try again later.');
			                },
			                success: function (response)
			                {
			                    var dialog = bootbox.dialog({
								    title: title,
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

					$(".delete").click(function (e) {
					   	e.preventDefault();
					   	$.ajax({
			                url: $(this).attr('href'),
			                success: function (response)
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
			                }
			            });
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
		        //{"id":"2","username":"Randy","email":"rebucasrandy1986@gmail.com","rolename":"Administrator","created":"February 08, 2017","fullname":"Randy, Rebucas"}
		        aoColumns: [
		            {mData: 'id'},   
		            {mData: 'fullname'},         
		            {mData: 'username'},
		            {mData: 'email'},
		            {mData: 'rolename'},
		            {mData: 'created'},
		            {mData: null},
		        ],
		        "aoColumnDefs": [
		            {'bSortable': false, 'aTargets': [0, 2, 3, 4]},
		            {'bSortable': true, 'aTargets': [1, 2, 4, 5]},
		            {'bSearchable': false, 'aTargets': [0]},
		            {
		                "targets": [],
		                "visible": false,
		                "searchable": false,
		            },
		            
		            {
		                // The `data` parameter refers to the data for the cell (defined by the
		                // `data` option, which defaults to the column being worked with, in
		                // this case `data: 0`.
		                "render": function (data, type, row) {
		                    newData  = row['id'];
		                    return newData;
		                },
		                "targets": 0
		            },
		            {
		                // The `data` parameter refers to the data for the cell (defined by the
		                // `data` option, which defaults to the column being worked with, in
		                // this case `data: 1`.
		                //row['statuses'] != 0
		                "render": function (data, type, row) {
		                    newData = "";
		                   
		                    newData = '<a rel="tooltip" data-placement="left" data-original-title="Details" class="bootbox" href="<?php echo base_url();?>admin/members/details/'+row['id']+'">'+ row['fullname'] + '</a>';

		                    return newData;

		                },
		                "targets": 1
		            },
		            {
		                // The `data` parameter refers to the data for the cell (defined by the
		                // `data` option, which defaults to the column being worked with, in
		                // this case `data: 1`.
		                //row['statuses'] != 0
		                "render": function (data, type, row) {
		                    newData = "";
		                   
		                    newData  = row['username'];

		                    return newData;

		                },
		                "targets": 2
		            },
		            {
		                // The `data` parameter refers to the data for the cell (defined by the
		                // `data` option, which defaults to the column being worked with, in
		                // this case `data: 1`.
		                //row['statuses'] != 0
		                "render": function (data, type, row) {
		                    newData = "";
		                   
		                    newData  = row['email'];

		                    return newData;

		                },
		                "targets": 3
		            },
		            {
		                // The `data` parameter refers to the data for the cell (defined by the
		                // `data` option, which defaults to the column being worked with, in
		                // this case `data: 1`.
		                //row['statuses'] != 0
		                "render": function (data, type, row) {
		                    newData = "";
		                   
		                    newData = row['rolename'];

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
		                    newData = row['created'];

		                    return newData;
		                },
		                "targets": 5
		            },
		            {
		                // The `data` parameter refers to the data for the cell (defined by the
		                // `data` option, which defaults to the column being worked with, in
		                // this case `data: 4`.
		                "render": function (data, type, row) {
		                    newData = "";
		                    newData = '<a rel="tooltip" data-placement="left" data-original-title="Reset Password" href="'+BASE_URL+'admin/members/reset/'+row['id']+'/" class="hidden bootbox btn btn-default btn-xs"><i class="fa fa-key"></i></a>&nbsp;';
		                    newData += '<a href="'+BASE_URL+'admin/members/delete/'+row['id']+'/" class="delete btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>&nbsp;';
		                   
		                    return newData;
		                },
		                "targets": 6
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
