<div id="ribbon">

	<span class="ribbon-button-alignment"> 
		<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
			<i class="fa fa-refresh"></i>
		</span> 
	</span>

	<!-- breadcrumb -->
	<ol class="breadcrumb">
		<li>Dashboard</li>
	</ol>
	<!-- end breadcrumb -->
	
	<?php if($this->role_id == 1){ ?>
		<?php if($this->uri->segment(1) != 'admin') {?>
		<span class="ribbon-button-alignment pull-right">
			<span id="admin-panel" class="btn btn-ribbon hidden-xs" data-title="admin-panel"><a href="<?php echo site_url('admin/dashboard');?>">Admin Panel</a></span>
		</span> 
		<?php } ?>
	<?php } ?>
</div>