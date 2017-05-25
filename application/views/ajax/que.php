<!-- Suggestion: populate this list with fetch and push technique -->
<?php $this->load->library('encrypt');?>
<ul class="dropdown-menu">
	<?php if($this->Que->get_all($this->license_id)->num_rows() > 0) { ?>
		<?php $i = 1; ?>
		<?php foreach ($this->Que->get_all($this->license_id)->result_array() as $items){ ?>
		<li> 
			<a href="<?php echo site_url('patients/encode/medications/'.$items['que_patient_id']);?>"><strong><?php echo $items['que_id'];?>.</strong> &nbsp; <?php echo $items['que_name']; ?></a> 
		</li>
		<?php $i++; ?>
		<?php } ?>
		
		<li class="divider"></li>
		<li>
			<a href="<?php echo site_url('queing/clear_all');?>" class="clear-all"><i class="fa fa-power-off"></i> Clear</a>
		</li>
	<?php }else{
		echo '<li><a href="javascript:;">No waiting patients.</a></li>';
	}?>
</ul>
<!-- end dropdown-menu-->
<script type="text/javascript">

	$('.clear-all').click(function(e) { 

		$.ajax({
			url: $(this).attr('href'),
			type: 'POST',
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
					$('.project-selector').trigger('click');
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
</script>
