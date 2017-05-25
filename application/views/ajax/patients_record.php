<!-- Bread crumb is created dynamically -->
<!-- row -->

<div class="row" id="details-top">

	<!-- col -->
	<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
		<?php if($info->avatar){
			echo '<img src="'.$info->avatar.'" class="img-responsive pull-left" >';
		}else{
			echo '<img src="' . $this->gravatar->get($info->email) . '" class="img-responsive pull-left" />';
		}?>
	
		<h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><?php echo $info->firstname.', '.$info->lastname. ' [ '.ucfirst(str_replace('_', ' ', $type)).' Record ]';?> </h1>
		<span><?php if($this->Que->exists($info->id, $this->license_id)){ echo 'QUE # : '. $this->Que->get_info($info->id, $this->license_id)->que_id.'</span>'; }?>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
		<?php if(!$this->Que->exists($info->id, $this->license_id)){ ?>
			<a href="<?php echo site_url('queing/move_in/'.$info->id);?>" class="move-in btn btn-primary btn-block">Move in to waiting list!</a>
		<?php }else{ ?>
			<a href="javascript:;" id="<?php echo $info->id;?>" class="move-out btn btn-danger btn-block">Move out to waiting list!</a>
		<?php } ?>
		
	</div>
	<!-- end col -->

</div>
<!-- end row -->
<div class="row" id="details-bottom">
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<address>
		  Birthday : <span><?php echo date('Y-m-d', strtotime($info->bYear.'-'.$info->bMonth.'-'.$info->bDay));?></span><br>
		  Age : <span><?php $age = (date("md", date("U", mktime(0, 0, 0, $info->bMonth, $info->bDay, $info->bYear))) > date("md")//m/d/y
				? ((date("Y") - $info->bYear) - 1)
				: (date("Y") - $info->bYear));
		echo $age;?></span><br>
		  Gender : <span><?php 
		  if($info->gender == 1){
			  $gender = 'Male';
		  }elseif($info->gender == 2){
			  $gender = 'Female';
		  }else{
			  $gender = 'Undefine';
		  }
		  echo ($info->gender) ? $gender : '--';?></span><br>
		</address>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<address>  
		  Username : <strong><?php echo $info->username;?></strong><br>
		  Email : <?php echo ($info->email) ? '<a href="mailto:'. $info->email.'">'.$info->email.'</a>' : '--';?><br>
		  Created : <span><?php echo $info->created;?></span>
		 
		</address>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<address>
		  <?php echo ($info->address) ? $info->address : '--';?><br>
		  <abbr title="Home Number">T:</abbr> <?php echo ($info->home_phone) ? $info->home_phone : '--';?><br>
		  <abbr title="Mobile Number">M:</abbr> <?php echo ($info->mobile) ? $info->mobile : '--';?><br>
		</address>
	</div>
</div>

