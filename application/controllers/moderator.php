<?php

class Moderator extends CI_Controller {

    function is_logged() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true)
            return false;
        else
            return true;
    }

    function is_moderaotr() {
        if ($this->is_logged() == true) {
            $sess_type = $this->session->userdata('type');
            if ($sess_type == 'm') {
                return true;
            } else {
                return false;
            }
        }
    }

    function index() {
        if ($this->is_moderaotr() == TRUE) {
            $data['main_content'] = 'home/moderator_home';
            $this->load->view('home/moderator_template', $data);
        }
        else            $this->load->view('invalid_member');
    }

}