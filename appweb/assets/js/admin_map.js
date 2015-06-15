// $(function(){
//   fCargarMapa();
// });

var geocoder = new google.maps.Geocoder(),
	marker= null;

function geocodePosition(pos) 
{
	geocoder.geocode({
		latLng: pos
	}, function(responses) {
		// console.log(responses);
	});
}

function updateMarkerPosition(latLng)
{
	$('input[name="lat_long"]').val([latLng.lat(),latLng.lng()].join(', '));
}

function updateCampoDireccion(dire)
{
	$('input[name="direccion"]').val(dire);
}

function jsRemoveMarker()
{
	if( marker != null ) marker.setMap(null);
}

function fCargarMapa(pos)
{
	pos_default = pos.split(',');
	pos_lat = parseFloat(pos_default[0]);
	pos_lng = parseFloat(pos_default[1]);
	console.log(pos_lat);
	console.log(pos_lng);

	var markers = [];
	var mapOptions = { zoom:18, center:new google.maps.LatLng(pos_lat,pos_lng), mapTypeId:google.maps.MapTypeId.ROADMAP };
	var map = new google.maps.Map(document.getElementById('mapa'), mapOptions);
	var input = (document.getElementById('pac-input'));
	map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
	var searchBox = new google.maps.places.SearchBox((input));
	
	$('#pac-input').bind('keypress', function(event){
		var regex = /./;
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
           event.preventDefault();
           return false;
        }
	});
	
	var latLng = new google.maps.LatLng(pos_lat,pos_lng);
	marker = new google.maps.Marker(
									{ position     : latLng,
										map        : map,
										draggable  : true
									});
	google.maps.event.addListener(marker, 'drag', function() { updateMarkerPosition(marker.getPosition()); });
	google.maps.event.addListener(marker, 'dragend', function() { geocodePosition(marker.getPosition()); });
				
	google.maps.event.addListener(searchBox, 'places_changed', function()
	{
		jsRemoveMarker();
		for (var i = 0, marker; marker = markers[i]; i++) marker.setMap(null);
		markers = [];
		var bounds = new google.maps.LatLngBounds();
		var places = searchBox.getPlaces();
		for (var i = 0, place; place = places[i]; i++)
		{
			var image  = { url         : place.icon,
							size       : new google.maps.Size(71, 71),
							origin     : new google.maps.Point(0, 0),
							anchor     : new google.maps.Point(17, 34),
							scaledSize : new google.maps.Size(25, 25) 
						};

			marker = new google.maps.Marker(
											{ 	map       : map,
												icon      : image,
												title     : place.name,
												position  : place.geometry.location,
												draggable : true,
												animation : google.maps.Animation.DROP
											});
			markers.push(marker);
			bounds.extend(place.geometry.location);

			updateMarkerPosition(place.geometry.location);
			geocodePosition(place.geometry.location);
			updateCampoDireccion(input.value);
			google.maps.event.addListener(marker, 'drag', function() { updateMarkerPosition(marker.getPosition()); });
			google.maps.event.addListener(marker, 'dragend', function() { geocodePosition(marker.getPosition()); });
			break;
		}
		map.fitBounds(bounds);
	});
	google.maps.event.addListener(map, 'bounds_changed', function() {
		var bounds = map.getBounds();
		searchBox.setBounds(bounds);
	});
}