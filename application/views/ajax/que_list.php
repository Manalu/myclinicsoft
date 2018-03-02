<style>
.ads-regular {
    border: 3px dotted #343434;
    margin: 2em 0;
    padding: 2em;
	height: 8em;
}
.ads-premium {
	border: 3px dotted #343434;
    margin: 2em 0;
    padding: 2em;
	height: 25em;
}
#footer {
    color: #000;
    padding: 1em 0 .5em;
    margin-top: 4em;
}
</style>

<section id="que">	
	<div class="container-fluid">
		<div id="fullscreen" class="btn-header transparent pull-right">
			<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
		</div>
		<div class="row" id="que">

			<div class="col-md-4 col-sm-12 text-center">
				
				<h2>Serving</h2>

				<div id="clock-large"></div>
	   
				<?php if($this->Que->get_all($this->license_id)->num_rows() > 0) { ?>
					<?php $i = 1; ?>
					<?php foreach ($this->Que->get_all($this->license_id)->result_array() as $items){ ?>
						<?php if($i <= 3) { ?>
						<div class="que-number" id="counts-<?php echo $i;?>">
							<?php if($i == 1) echo ''; ?><?php echo $items['que_id'];?> <!--<span id="name"><?php //if($i == 1) echo $items['que_name']; ?></span>-->
						</div>
						<?php $i++; ?>
					<?php } } ?>
				<?php }else{ ?>
						<div class="que-number" id="counts-1">
							000
						</div>
				<?php } ?>
				
			</div>
			<div class="col-md-8 col-sm-12">
				
				<div class="ads-regular">
					<h1>Regular Adds HERE</h1>
				</div>
				<div class="ads-regular">
					<h1>Regular Adds HERE</h1>
				</div>
				<div class="ads-regular">
					<h1>Regular Adds HERE</h1>
				</div>
				<div class="ads-premium">
					<h1>Premium Adds HERE</h1>
				</div>
			</div>
		</div>
		
	</div>
</section>
<section id="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 text-center">
			<p><?php echo $this->config->item('app_name').' '.$this->config->item('app_version');?> <span class="hidden-xs"> - <?php echo $this->lang->line('__common_web_application');?></span> <?php echo $this->config->item('app_copyright');?></p>
			</div>
		</div>
	</div>
</section>
	

