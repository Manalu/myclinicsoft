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

		<!-- a blank row to get started -->
		<div class="col-sm-6 col-lg-4">

			<!-- your contents here -->
			<div class="panel panel-default">
				<div class="panel-body status">
					<div class="who clearfix">
						<img src="<?php echo base_url();?>img/avatars/5.png" alt="img" class="online">
						<span class="name"><b>Karrigan Mean</b> shared a photo</span>
						<span class="from"><b>1 days ago</b> via Mobile, Sydney, Australia</span>
					</div>
					<div class="image"><img src="<?php echo base_url();?>img/realestate/6.png" alt="img">
					</div>
					<ul class="links">
						<li>
							<a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i> Like</a>
						</li>
						<li>
							<a href="javascript:void(0);"><i class="fa fa-comment-o"></i> Comment</a>
						</li>
						<li>
							<a href="javascript:void(0);"><i class="fa fa-share-square-o"></i> Share</a>
						</li>
					</ul>
					<ul class="comments">
						<li>
							<img src="<?php echo base_url();?>img/avatars/sunny.png" alt="img" class="online">
							<span class="name">John Doe</span>
							Looks like a nice house, when did you get it? Are we having the party there next week? ;)
						</li>
						<li>
							<img src="<?php echo base_url();?>img/avatars/2.png" alt="img" class="online">
							<span class="name">Alice Wonder</span>
							Seems cool.
						</li>
						<li>
							<img src="<?php echo base_url();?>img/avatars/sunny.png" alt="img" class="online">
							<input type="text" class="form-control" placeholder="Post your comment...">
						</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body status">
					<div class="who clearfix">
						<h4>See anyone you know? Connect with them</h4>
					</div>
					<div class="row">
						<div class="text">
							<div class="col-sm-12 col-md-6 col-lg-4">
								<div class="well text-center connect">
									<img src="<?php echo base_url();?>img/avatars/female.png" alt="img" class="margin-bottom-5 margin-top-5">
									<br>
									<span class="font-xs"><b>Jennifer Lezly</b></span>
									<a href="javascript:void(0);" class="btn btn-xs btn-success margin-top-5 margin-bottom-5"> <span class="font-xs">Connect</span> </a>
								</div>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-4">
								<div class="well text-center connect">
									<img src="<?php echo base_url();?>img/avatars/female.png" alt="img" class="margin-bottom-5 margin-top-5">
									<br>
									<span class="font-xs"><b>Jennifer Lezly</b></span>
									<a href="javascript:void(0);" class="btn btn-xs btn-success margin-top-5 margin-bottom-5"> <span class="font-xs">Connect</span> </a>
								</div>
							</div>
							<div class="col-sm-12 col-md-6 col-lg-4">
								<div class="well text-center connect">
									<img src="<?php echo base_url();?>img/avatars/female.png" alt="img" class="margin-bottom-5 margin-top-5">
									<br>
									<span class="font-xs"><b>Jennifer Lezly</b></span>
									<a href="javascript:void(0);" class="btn btn-xs btn-success margin-top-5 margin-bottom-5"> <span class="font-xs">Connect</span> </a>
								</div>
							</div>
						</div>
					</div>
					<ul class="links text-right">
						<li class="">
							<a href="javascript:void(0);">Find people you know <i class="fa fa-arrow-right"></i> </a>
						</li>
					</ul>
				</div>
			</div>

		</div>

		<div class="col-sm-6 col-lg-4">

			<div class="panel panel-default">
				<div class="panel-body status">
					<div class="who clearfix">
						<img src="<?php echo base_url();?>img/avatars/sunny.png" alt="img" class="online">
						<span class="name"><b>John Doe</b> sent you a message</span>
						<span class="from"><b>1 days ago</b> via Mobile, Dubai</span>
					</div>
					<div class="text">
						Just landed in Dubai. My body must have lost like 4 liters of moisture, its 50 degrees here!!
					</div>
					<ul class="links">
						<li>
							<a href="javascript:void(0);"><i class="fa fa-comment"></i> Reply</a>
						</li>
						<li>
							<a href="javascript:void(0);"><i class="fa fa-share-square-o"></i> Share</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body status smart-form vote">
					<div class="who clearfix">
						<img src="<?php echo base_url();?>img/avatars/3.png" alt="img" class="offline">
						<span class="name"><b>Alliz Yaen</b> started a question poll</span>
						<span class="from"><b>2 days ago</b> via Mobile, Sydney, Australia</span>
					</div>
					<div class="image">
						<strong>How did you guys like the movie <i>"Albert The Einstine?"</i> I reckon it was an awesome movie! </strong>
					</div>
					<ul class="comments">
						<li>
							<label class="radio">
								<input type="radio" name="radio">
								<i></i>It was a great movie! </label>
						</li>
						<li>
							<label class="radio">
								<input type="radio" name="radio">
								<i></i>The Movie could have been better... </label>
						</li>
						<li>
							<label class="radio">
								<input type="radio" name="radio">
								<i></i>It was a boring documentry :( </label>
						</li>
						<li class="text-right">
							<a href="javascript:void(0);" class="btn btn-xs btn-primary">Submit Vote</a>
						</li>
					</ul>

					<ul class="links">
						<li>
							<a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i> Like</a>
						</li>
						<li>
							<a href="javascript:void(0);"><i class="fa fa-comment-o"></i> Comment</a>
						</li>
						<li>
							<a href="javascript:void(0);"><i class="fa fa-share-square-o"></i> Share</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="panel panel-default">

				<div class="panel-body status">

					<div class="who clearfix">
						<h4>Latest Forum Posts</h4>
					</div>

					<div class="who clearfix">
						<img src="<?php echo base_url();?>img/avatars/2.png" alt="img" class="busy">
						<span class="name font-sm"> <span class="text-muted">Posted by</span> <b> Karrigan Mean <span class="pull-right font-xs text-muted"><i>3 minutes ago</i></span> </b>
							<br>
							<a href="javascript:void(0);" class="font-md">Business Requirement Docs</a> </span>
					</div>

					<div class="who clearfix">
						<img src="<?php echo base_url();?>img/avatars/3.png" alt="img" class="offline">
						<span class="name font-sm"> <span class="text-muted">Posted by</span> <b> Alliz Yaen <span class="pull-right font-xs text-muted"><i>2 days ago</i></span> </b>
							<br>
							<a href="javascript:void(0);" class="font-md">Maecenas nec odio et ante tincidun</a> </span>
					</div>

					<div class="who clearfix">
						<img src="<?php echo base_url();?>img/avatars/4.png" alt="img" class="away">
						<span class="name font-sm"> <span class="text-muted">Posted by</span> <b> Barley Kartzukh <span class="pull-right font-xs text-muted"><i>1 month ago</i></span> </b>
							<br>
							<a href="javascript:void(0);" class="font-md">Tincidun nec Gasket Mask </a> </span>
					</div>

				</div>

			</div>

		</div>

		<div class="col-sm-6 col-lg-4">

			<div class="panel panel-default">
				<div class="panel-body status">
					<div class="who clearfix">
						<img src="<?php echo base_url();?>img/avatars/sunny.png" alt="img" class="busy">
						<span class="name"><b>You</b> shared a blog</span>
						<span class="from"><b>1 days ago</b> via Mobile, Sydney, Australia</span>
					</div>
					<div class="text">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							Quisque in mauris elit. Ut nec arcu pretium eros varius porta vitae sit amet ipsum. Suspendisse porttitor, libero in rutrum pretium, lectus arcu maximus massa, ut condimentum metus libero laoreet lectus. Phasellus a lectus pulvinar, lacinia sem quis, suscipit turpis.
							<br>
							<br>
							Nam ipsum orci, blandit in lectus ut, viverra vehicula nisl. Proin eu arcu ut neque tempus viverra nec ac tellus. <strong>[</strong><a href="javascript:void(0);">Keep reading</a><strong>]</strong>
					</div>
					<ul class="links">
						<li>
							<a href="javascript:void(0);"><i class="fa fa-thumbs-o-up"></i> Like</a>
						</li>
						<li>
							<a href="javascript:void(0);"><i class="fa fa-comment-o"></i> Comment</a>
						</li>
						<li>
							<a href="javascript:void(0);"><i class="fa fa-share-square-o"></i> Share</a>
						</li>
					</ul>
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
