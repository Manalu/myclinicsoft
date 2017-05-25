



<form id="dpz" action="<?php echo site_url('records/save/-1/'.$type); ?>" class="dropzone needsclick dz-clickable">
	<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>"/>
	<div class="dz-message needsclick">
		Drop files here or click to upload.<br>
		<!-- <span class="note needsclick">()</span> -->
	  </div>
</form>
	

<link href="<?php echo base_url();?>js/plugin/dist/dropzone.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
var BASE_URL = '<?php echo base_url();?>';
var type = '<?php echo $type;?>';

(function( $ ) {
	
	var myDropzoneform = function() {
		var myDropzone = new Dropzone("#dpz", { 
			url: BASE_URL+'records/save/-1/'+type, 
			success: function(file, response){

				$.smallBox({
					title : "Success",
					content : response.message,
					color : "#739E73",
					iconSmall : "fa fa-check",
					timeout : 3000
				});
		
			}
		});
	
	}
	
	loadScript(BASE_URL+"js/plugin/dist/dropzone.js", myDropzoneform);
	
})(jQuery);	

</script>
