var marker_icon   = base_url+'adminBSB/images/thumbs-up.png'
var zoom          = 13;
var addressDetailType = 1;

var detail_tps,detail_kecamatan,res,center_map_lat,center_map_lng;

function gmaps_initialize(detail_kecamatan = null, detail_tps = null) {
    if(detail_kecamatan == null && detail_tps == null) {
        var map = new google.maps.Map(document.getElementById('marker'), {
            center: {lat: -8.099070, lng: 112.165688},
            zoom: zoom,
            mapTypeId: 'roadmap'
        });
        return false;
    }else{
    var infowindow = new google.maps.InfoWindow();
    var geocoder   = new google.maps.Geocoder;

    center_map_lat = parseFloat(detail_kecamatan.focus_lat);
    center_map_lng = parseFloat(detail_kecamatan.focus_lng);

    var map        = new google.maps.Map(document.getElementById('marker'), {
        center: {lat: center_map_lat, lng: center_map_lng},
        zoom: zoom,
        mapTypeId: 'roadmap',
        styles: [{"featureType":"administrative","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]}]

    })};

    $.each(detail_tps, function(key, data) {
        var info   = '<h1>TPS - '+data.no_tps+'</h1><p>'+data.alamat+'</p>';
        var latLng = new google.maps.LatLng(data.lat, data.lng);
    
        // geocoder
        var latlng = {lat: parseFloat(data.lat), lng: parseFloat(data.lng)};
        

        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            icon: {
                labelOrigin: new google.maps.Point(14, 22),
                url: marker_icon
            },
            label: { color: '#525252', fontWeight: 'small', fontSize: '11px', text: 'TPS-'+data.no_tps}
        });

        marker.addListener('click', function() {
            geocoder.geocode({'location': latlng}, function(results, status) {
                var address;
                if (status === 'OK') {
                    if (results[addressDetailType]) {
                        address = results[addressDetailType].formatted_address;
                        address = address.replace('Unnamed Road, ', '');
                        console.log(address);
                        // infowindow.setContent(address);
                        // infowindow.open(map, marker);
                        infowindow.open(map, marker);
                        infowindow.setContent(info+'<hr>'+address);
                    } else {
                        window.alert('No results found');
                        address = '';
                    }
                }
            });
        });
    });
}
