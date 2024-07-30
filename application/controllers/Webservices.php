<?php

defined('BASEPATH') or exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');

use Restserver\Libraries\REST_Controller;

class Webservices extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
    }

    public function dashboard_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->dashboard();
        header('Content-type: application/json');
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }
      
    public function sale_person_login_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->sale_person_login();
        header('Content-type: application/json');
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }
      
    public function change_password_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->change_password();
        header('Content-type: application/json');
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }
      
    public function attendance_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->attendance();
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }

    public function location_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->location();
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }

    public function get_attendance_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->get_attendance();
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }

    public function create_shop_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->create_shop();
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }
    
    public function get_shop_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->get_shop();
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }
    
    public function place_order_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->place_order();
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }
    
    public function get_orders_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->get_orders();
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }
    
    public function comptiter_box_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->comptiter_box();
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }
    
    public function get_comptiter_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->get_comptiter();
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }
    
    public function get_msg_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->get_msg();
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }

    public function lunch_change_status_post()
    {
        header('Content-type: application/json');
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);
        $result = $this->api_model->lunch_change_status();
        if ($result['status'] == '1') {
            $result_final = $result;
        } else {
            $result_final = $result;
        }
        $this->response($result_final);
    }
    
}