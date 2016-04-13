/*   
    function initialize() {


var country = "United States";
var latlng = new google.maps.LatLng(37.0902,-95.7129);
        var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap',
        center:latlng
    };
                    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);

    

       
    // Multiple Markers
    var markers = [
        ['Portland', 43.66147100000001,-70.2553259],
        ['Ohio', 40.4172871,-82.90712300000001],
        ['organo', 43.8041334,-120.55420119999997],
    ];
                        
    // Info Window Content
    var infoWindowContent = [
        ['<div class="info_content">' +
        '<h3>London Eye</h3>' +
        '<p>The London Eye is a giant Ferris wheel situated on the banks of the River Thames. The entire structure is 135 metres (443 ft) tall and the wheel has a diameter of 120 metres (394 ft).</p>' +        '</div>'],
        ['<div class="info_content">' +
        '<h3>Palace of Westminster</h3>' +
        '<p>The Palace of Westminster is the meeting place of the House of Commons and the House of Lords, the two houses of the Parliament of the United Kingdom. Commonly known as the Houses of Parliament after its tenants.</p>' +
        '</div>']
    ];
        
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        
        map.fitBounds(bounds);
    }

   
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });



}
*/
    var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize() {


var str=$('#arr_places').val();
var min_lat=$('#min_lat').val();
var min_long=$('#min_lat').val();
alert(str);
var locations = 
    [
       str
    ];

var infowindow = new google.maps.InfoWindow();

var marker, i;
   
map = new google.maps.Map(document.getElementById('map_canvas'), {
     zoom: 5,
    /*scrollwheel: false,
     navigationControl: false,
    mapTypeControl: false,
    scaleControl: false,
    draggable: false,*/
   zoomControl: true , 

    
    center: new google.maps.LatLng(40.7282239,-73.79485160000002),
    mapTypeId: google.maps.MapTypeId.ROADMAP
});

alert(locations.length);
console.log(locations);
 
for (i = 0; i < locations.length; i++) {
    alert(locations[i][0]);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
    });

    google.maps.event.addListener(marker, 'click', (function (marker, i) {
        return function () {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
        }
    })(marker, i));
}
//map.setZoom();
}
directionsDisplay = new google.maps.DirectionsRenderer();

directionsDisplay.setMap(map);
google.maps.event.addDomListener(window, 'load', initialize);