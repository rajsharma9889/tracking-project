<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modal extends CI_Controller
{
    public function get_employe()
    {
        $id = $this->input->post('id');
        $data_get = $this->Crud_model->fetch('employee', array('department_id' => $id));
        foreach ($data_get->result() as $row) : ?>
            <option value="<?= $row->id ?>"><?= $row->name ?></option>
        <?php endforeach;
    }

    public function ajax_modal($page_name = "")
    {
        $page_data['ajax_id'] = $this->input->post('id');
        $page_data['param1'] = $this->input->post('param1');
        $page_data['param2'] = $this->input->post('param2');
        $this->load->view('modal/' . $page_name, $page_data);
    }

    public function modal_driver_details()
    {
        $page_data['id'] = $this->input->post('id');
        $this->load->view('modal/modal_driver_details', $page_data);
    }

    public function modal_user_profile()
    {
        $submit = $this->input->post("submit");
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        if (isset($submit)) {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $data['email'] = $email;
            $data['password'] = $hash_password;
            $this->Crud_model->update('admin_login', 'id', 1, $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->unset_userdata('login');
                if (!$this->session->userdata('login') == 1) {
                    redirect(base_url() . 'login/admin', 'refresh');
                }
            }
        }
        $page_data['assign_other'] = $this->input->post('id');
        $this->load->view('modal/modal_user_profile', $page_data);
    }
}
