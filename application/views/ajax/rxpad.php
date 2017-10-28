<style>
.modal70 .modal-dialog {
    width: 65%;
}

@media print {
	#printableArea{
		/*width: 7.5in !important; */
		page-break-after: always;
		position: relative;
		font-family: Menlo,Monaco,Consolas,Courier New,monospace;
		/*font-size: 20px;*/
		background-color: #fff;
		color: #000;
	}
	#rx-pad{
		/*width: 7.5in !important; */
		height: 11in !important;
		/* margin: 10px auto; */
		page-break-after: always;
		position: relative;
		font-size: 20px;
		background-color: #fff;
		color: #000;
	}
	#rx-header{
		margin-top: 165px;
		position: absolute;
		width: 100%;
		/* padding: 0px 30px; */
		/*font-size: 22px;*/
	}
	#rx-body{
		min-height: 570px;
		/*font-weight: bold;*/
		color: rgb(51, 122, 183);
		position: absolute;
		top: 360px;
		width: 100%;
		/*font-size: 23px;*/
	}
	#rx-footer{
		position: absolute;
		bottom: 75px;
		width: 100%;
		/*font-size: 20px;*/
	}
}
</style>


<p class="print-size-info">Suggested size <code>A5	148 x 210 mm	5.8 x 8.3 in</code></p>
<div id="printableArea" style="/*width: 7.5in !important; */
  page-break-after: always;
  position: relative;
  font-family: Menlo,Monaco,Consolas,Courier New,monospace;
  font-size: 20px;
  font-size: 20px;
  background-color: #fff;
  color: #000;">
<?php echo $pdf_html; ?>
</div>
<a href="javascript:;" id="printThis" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print</a>  
<a href="javascript:;" id="customize" class="hidden btn btn-sm btn-warning"><i class="fa fa-edit"></i> Customize </a>  
<script type='text/javascript'>
	
	$(document).ready(function()
	{
		
		var printhis = function() {
	
			$('#printThis').click(function(){
				
				$("#printableArea").printThis({
					   debug: false,               //* show the iframe for debugging
					   importCSS: true,            //* import page CSS
					   importStyle: true,         //* import style tags
					   printContainer: true,       //* grab outer container as well as the contents of the selector
					   pageTitle: "RX Pad",           //   * add title to print page
					   removeInline: false,        //* remove all inline styles from print elements
				});		
			});
		}
		loadScript(BASE_URL+"js/printThis.js", printhis);
	
	});
	
	
</script>
