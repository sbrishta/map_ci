<?php

class Membership_Model extends CI_Model {

    function validate() {
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get('membership');

        if ($query->num_rows == 1) {
            return true;
        }
    }

    function create_member() {
        $new_member_insert_data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'email_address' => $this->input->post('email_address'),
        );

        $insert = $this->db->insert('membership', $new_member_insert_data);
        return $insert;
    }

}
