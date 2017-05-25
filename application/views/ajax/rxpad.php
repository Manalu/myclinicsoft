<style>
.modal70 .modal-dialog {
    width: 65%;
}
</style>



<div id="printableArea" style="
  margin: 10px auto;
  page-break-after: always;
  position: relative;
  font-family: Menlo,Monaco,Consolas,Courier New,monospace;
  font-size: 20px;
  font-size: 20px;
  background-color: #fff;
  color: #000;
">
<?php echo $pdf_html; ?>
</div>
<a href="javascript:;" id="printThis" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print</a>  
<script type='text/javascript'>

	var printhis = function() {
	
		$('#printThis').click(function(){
			
			$("#printableArea").printThis({
				   debug: false,               //* show the iframe for debugging
				   importCSS: true,            //* import page CSS
				   importStyle: true,         //* import style tags
				   printContainer: true,       //* grab outer container as well as the contents of the selector
				   pageTitle: "try",           //   * add title to print page
				   removeInline: false,        //* remove all inline styles from print elements
			});		
		});
	}
	loadScript(BASE_URL+"js/printThis.js", printhis);
</script>