<div class="row" id="details-bottom">
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	
		<dl class="dl-horizontal">
			<dt>Weight :</dt>
			<dd> <?php 
			$weight = $this->Record->get_xeditval('weight', $info->id, date('Y-m-d'));
			if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('weight', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<a href="#" class="editable_text" rel="tooltip" data-placement="top" data-original-title="Add weight" data-placeholder="Required" data-url="<?php echo site_url('records/save/-1/weight/');?>" data-type="text" data-pk="<?php echo ($weight->id) ? $weight->id : 0;?>" data-value="<?php echo ($weight->weight) ? preg_replace("/[^0-9]/","",$weight->weight) : '';?>" data-name="weight" id="<?php echo $info->id;?>" data-original-title="Enter weight"></a>
			<?php }else{
				echo ($weight->weight) ? preg_replace("/[^0-9]/","",$weight->weight) : '';
			}?>
			kg</dd>
			<dt>Height :</dt>
			<dd>
			<?php $height = $this->Record->get_xeditval('height', $info->id, date('Y-m-d')); 
			if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('height', $this->role_id, 'view',   $this->license_id) : true) { ?>
			<a href="#" class="editable_text" rel="tooltip" data-placement="top" data-original-title="Add height" data-url="<?php echo site_url('records/save/-1/height/');?>" data-type="text" data-pk="<?php echo ($height->id) ? $height->id : 0;?>" data-value="<?php echo ($height->height) ? preg_replace("/[^0-9]/","",$height->height) : '';?>" data-name="height" id="<?php echo $info->id;?>" data-original-title="Enter height"></a>
			<?php }else{
				echo ($height->height) ? preg_replace("/[^0-9]/","",$height->height) : '--';
			}?>
			cm
			</dd>
			
			<dt>Blood Glucose :</dt>
			<dd>
			<?php $blood_glucose = $this->Record->get_xeditval('blood_glucose', $info->id, date('Y-m-d')); 
			if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('bloodglucose', $this->role_id, 'view',   $this->license_id) : true) { ?>
			<a href="#" class="editable_custom" rel="tooltip" data-placement="top" data-original-title="Add measurement"  data-url="<?php echo site_url('records/custom_save/blood_glucose/measurement/');?>" data-type="text" data-value="<?php echo ($blood_glucose->measurement) ? preg_replace("/[^0-9]/","",$blood_glucose->measurement) : '';?>" data-pk="<?php echo ($blood_glucose->id) ? $blood_glucose->id : 0;?>" data-name="measurement" data-table="blood_glucose" id="<?php echo $info->id;?>" data-original-title="Enter mesurement"></a>
			<?php }else{
				echo ($blood_glucose->measurement) ? preg_replace("/[^0-9]/","",$blood_glucose->measurement) : '--';
			} ?>
			mmol/L [
			<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('bloodglucose', $this->role_id, 'view',   $this->license_id) : true) { ?>
			<a href="#" class="editable_custom" rel="tooltip" data-placement="top" data-original-title="Add type"  data-url="<?php echo site_url('records/custom_save/blood_glucose/type/');?>" data-type="text"  data-value="<?php echo ($blood_glucose->type) ? $blood_glucose->type : '';?>" data-pk="<?php echo ($blood_glucose->id) ? $blood_glucose->id : 0;?>" data-name="type" data-table="blood_glucose" id="<?php echo $info->id;?>" data-original-title="Enter type"></a>
			<?php }else{
				echo ($blood_glucose->type) ? $blood_glucose->type : '--';
			} ?>
			]
			</dd>
			
			<dt>Blood Pressure :</dt>
			<dd>
			<?php $blood_pressure = $this->Record->get_xeditval('blood_pressure', $info->id, date('Y-m-d')); 
			if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('bloodpressure', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<a href="#" class="editable_custom" rel="tooltip" data-placement="top" data-original-title="Add systolic"  data-url="<?php echo site_url('records/custom_save/blood_pressure/systolic/');?>" data-type="text" data-value="<?php echo ($blood_pressure->systolic) ? preg_replace("/[^0-9]/","",$blood_pressure->systolic) : '';?>" data-pk="<?php echo ($blood_pressure->id) ? $blood_pressure->id : 0;?>" data-name="systolic" data-table="blood_pressure" id="<?php echo $info->id;?>" data-original-title="Enter systolic"></a>
			<?php }else{
				echo ($blood_pressure->systolic) ? preg_replace("/[^0-9]/","",$blood_pressure->systolic) : '--';
			}?>
			mmHg
			<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('bloodpressure', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<a href="#" class="editable_custom" rel="tooltip" data-placement="top" data-original-title="Add diastolic"  data-url="<?php echo site_url('records/custom_save/blood_pressure/diastolic/');?>" data-type="text" data-value="<?php echo ($blood_pressure->diastolic) ? preg_replace("/[^0-9]/","",$blood_pressure->diastolic) : '';?>" data-pk="<?php echo ($blood_pressure->id) ? $blood_pressure->id : 0;?>" data-name="diastolic" data-table="blood_pressure" id="<?php echo $info->id;?>" data-original-title="Enter diastolic"></a>
			<?php } else{
				echo ($blood_pressure->diastolic) ? preg_replace("/[^0-9]/","",$blood_pressure->diastolic) : '--';
			}?>
			mmHg
			[
			<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('bloodpressure', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<a href="#" class="editable_custom" rel="tooltip" data-placement="top" data-original-title="Add heart rate"  data-url="<?php echo site_url('records/custom_save/blood_pressure/heart_rate/');?>" data-type="text"  data-value="<?php echo ($blood_pressure->heart_rate) ? $blood_pressure->heart_rate : '';?>" data-pk="<?php echo ($blood_pressure->id) ? $blood_pressure->id : 0;?>" data-name="heart_rate" data-table="blood_pressure" id="<?php echo $info->id;?>" data-original-title="Enter heart rate"></a>
			<?php }else{
				echo ($blood_pressure->heart_rate) ? $blood_pressure->heart_rate : '--';
			}?>
			]
			</dd>
		</dl>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<dl class="dl-horizontal">
			<dt>Family Histories :</dt>
			<dd>
			<?php $family_history = $this->Record->get_xeditval('family_history', $info->id); 
			if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('familyhistory', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<a href="#" class="editable_textarea" rel="tooltip" data-placement="top" data-original-title="Add family history"  data-url="<?php echo site_url('records/save/-1/family_history/');?>" data-type="textarea" data-pk="<?php echo ($family_history->id) ? $family_history->id : 0;?>" data-value="<?php echo ($family_history->family_history) ? $family_history->family_history : '';?>" data-name="family_history" id="<?php echo $info->id;?>" data-original-title="Enter family history"></a>
			<?php }else{
				echo ($family_history->family_history) ? $family_history->family_history : '--';
			}?>
			</dd>
			<dt>Allergies :</dt>
			<dd>
			<?php $allergies = $this->Record->get_xeditval('allergies', $info->id); 
			if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('allergies', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<a href="#" class="editable_textarea" rel="tooltip" data-placement="top" data-original-title="Add allergies"  data-url="<?php echo site_url('records/save/-1/allergies/');?>" data-type="textarea" data-placeholder="Enter alergies here..." data-pk="<?php echo ($allergies->id) ? $allergies->id : 0;?>" data-original-title="Enter Allergies" data-value="<?php echo ($allergies->allergies) ? $allergies->allergies : '';?>" data-name="allergies" id="<?php echo $info->id;?>" data-original-title="Enter allergies"></a>
			<?php }else{
				echo ($allergies->allergies) ? $allergies->allergies : '--';
			}?>
			</dd>
			<dt>Endorsement :</dt>
			<dd>
			<?php $endorsement = $this->Record->get_xeditval('endorsement', $info->id); 
			if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('endorsement', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<a href="#" class="editable_textarea" rel="tooltip" data-placement="top" data-original-title="Add endorsement"  data-url="<?php echo site_url('records/save/-1/endorsement/');?>" data-type="textarea" data-placeholder="Enter endorsement here..." data-pk="<?php echo ($endorsement->id) ? $endorsement->id : 0;?>" data-original-title="Enter endorsement" data-value="<?php echo ($endorsement->endorsement) ? $endorsement->endorsement : '';?>" data-name="endorsement" id="<?php echo $info->id;?>" data-original-title="Enter endorsement"></a>
			<?php }else{
				echo ($endorsement->endorsement) ? $endorsement->endorsement : '';
			}?>
			</dd>
			<dt>Immunisation :</dt>
			<dd>
				<?php $immunisation = $this->Record->get_xeditval('immunisation', $info->id); 
				if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('immunisation', $this->role_id, 'view',   $this->license_id) : true) { ?>
					<a href="#" class="editable_vaccine" rel="tooltip" data-placement="top" data-original-title="Add vaccine" data-table="immunisation" data-name="immunisation" id="<?php echo $info->id;?>" data-url="<?php echo site_url('records/custom_save/immunisation/immunisation/');?>" data-type="select" data-pk="<?php echo ($immunisation->id) ? $immunisation->id : 0;?>"  data-value="<?php echo ($immunisation->immunisation) ? $immunisation->immunisation : '';?>" data-original-title="Select immunisation"></a> <br>
				<?php }else{
					echo ($immunisation->immunisation) ? $immunisation->immunisation : '--';
				}?>
				<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('immunisation', $this->role_id, 'view',   $this->license_id) : true) { ?>
					<a href="#" class="editable_doses" rel="tooltip" data-placement="top" data-original-title="Add doses" data-table="immunisation" data-name="doses" id="<?php echo $info->id;?>" data-url="<?php echo site_url('records/custom_save/immunisation/doses/');?>" data-type="select" data-pk="<?php echo ($immunisation->id) ? $immunisation->id : 0;?>" data-value="<?php echo ($immunisation->doses) ? $immunisation->doses : '';?>" data-original-title="Select doses"></a>
				<?php }else{
					echo ($immunisation->doses) ? $immunisation->doses : '--';
				}?>
			</dd>
		</dl>
			
	</div>
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<dl class="dl-horizontal">
			<dt>Temperature :</dt>
			<dd>
			<?php $temperature = $this->Record->get_xeditval('temperature', $info->id, date('Y-m-d')); 
			if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('temperature', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<a href="#" class="editable_text" rel="tooltip" data-placement="top" data-original-title="Add temperature"  data-url="<?php echo site_url('records/save/-1/temperature/');?>" data-type="text" data-pk="<?php echo ($temperature->id) ? $temperature->id : 0;?>" data-value="<?php echo ($temperature->temperature) ? preg_replace("/[^0-9]/","",$temperature->temperature) : '';?>" data-name="temperature" id="<?php echo $info->id;?>" data-original-title="Enter temperature"></a>
			<?php } else {
				echo ($temperature->temperature) ? preg_replace("/[^0-9]/","",$temperature->temperature) : '--';
			}?>
			(&deg;C) </dd>
			<dt>Next Visit :</dt>
			<dd>
			<?php $next_visit = $this->Record->get_xeditval('next_visit', $info->id, date('Y-m-d')); 
			if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('nextvisit', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<a href="#" class="editable_date" rel="tooltip" data-placement="top" data-original-title="Add next visit"  data-url="<?php echo site_url('records/save/-1/next_visit/');?>" data-viewformat="yyyy-mm-dd" data-original-title="When you want schedule the next visit?" data-type="date" data-value="<?php echo ($next_visit->next_visit) ? $next_visit->next_visit : '';?>" data-pk="<?php echo ($next_visit->id) ? $next_visit->id : 0;?>" data-name="next_visit" id="<?php echo $info->id;?>" data-original-title="Enter next visit"></a>
			<?php }else{
				echo ($next_visit->next_visit) ? $next_visit->next_visit : '--';
			}?>
			</dd>
			<dt>Conditions :</dt>
			<dd>
			<?php $conditions = $this->Record->get_xeditval('conditions', $info->id, date('Y-m-d')); 
			if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('conditions', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<a href="#" class="editable_text" rel="tooltip" data-placement="top" data-original-title="Add conditions"  data-url="<?php echo site_url('records/save/-1/conditions/');?>" data-type="text" data-value="<?php echo ($conditions->conditions) ? $conditions->conditions : '';?>" data-pk="<?php echo ($conditions->id) ? $conditions->id : 0;?>" data-name="conditions" id="<?php echo $info->id;?>" data-original-title="Enter conditions"></a>
			<?php }else{
				echo ($conditions->conditions) ? $conditions->conditions : '--';
			}?>
			</dd>
			<dt>Lab test result :</dt>
			<dd>
			<?php $lab_test_results = $this->Record->get_xeditval('lab_test_results', $info->id, date('Y-m-d')); 
			if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('labtestresult', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<a href="#" class="editable_custom" rel="tooltip" data-placement="top" data-original-title="Add test"  data-url="<?php echo site_url('records/custom_save/lab_test_results/test/');?>" data-type="text" data-value="<?php echo ($lab_test_results->test) ? $lab_test_results->test : '';?>" data-pk="<?php echo ($lab_test_results->id) ? $lab_test_results->id : 0;?>" data-name="test" data-table="lab_test_results" id="<?php echo $info->id;?>" data-original-title="Enter test"></a>
			<?php } else {
				echo ($lab_test_results->test) ? $lab_test_results->test : '--';
			}?>
			/
			<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('labtestresult', $this->role_id, 'view',   $this->license_id) : true) { ?>
			<a href="#" class="editable_custom" rel="tooltip" data-placement="top" data-original-title="Add specimen"  data-url="<?php echo site_url('records/custom_save/lab_test_results/specimen/');?>" data-type="text" data-value="<?php echo ($lab_test_results->specimen) ? $lab_test_results->specimen : '';?>" data-pk="<?php echo ($lab_test_results->id) ? $lab_test_results->id : 0;?>" data-name="specimen" data-table="lab_test_results" id="<?php echo $info->id;?>" data-original-title="Enter specimen"></a>
			<?php }else{
				echo ($lab_test_results->specimen) ? $lab_test_results->specimen : '--';
			}?>
			|
			<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('labtestresult', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<a href="#" class="editable_custom" rel="tooltip" data-placement="top" data-original-title="Add conventional units"  data-url="<?php echo site_url('records/custom_save/lab_test_results/conventional_units/');?>" data-type="text"  data-value="<?php echo ($lab_test_results->conventional_units) ? $lab_test_results->conventional_units : '';?>" data-pk="<?php echo ($lab_test_results->id) ? $lab_test_results->id : 0;?>" data-name="conventional_units" data-table="lab_test_results" id="<?php echo $info->id;?>" data-original-title="Enter conventional units"></a>
			<?php }else{
				echo ($lab_test_results->conventional_units) ? $lab_test_results->conventional_units : '--';
			}?>
			/
			<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('labtestresult', $this->role_id, 'view',   $this->license_id) : true) { ?>
				<a href="#" class="editable_custom" rel="tooltip" data-placement="top" data-original-title="Add si units"  data-url="<?php echo site_url('records/custom_save/lab_test_results/si_units/');?>" data-type="text"  data-value="<?php echo ($lab_test_results->si_units) ? $lab_test_results->si_units : '';?>" data-pk="<?php echo ($lab_test_results->id) ? $lab_test_results->id : 0;?>" data-name="si_units" data-table="lab_test_results" id="<?php echo $info->id;?>" data-original-title="Enter si units"></a>
			<?php }else{
				echo ($lab_test_results->si_units) ? $lab_test_results->si_units : '--';
			}?>
			</dd>
		</dl>

	</div>
