/******************************************************************************************
 * geocode.js
 *
 * CSCI-E52 Final Project, 2012
 * Anna Ntenta
 * anna.e.mckelvey@gmail.com
 *
 * On the first "key down" the introductory text on landing page is removed (removeText())
 * in order for list of matching addresses and sliders to be displayed correctly.
 * 
 * On every "key up" geocode.js geocodes user input until desired address found.
 * 
 * When user submits an address that is recognized by the Google Maps API, the address is 
 * displayed on the map. HTML for sliders and submit button by which the address can be rated 
 * is generated by sliders.js.
 *
 * Upon submission of rating of address via submit button, data is sent to rate.php.
 *
 * Sources:
 * https://developers.google.com/maps/documentation/javascript/tutorial,
 * https://developers.google.com/maps/documentation/javascript/geocoding,
 * http://www.tufat.com/html_tutorials/HTMLEvents.php
 * http://www.javascriptkit.com/javatutors/dom2.shtml
 * http://oak.cs.ucla.edu/cs144/projects/javascript/suggest2.html
 ********************************************************************************************/

// Creates a "map options" object to contain map initialization parameters.
var mapOpts = 
{
  zoom: 13,
  center: new google.maps.LatLng(37.7750, -122.4183),
  mapTypeId: google.maps.MapTypeId.ROADMAP
}

// Create a new map inside HTML container using the mapOpts parameters.
var map = new google.maps.Map(document.getElementById("map"), mapOpts);

// Access the Google Maps API geocoding service via the google.maps.Geocoder object.
var geocoder = new google.maps.Geocoder();

// Makes intro text disappear when address submitted to make space for sliders
function removeText()
{
    document.getElementById("introText").innerHTML =  ""; 
}

// On key up, initiate a request to the geocoding service, passing it the address and a callback function
function geocode_str() {
    var address = document.getElementById("search").value;
    // only geocode strings that are more than 2 characters long
    if(address.length > 2) { 
        // callback function
        geocoder.geocode({address: address}, function(results, status) {
            // if geocode successful
            if (status == google.maps.GeocoderStatus.OK){
                // geocode must return at least one result
                if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                    // removes displayed list when a new geocoding request is made
                    removeList();
                    var length = results.length;
                    // for each object in geocoding result array, put in address list
                    for(var i = 0; i < length; i++){
                        createList(results[i]);
                    }
                    // set gecoder object to first result to 
                    geocoder.OnChange = results[0];
                } 
            }   
            else if(status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                document.getElementById("address_list").innerHTML =  "No results";
                 } 
                 else {
                    document.getElementById("address_list").innerHTML = "Lookup failed due to: " + status;
                 }
            });
    }
    else{
        document.getElementById("address_list").innerHTML =  "";
    }
}

// Removes items from address list 
function removeList(){
    while(list.firstChild){
        list.removeChild(list.firstChild);
    }
}

//Adds marker on map at submitted address
function addMarker(respons){
    var marker = new google.maps.Marker({
	    position: respons.geometry.location, 
	    map: map, 
	    title:respons.formatted_address
	});
}

// Geocoder results object representing object at index[0] in results list (input for rateMapOnChange())
geocoder.OnChange = {};

// Changes map, adds marker and shows sliders when address submitted in text field
function rateMapOnChange(){
    // change map
    map.fitBounds(geocoder.OnChange.geometry.viewport);
    // add marker
    addMarker(geocoder.OnChange);
    // sliders appear
    addSlider();
    // update values to be sent to rate.php 
    document.getElementById("search").value = geocoder.OnChange.formatted_address;
    document.getElementById("latlng").value = geocoder.OnChange.geometry.location.toUrlValue();
    document.getElementById("lat").value = geocoder.OnChange.geometry.location.lat();
    document.getElementById("lng").value = geocoder.OnChange.geometry.location.lng();
    document.getElementById("address").value = geocoder.OnChange.formatted_address;
}


// Changes map, adds marker and shows sliders when address clicked in list
function newMap(respons){
    // change map
    map.fitBounds(respons.geometry.viewport);
    // Update values to be sent to rate.php
    document.getElementById("search").value = respons.formatted_address;
    document.getElementById("latlng").value = respons.geometry.location.toUrlValue();
    document.getElementById("lat").value = respons.geometry.location.lat();
    document.getElementById("lng").value = respons.geometry.location.lng();
    document.getElementById("address").value = respons.formatted_address;
}
    

// Creates address list. When an address is clicked, sliders for rating appear and address is shown on map
var list = document.getElementById("address_list");
function createList(result){
    var item = document.createElement("li");
    // for each address object returned by geocoder, add to list
    item.innerHTML = result.formatted_address;
    list.appendChild(item);
    // on click: set new map and marker, remove address list, show sliders
    item.onclick = function(){
    addMarker(result);
    newMap(result);
    removeList();
    addSlider();
    }
}



