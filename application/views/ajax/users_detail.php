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

		<?php if(!empty($info->avatar))
		{
			$img = base_url().'/uploads/'.$this->license_id.'/profile-picture/'.$info->avatar;
		}
		else
		{ 
			$img = $this->gravatar->get($info->email);
		} ?>
		

		<img src="<?php echo $img;?>" alt="Profile Picture" style="width:100px; height:100px;">
	</div>
</div>
<script type="text/javascript">
    //runAllForms();

    
</script>