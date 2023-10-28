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
}
