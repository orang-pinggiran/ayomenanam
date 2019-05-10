<?php  
$titik_lokasi = array();
foreach ($data as $key => $value) {
	$titik_lokasi[] = array(
		'lat'      => $value->latitude_map,
		'lng'      => $value->longitude_map,
		'alamat'   => $value->alamat_map,
		'kategori' => $value->nama_kategori,
	);
}
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        	<div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>PETA PEMETAAN HUTAN</h2>
                    </div>
                </div>
            </div>
            <div class="body">
                <div id="pemetaan" style="width:100%; height:520px; border:1px solid green;"></div>
            </div>

        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>adminBSB/js/peta-pemetaan-hutan.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6MLwjbd-cuOCFqZ48OWjmWGsyoZTlIag&libraries=places&callback=initialize_pemetaan_hutan" async defer></script>

<script type="text/javascript">
function base_url() {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin+'/'+pathparts[1].trim('/')+'/';
    }else{
        var url = location.origin; 
    }
    return url;
}

var marker_icon       = base_url()+'adminBSB/images/thumbs-up.png'
var zoom              = 15;
var addressDetailType = 1;

function initialize_pemetaan_hutan() {
	var titik_lokasi = '<?= json_encode($titik_lokasi) ?>';
	titik_lokasi     = $.parseJSON(titik_lokasi);
	var infowindow   = new google.maps.InfoWindow();

    var map        = new google.maps.Map(document.getElementById('pemetaan'), {
        center: {lat: -8.0947825, lng: 112.1477463},
        zoom: zoom,
        mapTypeId: 'roadmap',
        styles: [{"featureType":"administrative","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"administrative.land_parcel","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]}]
    });

    $.each(titik_lokasi, function(key, data) {
        var info   = 'mkl';
        var latLng = new google.maps.LatLng(data.lat, data.lng);
    
        // geocoder
        var latlng = {lat: parseFloat(data.lat), lng: parseFloat(data.lng)};

        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            icon: {
                labelOrigin: new google.maps.Point(14, 22),
                url: 'http://maps.google.com/mapfiles/kml/pal2/icon4.png'
            },
        });

        marker.addListener('click', function() {
        	infowindow.open(map, marker);
            infowindow.setContent('<h5>'+data.kategori+'</h5><p>'+data.alamat+'</p>');
        });
    });
}

</script>