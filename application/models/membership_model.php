<?php

class Membership_Model extends CI_Model {

    function getBankId() {
        $this->db->where('username', $this->input->post('username'));
        $query = $this->db->get('member');
        if ($query->num_rows == 1) {
            foreach ($query->result() as $row) {

                return $row->bank_id;
            }
        }
    }

    function validate() {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get('member');

        if ($query->num_rows == 1) {
            foreach ($query->result() as $row) {
                $r = $row->type;
            }
            return $r;
        }
    }

    function create_member() {
        $pass = mysql_real_escape_string($this->input->post('username') . "123");

        $new_member_insert_data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'type' => $this->input->post('type'),
            'bank_id' => $this->session->userdata('bank_id'),
            'password' => md5($pass)
        );

        $insert = $this->db->insert('member', $new_member_insert_data);
        return $insert;
    }

}
