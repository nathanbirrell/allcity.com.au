/* =================================
	Map
==================================== */
;(function ( $, window, document, undefined ) {
 // When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);

function init() {
	
	var _selector = $('div.map');
	var _lat = _selector.data('lat');
	var _long = _selector.data('long');
	var latLong = new google.maps.LatLng(_lat, _long);
	_selector.find('#googlemap').show();

	// Basic options for a simple Google Map
	// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
	var mapOptions = {
		// How zoomed in you want the map to start at (always required)
		zoom: 14,

		scrollwheel: false,
		navigationControl: false,
	    mapTypeControl: false,
	    scaleControl: false,
	    draggable: false,
	    mapTypeId: google.maps.MapTypeId.ROADMAP,

		// The latitude and longitude to center the map (always required)
		center: latLong, 

		// How you would like to style the map. 
		// This is where you would paste any style found on Snazzy Maps.
		styles: [{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#d3d3d3"}]},{"featureType":"transit","stylers":[{"color":"#808080"},{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#b3b3b3"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"weight":1.8}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#d7d7d7"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#ebebeb"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"color":"#a7a7a7"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#efefef"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#696969"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"color":"#737373"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#d6d6d6"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#dadada"}]}]
	};

	// Get the HTML DOM element that will contain your map 
	// We are using a div with id="map" seen below in the <body>
	var mapElement = document.getElementById('map');

	// Create the Google Map using out element and options defined above
	var map = new google.maps.Map(mapElement, mapOptions);
	setTimeout(function(){
		$('div.map').find('#googlemap').hide();
	}, 1000);

	var marker = new google.maps.Marker({
	    position: latLong,
	    title: "Hello World!"
	});
	var infowindow = new google.maps.InfoWindow({
		content: "<b>All City Bathrooms and Kitchens</b>"
	});

	// To add the marker to the map, call setMap();
	marker.setMap(map);

	infowindow.open(map, marker);
}

$('a[href=#tab1], a[href=#tg2]').on('click', function() {
	setTimeout(function(){
		google.maps.event.trigger(map, 'resize');
	}, 50);
});
$(".map-button").on("click", function () {
    $("#googlemap").slideToggle("fast");
    $(this).text($(this).text() == "Locate Us on Map" ? "Locate Us on Map" : "Locate Us on Map");
	if($(this).text() == 'Locate Us on Map')
	{
		//google.maps.event.trigger(map, 'resize');
	}
});

})( jQuery, window, document );
