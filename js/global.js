var mcs = (function() {

    var that = {};

    that.init = function () {
		console.log('Global initialized!');
		setInterval(function(){
			
			var counts = $('span#que-counts').html();
			var xcounts = $('span#running-que-counts').html();
			
			$.ajax({
				url: BASE_URL+'queing/get_counts',
				type: 'post',   
				dataType: 'json',
				success: function (res) {
					$('#running-que-counts').html(res.counts);
				}
			});

			if(counts != xcounts){
				que_get();
				$('span#que-counts').text($('#running-que-counts').html());
			}
			
		},3000);
		
		que_counts();
		
		function que_counts(){
			$.ajax({
				url: BASE_URL+'queing/get_counts',
				type: 'post',   
				dataType: 'json',
				success: function (res) {
					$('#que-counts').html(res.counts);
				}
			});
		}
		
		que_get();
		
		function que_get(){
			$.ajax({
				url: BASE_URL+'queing/get_in',
				type: 'post',   
				dataType: 'html',
				beforeSend: function () {
					$('.project-context').find('ul.dropdown-menu').remove();
				},
				success: function (response) {
					$(response).appendTo( $( ".project-context" ) );
				}
			});
		}

		//if(ROLE_ID == 2){
	
			/* var setup = function (){
				$.ajax({
					url: BASE_URL+'secure/setup',
					onError: function () {
						bootbox.alert('Some network problem try again later.');
					},
					success: function (response)
					{
						var dialog = bootbox.dialog({
							title: 'Initial Setup',
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
			}
			
			loadScript(BASE_URL+"js/bootbox.min.js", setup); */
		//}
		
	}
	
	that.init_records = function (enc_id) {
		console.log('Records initialized!');
		
		load_complaints(enc_id);
	
		function load_complaints(enc_id){
			$.ajax({
				url: BASE_URL+'records/get_all_complaints',
				type: 'post', 
				data: {
					id : enc_id
				},               
				dataType: 'json',
				success: function (response) {

						var items = [];
						
						$(response).each(function( index, val ) {
							var _condition = val.conditions;
							if(_condition.length > 150) _condition = _condition.substring(0,150)+'...';
							console.log(val.date);
							items += '<div class="complaints-row group-'+val.date+'">'+
										'<p><strong>'+_condition+'</strong></p>'+
										'<div class="btn-group  pull-right">'+
											'<a href="'+BASE_URL+'records/delete/'+val.id+'/conditions" id="'+val.id+'" class="delete btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a> '+
											'<a title="Add Medication" href="'+BASE_URL+'records/create/medications/'+val.user_id+'/'+val.date+'" class="bootbox pull-right btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Medication</a>'+
										'</div>'+			
										'<div id="complaints-'+val.date+'"></div>'+
									'</div>';
							//retrieve any medications
							load_medications(val.user_id, val.date);
						});
					
					
					$('#complaints').after('<div id="complain-table"><h3>Complaint(s)</h3>'+items+'</div>');
					
				}
			});
		}
		
		function load_medications(user_id, date){
			$.ajax({
				url: BASE_URL+'records/get_all_medications',
				type: 'post', 
				data: {
					user_id : user_id,
					complaint_date : date
				},               
				dataType: 'json',
				success: function (res) {
					console.log(res);
					if (res.length === 0) {
						
						$('<div class="alert alert-info text-center empty-post">Add prescription.</div>').appendTo('#complaints-'+date);
						
					}else{
						var item = [];
						var xnum = 1;
						var ynum = 1;
						$(res).each(function( i, v ) {
							
							if(v.is_mainteinable === 'yes'){
								item += '<li class="list-group-item maintainable">'+
											'<label class="num">'+ ynum++ +'. </label> '+
											'<label class="medicine">'+v.medicine+'</label>'+
											'<label class="prep">'+v.preparation+'</label> '+
											'<label class="sig">'+v.sig+'</label>'+
											'<label class="qty"># '+v.qty+'</span></label>'+
											'<label class="print-action"><a title="Rx Preview" href="'+BASE_URL+'queing/preview/'+ user_id +'/'+v.date+'/yes" class="ajax-btn btn btn-success btn-xs" ><i class="fa fa-print"></i> Print</a></label>'+
										'</li>';
							}else{
								item += '<li class="list-group-item onece">'+
											'<label class="num">'+ xnum++ +'. </label> '+
											'<label class="medicine">'+v.medicine+'</label>'+
											'<label class="prep">'+v.preparation+'</label> '+
											'<label class="sig">'+v.sig+'</label>'+
											'<label class="qty"># '+v.qty+'</span></label>'+
											'<label class="print-action"><a title="Rx Preview" href="'+BASE_URL+'queing/preview/'+ user_id +'/'+v.date+'/no" class="ajax-btn btn btn-success btn-xs" ><i class="fa fa-print"></i> Print</a></label>'+
										'</li>';
							}
							
						});
						
						
						$('#complaints-'+date).append('<ul class="list-group medication_block">'+ item +'</ul>');
					}
				}
			});
		}
	
       /*  $.getScript(base_url+'assets/js/jquery.validate.min.js')
          .done(function( script, textStatus ) {
			
			
			
          })
          .fail(function( jqxhr, settings, exception ) {
            $('.container').text( "Triggered ajaxError handler." );
        }); */
	}	
	
    return that;

})();