<?php

function php_insert()
{
    date_default_timezone_set("Asia/Kolkata");
    $date = date("d M, Y h:i a");
    return $date;
}

function do_upload($path = '', $image = '', $allow_extension = '')
{
    $CI = &get_instance();
    $config['upload_path'] = './' . $path;
    $config['allowed_types'] = $allow_extension;
    $config['encrypt_name'] = TRUE;
    $CI->load->library('upload', $config);

    if ($CI->upload->do_upload($image)) {
        $document_upload = $CI->upload->data();
        $document = $path . $document_upload['file_name'];
        return $document;
    } else {
        return $CI->upload->display_errors();
    }
}

function base64_upload($file = null, $upload_path = null)
{
    if ($file !== null) {
        $image = base64_decode($file);
        $image_name = md5(uniqid(rand(), true));
        $filename = $image_name . '.' . 'jpeg';
        $path = $upload_path;
        if ($file !== "") {
            file_put_contents($path . $filename, $image);
            return $path . $filename;
        }
    }
}

function timeFormat($input_date = "", $time_format = "")
{
    if ($input_date !== "") {
        $data = date($time_format, strtotime($input_date));
        return $data;
    }
    return "";
}

function time_insert()
{
    date_default_timezone_set("Asia/Kolkata");
    $date = date("h:i a");
    return $date;
}
function date_insert()
{
    date_default_timezone_set("Asia/Kolkata");
    $date = date("d M, Y ");
    return $date;
}

function get_single_data($table = "", $id = "")
{
    $CI = &get_instance();
    $result = $CI->db->get_where($table, array('id' => $id));
    if ($result->num_rows() > 0) {
        return $result->row();
    }
    return false;
}

function id_verify($table = "", $id = "")
{
    $CI = &get_instance();
    $result = $CI->db->get_where($table, array('id' => $id))->num_rows();
    return $result;
}

function affected_rows()
{
    $CI = &get_instance();
    $result = $CI->db->affected_rows();
    return $result;
}

function insert_id()
{
    $CI = &get_instance();
    $result = $CI->db->insert_id();
    return $result;
}

function last_query()
{
    $CI = &get_instance();
    $result = $CI->db->last_query();
    return $result;
}

// function calculateDistance($lat1, $lon1, $lat2, $lon2)
// {
//     $earthRadius = 6371; // Radius of the Earth in kilometers
//     $dLat = ($lat2 - $lat1) * (pi() / 180);
//     $dLon = ($lon2 - $lon1) * (pi() / 180);

//     $a = sin($dLat / 2) * sin($dLat / 2) +
//         cos(($lat1) * (pi() / 180)) * cos(($lat2) * (pi() / 180)) *
//         sin($dLon / 2) * sin($dLon / 2);

//     $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
//     $distance = $earthRadius * $c * 1000;

//     return $distance;
// }

// function distanceTravel($lineCoordinates)
// {
//     // get distance
//     $distances = [];
//     $count = count($lineCoordinates);
//     for ($i = 0; $i < $count - 1; $i++) {
//         $coord1 = $lineCoordinates[$i];
//         $coord2 = $lineCoordinates[$i + 1];
//         $distance = calculateDistance(
//             $coord1['lat'],
//             $coord1['lng'],
//             $coord2['lat'],
//             $coord2['lng']
//         );
//         $distances[] = number_format($distance, 2);
//     }
//     return $distances;
// }

function haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371)
{
    $latFrom = deg2rad($latitudeFrom);
    $lonFrom = deg2rad($longitudeFrom);
    $latTo = deg2rad($latitudeTo);
    $lonTo = deg2rad($longitudeTo);

    $latDelta = $latTo - $latFrom;
    $lonDelta = $lonTo - $lonFrom;

    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
        cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
    return $angle * $earthRadius;
}

function calculateTotalDistance($coordinates)
{
    $totalDistance = 0;

    for ($i = 0; $i < count($coordinates) - 1; $i++) {
        $latitudeFrom = $coordinates[$i][0];
        $longitudeFrom = $coordinates[$i][1];
        $latitudeTo = $coordinates[$i + 1][0];
        $longitudeTo = $coordinates[$i + 1][1];

        $distance = haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo);
        $totalDistance += $distance;
    }

    return number_format($totalDistance, 5) . ' Kilometers (km)';
}

function getAddressFromLatLong($latitude, $longitude, $apiKey = "")
{
    $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitude,$longitude&key=$apiKey";

    $response = file_get_contents($url);
    $json = json_decode($response, true);

    if ($json['status'] == 'OK') {
        return $json['results'][0]['formatted_address'];
    } else {
        return "Address not found";
    }
}
