
// select tag lokasi
function initAutocomplete() {
    var markers           = [];
    var addressDetailType = 3;

    var infowindow = new google.maps.InfoWindow;
    var geocoder   = new google.maps.Geocoder;
	var	lat_posko  = document.getElementsByName('latitude_posko')[0].value ;
    var long_posko = document.getElementsByName('longitude_posko')[0].value ;
	var lat_pos		= parseFloat(lat_posko);
	var long_pos 	= parseFloat(long_posko);
	if (lat_posko!='' && long_posko!=''){
			var map        = new google.maps.Map(document.getElementById('map'), {
				center: {lat: lat_pos, lng: long_pos},
				zoom: 17,
				mapTypeId: 'roadmap'
			});
			var uluru = {lat: lat_pos, lng: long_pos};
			mark(map,uluru)
		} else {
			var map        = new google.maps.Map(document.getElementById('map'), {
				center: {lat: -8.094097, lng: 112.173915},
				zoom: 17,
				mapTypeId: 'roadmap'
			});
		}
    function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
    }
	
	function mark(map,uluru) {
		
		var mark = new google.maps.Marker({position: uluru, map: map});
		
	}

    function clearOldDetail() {
        document.getElementsByName('latitude_posko')[0].value = '';
        document.getElementsByName('longitude_posko')[0].value = '';
      //  document.getElementsByName('alamat_posko')[0].value = '';
    }

    function getPosition(location, marker) {
        // var address = getAddress(location, marker);
        var pos = {
            'lat': location.lat(),                
            'lng': location.lng(),
        }

        document.getElementsByName('latitude_posko')[0].value = location.lat();
        document.getElementsByName('longitude_posko')[0].value = location.lng();
    }

    function getAddress(location, marker) {
        var latlng = {lat: parseFloat(location.lat()), lng: parseFloat(location.lng())};
        geocoder.geocode({'location': latlng}, function(results, status) {
            var address;
            if (status === 'OK') {
                if (results[addressDetailType]) {
                    address = results[addressDetailType].formatted_address;
                    infowindow.setContent(address);
                    infowindow.open(map, marker);
                } else {
                    window.alert('No results found');
                    address = '';
                }
            } else {
                address = '';
                // alert if geocode reach limit 
                // window.alert('Geocoder failed due to: ' + status);
            }
        });
    }


    //add marker on click and remove another mark
    function addMarker(location) {
        clearMarkers();

        var marker = new google.maps.Marker({
            position: location,
            map: map
        });

        geocoder.geocode({'location': location}, function(results, status) {
            var address;
            if (status === 'OK') {
                if (results[addressDetailType]) {
                    address = results[addressDetailType].formatted_address;
                    
                    infowindow.setContent(address);
                    infowindow.open(map, marker);

                   // document.getElementsByName('alamat_posko')[0].value = address;
                } else {
                    window.alert('No results found');
                    address = '';
                }
            } else {
                address = '';
                // alert if geocode reach limit 
                // window.alert('Geocoder failed due to: ' + status);
            }
        });

        markers.push(marker);
        getPosition(location);
        // getAddress(location, marker);
    }

    map.addListener('click', function(event) {  
        addMarker(event.latLng);
    });        

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
        // Clear out the old markers.
        clearMarkers();

        var places = searchBox.getPlaces();
        if (places.length == 0) {
            return;
        }

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }

            // get icon based on detected location
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };
            var location = place.geometry.location;

            // Create a marker for each place.
            var marker = new google.maps.Marker({
                map: map,
                // icon: icon,
                title: place.name,
                position: location
            });
            markers.push(marker);

            // get lat lng
            getPosition(location);

            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}
// end select tag lokasi