/******************************************************************************************
 * geocode_results.js
 *
 * CSCI-E52 Final Project, 2012
 * Anna Ntenta
 * anna.e.mckelvey@gmail.com
 *
 * JavaScript displaying users current rating and all ratings nearby on a map.
 * On every "key up" geocode.js geocodes user input until desired address found.
 *
 * Sources:
 * https://developers.google.com/maps/articles/phpsqlinfo_v3#CreatingMap,
 * https://developers.google.com/maps/articles/phpsqlajax_v3#createmap
 ********************************************************************************************/

// create map
var mapOpts = 
    {
      zoom: 16,
      center: new google.maps.LatLng(my_marker[0].lat, my_marker[0].lng),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }

var map = new google.maps.Map(document.getElementById("map"), mapOpts);

// add marker at address of user's submitted rating
var marker = new google.maps.Marker({
    map: map,
    position: new google.maps.LatLng(my_marker[0].lat, my_marker[0].lng),
    title: my_marker[0].address,
});
    
// add markers for all nearby ratings
for (var i = 0; i < area_markers.length; i++) {
        if (area_markers[i].address != my_marker[0].address){
            var address = area_markers[i].address;
            var point = new google.maps.LatLng(area_markers[i].lat, area_markers[i].lng);
            var marker = new google.maps.Marker({
                map: map,
                position: point,
                title: area_markers[i].address,
                icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png',
                shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
            });
        }
}  
    


