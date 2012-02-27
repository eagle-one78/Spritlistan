/*********************************************************************************************************
 *      @DESC: google_locations.js
 *      @Author: Sam Almendwi
 *      @Copyright: This program/code is only for use and learn not for sale or modify by others than me.
 * 
 *      Displays a Google map with the current user location and the nearest Systembolagets shops
 *      with information windows.      
 *********************************************************************************************************
 */



function initialize() {
    var map_canvas = $("#map_canvas");
    $("#map_canvas").css("width", "500px");
    $("#map_canvas").css("height", "400px"); 

    var map = new google.maps.Map(map_canvas[0], {
        center: new google.maps.LatLng(59.329444, 18.068611),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
    var locations = [
    ['<a href="http://www.stockholm.se/stadshuset" target="_blank">Stockholms Stadshus</a>', 59.3275, 18.055],
    ['<a href="http://www.klarakyrka.se/" target="_blank">Klara kyrka</a>', 59.331111, 18.061667],
    ['<a href="http://www.skansen.se/?gclid=CPiJi_fnpa4CFTAumAodIxIeQQ" target="_blank">Skansen</a>', 59.326111, 18.103611],
    ['<a href="http://www.vasamuseet.se/" target="_blank">Vasamuseet</a>', 59.32794, 18.09139],
    ['<a href="http://www.visitstockholm.com/sv/Resa/Till-Stockholm/centralstation-stockholm/4043" target="_blank">Stockholm centralstation</a>', 59.33, 18.056]
    ];

    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = new google.maps.LatLng(position.coords.latitude,
                position.coords.longitude);
                
            var my_position_marker = new google.maps.Marker({
                position: pos,
                map: map
            });

            var infowindow = new google.maps.InfoWindow({
                map: map,
                position: pos,
                content: 'You are here'
            });

            map.setCenter(pos);
            
            google.maps.event.addListener(my_position_marker, 'mouseover', (function(my_position_marker) {
            return function() {                
                infowindow.open(map, my_position_marker);
            }
        })(my_position_marker));
        
        console.debug(pos); 
        
        var markers_infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {  
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                return function() {
                    markers_infowindow.setContent(locations[i][0]);
                    markers_infowindow.open(map, marker);
                }
            })(marker, i));
        }
        
        }, function() {
            handleNoGeolocation(true);
        });
    } else {
        // Browser doesn't support Geolocation
        handleNoGeolocation(false);
    }   

}

function handleNoGeolocation(errorFlag) {
    if (errorFlag) {
        var content = 'Error: The Geolocation service failed.';
    } else {
        var content = 'Error: Your browser doesn\'t support geolocation.';
    }

    var options = {
        map: map,
        position: new google.maps.LatLng(60, 105),
        content: content
    };

    var failure_infowindow = new google.maps.InfoWindow(options);
    map.setCenter(options.position);
}

$(document).ready(function(){    
    var scriptTag = '<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDv6vOC727RH2dAECuocdml5E5sqAXFnrU&sensor=true&region=SV&callback=initialize">'        
    $("body").append(scriptTag);
});