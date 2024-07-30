<!DOCTYPE html>
<html>

<head>
    <title>Google Map Example with Custom Markers</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABx5ofBw372C9eq8pOvlrSsRshGFcsxnQ"></script>
    <script>
        function initialize() {
            callAjax('https://tracking.developerbrothersproject.com/admin/FunctionName?request=location', '', function(data) {
                var locationData = JSON.parse(data);

                var mapOptions = {
                    zoom: 16,
                    center: new google.maps.LatLng(locationData.data[0].lat, locationData.data[0].lng),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var map = new google.maps.Map(document.getElementById('map'), mapOptions);

                var polylinePath = [];

                locationData.data.forEach(function(location) {
                    var imageUrl = "";
                    if (location.type == 1) {
                        var imageUrl = "Punch-In-Marker.png";
                    } else if (location.type == 2) {
                        var imageUrl = "Punch-Out-Marker.png";
                    } else if (location.type == 3) {
                        var imageUrl = "Normal-Location-Marker.png";
                    } else if (location.type == 4) {
                        var imageUrl = "Shop-Store-Marker.png";
                    }

                    polylinePath.push(new google.maps.LatLng(location.lat, location.lng));

                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(location.lat, location.lng),
                        map: map,
                        title: location.title,
                        icon: {
                            url: imageUrl,
                            scaledSize: new google.maps.Size(40, 50),
                            anchor: new google.maps.Point(25, 50)
                        }
                    });

                });

                var polyline = new google.maps.Polyline({
                    path: polylinePath,
                    geodesic: true,
                    strokeColor: '#FF0000',
                    strokeOpacity: 1.0,
                    strokeWeight: 2,
                    icons: [{
                        icon: {
                            path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW
                        },
                        offset: '0%',
                        repeat: '20px'
                    }]
                });

                polyline.setMap(map);

            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>

<body>
    <div id="map"></div>
    <button onclick="loaddata()">Load</button>

    <script>
        function callAjax(url, data, callback, method = "POST") {
            const xhr = new XMLHttpRequest();
            xhr.open(method, url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        const responseText = xhr.responseText;
                        callback(responseText);
                    } else {
                        alert(xhr.status);
                    }
                }
            };
            xhr.send(data);
        }

        document.addEventListener('DOMContentLoaded', function(e) {
            loaddata();
        });
    </script>

</body>

</html>