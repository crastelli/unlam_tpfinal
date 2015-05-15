function fCargarMapa(){
    var popup;
    var n=1;
    var options = {
        zoom: 9
        , center: new google.maps.LatLng(18.2, -66.5)
        , disableDefaultUI: true
    };
 
    var map = new google.maps.Map(document.getElementById('map'), options);
};