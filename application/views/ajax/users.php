<!-- Bread crumb is created dynamically -->
<!-- row -->
<div class="row">

	<!-- col -->
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4"> 
		<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><?php echo $module ;?> <small><?php //echo $this->lang->line('module_patients_desc');?></small></h1>
	</div>
	<!-- end col -->
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8 text-right">
		<div class="btn-group">
			<!--
			<button type="button" class="btn btn-primary">Record</button>
			<button type="button" class="btn btn-primary">Delete</button>
			<button type="button" class="btn btn-primary">Update</button>
			-->
			<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('users', $this->role_id, 'create',   $this->license_id) : true) { ?>
			<button type="button" data-original-title="<?php echo $this->lang->line('__common_create_new');?>" class="hidden create btn btn-primary btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('__common_create');?></button>
			<?php } ?>
		</div>
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

			<table class="table table-striped table-forum" id="table-patients">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th><?php echo $this->lang->line('common_fullname');?></th>
						<th><?php echo $this->lang->line('common_username').' / '.$this->lang->line('common_email');?></th>
						<th><?php echo $this->lang->line('common_address').' / '.$this->lang->line('common_blood_type');?></th>
						<th><?php echo $this->lang->line('common_contacts');?></th>
						<th><?php echo $this->lang->line('common_created').' / '.$this->lang->line('common_last_login');?></th>
						<th>&nbsp;</th>
						<th>&nbsp;</th>
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
	var lic = '<?php echo $this->license_id;?>';
	
	var can_view = 	'<?php echo ($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('users', $this->role_id, 'view',   $this->license_id) : true;; ?>';
	var can_update = '<?php echo ($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('users', $this->role_id, 'update',   $this->license_id) : true;; ?>';
	var can_delete = '<?php echo ($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('users', $this->role_id, 'delete',   $this->license_id) : true; ?>';

	$(".create").click(function (e) {
		var title = $(this).attr('data-original-title');
		e.preventDefault();
			$.ajax({
				url: BASE_URL+'user/view/-1',
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
		return false;
	});
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
	var user_link = '<?php echo site_url('settings/encryptID/');?>';
	
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
			
			$('#table-patients').dataTable({
				'destroy': true,
		        'filter': true,
		        'processing': true, 
		        "serverSide": true,        
		        "paging": true,
				"bSort" : false,
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		        "ajax": {
		            url: BASE_URL + 'user/load_ajax/',
		            type: 'POST',
		            data: {
		                filter: 0
		            }
		        },
				"oLanguage": {
					"sSearch": '<span class="input-group-addon"><i class="fa fa-search"></i></span>',
					"sProcessing": '<i class="fa fa-spinner fa-pulse fa-fw"></i> <?php echo $this->lang->line('__dt_sLoadingRecords');?>', //add a loading image,simply putting <img src="/img/ajax-loader.gif" /> tag.
					"sInfo": '<?php echo $this->lang->line('__dt_sInfo');?>',
					"sEmptyTable": '<?php echo $this->lang->line('__dt_sEmptyTable');?>',
					"sInfoEmpty": '<?php echo $this->lang->line('__dt_sInfoEmpty');?>',
					"sInfoFiltered": '<?php echo $this->lang->line('__dt_sInfoFiltered');?>',
					"sLengthMenu": '<?php echo $this->lang->line('__dt_sLengthMenu');?>',
					"sLoadingRecords": '<?php echo $this->lang->line('__dt_sLoadingRecords');?>',
					"sProcessing": '<?php echo $this->lang->line('__dt_sProcessing');?>',
					"sZeroRecords": '<?php echo $this->lang->line('__dt_sZeroRecords');?>'
				},	
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#table-patients'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
					$('#table-patients').find('td:first').css('width', '40px');
					$('#table-patients').css('width', '100%');
					
					$(".bootbox").click(function (e) {
						var title = $(this).attr('data-original-title');
					   	e.preventDefault();
					   	$.ajax({
			                url: $(this).attr('href'),
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
			            return false;  
					});

					$(".delete").click(function (e) {
					   	e.preventDefault();
					   	$.ajax({
			                url: $(this).attr('href'),
			                success: function (response)
			                {
			                    if(response)
								{
									$.smallBox({
										title : "Success",
										content : response.message,
										color : "#739E73",
										iconSmall : "fa fa-check",
										timeout : 3000
									});
									
									checkURL();
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
					
					$(".reset").click(function (e) {
					   	e.preventDefault();
					   	$.ajax({
			                url: $(this).attr('href'),
			                success: function (response)
			                {
			                    if(response)
								{
									$.smallBox({
										title : "Success",
										content : response.message,
										color : "#739E73",
										iconSmall : "fa fa-check",
										timeout : 3000
									});
									
									checkURL();
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
		            {mData: 'avatar'},
					{mData: 'birthday'},
					{mData: 'address'},
					{mData: 'mobile'},
					{mData: 'last_login'},
					{mData: 'lic'},
					{mData: null},
		        ],
		        "aoColumnDefs": [
					{'bSearchable': true, 'aTargets': [0, 1, 2, 3, 8, 9]},
		            {
		                "targets": [7,8,9,10,11,12],
		                "visible": false,
		                "searchable": false,
		            },
		            
		            {
		                // The `data` parameter refers to the data for the cell (defined by the
		                // `data` option, which defaults to the column being worked with, in
		                // this case `data: 0`.
		                 "render": function (data, type, row) {
							if(row['avatar']){
								newData =  '<img src="'+BASE_URL+'uploads/'+row['lic']+'/profile-picture/'+row['avatar']+'" alt="'+row['username']+'" class="img-responsive" />';
							}else{
								newData =  '<img src="'+BASE_URL+'img/avatars/blank.png" alt="'+row['username']+'" class="img-responsive" />';
							}
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
							if(row['birthday']){
								bday = row['birthday'];
							}else{
								bday = '--';
							}

		                    newData = '<a rel="tooltip" data-placement="top" data-original-title="<?php echo $this->lang->line('__common_details');?>" href="'+user_link+'/'+row['id']+'">'+ row['fullname'] + '</a>';
							newData += '<br>'+ row['birthday'];
		                    
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
		                   
		                    newData  = row['username']+'<br>';
							newData  += '<a href="mailto:'+row['email']+'">'+row['email']+'</a>';
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
							if(row['blood_type']){
								btype = row['blood_type'];
							}else{
								btype = '--';
							}
							if(row['address']){
								address = row['address'];
							}else{
								address = '--';
							}
		                    newData  = address+'<br>';
							newData  += '<span rel="tooltip" data-placement="left" data-original-title="<?php echo $this->lang->line('__blood_type');?>">'+btype+'</span>';
							
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
							if(row['home_phone']){
								home = row['home_phone'];
							}else{
								home = '--';
							}
							
							if(row['mobile']){
								mobile = row['mobile'];
							}else{
								mobile = '--';
							}
							
		                    newData = mobile +'<br>';
							newData += home;

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
							if(row['last_login']){
								ll = row['last_login'];
							}else{
								ll = '--';
							}
							
		                    newData = row['created']+'<br>';
							newData += '<span rel="tooltip" data-placement="left" data-original-title="<?php echo $this->lang->line('__last_login');?>">'+ll+'</span>';

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
							if(row['rolename'] != 'Admin'){
								if(can_delete){
									newData += '<a rel="tooltip" data-placement="bottom" data-original-title="<?php echo $this->lang->line('__common_delete');?>" href="'+BASE_URL+'user/delete/'+row['id']+'" class="delete btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>&nbsp;';
								}
								if(can_update){
									newData += '<a rel="tooltip" data-placement="bottom" data-original-title="<?php echo $this->lang->line('__common_update');?>"  href="'+BASE_URL+'user/view/'+row['id']+'" class="bootbox btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>&nbsp;';
								}
							}else{
								newData +='<strong class="badge badge-default"><?php echo $this->lang->line('__common_owner');?></span>';
							}
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
			loadScript(BASE_URL+"js/plugin/datatables/dataTables.bootstrap.min.js", function(){
				loadScript(BASE_URL+"js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
			});
		});
	});
		
</script>
