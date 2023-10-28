<?php
$filter = $this->input->get('filter');
if (isset($filter)) {
    $start_date = $this->input->get('start_date');
    $end_date = $this->input->get('end_date');
    $sales_person = $this->input->get('sales_person');
    $get_location = $this->db->order_by('time', 'desc')->get_where('location', array('date >=' => $start_date, 'date <=' => $end_date, 'user_id' => $sales_person));
}
// echo "<pre>";
// print_r($get_location->result());
// echo "</pre>";
$lineCoordinates = array();
if ($get_location->num_rows() > 0) {
    foreach ($get_location->result() as $rows) {
        $lineCoordinates[] = array('lat' => floatval($rows->lattitude), 'lng' => floatval($rows->longitude));
    }
}
$lineCoordinatesJSON = json_encode($lineCoordinates);
$distanceCalculate = array_sum(distanceTravel($lineCoordinates));
if ($distanceCalculate > 1000) {
    $distanceCalculateKm = $distanceCalculate / 1000 . ' Km';
} else {
    $distanceCalculateKm = $distanceCalculate . ' M';
}
?>
<span class="text-muted">Total Distance Travel <b><?= $distanceCalculateKm ?? "N/A" ?></b></span><br>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABx5ofBw372C9eq8pOvlrSsRshGFcsxnQ"></script>
<script>
    $(document).ready(function() {
        function initMap() {
            const mapOptions = {
                zoom: 16,
                center: <?= json_encode($lineCoordinates[0]) ?>,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            };

            const map = new google.maps.Map(document.getElementById("map"), mapOptions);

            // Retrieve the latitude and longitude array from PHP
            const lineCoordinates = <?= $lineCoordinatesJSON ?>;

            const lineSymbol = {
                path: 'M 0,-2 0,1',
                strokeOpacity: 1,
                scale: 4,
            };

            const line = new google.maps.Polyline({
                path: lineCoordinates,
                strokeOpacity: 0,
                icons: [{
                    icon: lineSymbol,
                    offset: '0',
                    repeat: '15px',
                }, ],
                map: map,
            });

            // Adding start marker
            const startMarker = new google.maps.Marker({
                position: lineCoordinates[0],
                map: map,
                title: "Start",
                icon: "https://maps.google.com/mapfiles/ms/icons/green-dot.png", // Custom marker icon
            });

            // Adding end marker
            const endMarker = new google.maps.Marker({
                position: lineCoordinates[lineCoordinates.length - 1],
                map: map,
                title: "End",
                icon: "https://maps.google.com/mapfiles/ms/icons/red-dot.png", // Custom marker icon
            });
        }

        // Initialize the map when the page is loaded
        google.maps.event.addDomListener(window, "load", initMap);
    });
</script>