<div class="row">	
	<div class="col-md-12">	
		<address>

		  <strong><?php echo $info->role_name;?></strong><br>
		  <span><?php echo ($info->role_desc) ? $info->role_desc : '--';?></span><br>
		  Status :  
		  <?php 
		  if($info->role_status == 1){
			  $status = '<span class="label label-success">Enable';
		  }else{
			  $status = '<span class="label label-danger">Disable';
		  }
		  echo $status;?></span><br>
		</address>
		<legend>Module access</legend>
		<address>  
			<?php 
			
			if($info->role_name == 'Admin'){
				
				echo 'Access all modules.';	
			}else{
				if($this->Role->get_all_permited($info->role_id, 'view', $this->license_id)->num_rows() > 0){
					echo '<ul class="list-unstyled">';
					foreach($this->Role->get_all_permited($info->role_id, 'view', $this->license_id)->result_array() as $modules){
						echo '<li>'.ucfirst($modules['module']).'</li>';
					}
					echo '</ul>';
				}
				else
				{
					echo 'No modules access!';
				}
				//echo 'limit modules';
			}?>
		 
		</address>

	</div>
	
</div>
<script type="text/javascript">
    //runAllForms();

    
</script>