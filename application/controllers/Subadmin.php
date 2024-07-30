<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subadmin extends CI_Controller
{
    public function dashboard()
    {
        if (!$this->session->userdata('login_subadmin') == 2) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $page_data['page_title'] = "Dashboard";
        $page_data['page_name'] = "sub_admin_dashboard";
        $this->load->view('subadmin/templete', $page_data);
    }

    public function subadmin_logout()
    {
        $this->session->unset_userdata('login_subadmin');
        if (!$this->session->userdata('login_subadmin') == 2) {
            redirect(base_url() . 'login/admin', 'refresh');
        }
    }

    public function profile()
    {
        if (!$this->session->userdata('login_subadmin') == 2) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $submit = $this->input->post('submit');

        if (isset($submit)) {
            $update_data['name'] = $this->input->post('name');
            $update_data['compony_name'] = $this->input->post('companey_name');
            if (!empty($_FILES['profile_image']['name'])) {
                $update_data['image'] = do_upload('assets/images/', 'profile_image', 'jpg|png|jpeg');
            }
            if (!empty($update_data['password'])) {
                $update_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $subadmin_id = $this->session->userdata('subadmin_id');
            $this->Crud_model->update('users', 'id', $subadmin_id, $update_data);
            $this->session->set_flashdata('success', 'Sales Person Add Successful!!');
            redirect(base_url() . 'subadmin/profile', 'refresh');
        }

        $page_data['page_title'] = "Profile";
        $page_data['page_name'] = "profile";
        $this->load->view('subadmin/templete', $page_data);
    }


    public function sales_person_profile()
    {
        if (!$this->session->userdata('login_subadmin') == 2) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $submit = $this->input->post('submit');

        if (isset($submit)) {
            $update_data['name'] = $this->input->post('name');
            $update_data['compony_name'] = $this->input->post('companey_name');
            if (!empty($_FILES['profile_image']['name'])) {
                $update_data['image'] = do_upload('assets/images/', 'profile_image', 'jpg|png|jpeg');
            }
            if (!empty($update_data['password'])) {
                $update_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $subadmin_id = $this->session->userdata('subadmin_id');
            $this->Crud_model->update('sales_person', 'id', $subadmin_id, $update_data);
            $this->session->set_flashdata('success', 'Sales Person Add Successful!!');
            redirect(base_url() . 'subadmin/sales_person_profile', 'refresh');
        }

        $page_data['page_title'] = "Profile";
        $page_data['page_name'] = "sales_person_profile";
        $this->load->view('subadmin/templete', $page_data);
    }


    public function my_sales_person()
    {
        if (!$this->session->userdata('login_subadmin') == 2) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $subadmin_id = $this->session->userdata('subadmin_id');
        $page_data['my_sales_person'] = $this->Crud_model->fetch('sales_person', array('user_id' => $subadmin_id))->result();
        $page_data['page_title'] = "My Sales Person";
        $page_data['page_name'] = "my_sales_person";
        $this->load->view('subadmin/templete', $page_data);
    }

    public function attendance()
    {
        if (!$this->session->userdata('login_subadmin') == 2) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $user_id = $this->input->get('user_id');
        $start_date = $this->input->post('start_date');
        $filter = $this->input->post('filter');
        $end_date = $this->input->post('end_date');

        if (isset($filter)) {
            $page_data['data'] = $this->Crud_model->fetch('attendance', array('user_id' => $user_id, 'in_date >=' => $start_date, 'out_date <=' => $end_date));
        } else {
            $page_data['data'] = $this->Crud_model->fetch('attendance', array('user_id' => $user_id));
        }

        $page_data['sp_data'] = $this->Crud_model->fetch('sales_person', array('id' => $user_id));
        $page_data['page_title'] = "Attendance";
        $page_data['page_name'] = "attendance";
        $this->load->view('subadmin/templete', $page_data);
    }

    public function track_location()
    {
        if (!$this->session->userdata('login_subadmin') == 2) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $subadmin_id = $this->session->userdata('subadmin_id');
        $page_data['data'] = $this->Crud_model->fetch('sales_person', array('user_id' => $subadmin_id, 'status' => 0));
        $page_data['page_title'] = "Track Location";
        $page_data['page_name'] = "track_location";
        $this->load->view('subadmin/templete', $page_data);
    }

    public function tracklocation()
    {
        if (!$this->session->userdata('login_subadmin') == 2) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $subadmin_id = $this->session->userdata('subadmin_id');
        $page_data['data'] = $this->Crud_model->fetch('sales_person', array('user_id' => $subadmin_id, 'status' => 0));
        $page_data['page_title'] = "Track Location";
        $page_data['page_name'] = "tracklocation";
        $this->load->view('subadmin/templete', $page_data);
    }

    public function shop_list($param1 = "")
    {
        if (!$this->session->userdata('login_subadmin') == 2) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $subadmin_id = $this->session->userdata('subadmin_id');

        if ($param1 == null) {
            $page_data['data'] = $this->Crud_model->fetch('shop_list', array('sales_person_id' => $subadmin_id), 'desc');
            $page_data['page_title'] = "All Shop List";
        } else {
            $page_data['page_title'] = "Sales Person Shop List";
            $page_data['data'] = $this->Crud_model->fetch('shop_list', array('sales_person_id' => $param1), 'desc');
        }

        $page_data['page_name'] = "shop_list";
        $this->load->view('subadmin/templete', $page_data);
    }

    public function order_list($param1 = "")
    {
        if (!$this->session->userdata('login_subadmin') == 2) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $subadmin_id = $this->session->userdata('subadmin_id');

        if ($param1 == null) {
            $page_data['data'] = $this->Crud_model->fetch('orders', array('sales_person_id' => $subadmin_id), 'desc');
            $page_data['page_title'] = "All Order List";
        } else {
            $page_data['page_title'] = "Sales Person Order List";
            $page_data['data'] = $this->Crud_model->fetch('orders', array('sales_person_id' => $param1), 'desc');
        }

        $page_data['page_name'] = "order_list";
        $this->load->view('subadmin/templete', $page_data);
    }

    public function comptiter_List($param1 = "")
    {
        if (!$this->session->userdata('login_subadmin') == 2) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $subadmin_id = $this->session->userdata('subadmin_id');

        if ($param1 == null) {
            $page_data['data'] = $this->Crud_model->fetch('comptiter_box', array('sales_person_id' => $subadmin_id), 'desc');
            $page_data['page_title'] = "All Comptiter List";
        } else {
            $page_data['page_title'] = "Sales Comptiter Order List";
            $page_data['data'] = $this->Crud_model->fetch('comptiter_box', array('sales_person_id' => $param1), 'desc');
        }

        $page_data['page_name'] = "comptiter_List";
        $this->load->view('subadmin/templete', $page_data);
    }

    public function geofencing()
    {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $user_id = $this->input->get('user_id');

        if (isset($_GET['true'])) {

            $get_location = $this->db->order_by('id', 'desc')->get_where('location', array('user_id' => $user_id, 'date >=' => $start_date ?? date('Y-m-d'), 'date <=' => $end_date ?? date('Y-m-d')));

            $location_array = [];
            $cordinates = [];

            foreach ($get_location->result() as $row) {
                $location_array[] = [
                    'lat' => $row->lattitude,
                    'lng' => $row->longitude,
                    'id' => $row->id,
                    'type' => $row->type,
                    'date' => $row->date,
                    'time' => $row->time,
                    'battery_percentage' => $row->battery_percentage,
                ];

                $cordinates[] = [
                    $row->lattitude, $row->longitude
                ];
            }

            echo json_encode(['status' => true, 'data' => $location_array, 'distance' => calculateTotalDistance($cordinates)], true);
            exit;
        }

        $page_data['get_sales_person'] = $this->Crud_model->fetch('sales_person', array('id' => $user_id));
        $page_data['get_attendance'] = $this->Crud_model->fetch('attendance', array('user_id' => $user_id, 'in_date' => date('Y-m-d')));
        $page_data['page_title'] = "Geofencing";
        $page_data['page_name'] = "google_map";
        $this->load->view('subadmin/templete', $page_data);
    }

    public function message_box()
    {
        if (!$this->session->userdata('login_subadmin') == 2) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $submit = $this->input->post('submit');
        if (isset($submit)) {
            $insert_data['user_type'] = '2';
            $insert_data['user_id'] = $this->session->userdata('subadmin_id');
            $insert_data['msg'] = $this->input->post('msg');
            $insert_data['created_at'] = date('Y-m-d H:i:s');
            $this->Crud_model->insert('notification', $insert_data);
            $this->session->set_flashdata('success', 'Message Created Successful!!');
            redirect(base_url('subadmin/message_box'), 'refresh');
        }

        $page_data['page_title'] = "Message List";
        $page_data['page_name'] = "message_box";
        $this->load->view('subadmin/templete', $page_data);
    }
}
