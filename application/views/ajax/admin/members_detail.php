<address>
  <strong><?php echo $info->firstname.' '.$info->mi.' '.$info->lastname;?></strong><br>
  Birthday : <span><?php echo ($info->bYear) ? $info->bYear : '--'.' - '.($info->bMonth) ? $info->bMonth : '--'.' - '.($info->bDay) ? $info->bDay : '--';?></span><br>
  Age : <span><?php echo ($info->age) ? $info->age : '--';?></span><br>
  Gender : <span><?php echo ($info->gender) ? $info->gender : '--';?></span><br>
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
  <?php echo ($info->street) ? $info->street : '--'.', '.($info->address) ? $info->address : '--';?><br>
  <?php echo ($info->city) ? $info->city : '--'.', '.($info->state) ? $info->state : '--';?><br>
  <?php echo ($info->country) ? $info->country : '--'.', '.($info->zip) ? $info->zip : '--';?><br>
  <abbr title="Telephone Number">T:</abbr> <?php echo ($info->tel_number) ? $info->tel_number : '--';?><br>
  <abbr title="Mobile Number">M:</abbr> <?php echo ($info->mobile_number) ? $info->mobile_number : '--';?><br>
</address>

<img src="<?php echo $info->avatar;?>">

<script type="text/javascript">
    //runAllForms();

    
</script>