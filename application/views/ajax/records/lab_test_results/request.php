<style>
#test-wrap li.selected:before {
    content: "\f00c";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
    color: #000;
    font-size: 14px;
    padding-right: 0.5em;
    position: absolute;
    top: 10px;
    left: 0;
}
p.print-size-infos {
    position: absolute;
    z-index: 999;
    background: #000;
    width: 100%;
    padding: 3px 10px 5px;
    color: #fff;
}
.form-body {
    margin-top: 32px;
    margin-bottom: 6px;
}
@media print {
	#test-wrap li.selected:before {
		visibility:none;
	}
	.list-group {
		margin-bottom: 20px;
		padding-left: 0;
	}
	.list-group-item:first-child {
		border-top-right-radius: 2px;
		border-top-left-radius: 2px;
	}
	.list-group-item:last-child {
		margin-bottom: 0;
		border-bottom-right-radius: 2px;
		border-bottom-left-radius: 2px;
	}
	.list-group-item {
		position: relative;
		list-style: none;
		padding: 5px 15px;
		margin-bottom: -1px;
		background-color: #fff;
	}
	.btn-delete-test {
		display: none;
	}
	
}
</style>
<fieldset>
	<p class="print-size-infos">Customize the size depend on your previous sheets and adjust the top margin</p>
	<div class="clearfix"></div>
  
	<div class="form-body">
		<?php echo form_input(array(
			'name'=>'test_name',
			'id'=>'test_name',
			'placeholder'=>'Add test <press enter>',
			'class'=>'form-control')
		);?>
		
	</div>
	<!--<ul class="list-group" id="test-wrap"></ul>-->
	<ul class="list-group" id="test-wrap"></ul>
</fieldset>
<a href="javascript:;" id="preview" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Preview</a>  			
<script type='text/javascript'>

$(document).ready(function()
{

    runAllForms();
	
	$.fn.enterKey = function (fnc) {
		return this.each(function () {
			$(this).keypress(function (ev) {
				var keycode = (ev.keyCode ? ev.keyCode : ev.which);
				if (keycode == '13') {
					fnc.call(this, ev);
				}
			})
		})
	}
	
	$('#test_name').enterKey(function () {
		var obj = $(this);
			
		$.ajax({
			url: BASE_URL+'records/create_test',
			type: 'post', 
			data: {
				lab_test : obj.val()
			},               
			success: function (response) {

				$( '<li class="list-group-item" id="li-'+response.id+'">'+obj.val()+'<a href="'+BASE_URL+'records/delete_test/'+response.id+'" id="'+response.id+'" class="btn-delete-test pull-right btn-xs"><i class="fa fa-close"></i></a></li>').prependTo( '#test-wrap');
				obj.val('');
				$('.empty-post').remove();
				//obj
			},
			dataType: 'json'
		});
	});
	
	load_test()
	
	function load_test(){
		$.ajax({
			url: BASE_URL+'records/get_all_test',
			type: 'post', 
			data: {},               
			dataType: 'json',
			success: function (response) {
				
				if (response.length === 0) {
					
					$('<div class="alert alert-info text-center empty-post">Create test.</div>').appendTo('#test-wrap');
					
				}else{
					console.log(response);
					var items = [];
					$(response).each(function( index, val ) {
						
						items += '<li class="list-group-item" id="li-'+val.id+'">'+val.name+'<a href="'+BASE_URL+'records/delete_test/'+val.id+'" id="'+val.id+'" class="btn-delete-test pull-right btn-xs"><i class="fa fa-close"></i></a></li>';
						
					});
					
					$(items).appendTo('#test-wrap');
				}
			}
		});
	}
	
	$(document).on('click', 'ul#test-wrap li', function (e) {
		
		$(this).toggleClass('selected');
		
		check_item_test();
		
		e.preventDefault();
		
	});	
	
	$('#preview').hide();
	
	function check_item_test(){
		var item_check = $('ul#test-wrap li.selected').length;
		
		if(item_check > 0){
			$('#preview').show();
		}else{
			$('#preview').hide();
		}
		console.log(item_check);
	}
	
	$(document).on('click', '#preview', function (e) {
		
		$(this).removeAttr('id').attr('id', 'printThis').html('<i class="fa fa-print"></i> Print');
		
		$('ul#test-wrap li').not('.selected').remove();
		e.preventDefault();
		
	});
	
	$(document).on('click', '.btn-delete-test', function (e) {
		
		var url	= $(this).attr('href');
		var id	= $(this).attr('id');

		$.ajax({
			url: url,
			type: 'POST',
			success: function(response) {

				if(response)
				{
					$('#li-'+id).fadeOut();
					check_item_test();
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
	
	var printhis = function() {
	
		$(document).on('click', '#printThis', function (e) {
			
			$("#test-wrap").printThis({
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