</div>
<!--
The ID "widget-grid" will start to initialize all widgets below
You do not need to use widgets if you dont want to. Simply remove
the <section></section> and you can use wells or panels instead
-->
<div class="jarviswidget" id="widget-records" role="widget">
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
		<h2>Doctors Access </h2>
		
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

			
				<!--<ul class="nav nav-tabs tabs-left" id="demo-pill-nav">
					<?php //foreach($this->Record->get_all()->result_array() as $row) { ?> 
						<li <?php //if($type == strtolower(str_replace(' ', '_', $row['name']))) echo 'class="active"';?>>
							<a href="<?php //echo site_url('patients/records/'.strtolower(str_replace(' ', '_', $row['name'])).'/'.$this->encrypt->encode($info->id));?>" class="ajaxSoft"><span class="badge bg-color-blue txt-color-white">0</span> <?php //echo $row['name'];?></a>
						</li>
					<?php //} ?>
				</ul>-->
				<div class="tab-content" id="record">
					<?php if($type == 'summary'){ ?>
						<div id="empty-content">
							<i class="fa fa-list fa-5x"></i>
							<h1>Select Records on left to get started!</h1>
						</div>
					<?php }else{ ?>
						<div id="empty-content">
							<i class="fa fa-spin fa-spinner fa-5x"></i>
							<h1>Loading...</h1>
						</div>
					<?php } ?>
				</div>
			
				<form id="dpz" action="<?php echo site_url('records/save/-1/files'); ?>" class="hidden dropzone needsclick dz-clickable">
					<input type="hidden" name="user_id" id="user_id" value="<?php echo $info->id;?>"/>
					<div class="dz-message needsclick">
						Drop files here or click to upload.<br>
						<!-- <span class="note needsclick">()</span> -->
					  </div>
				</form>
		</div>
		<!-- end widget content -->

	</div>
	<!-- end widget div -->

