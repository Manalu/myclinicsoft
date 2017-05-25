
<style>
.modal .modal-dialog {
    width: 65%
}
</style>
<div class="row">	
	<div class="col-md-12">	
		<address>

		  <strong><?php echo $info->tname;?></strong>&nbsp;&nbsp;<?php if($info->isDefault == 1) echo '<span class="label label-success">Default</span>';?><br>
		  Status :&nbsp;  
		  <?php 
		  if($info->tstatus == 1){
			  $status = '<span class="label label-success">Enable';
		  }else{
			  $status = '<span class="label label-danger">Disable';
		  }
		  echo $status;?></span><br>
 
		  
		  <?php echo 'Created :&nbsp;'. $info->tcreated;?>	
		</address>
		<?php echo ($info->tcontent) ? $info->tcontent : '--';?>
	</div>
	
</div>
<script type="text/javascript">
    //runAllForms();

    
</script>