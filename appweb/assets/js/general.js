$(function(){
	fCargarMapa();
});

function fCargarMapa()
{
    var popup;
    var n = 1;
    var options = {
        zoom: 11,
        center: new google.maps.LatLng(-34.612727, -58.445734),
        disableDefaultUI: true
    };
 
    var map = new google.maps.Map(document.getElementById('mapa'), options);
}