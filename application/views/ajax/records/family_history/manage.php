<?php if(count($result) > 0) { ?>
	<table class="table">
		<thead>
			<tr>
				<th><p><?php echo ucfirst(str_replace('_', ' ', $type));?></p></th>
				<th>
					<a title="Add new <?php echo strtolower(str_replace('_', ' ', $type));?>" href="<?php echo site_url('records/create/'.$type.'/'.$id);?>" class="bootbox pull-right btn btn-success btn-xs">
						<i class="fa fa-plus"></i> <?php echo $this->lang->line('common_add_new');?>
					</a>
				</th>
			</tr>
		</thead>
		<tbody>
		
		
			<?php foreach($result as $row) { ?>
				<tr id="row-<?php echo $row['id'];?>">
					<td>
						<strong id="history-<?php echo $row['id'];?>"><?php echo $row['history'] ;?></strong></br>
						<span class="text-muted"><?php echo date($this->config->item('dateformat'), strtotime($row['date']));?></span>
						
					</td>
					<td class="text-right">
						<a href="<?php echo site_url('records/delete/'.$row['id'].'/'.$type);?>" id="<?php echo $row['id'];?>" class="delete btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
					</td>
				</tr>
			<?php } ?>

		</tbody>
	</table>
<?php }else{?>
<div id="empty-content">
		<i class="fa fa-list fa-5x"></i> 
		<h1>No <?php echo ucfirst(str_replace('_', ' ', $type));?> found! <a title="Add new <?php echo $type;?>" href="<?php echo site_url('records/create/'.$type.'/'.$id);?>" class="bootbox">
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
						message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>'
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

