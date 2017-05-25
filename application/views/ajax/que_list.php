	<div id="fullscreen" class="btn-header transparent pull-right">
		<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
	</div>
	<div class="row" id="que">

		<div class="col-lg-4 col-md-4 col-sm-12 text-center">
			
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
		<div class="col-lg-8 col-md-8 col-sm-12">
			<h1>Put your Adds HERE</h1>
		</div>
	</div>
	