</div>



<script type="text/javascript">
	var BASE_URL = '<?php echo base_url();?>';
	var type = '<?php echo $type;?>';
	var lic = '<?php echo $this->license_id;?>';
	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips*/
	 $("[rel=tooltip]").tooltip();
	 /*
	 * // activate popovers*/
	 $("[rel=popover]").popover();
	 /*
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

	if(type != 'summary'){
		load_record();
	}
	
	var myDropzoneform = function() {
		
		Dropzone.autoDiscover = false;
		file_up_names=[];
		
		var myDropzone = new Dropzone("#dpz", { 
			url: BASE_URL+'records/save/-1/files',
			addRemoveLinks: true,			
			success: function(file, response){

				$.smallBox({
					title : "Success",
					content : response.message,
					color : "#739E73",
					iconSmall : "fa fa-check",
					timeout : 3000
				});
				
				file_up_names.push(file.name);
				console.log(response); //{"success":true,"message":"Filesuccessfully added","media_date":"25\/03\/2017"}
			},
			removedfile: function(file) {

				x = confirm('Do you want to delete?');
				if(!x)  return false;
				
				var ids = file.id;			
				$.ajax({
					type: 'POST',
					url: BASE_URL+'records/delete',
					data: "id="+ids,
					dataType: 'json'
				});
				var _ref;
				return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        

				
			}
		});
		
		$.ajax({
			url: BASE_URL+'patients/get_record_files',
			type: 'post', 
			data: {
				type: 'files',
				id : '<?php echo $this->uri->segment(4);?>'
			},               
			dataType: 'json',
			success: function (response) {

				$.each(response, function(index, val) {
					var mockFile = { name: val.name, size: val.size };
					myDropzone.options.addedfile.call(myDropzone, mockFile);
					myDropzone.options.thumbnail.call(myDropzone, mockFile, BASE_URL+"uploads/" + lic + '/' + val.name);
				});
				
			}
		});

	}
	
	loadScript(BASE_URL+"js/plugin/dist/dropzone.js", myDropzoneform);


	function load_record(){
		$.ajax({
			url: BASE_URL+'patients/get_record',
			type: 'post', 
			data: {
				type: '<?php echo $type;?>',
				id : '<?php echo $this->uri->segment(4);?>'
			},               
			dataType: 'html',
			success: function (response) {
				
				$('#record').html(response);
			}
		});
	}
	
	$('.move-out').click(function(e) {
		
		bootbox.confirm({
		    title: "Consultation",
		    message: "Is it done?",
		    buttons: {
		        cancel: {
		            label: '<i class="fa fa-times"></i> No [ Cancel ]'
		        },
		        confirm: {
		            label: '<i class="fa fa-check"></i> Yes [ Finished ]'
		        }
		    },
		    callback: function (result) {
		        console.log('This was logged in the callback: ' + result); //$info->id
		        var id = $('.move-out').attr('id');
		        if(result){
		        	var status = '1';	
		        }else{
		        	var status = '0';
		        }
		        
		        $.ajax({
				url: BASE_URL +'queing/move_out/'+id+'/'+status,
				type: 'POST',
				beforeSend: function () {
					$(this).html('Please wait...');
					$(this).attr("disabled", "disabled");
				},
				success: function(response) {
	
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
		    }
		});
		e.preventDefault();
		
	});
	
	$('.move-in').click(function(e) { 

		$.ajax({
			url: $(this).attr('href'),
			type: 'POST',
			beforeSend: function () {
				$(this).html('Please wait...');
				$(this).attr("disabled", "disabled");
			},
			success: function(response) {

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
		e.preventDefault();
		
	});
	//get_value();
	
		
	var pagefunction = function() {

		/*
		 * X-Ediable
		 */
	
		loadScript(BASE_URL+"js/plugin/x-editable/moment.min.js", loadMockJax);
	
		function loadMockJax() {
		    loadScript(BASE_URL+"js/plugin/x-editable/jquery.mockjax.min.js", loadXeditable);
		}
	
		function loadXeditable() {
		    loadScript(BASE_URL+"js/plugin/x-editable/x-editable.min.js", loadTypeHead);
		}
	
		function loadTypeHead() {
		    loadScript(BASE_URL+"js/plugin/typeahead/typeahead.min.js", loadTypeaheadjs);
		}
	
		function loadTypeaheadjs() {
		    loadScript(BASE_URL+"js/plugin/typeahead/typeaheadjs.min.js", runXEditDemo);
		}
	
		function runXEditDemo() {
		    /*
		     * X-EDITABLES
		     */
	

		    //defaults
		    $.fn.editable.defaults.url = '/post';
		    //$.fn.editable.defaults.mode = 'inline'; use this to edit inline

		    $('#user .editable').on('hidden', function (e, reason) {
		        if (reason === 'save' || reason === 'nochange') {
		            var $next = $(this).closest('tr').next().find('.editable');
		            if ($('#autoopen').is(':checked')) {
		                setTimeout(function () {
		                    $next.editable('show');
		                }, 300);
		            } else {
		                $next.focus();
		            }
		        }
		    });
			
			$('.editable_text').each(function () {
				var obj = $(this);
				var type = obj.attr('data-name');
				obj.editable({
					emptytext: '--',
					validate: function (value) {
						if ($.trim(value) == '')
							return type+' field is required';
					},
					params: function(params) {  //params already contain `name`, `value` and `pk`
						var data = {};
						data['id'] = params.pk;
						data[type] = params.value;
						data['user_id'] = $(this).attr('id');
						return data;
					}
				});
				
			});	
			
			$('.editable_date').each(function () {
				var obj = $(this);
				var type = obj.attr('data-name');
				obj.editable({ 
					emptytext: '--',
					datepicker: {
						todayBtn: 'linked'
					},
					success: function(response, newValue) {
						$('#my_date').val(newValue);
						console.log(newValue);
					},
					params: function(params) {  //params already contain `name`, `value` and `pk`
						var data = {};
						data['id'] = params.pk;
						data[type] = params.value;
						data['user_id'] = $(this).attr('id');
						return data;
					}
				});
				
			});
			
			$('.editable_textarea').each(function () {
				var obj = $(this);
				var type = obj.attr('data-name');
				obj.editable({ 
					showbuttons: 'bottom',
					emptytext: '--',
					wysihtml5: {
					  "image": false,
					  "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
					  "emphasis": true, //Italics, bold, etc. Default true
					  "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
					  "html": false, //Button which allows you to edit the generated HTML. Default false
					  "link": true, //Button to insert a link. Default true
				   },
					params: function(params) {  //params already contain `name`, `value` and `pk`
						var data = {};
						data['id'] = params.pk;
						data[type] = params.value;
						data['user_id'] = $(this).attr('id');
						return data;
					}
				});
				
			});
				
			$('.editable_custom').each(function () {
				var obj = $(this);
				var field = obj.attr('data-name');
				var type = obj.attr('data-table');
				obj.editable({ 
					emptytext: '--',
					validate: function (value) {
						if ($.trim(value) == '')
							return field+' field is required';
					},
					params: function(params) {  //params already contain `name`, `value` and `pk`
						var data = {};
						data['id'] = params.pk;
						data[field] = params.value;
						data['user_id'] = $(this).attr('id');
						return data;
					},
					success: function(response, newValue) {
						checkURL();
					}
				});
				
			});
			
			get_vaccine_source().done(function (result) {

				$('.editable_vaccine').editable({
					source: result,
					value: '',
					emptytext: '--',
					params: function(params) {  //params already contain `name`, `value` and `pk`
						var data = {};
						data['id'] = params.pk;
						data[$(this).attr('data-name')] = params.value;
						data['user_id'] = $(this).attr('id');
						return data;
					},
					success: function(response, newValue) {
						checkURL();
					}
				});

			});
			
			get_dose_source().done(function (result) {

				$('.editable_doses').editable({
					source: result,
					value: '',
					emptytext: '--',
					params: function(params) {  //params already contain `name`, `value` and `pk`
						var data = {};
						data['id'] = params.pk;
						data[$(this).attr('data-name')] = params.value;
						data['user_id'] = $(this).attr('id');
						return data;
					},
					success: function(response, newValue) {
						checkURL();
					}
					
				});

			});
			
			
			function get_vaccine_source(){
				return $.ajax({
					type: 'GET',
					async: true,
					url: BASE_URL + 'records/get_vaccine_source_ajax',
					dataType: "json"
				});
			}
			
			function get_dose_source(){
				return $.ajax({
					type: 'GET',
					async: true,
					url: BASE_URL + 'records/get_doses_source_ajax',
					dataType: "json"
				});
			}
		}

		
	}
	
	var pagedestroy = function(){
		
		/*
		Example below:

		$("#calednar").fullCalendar( 'destroy' );
		if (debugState){
			root.console.log("✔ Calendar destroyed");
		} 

		For common instances, such as Jarviswidgets, Google maps, and Datatables, are automatically destroyed through the app.js loadURL mechanic

		*/

	    //destroy xeditable
	    $('.editable_text').editable("destroy");
	    $('.editable_custom').editable("destroy");
	    $('.editable_textarea').editable("destroy");
	    $('.editable_vaccine').editable("destroy");
	    $('.editable_doses').editable("destroy");
	    $('.editable_date').editable("destroy");

	}
	
	pagefunction();
</script>
