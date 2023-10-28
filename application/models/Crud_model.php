<?php

class Crud_model extends CI_Model
{

    public function get($data, $column = "")
    {
        return $this->db->order_by($column, 'DESC')->get($data);
    }

    public function get_where($table, $where, $order = '')
    {
        return $this->db->where($where)->order_by($order, 'ASC')->get($table);
    }

    public function fetch($table = "", $array = "", $order = "")
    {
        if (!empty($table && $array && $order)) {
            if (is_array($array)) {
                $query = $this->db->order_by('id', $order)->get_where($table, $array);
                return $query;
            }
        }
        if (!empty($table && $array)) {
            if (is_array($array)) {
                $query = $this->db->get_where($table, $array);
                return $query;
            } else {
                $query = $this->db->order_by('id', $array)->get($table);
                return $query;
            }
        }
        if (!empty($table)) {
            $query = $this->db->get($table);
            return $query;
        }
    }

    public function where_not($table, $array, $parm1, $parm2)
    {
        $query = $this->db->where_not_in($parm1, $parm2)->get_where($table, $array);
        return $query;
    }

    //  active inactive status
    public function update_custom($table, $where_id, $where, $sid)
    {
        $query = $this->db->get_where($table, array($where_id => $sid));
        if ($query->num_rows() > 0) {
            $data = $query->row()->$where;
            if ($data == 1) {
                $data_row = 0;
            } else {
                $data_row = 1;
            }
        }
        $final_data[$where] = $data_row;
        $this->db->where($where_id, $sid);
        $this->db->update($table, $final_data);
    }

    public function update_status($table, $sid)
    {
        $query = $this->db->get_where($table, array('id' => $sid));
        if ($query->num_rows() > 0) {
            $query_array = $query->result();
            foreach ($query_array as $row) {
                $data = $row->status;
            }
            if ($data == 1) {
                $data_row = 0;
            } else {
                $data_row = 1;
            }
        }
        $final_data['status'] = $data_row;
        $this->db->where('id', $sid);
        $this->db->update($table, $final_data);
    }

    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function delete($table, $id)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    public function update($table, $where, $id, $data)
    {
        $this->db->where($where, $id);
        $this->db->update($table, $data);
    }

    public function join()
    {
        $query = $this->db->select('country.country_id, country.country_name,state.id, state.country_id, state.state_name, state.status')->from('country')
            ->join('state', 'state.country_id = country.country_id')->get()->result();
        return $query;
    }

    public function inner_join()
    {
        $query = $this->db->select('*')->from('country')
            ->join('state', 'country.country_id = state.country_id')
            ->join('city', 'state.id = city.state_id')
            ->get()->result();
        return $query;
    }

    public function join_area()
    {
        $query = $this->db->select('*')->from('country')
            ->join('state', 'country.country_id = state.country_id')
            ->join('city', 'state.id = city.state_id')
            ->join('aria', 'city.id = aria.city_id')
            ->get()->result();

        return $query;
    }

    // public function join_user()
    // {
    //     $query = $this->db->select('users.id, country.name,details.id, state.country_id, state.state_name, state.status')->from('country')
    //         // ->where('user_login.id',$id)
    //         ->join('state', 'state.country_id = country.country_id')->get()->result();
    //     return $query;
    // }



    public function joina($id)
    {
        $query = $this->db->select('user_login.id, user_login.name, user_login.email, user_login.mobile, user_login.gender, contact_us.contact_us_msg,contact_us.time')->from('contact_us')
            ->where('user_login.id', $id)
            ->join('user_login', 'user_login.id = contact_us.user_id')->get()->result();
        return $query;
    }

    public function user_loginval($email, $password)
    {
        $log = $this->db->where(['email' => $email, 'password' => $password])->get('users');
        if ($log->num_rows()) {
            return $log->row()->id;
        } else {
            return false;
        }
    }
}
