	<table class="table">
		<thead>
			<tr>
				<th colspan="2"><p><?php echo ucfirst($type);?></p></th>
				<th>
					<?php if(($this->admin_role_id != $this->role_id) ? $this->Module->has_permission('patient', $this->role_id, 'create',   $this->license_id) : true) { ?>
			
			
					<a title="Add new <?php echo $type;?>" href="<?php echo site_url('records/create/'.$type.'/'.$id);?>" class="bootbox pull-right btn btn-success btn-xs">
						<i class="fa fa-plus"></i> <?php echo $this->lang->line('common_add_new');?>
					</a>
					<?php } ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php if(count($m_result) > 0) { ?>
			<?php foreach($m_result as $mrow) { ?>
				<tr class="group-<?php echo $mrow['date'];?> mainteinable">
					<td><strong><?php echo $this->lang->line('records_mainteinable');?></strong> <span class="mDate"><?php echo date('F d, Y', strtotime($mrow['date']));?></span>
						
					</td>
					<td><?php if($mrow['date'] == date('Y-m-d')) echo ' <span class="label label-warning">Today</span>';?></td>
					<td class="text-right">
						<div class="btn-group">
							<a href="<?php echo site_url('records/delete/'.$mrow['id'].'/'.$type);?>" id="<?php echo $mrow['id'];?>" class="delete btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a> 
							<a title="Rx Preview" href="<?php echo site_url('queing/preview/'.$mrow['user_id'].'/'.$mrow['date'].'/yes');?>" class="bootbox-rx btn btn-success btn-xs" ><i class="fa fa-print"></i> Print</a>
						</div>

					</td>

				</tr>
				<tr class="mainteinable">
					<td colspan="3">
						<ul class="list-group">
						<?php $i = 1; foreach($this->Record->get_current_data($type, $id, $mrow['date'], 'yes') as $sub_group) { ?>
								
							<li class="list-group-item"><label class="num"><?php echo $i.'. ';?></label> <label class="medicine"><?php echo $sub_group['medicine'];?></label> <label class="prep"><?php echo $sub_group['preparation'];?></label> <label class="sig"><?php echo $sub_group['sig'];?></label> <span class="badge"><?php echo '# '.$sub_group['qty'];?></span></li>
						<?php $i++; } ?>
						
						</ul>
					</td>
				</tr>
				
			<?php 
			} 
		}?>

		<?php if(count($pr_result) > 0) { ?>
			<?php foreach($pr_result as $row) { ?>
				
				<tr class="group-<?php echo $row['date'];?> <?php if($row['date'] == date('Y-m-d')) echo 'current';?>">
					<td><strong><?php echo date('F d, Y', strtotime($row['date']));?> </strong>
						
					</td>
					<td><?php if($row['date'] == date('Y-m-d')) echo ' <span class="label label-warning">Today</span>';?></td>
					<td class="text-right">
						<div class="btn-group">
							<a href="<?php echo site_url('records/delete/'.$row['id'].'/'.$type);?>" id="<?php echo $row['id'];?>" class="delete btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a> 
							<a title="Rx Preview" href="<?php echo site_url('queing/preview/'.$row['user_id'].'/'.$row['date'].'/no');?>" class="bootbox-rx btn btn-success btn-xs" ><i class="fa fa-print"></i> Print</a>
						</div>

					</td>
					
					 
				</tr>
				<tr>
					<td colspan="3">
						<ul class="list-group">
						<?php $i = 1; foreach($this->Record->get_current_data($type, $id, $row['date'], 'no') as $sub_group) { ?>
								
							<li class="list-group-item"><label class="num"><?php echo $i.'. ';?></label> <label class="medicine"><?php echo $sub_group['medicine'];?></label> <label class="prep"><?php echo $sub_group['preparation'];?></label> <label class="sig"><?php echo $sub_group['sig'];?></label> <span class="badge"><?php echo '# '.$sub_group['qty'];?></span></li>
						<?php $i++; } ?>
						
						</ul>
					</td>
				</tr>
			<?php 
			} 
		?>

		</tbody>
	</table>
<?php }else{?>
	<div id="empty-content">
		<i class="fa fa-list fa-5x"></i>
		<h1>No <?php echo ucfirst($type);?> found! <a title="Add new <?php echo $type;?>" href="<?php echo site_url('records/create/'.$type.'/'.$id);?>" class="bootbox">
						Create new
					</a></h1>
	</div>
<?php } ?>			
<script type='text/javascript'>

$(document).ready(function() {
	
	var pagefunction = function() {
	// clears the variable if left blank
		$(".bootbox").click(function (e) {
			var title = $(this).attr('title');
			e.preventDefault();
			$.ajax({
				url: $(this).attr('href'),
				onError: function () {
					bootbox.alert('Some network problem try again later.');
				},
				success: function (response)
				{
					var dialog = bootbox.dialog({
						title: title,
						message: '<p class="text-center"><img src="'+BASE_URL+'img/ajax-loader.gif"/></p>'
					});
					dialog.init(function(){
						setTimeout(function(){
							dialog.find('.bootbox-body').html(response);
						}, 3000);
					});
				}
			});
			return false;  
		});
		
		$(".bootbox-rx").click(function (e) {
			var title = $(this).attr('title');
			e.preventDefault();
			$.ajax({
				url: $(this).attr('href'),
				onError: function () {
					bootbox.alert('Some network problem try again later.');
				},
				success: function (response)
				{
					var dialog = bootbox.dialog({
						title: title,
						className: "modal70",
						message: '<p class="text-center"><img src="'+BASE_URL+'img/ajax-loader.gif"/></p>'
					});
					dialog.init(function(){
						setTimeout(function(){
							dialog.find('.bootbox-body').html(response);
						}, 3000);
					});
				}
			});
			return false;  
		});
		
	};
	
	loadScript(BASE_URL+"js/bootbox.min.js", pagefunction);
		
	$('.delete').click(function(e) { 
		
		var url	= $(this).attr('href');
		var id	= $(this).attr('id');

		$.ajax({
			url: url,
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
});


</script>

