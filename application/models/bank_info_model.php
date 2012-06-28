<?php

class Bank_info_model extends CI_Model {

    function getAll() {
        $query = $this->db->query("SELECT * FROM bank_info");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

}