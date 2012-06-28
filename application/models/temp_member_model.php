<?php

class Temp_member_model extends CI_Model {

    function getBankid() {
        $this->db->where('bank_name', $this->input->post('bank_name'));
        $query = $this->db->get('bank_info');
        if ($query->num_rows() == 1) {
            foreach ($query->result() as $r) {
                $id = $r->bank_id;
                echo $id;
            }
        }
        return $id;
    }

    function create_member() {
    
        $new_member_insert_data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'bank_id' => $this->input->post('bank_id'),
            'password' => md5($this->input->post('password'))
                //'email_address' => $this->input->post('email_address'),
        );

        $insert = $this->db->insert('temp_member', $new_member_insert_data);
        return $insert;
    }

}