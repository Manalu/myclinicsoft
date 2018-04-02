<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-calendar fa-fw "></i> 
			<?php echo $module ;?>
		</h1>
	</div>
	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
		
	</div>
</div>
<!-- row -->

<div class="row">

	<div class="col-sm-12 col-md-12 col-lg-12">

		<!-- new widget -->
		<div class="jarviswidget jarviswidget-color-blueDark">

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
			<header>
				<span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
				<h2> My Calendar </h2>
				<div class="widget-toolbar">
					<!-- add: non-hidden - to disable auto hide -->
					<div class="btn-group">
						<button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
							Showing <i class="fa fa-caret-down"></i>
						</button>
						<ul class="dropdown-menu js-status-update pull-right">
							<li>
								<a href="javascript:void(0);" id="mt">Month</a>
							</li>
							<li>
								<a href="javascript:void(0);" id="ag">Agenda</a>
							</li>
							<li>
								<a href="javascript:void(0);" id="td">Today</a>
							</li>
						</ul>
					</div>
				</div>
			</header>

			<!-- widget div-->
			<div>

				<div class="widget-body no-padding">
					<!-- content goes here -->
					<div class="widget-body-toolbar">

						<div id="calendar-buttons">

							<div class="btn-group">
								<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
								<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>
							</div>
						</div>
					</div>
					
					<div id="calendar"></div>

					<!-- end content -->
				</div>

			</div>
			<!-- end widget div -->
		</div>
		<!-- end widget -->

	</div>

</div>

<!-- end row -->

