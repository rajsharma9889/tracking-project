<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
    public function dashboard()
    {
        $user_id = $this->input->post('user_id');

        if ($user_id == "") {
            $result = array('status' => 0, 'msg' => 'Please enter user id');
            return $result;
        }

        $user_verify = $this->db->get_where('sales_person', array('id' => $user_id));

        if ($user_verify->num_rows() <= 0) {
            $result = array('status' => 0, 'msg' => 'Please enter valid user id');
            return $result;
        }

        $get_designation = $this->db->get_where('designation', array('id' => $user_verify->row('designation_id')));
        $get_subadmin = $this->db->get_where('users', array('id' => $user_verify->row('user_id')));
        $get_location = $this->db->order_by('date', 'DESC')->order_by('time', 'DESC')->limit(1)->get_where('location', array('user_id' => $user_id));
        $get_attendance = $this->db->order_by('in_date', 'DESC')->order_by('in_time', 'DESC')->limit(1)->get_where('attendance', array('user_id' => $user_id, 'in_date' => date('Y-m-d')));

        $attendance = array(
            'in_address' => $get_attendance->row('punch_in_address') ?? "",
            'out_address' => $get_attendance->row('punch_out_address') ?? "",
            'in_date' => timeFormat($get_attendance->row('in_date') ?? "", 'Y-m-d'),
            'in_time' => timeFormat($get_attendance->row('in_time') ?? "", 'h:i a'),
            'out_date' => timeFormat($get_attendance->row('out_date') ?? "", 'Y-m-d'),
            'out_time' => timeFormat($get_attendance->row('out_time') ?? "", 'h:i a'),
        );

        $user_data = array(
            'name' => $user_verify->row('name') ?? "",
            'mobile' => $user_verify->row('mobile') ?? "",
            'email' => $user_verify->row('email') ?? "",
            'profile_image' => $user_verify->row('image') ?? "",
            'designation' => $get_designation->row('designation') ?? "",
            'companey_name' => $get_subadmin->row('compony_name') ?? "",
            'current_lat' => $get_location->row('lattitude') ?? "",
            'current_long' => $get_location->row('longitude') ?? "",
            'address' => $get_location->row('address') ?? "",
            'location_time' => timeFormat($get_location->row('date') . $get_location->row('time'), 'Y-m-d h:i a'),
            'attendance' => $attendance
        );

        $result = array('status' => 1, 'msg' => 'successful!!', 'data' => $user_data);
        return $result;
    }

    public function sale_person_login()
    {
        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');

        if (empty($mobile && $password)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->get_where('sales_person', array('mobile' => $mobile, 'password' => $password));

        $data_arr = array(
            "id" => $users_data->row('id'),
            "name" => $users_data->row('name'),
            "mobile" => $users_data->row('mobile'),
            "email" => $users_data->row('email'),
            "status" => $users_data->row('status')
        );

        if ($users_data->num_rows() > 0) {
            $result = array('status' => 1, 'msg' => 'Employee login successful', 'data' => $data_arr);
            return $result;
        }

        $result = array('status' => 0, 'msg' => 'Mobile number and password is invalid');
        return $result;
    }

    public function change_password()
    {
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        if (empty($id) && empty($password)) {
            $result = array('status' => 0, 'msg' => 'Please enter required field');
            return $result;
        }

        $users_data = $this->db->get_where('sales_person', array('id' => $id));
        if ($users_data->num_rows() > 0) {
            $this->db->where('id', $users_data->row('id'))->update('sales_person', array('password' => $password));
            $users_data = $this->db->select('id, name, mobile, email, designation_id, user_id,status')->get_where('sales_person', array('id' => $id));
            $result = array('status' => 1, 'msg' => 'Password Change Successful..!!', 'data' => $users_data->row());
            return $result;
        }
        $result = array('status' => 0, 'msg' => 'please enter valid data');
        return $result;
    }

    public function attendance()
    {
        $user_id = $this->input->post('user_id');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $punch_in_address = $this->input->post('punch_in_address');
        $punch_out_address = $this->input->post('punch_out_address');
        $punch_in_image = $this->input->post('punch_in_image');
        $punch_out_image = $this->input->post('punch_out_image');
        $status = $this->input->post('status');

        // $result = array('status' => '0', 'msg' => $punch_in_address);
        // return $result;

        if ($user_id == "") {
            $result = array('status' => '0', 'msg' => 'please enter user id!!!');
            return $result;
        }

        if ($latitude == "") {
            $result = array('status' => '0', 'msg' => 'please enter latitude!!!');
            return $result;
        }

        if ($longitude == "") {
            $result = array('status' => '0', 'msg' => 'please enter longitude!!!');
            return $result;
        }

        if ($status == "") {
            $result = array('status' => '0', 'msg' => 'please enter status!!!');
            return $result;
        }


        $id_verify = $this->db->get_where('sales_person', array('id' => $user_id));
        if (!$id_verify->num_rows() > 0) {
            $result = array('status' => '0', 'msg' => 'User id is not valid!!!');
            return $result;
        }

        $get_new_data = $this->db->select('in_time, out_time')->get_where('attendance', array('user_id' => $user_id, 'in_date' => date("Y-m-d")));
        $check_status = array(
            'in_time' => $get_new_data->row('in_time'),
            'out_time' => $get_new_data->row('out_time'),
            'in_date' => $get_new_data->row('in_date'),
            'out_date' => $get_new_data->row('out_date')
        );

        $get_value = $this->db->get_where('attendance', array('user_id' => $user_id,  'in_date' => date("Y-m-d")));

        if ($status == 1) {
            if ($punch_in_address == "") {
                $result = array('status' => '0', 'msg' => 'Unable to fetch location can`t punch in!');
                return $result;
            }

            if ($get_value->num_rows() <= 0) {
                $data = array(
                    'user_id' => $user_id,
                    'name' => $id_verify->row('name'),
                    'mobile' => $id_verify->row('mobile'),
                    'in_latitude' => $latitude,
                    'in_longitude' => $longitude,
                    'punch_in_address' => $punch_in_address,
                    'in_date' => date("Y-m-d"),
                    'in_time' => date("h:i a")
                );
                if ($punch_in_image !== "") {
                    $data['punch_in_image'] = base64_upload($punch_in_image, 'assets/images/');
                }

                $this->db->insert('location', array('user_id' => $user_id, 'name' => $id_verify->row('name'), 'mobile' => $id_verify->row('mobile'), 'lattitude' => $latitude, 'longitude' => $longitude, 'address' => $punch_in_address, 'date' => date('Y-m-d'), 'time' => date('H:i:s')));
                $this->db->insert('attendance', $data);
                if ($this->db->affected_rows() > 0) {
                    $result = array('status' => '1', 'msg' => 'Thank you! user punch in successful!!!', 'data' => $check_status);
                    return $result;
                }
            }
        }

        if ($status == 2) {
            if ($punch_out_address == "") {
                $result = array('status' => '0', 'msg' => 'Unable to fetch location can`t punch out!');
                return $result;
            }

            $data1 = array(
                'out_latitude' => $latitude,
                'out_longitude' => $longitude,
                'punch_out_address' => $punch_out_address,
                'out_date' => date("Y-m-d"),
                'out_time' => date("h:i a")
            );

            if ($punch_out_image !== "") {
                $data1['punch_out_image'] = base64_upload($punch_out_image, 'assets/images/');
            }

            $this->db->where('id', $get_value->row('id'))->update('attendance', $data1);
            if ($this->db->affected_rows() > 0) {
                $result = array('status' => '1', 'msg' => 'Thank you! user punch out successful!!!', 'data' => $check_status);
                return $result;
            }
        }


        $result = array('status' => '0', 'msg' => 'All Ready Punch In!!!');
        return $result;
    }

    public function get_attendance()
    {
        $user_id = $this->input->post('user_id');
        if (empty($user_id)) {
            $result = array('status' => '0', 'msg' => 'please enter user id!!!');
            return $result;
        }

        $users_data = $this->db->get_where('attendance', array('user_id' => $user_id));

        $result_array = array();
        if ($users_data->num_rows() > 0) {
            foreach ($users_data->result() as $row) {
                $get_location = $this->db->order_by('date', 'desc')->order_by('time', 'desc')->get_where('location', array('user_id' => $user_id, 'date' => $row->in_date));
                $lineCoordinates = array();
                if ($get_location->num_rows() > 0) {
                    foreach ($get_location->result() as $row_item) {
                        $lineCoordinates[] = array('lat' => floatval($row_item->lattitude), 'lng' => floatval($row_item->longitude));
                    }
                }
                $distanceCalculate = array_sum(distanceTravel($lineCoordinates));
                if ($distanceCalculate > 1000) {
                    $distanceCalculateKm = $distanceCalculate / 1000 . ' Km';
                } else {
                    $distanceCalculateKm = $distanceCalculate . ' M';
                }

                $result_array[] = array(
                    'id' => $row->id,
                    'user_id' => $row->user_id ?? "N/A",
                    'name' => $row->name ?? "N/A",
                    'mobile' => $row->mobile ?? "N/A",
                    'in_latitude' => $row->in_latitude ?? "N/A",
                    'in_longitude' => $row->in_longitude ?? "N/A",
                    'out_latitude' => $row->out_latitude ?? "N/A",
                    'out_longitude' => $row->out_longitude ?? "N/A",
                    'punch_in_address' => $row->punch_in_address ?? "N/A",
                    'punch_out_address' => $row->punch_out_address ?? "N/A",
                    'punch_in_image' => $row->punch_in_image ?? "N/A",
                    'punch_out_image' => $row->punch_out_image ?? "N/A",
                    'in_date' => $row->in_date ?? "N/A",
                    'in_time' => $row->in_time ?? "N/A",
                    'out_date' => $row->out_date ?? "N/A",
                    'out_time' => $row->out_time ?? "N/A",
                    'total_travel' => $distanceCalculateKm,
                );
            }
        }

        $result = array('status' => 1, 'msg' => 'Successful..!!', 'data' => $result_array);
        return $result;
    }


    public function location()
    {
        $user_id = $this->input->post('user_id');
        $lattitude = $this->input->post('lattitude');
        $longitude = $this->input->post('longitude');
        $address = $this->input->post('address');

        if (empty($user_id)) {
            $result = array('status' => '0', 'msg' => 'please enter user id!!!');
            return $result;
        }

        if (empty($lattitude)) {
            $result = array('status' => '0', 'msg' => 'please enter lattitude!!!');
            return $result;
        }

        if (empty($longitude)) {
            $result = array('status' => '0', 'msg' => 'please enter longitude!!!');
            return $result;
        }

        $id_verify = $this->db->get_where('sales_person', array('id' => $user_id));

        if (!$id_verify->num_rows() > 0) {
            $result = array('status' => '0', 'msg' => 'User id is not valid!!!');
            return $result;
        }

        $data = array(
            'user_id' => $user_id,
            'name' => $id_verify->row('name'),
            'mobile' => $id_verify->row('mobile'),
            'lattitude' => $lattitude,
            'longitude' => $longitude,
            'address' => $address,
            'date' => date("Y-m-d"),
            'time' => date("H:i:s")
        );

        $this->db->insert('location', $data);

        if ($this->db->affected_rows() > 0) {
            $result = array('status' => '1', 'msg' => 'Location saved successful ...!!!');
            return $result;
        } else {
            $result = array('status' => '0', 'msg' => 'sorry somethig went wrong ...!!!');
            return $result;
        }
    }
}
