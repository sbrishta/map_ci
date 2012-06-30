<?php

class Temp_member_model extends CI_Model {

    function create_member() {
    
        $new_member_insert_data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'email'=>$this->input->post('email'),
            'type'=>$this->input->post('type'),
            'bank_id' => $this->input->post('bank_id'),
            'password' => md5($this->input->post('password'))
                //'email_address' => $this->input->post('email_address'),
        );

        $insert = $this->db->insert('temp_member', $new_member_insert_data);
        return $insert;
    }

}