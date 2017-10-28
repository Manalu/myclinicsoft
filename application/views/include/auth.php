<style type="text/css">
	#header>:first-child, aside {
	    width: auto !important;
	}
</style>
<header id="header">

	<div id="logo-group">
		
			<?php if($this->config->item('app_logo')){ ?>
				<span id="logo"> <img src="<?php echo base_url($this->config->item('app_logo'));?>" alt="obiascrn"> </span>
			<?php }else{ ?>
				<h2><?php echo $this->config->item('company').' <small>version : '.$this->config->item('app_version');?></small></h2>
			<?php } ?>
			
		
	</div>
	<?php if($option == 'login') { ?>
		<span id="extr-page-header-space"> <span class="hidden-mobile hidden-xs">Need an account?</span> <a href="<?php echo site_url('auth/register');?>" class="btn btn-danger">Create account</a> </span>
	<?php }else{ ?>
		<span id="extr-page-header-space"> <span class="hidden-mobile hidden-xs">Already registered?</span> <a href="<?php echo site_url('auth/login');?>" class="btn btn-danger">Sign In</a> </span>
	<?php } ?>
</header>