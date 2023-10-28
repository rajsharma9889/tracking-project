<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $password_plain = $this->input->post('password');
        $user_type = $this->input->post('user_type');
        $email = $this->input->post('email');
        $submit = $this->input->post('submit');

        if (isset($submit)) {

            if ($user_type == 0) {
                $get_data = $this->db->get_where('admin_login');
                if ($get_data->row('email') == $email) {
                    if (password_verify($password_plain, $get_data->row('password'))) {
                        $this->session->set_userdata('login', 1);
                        if ($this->session->userdata('login') == 1) {
                            $this->session->set_flashdata('success', 'Admin Login Successful!!');
                            redirect(base_url() . 'admin/dashboard', 'refersh');
                        }
                    }
                } else {
                    redirect(base_url() . 'login/admin', 'refresh');
                }
            } else {
                $get_data_subadmin = $this->db->get_where('users', array('email' => $email));
                if ($get_data_subadmin->row('email') == $email) {
                    if (password_verify($password_plain, $get_data_subadmin->row('password'))) {
                        $this->session->set_userdata('login_subadmin', 2);
                        $this->session->set_userdata('subadmin_id', $get_data_subadmin->row('id'));
                        if ($this->session->userdata('login_subadmin') == 2) {
                            $this->session->set_flashdata('success', 'Sub Admin Login Successful!!');
                            redirect(base_url() . 'subadmin/dashboard', 'refersh');
                        }
                    }
                } else {
                    redirect(base_url() . 'login/admin', 'refresh');
                }
            }
        }

        $this->load->view('admin_login');
    }

    public function login()
    {
        $this->load->view('admin_login');
    }

    public function logout()
    {
        $this->session->unset_userdata('login');
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }
    }

    public function auto_punch_out()
    {
        if (date('H:i:s') > date('21:00:00')) {
            $att_table = $this->db->get_where('attendance', array('in_date' => date('Y-m-d'), 'out_date' => ''));
            foreach ($att_table->result() as $row) {
                $last_location = $this->db->order_by('id', 'DESC')->where('user_id', $row->user_id)->get('location', 1);
                $this->db->update(
                    'attendance',
                    array(
                        'out_latitude' => $last_location->row('lattitude'),
                        'out_longitude' => $last_location->row('longitude'),
                        'punch_out_address' => $last_location->row('address'),
                        'out_date' => date('Y-m-d'),
                        'out_time' => date('H:i:s')
                    ),
                    array('id' => $row->id)
                );
            }
        } else {
            echo "sorry";
        }
    }

    public function change_password()
    {
        $user_type = $this->input->post('user_type');
        $password = $this->input->post('password');
        $submit = $this->input->post('submit');

        if (isset($submit)) {
            $this->db->update($user_type, array('password' => password_hash($password, PASSWORD_DEFAULT)), array('id' => $submit));
            $this->session->set_flashdata('success', 'Password changed successfull');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function dashboard()
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $page_data['page_title'] = "Dashboard";
        $page_data['page_name'] = "dashboard";
        $this->load->view('templete', $page_data);
    }


    public function sale_person()
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }
        $sid = $this->input->get('sid');
        if (isset($sid)) {
            $this->Crud_model->update_custom('sales_person', 'id', 'status', $sid);
            redirect(base_url() . 'admin/sale_person', 'refresh');
        }
        $page_data['sales_person'] = $this->Crud_model->fetch('sales_person')->result();
        $page_data['page_title'] = "Sale Person";
        $page_data['page_name'] = "sale_person";
        $this->load->view('templete', $page_data);
    }

    public function sale_person_view($param = "")
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }
        if (isset($param)) {
            $page_data['sales_person'] = $this->Crud_model->fetch('sales_person', array('user_id' => $param))->result();
        } else {
            $page_data['sales_person'] = $this->Crud_model->fetch('sales_person')->result();
        }
        $sid = $this->input->get('sid');
        if (isset($sid)) {
            $this->Crud_model->update_custom('sales_person', 'id', 'status', $sid);
            redirect(base_url() . 'admin/sale_person_view', 'refresh');
        }
        $page_data['page_title'] = "Sale Person View";
        $page_data['page_name'] = "sale_person_view";
        $this->load->view('templete', $page_data);
    }

    public function inactive_sale_person()
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }
        $sid = $this->input->get('sid');
        if (isset($sid)) {
            $this->Crud_model->update_custom('sales_person', 'id', 'status', $sid);
            redirect(base_url() . 'admin/inactive_sale_person', 'refresh');
        }
        $page_data['sales_person'] = $this->Crud_model->fetch('sales_person', array('status' => 1))->result();
        $page_data['page_title'] = "Inactive";
        $page_data['page_name'] = "inactive_sale_person";
        $this->load->view('templete', $page_data);
    }

    public function active_sale_person()
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }
        $sid = $this->input->get('sid');
        if (isset($sid)) {
            $this->Crud_model->update_custom('sales_person', 'id', 'status', $sid);
            redirect(base_url() . 'admin/active_sale_person', 'refresh');
        }
        $page_data['sales_person'] = $this->Crud_model->fetch('sales_person', array('status' => 0))->result();
        $page_data['page_title'] = "Active";
        $page_data['page_name'] = "active_sale_person";
        $this->load->view('templete', $page_data);
    }

    public function add_sale_person()
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }
        $submit = $this->input->post('submit');
        $mobile = $this->input->post("mobile");
        $email = $this->input->post("email");
        $is_unique = $this->db->get_where('sales_person', array('mobile' => $mobile));
        if ($is_unique->num_rows() > 0) {
            $this->session->set_flashdata('alert', 'Mobile No. Already Exist');
            redirect(base_url() . 'admin/add_sale_person', 'refresh');
        }
        $is_email = $this->db->get_where('sales_person', array('email' => $email));
        if ($is_email->num_rows() > 0) {
            $this->session->set_flashdata('alert', 'Email Already Exist');
            redirect(base_url() . 'admin/add_sale_person', 'refresh');
        } else {
            if (isset($submit)) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'mobile' => $this->input->post('mobile'),
                    'image' => do_upload('assets/images/', 'image', 'jpg|jpeg|png'),
                    'designation_id' => $this->input->post('designation_id'),
                    'user_id' => $this->input->post('user_id'),
                );
                $this->Crud_model->insert('sales_person', $data);
                $this->session->set_flashdata('success', 'Sales Person Add Successful!!');
                redirect(base_url() . 'admin/sale_person', 'refresh');
            }
        }
        $page_data['user'] = $this->Crud_model->fetch('users', array('status' => 0))->result();
        $page_data['designation'] = $this->Crud_model->fetch('designation', array('status' => 0))->result();
        $page_data['sales_person'] = $this->Crud_model->fetch('sales_person', array('status' => 0))->result();
        $page_data['page_title'] = "Add Sale Person";
        $page_data['page_name'] = "add_sale_person";
        $this->load->view('templete', $page_data);
    }


    public function update_sale_person($id = "")
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $submit = $this->input->post('submit');
        $mobile = $this->input->post("mobile");
        $email = $this->input->post("email");
        if (isset($submit)) {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'mobile' => $this->input->post('mobile'),
                'image' => do_upload('assets/images/', 'image', 'jpg|jpeg|png'),
                'designation_id' => $this->input->post('designation_id'),
                'user_id' => $this->input->post('user_id'),
            );
            $mobile_verify = $this->db->where_not_in('id', $id)->where('mobile', $mobile)->get('sales_person');
            $email_verify = $this->db->where_not_in('id', $id)->where('email', $email)->get('sales_person');

            if ($mobile_verify->num_rows() > 0) {
                $this->session->set_flashdata('alert', 'Mobile Already Exist');
                redirect(base_url() . 'admin/sale_person', 'refresh');
            }
            if ($email_verify->num_rows() > 0) {
                $this->session->set_flashdata('alert', 'Email Already Exist');
                redirect(base_url() . 'admin/sale_person', 'refresh');
            }
            $this->Crud_model->update('sales_person', 'id', $id, $data);
            $this->session->set_flashdata('success', 'Data update Successful!!');
            redirect(base_url() . 'admin/sale_person', 'refresh');
        }
        $page_data['sales_person_update'] = $this->Crud_model->fetch('sales_person', array("id" => $id))->row();
        $page_data['user'] = $this->Crud_model->fetch('users', array('status' => 0))->result();
        $page_data['designation'] = $this->Crud_model->fetch('designation', array('status' => 0))->result();
        $page_data['page_title'] = "Update sale Person";
        $page_data['page_name'] = "update_sale_person";
        $this->load->view('templete', $page_data);
    }

    public function users()
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $sid = $this->input->get('sid');
        if (isset($sid)) {
            $this->Crud_model->update_custom('users', 'id', 'status', $sid);
            redirect(base_url() . 'admin/users', 'refresh');
        }
        $page_data['users'] = $this->Crud_model->fetch('users')->result();
        $page_data['page_title'] = "All users";
        $page_data['page_name'] = "users";
        $this->load->view('templete', $page_data);
    }

    public function inactive_users()
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }
        $sid = $this->input->get('sid');
        if (isset($sid)) {
            $this->Crud_model->update_custom('users', 'id', 'status', $sid);
            redirect(base_url() . 'admin/inactive_users', 'refresh');
        }
        $page_data['users'] = $this->Crud_model->fetch('users', array('status' => 1))->result();
        $page_data['page_title'] = "Inactive";
        $page_data['page_name'] = "inactive_user";
        $this->load->view('templete', $page_data);
    }

    public function active_users()
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }
        $sid = $this->input->get('sid');
        if (isset($sid)) {
            $this->Crud_model->update_custom('users', 'id', 'status', $sid);
            redirect(base_url() . 'admin/active_users', 'refresh');
        }
        $page_data['users'] = $this->Crud_model->fetch('users', array('status' => 0))->result();
        $page_data['page_title'] = "Active";
        $page_data['page_name'] = "active_user";
        $this->load->view('templete', $page_data);
    }

    public function add_users()
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }
        $submit = $this->input->post('submit');
        $mobile = $this->input->post("mobile");
        $email = $this->input->post("email");

        $input_password = $this->input->post('password');
        $hash_password = password_hash($input_password, PASSWORD_DEFAULT);

        $is_unique = $this->db->get_where('users', array('mobile' => $mobile));
        if ($is_unique->num_rows() > 0) {
            $this->session->set_flashdata('alert', 'Mobile No. Already Exist');
            redirect(base_url() . 'admin/add_users ', 'refresh');
        }

        $is_email = $this->db->get_where('users', array('email' => $email));
        if ($is_email->num_rows() > 0) {
            $this->session->set_flashdata('alert', 'Email Already Exist');
            redirect(base_url() . 'admin/add_users ', 'refresh');
        } else {
            if (isset($submit)) {
                $data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => $hash_password,
                    'mobile' => $this->input->post('mobile'),
                    'compony_name' => $this->input->post('compony_name'),
                    'image' => do_upload('assets/images/', 'image', 'jpg|jpeg|png'),
                    'datetime' => date('d-m-Y')
                );
                $this->Crud_model->insert('users', $data);
                $this->session->set_flashdata('success', 'Sub Admin Create Successful!!');
                redirect(base_url() . 'admin/users ', 'refresh');
            }
        }
        $page_data['page_title'] = "Add users";
        $page_data['page_name'] = "add_users";
        $this->load->view('templete', $page_data);
    }

    public function update_users($id = "")
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $submit = $this->input->post('submit');
        $mobile = $this->input->post("mobile");
        $email = $this->input->post("email");

        if (isset($submit)) {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),

            );
            $mobile_verify = $this->db->where_not_in('id', $id)->where('mobile', $mobile)->get('users');
            $email_verify = $this->db->where_not_in('id', $id)->where('email', $email)->get('users');

            if ($mobile_verify->num_rows() > 0) {
                $this->session->set_flashdata('alert', 'Mobile Already Exist');
                redirect(base_url() . 'admin/users', 'refresh');
            }
            if ($email_verify->num_rows() > 0) {
                $this->session->set_flashdata('alert', 'Email Already Exist');
                redirect(base_url() . 'admin/users', 'refresh');
            }

            $this->Crud_model->update('users', 'id', $id, $data);
            $this->session->set_flashdata('success', 'Sub Admin Data Update Successful!!');
            redirect(base_url() . 'admin/users ', 'refresh');
        }
        $page_data['update_users'] = $this->Crud_model->fetch('users', array("id" => $id))->row();
        $page_data['page_title'] = "Update User";
        $page_data['page_name'] = "update_users";
        $this->load->view('templete', $page_data);
    }

    public function designation()
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $sid = $this->input->get('sid');
        if (isset($sid)) {
            $this->Crud_model->update_custom('designation', 'id', 'status', $sid);
            redirect(base_url() . 'admin/designation', 'refresh');
        }

        $submit = $this->input->post('submit');
        $update_submit = $this->input->post('update_submit');
        if (isset($submit)) {
            $designation = $this->input->post('designation');
            $this->Crud_model->insert('designation', array('designation' => $designation));
            redirect(base_url('admin/designation'), 'refresh');
        }

        if (isset($update_submit)) {
            $designation = $this->input->post('designation');
            $hidden_id = $this->input->post('hidden_id');
            $this->Crud_model->update('designation', 'id', $hidden_id, array('designation' => $designation));
            redirect(base_url() . 'admin/designation', 'refresh');
        }
        $page_data['fetch_designation'] = $this->Crud_model->fetch('designation')->result();
        $page_data['page_title'] = "designation";
        $page_data['page_name'] = "designation";
        $this->load->view('templete', $page_data);
    }

    public function active_designation()
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $sid = $this->input->get('sid');
        if (isset($sid)) {
            $this->Crud_model->update_custom('designation', 'id', 'status', $sid);
            redirect(base_url() . 'admin/active_designation', 'refresh');
        }
        $page_data['fetch_designation'] = $this->Crud_model->fetch('designation', array('status' => 0))->result();
        $page_data['page_title'] = "Active";
        $page_data['page_name'] = "active_designation";
        $this->load->view('templete', $page_data);
    }

    public function inactive_designation()
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $sid = $this->input->get('sid');
        if (isset($sid)) {
            $this->Crud_model->update_custom('designation', 'id', 'status', $sid);
            redirect(base_url() . 'admin/inactive_designation', 'refresh');
        }
        $page_data['fetch_designation'] = $this->Crud_model->fetch('designation', array('status' => 1))->result();
        $page_data['page_title'] = "Inactive";
        $page_data['page_name'] = "inactive_designation";
        $this->load->view('templete', $page_data);
    }

    public function track_location()
    {
        if (!$this->session->userdata('login') == 1) {
            redirect(base_url() . 'login/admin', 'refresh');
        }

        $subadmin_id = $this->input->get('sales_person');
        $page_data['data'] = $this->Crud_model->fetch('sales_person', array('user_id' => $subadmin_id, 'status' => 0));
        $page_data['page_title'] = "Track Location";
        $page_data['page_name'] = "track_location";
        $this->load->view('templete', $page_data);
    }

    public function attendance()
    {
        if (!$this->session->userdata('login') == 1) {
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
        $this->load->view('templete', $page_data);
    }

    public function demo()
    {
        $page_data['page_title'] = "Demo";
        $page_data['page_name'] = "demo";
        $this->load->view('templete', $page_data);
    }
}
