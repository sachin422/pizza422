'use strict';

var placeSearch, autocomplete;
var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'short_name',
    postal_code: 'short_name'
};

function initialize() {
    // Create the autocomplete object, restricting the search
    // to geographical location types.
    autocomplete = new google.maps.places.Autocomplete(
        /** @type  {HTMLInputElement} */(document.getElementById('autocomplete')),
        //types: ['(cities)'],
        {componentRestrictions: {country: "ind"}});
    // When the user selects an address from the dropdown,
    // populate the address fields in the form.
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        fillInAddress();
    });
}

function fillInAddress() {

    var place = autocomplete.getPlace();
    var area = '',
        city = '',
        state = '',
        pincode = '',
        lat = '',
        lng = '';


    if (place.address_components.length > 0) {

        for (var index in place.address_components) {

            var curAddr = place.address_components[index];
            var types = curAddr.types;



            if (types.indexOf("sublocality_level_1") >= 0 || types.indexOf("sublocality") >= 0) {
                area = curAddr.long_name;
            }

            if (index == 2 || types.indexOf("locality") >= 0) {
                city = curAddr.long_name;
            }


            if (types.indexOf("administrative_area_level_1") >= 0) {
                if (curAddr.short_name !== "IN") {
                    state = curAddr.long_name;
                }
            }

            if (types.indexOf("postal_code") >= 0) {
                pincode = curAddr.long_name;
            }


        }



    }
        lat = place.geometry.location.lat();
        lng = place.geometry.location.lng();


    console.log("Area: " + area + ", City:" + city + ", State: " + state + " Pincode: " + pincode);
    console.log("Lat: " + lat);
    console.log("lng: " + lng);
    $("input").prop("readonly",false);
    $("input[name='area']").val(area);
    //$("input[name='address']").val(area);
    $("input[name='city']").val(city);
    $("input[name='state']").val(state);
    $("input[name='pincode']").val(pincode);
    $("input[name='lat']").val(lat);
    $("input[name='lng']").val(lng);


}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
/*
 function geolocate() {
 if (navigator.geolocation) {
 navigator.geolocation.getCurrentPosition(function(position) {
 var geolocation = new google.maps.LatLng(
 position.coords.latitude, position.coords.longitude);
 var circle = new google.maps.Circle({
 center: geolocation,
 radius: position.coords.accuracy
 });
 autocomplete.setBounds(circle.getBounds());
 });
 }
 }
 */

