<div class="row">	
	<div class="col-md-9">	
		<address>
		  <strong><?php echo $info->firstname.' '.$info->mi.' '.$info->lastname;?></strong><br>
		  Birthday : <span><?php echo ($info->bYear) ? $info->bYear : '--'.' - '.($info->bMonth) ? $info->bMonth : '--'.' - '.($info->bDay) ? $info->bDay : '--';?></span><br>
		  Age : <span><?php echo ($info->age) ? $info->age : '--';?></span><br>
		  Gender : <span> 
		  <?php 
		  if($info->gender == 1){
			  $gender = 'Male';
		  }elseif($info->gender == 2){
			  $gender = 'Female';
		  }else{
			  $gender = 'Undefine';
		  }
		  echo ($info->gender) ? $gender : '--';?></span><br>
		</address>

		<address>  
		  Username : <strong><?php echo $info->username;?></strong><br>
		   Email : <?php echo ($info->email) ? '<a href="mailto:'. $info->email.'">'.$info->email.'</a>' : '--';?><br>
		  IP : <span><?php echo $info->last_ip;?></span><br>
		  Last Login : <span><?php echo $info->last_login;?></span><br>
		  Created : <span><?php echo $info->created;?></span>
		 
		</address>

		<address>
		  <strong>Full Address</strong><br>
		  <?php echo ($info->address) ? $info->address : '--';?><br>
		  <?php echo ($info->city) ? $info->city : '--'.', '.($info->state) ? $info->state : '--';?><br>
		  <?php echo ($info->country) ? $info->country : '--'.', '.($info->zip) ? $info->zip : '--';?><br>
		  <abbr title="Home Number">T:</abbr> <?php echo ($info->home_phone) ? $info->home_phone : '--';?><br>
		  <abbr title="Mobile Number">M:</abbr> <?php echo ($info->mobile) ? $info->mobile : '--';?><br>
		</address>
	</div>
	<div class="col-md-3">
		<?php if($info->avatar){
			echo '<img src="'.$info->avatar.'">';
		}else{
			echo '<img src="' . $this->gravatar->get($info->email) . '" />';
		}?>
	</div>
</div>
<script type="text/javascript">
    //runAllForms();

    
</script>