<?php
$subadmin_id = $this->session->userdata('subadmin_id');
$get_sp = $this->db->get_where('sales_person', array('user_id' => $subadmin_id));
$filter = $this->input->get('filter');
if (isset($filter)) {
    $start_date = $this->input->get('start_date');
    $end_date = $this->input->get('end_date');
    $sales_person = $this->input->get('sales_person');
    $get_location = $this->db->order_by('time', 'desc')->get_where('location', array('date >=' => $start_date, 'date <=' => $end_date, 'user_id' => $sales_person));
} else {
    $get_location = $this->db->get_where('location', array('user_id' => $get_sp->row('id')));
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
<span class="text-muted">Total Distance Travel <b><?= $distanceCalculateKm ?></b></span><br>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABx5ofBw372C9eq8pOvlrSsRshGFcsxnQ"></script>
<script>
    $(document).ready(function() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: <?= json_encode($lineCoordinates[0]) ?>,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        // Retrieve the latitude and longitude array from PHP
        var lineCoordinates = <?= $lineCoordinatesJSON ?>;

        var lineSymbol = {
            path: 'M 0,-2 0,1',
            strokeOpacity: 1,
            scale: 4
        };

        var line = new google.maps.Polyline({
            path: lineCoordinates,
            strokeOpacity: 0,
            icons: [{
                icon: lineSymbol,
                offset: '0',
                repeat: '15px'
            }],
            map: map
        });
    });
</script>