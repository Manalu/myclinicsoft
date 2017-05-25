/*
	 * APP CONFIGURATION
	 * Description: Enable / disable certain theme features here
	 */		
	$.navAsAjax = true; // Your left nav in your app will no longer fire ajax calls

	$.bread_crumb = $('#ribbon ol.breadcrumb');

/*
* APP AJAX REQUEST SETUP
* Description: Executes and fetches all ajax requests also
* updates naivgation elements to active
*/
if($.navAsAjax)
{

	//if ($('nav').length) {
	   checkURL();
    //};

	$(document).on('click', 'nav a[target="_blank"]', function(e) {
	    e.preventDefault();
	    var $this = $(e.currentTarget);

	    window.open($this.attr('href'));
    });

    // fire links with targets on same window
    $(document).on('click', 'nav a[target="_top"]', function(e) {
	    e.preventDefault();
	    var $this = $(e.currentTarget);

	    window.location = ($this.attr('href'));
    });

	$(document).on('click', 'nav a[href="#"], a.ajaxSoft', function(e) {
	    e.preventDefault();
    });

	$(document).on('click', 'nav a[href!="#"], a.ajaxSoft', function(e) {

		history.pushState(null, null, this.href);
		checkURL();

		$('nav li:has(a[href="' + this.href + '"])').removeClass("open").addClass("active");
		var title = ($('nav a[href="' + this.href + '"]').attr('title'))

		// change page title from global var
		document.title = (title || document.title);
		
		e.preventDefault();
	});


	$(window).bind('popstate', function(){
		checkURL();
	});

}else{
	$(document).on('click', 'nav a[href!="#"]', function(e) {
		e.preventDefault();
		var url = $(this).attr('href');
		if(url != '#') {
			$('#page-heading h1, .container').remove();
			$('#page-heading').append('<h2><i class="fa fa-cog fa-spin"></i> Loading...</h2>');
			$('html, body').animate({scrollTop: 0}, 500, function(){
				window.location.href = url;
			});
		}

	});
}

// CHECK TO SEE IF URL EXISTS
	function checkURL() {

		var url = window.location.href;
		container = $('#content');
		// Do this if url exists (for page refresh, etc...)

		// remove all active class
		$('nav li.active').removeClass("active");
		// match the url and add the active class
		$('nav li:has(a[href="' + url + '"])').addClass("active");

		var title = ($('a[href="' + url + '"]').attr('title'))

		// change page title from global var
		document.title = (title || document.title);

		replacePage(url, container);

	}
    
    function redirect_url_ak(t_url) {
		var url = ((t_url != undefined)?t_url:window.location.href);
        
        if($.navAsAjax)
        {
            history.pushState(null, null, url);
    		container = $('#content');
    		// Do this if url exists (for page refresh, etc...)
    
    		// remove all active class
    		$('nav li.active').removeClass("active");
    		// match the url and add the active class
    		$('nav li:has(a[href="' + url + '"])').addClass("active");
    
    		var title = ($('a[href="' + url + '"]').attr('title'))
    
    		// change page title from global var
    		document.title = (title || document.title);
    
    		replacePage(url, container);
        }else
        {
            location.href = url;
        }

	}


	function replacePage(url, container) {

		$.ajax({
			url: url,
			type: 'get',
			dataType: 'html',
			beforeSend : function() {
				// cog placed
				container.html('<h1><i class="fa fa-cog fa-spin"></i> Loading...</h1>');

				$('html, body').animate({
					scrollTop : 0
				}, "fast");
				
			},
			success: function(data){
				container.css({
				opacity : '0.0'
				}).html(data).delay(50).animate({
					opacity : '1.0'
				}, 300);
				
			},
			error : function(xhr, ajaxOptions, thrownError) {
				container.html('<h4 style="margin-top:10px; display:block; text-align:left"><i class="fa fa-warning txt-color-orangeDark"></i> Error: ' + ajaxOptions + ': ' + thrownError +'</h4>');
			},
			async : false
		});
	}

	