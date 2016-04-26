jQuery(document).ready(function() {
    
    // remove weird white text that gets set mysteriously
	$('.work-count p.content-white').removeClass('content-white');

	var clipboard = new Clipboard('.copy-to-clipboard');

	clipboard.on('success', function(e) {
	    // add alert here
	});
    
});