<script type="text/javascript">
	var BASE_URL = '<?php echo base_url();?>';
	var can_view = 	'<?php echo ($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('appointments', $this->role_id, 'view',   $this->license_id) : true;; ?>';
	var can_update = '<?php echo ($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('appointments', $this->role_id, 'update',   $this->license_id) : true;; ?>';
	var can_delete = '<?php echo ($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('appointments', $this->role_id, 'delete',   $this->license_id) : true; ?>';
	console.log(can_delete);
	console.log(can_update);
	
	var isAdmin = '<?php echo ($this->admin_role_id != $this->role_id) ? false : true;?>';
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
	
	var fullviewcalendar;

	var pagefunction = function() {
		
		// full calendar
		
		var date = new Date();
	    var d = date.getDate();
	    var m = date.getMonth();
	    var y = date.getFullYear();
	
	    var hdr = {
	        left: 'title',
	        center: 'month,agendaWeek,agendaDay',
	        right: 'prev,today,next'
	    };
	
	    var initDrag = function (e) {
	        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
	        // it doesn't need to have a start or end
	
	        var eventObject = {
	            title: $.trim(e.children().text()), // use the element's text as the event title
	            description: $.trim(e.children('span').attr('data-description')),
	            icon: $.trim(e.children('span').attr('data-icon')),
	            className: $.trim(e.children('span').attr('class')) // use the element's children as the event class
	        };
	        // store the Event Object in the DOM element so we can get to it later
	        e.data('eventObject', eventObject);
	
	        // make the event draggable using jQuery UI
	        e.draggable({
	            zIndex: 999,
	            revert: true, // will cause the event to go back to its
	            revertDuration: 0 //  original position after the drag
	        });
	    };
	
	    var addEvent = function (title, priority, description, icon) {
	        title = title.length === 0 ? "Untitled Event" : title;
	        description = description.length === 0 ? "No Description" : description;
	        icon = icon.length === 0 ? " " : icon;
	        priority = priority.length === 0 ? "label label-default" : priority;
	
	        var html = $('<li><span class="' + priority + '" data-description="' + description + '" data-icon="' +
	            icon + '">' + title + '</span></li>').prependTo('ul#external-events').hide().fadeIn();
	
	        $("#event-container").effect("highlight", 800);
	
	        initDrag(html);
	    };
	
	    /* initialize the external events
		 -----------------------------------------------------------------*/
	
	    $('#external-events > li').each(function () {
	        initDrag($(this));
	    });
	
	    $('#add-event').click(function () {
			//implement ajax
	        var title = $('#title').val(),
	            priority = $('input:radio[name=priority]:checked').val(),
	            description = $('#description').val(),
	            icon = $('input:radio[name=iconselect]:checked').val();
	
	        addEvent(title, priority, description, icon);
	    });
	
	    /* initialize the calendar
		 -----------------------------------------------------------------*/
		var event_collection = function () {
			var appointments = [];
			$.ajax({
				async: false,
				type: 'POST', 
				url: BASE_URL +'appointments/get', 
				data: {}, 
				success: function (res) { 
					response = $.parseJSON(res);

					$.each(response, function (index, value) {
						appointments.push({"id" : value.id, "title" : value.title, "description": value.description, "start": value.start, "allDay": false, "className": '["event", "bg-color-blue"]', "icon": 'fa-clock-o'});
					});
					
				}
			});
			return appointments;
		}();
		
	    fullviewcalendar = $('#calendar').fullCalendar({
	
					header: hdr,
			        editable: true,
			        droppable: true, // this allows things to be dropped onto the calendar !!!
					eventLimit: true, // allow "more" link when too many events
			
			        drop: function (date, allDay) { // this function is called when something is dropped
			
			            // retrieve the dropped element's stored Event Object
			            var originalEventObject = $(this).data('eventObject');
						
			            // we need to copy it, so that multiple events don't have a reference to the same object
			            var copiedEventObject = $.extend({}, originalEventObject);
			
			            // assign it the date that was reported
			            copiedEventObject.start = date;
			            copiedEventObject.allDay = allDay;
						
						console.log(copiedEventObject);
			            // render the event on the calendar
			            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			            // is the "remove after drop" checkbox checked?
			            if ($('#drop-remove').is(':checked')) {
			                // if so, remove the element from the "Draggable Events" list
			                $(this).remove();
			            }
			
			        },
			
			        select: function (start, end, allDay) {
			            var title = prompt('Event Title:');
			            if (title) {
			                calendar.fullCalendar('renderEvent', {
			                        title: title,
			                        start: start,
			                        end: end,
			                        allDay: allDay
			                    }, true // make the event "stick"
			                );
			            }
			            calendar.fullCalendar('unselect');
			        },
					events: event_collection,
			        eventRender: function (event, element, icon) {
			            if (!event.description == "") {
			                element.find('.fc-title').append("<br/><span class='ultra-light'>" + event.description +
			                    "</span>");
			            }
			            if (!event.icon == "") {
			                element.find('.fc-title').append("<i class='air air-top-right fa " + event.icon +
			                    " '></i>");
			            }
			        },
					
					eventClick: function(calEvent, jsEvent, view) {

						alert('Event: ' + calEvent.title);
						alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
						alert('View: ' + view.name);
						//implement ajax
						//bootbox event details
						// change the border color just for fun
						$(this).css('border-color', 'red');

					},
			        windowResize: function (event, ui) {
			            $('#calendar').fullCalendar('render');
			        }
			    });
		
		    /* hide default buttons */
		    $('.fc-right, .fc-center').hide();

		
			$('#calendar-buttons #btn-prev').click(function () {
			    $('.fc-prev-button').click();
			    return false;
			});
			
			$('#calendar-buttons #btn-next').click(function () {
			    $('.fc-next-button').click();
			    return false;
			});
			
			$('#calendar-buttons #btn-today').click(function () {
			    $('.fc-today-button').click();
			    return false;
			});
			
			$('#mt').click(function () {
			    $('#calendar').fullCalendar('changeView', 'month');
			});
			
			$('#ag').click(function () {
			    $('#calendar').fullCalendar('changeView', 'agendaWeek');
			});
			
			$('#td').click(function () {
			    $('#calendar').fullCalendar('changeView', 'agendaDay');
			});	
					
		
	};
	
	// end pagefunction
	
	// destroy generated instances 

	// destroy generated instances 
	// pagedestroy is called automatically before loading a new page
	// only usable in AJAX version!

	var pagedestroy = function(){

		/*
		Example below:

		$("#calednar").fullCalendar( 'destroy' );
		if (debugState){
			root.console.log("✔ Calendar destroyed");
		} 

		For common instances, such as Jarviswidgets, Google maps, and Datatables, are automatically destroyed through the app.js loadURL mechanic

		*/
		
		fullviewcalendar.fullCalendar( 'destroy' );
		fullviewcalendar = null;
		$("#add-event").off();
		$("#add-event").remove();

		$('#external-events > li').off();
		$('#external-events > li').remove();
		$('#add-event').off();
		$('#add-event').remove();
		$('#calendar-buttons #btn-prev').off();
		$('#calendar-buttons #btn-prev').remove();
		$('#calendar-buttons #btn-next').off();
		$('#calendar-buttons #btn-next').remove();
		$('#calendar-buttons #btn-today').off();
		$('#calendar-buttons #btn-today').remove();
		$('#mt').off();
		$('#mt').remove();
		$('#ag').off();
		$('#ag').remove();
		$('#td').off();
		$('#td').remove();

		if (debugState){
			root.console.log("✔ Calendar destroyed");
		} 
	}

	// end destroy

	// loadscript and run pagefunction
	loadScript(BASE_URL+"js/plugin/moment/moment.min.js", function(){
		loadScript(BASE_URL+"js/plugin/fullcalendar/jquery.fullcalendar.min.js", pagefunction);
	});



</script>
