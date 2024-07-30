<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABx5ofBw372C9eq8pOvlrSsRshGFcsxnQ"></script>
<script>
    function initialize() {
        var baseUrl = window.location.href;
        var stringData = baseUrl.indexOf("?");
        var stringValue = stringData === -1 ? "?" : "&";

        callAjax(baseUrl + stringValue + 'true', '', function(data) {
            var locationData = JSON.parse(data);

            document.getElementById('travel_distance').innerHTML = locationData.distance;

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
                    var imageUrl = "<?= base_url('assets/images/map/Punch-In-Marker.png') ?>";
                } else if (location.type == 2) {
                    var imageUrl = "<?= base_url('assets/images/map/Punch-Out-Marker.png') ?>";
                } else if (location.type == 3) {
                    var imageUrl = "<?= base_url('assets/images/map/Normal-Location-Marker.png') ?>";
                } else if (location.type == 4) {
                    var imageUrl = "<?= base_url('assets/images/map/Shop-Store-Marker.png') ?>";
                }

                polylinePath.push(new google.maps.LatLng(location.lat, location.lng));

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(location.lat, location.lng),
                    map: map,
                    title: 'Battery Percentage: ' + location.battery_percentage + '%\n' + 'Date :' + location.date + '\nTime: ' + location.time,
                    icon: {
                        url: imageUrl,
                        scaledSize: new google.maps.Size(30, 40),
                        anchor: new google.maps.Point(15, 40)
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
</script>

<div class="card">
    <div class="card-header">
        <div class="container-fluid mb-3">
            <div class="row justify-content-start">
                <div class="col-4">
                    <h4>Sales Person Track</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <span class="text-muted">Name: <b><?= $get_sales_person->row('name') ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Email: <b><?= $get_sales_person->row('email') ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Mobile: <b><?= $get_sales_person->row('mobile') ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Total Distance Travel: <b><span id="travel_distance"></span></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Punch IN Time: <b><?= $get_attendance->row('in_time') ?? "N/A" ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Punch IN Location: <b><?= $get_attendance->row('punch_in_address') ?? "N/A" ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Punch Out Time: <b><?= $get_attendance->row('out_time') ?? "N/A" ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Punch Out Location: <b><?= $get_attendance->row('punch_out_address') ?? "N/A" ?></b></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Punch IN Image: <a href="<?= base_url($get_attendance->row('punch_in_image')) ?? "N/A" ?>" target="_blank"><img width="100px" src="<?= base_url($get_attendance->row('punch_in_image')) ?? "N/A" ?>" alt="image"></a></span><br>
                <hr>
            </div>
            <div class="col-6">
                <span class="text-muted">Punch Out Image: <a href="<?= base_url($get_attendance->row('punch_out_image')) ?? "N/A" ?>" target="_blank"></a><img width="100px" src="<?= base_url($get_attendance->row('punch_out_image')) ?? "N/A" ?>" alt="image"></a></span><br>
                <hr>
            </div>
        </div>
        <div id="map" style="height: 600px; width: 100%;"></div>
    </div>
</div>