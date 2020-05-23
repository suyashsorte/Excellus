
"use strict";

var map;

function initMap()
{
    // lat and lng of the location
    var myLatLng = {lat: 43.0846, lng: -77.6743};
    
    // create map in div #lmMap
    map = new google.maps.Map(document.getElementById('map'),
    {
        center: {lat: 43.0846, lng: -77.6743},
        zoom: 10
    });

    // content in the infoWindow
    var lmContentString = '<p class="font-weight-bold">Excellus Corperation</p>';
    
    // create infoWindow
    var lmInfowindow = new google.maps.InfoWindow({
        content: lmContentString
    });
    
    // create marker
    var lmMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Excellus Corperation'
    });
    
    // add click function to marker
    lmMarker.addListener('click', function() {
        lmInfowindow.open(map, lmMarker);
    });


}
          
