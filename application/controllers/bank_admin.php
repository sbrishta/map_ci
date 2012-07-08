<?php

class Bank_admin extends CI_Controller {

    function is_logged() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true)
            return false;
        else
            return true;
    }

    function is_admin() {
        if ($this->is_logged() == true) {
            $sess_type = $this->session->userdata('type');
            if ($sess_type == 'a') {
                return true;
            } else {
                return false;
            }
        }
    }

    function index() {
        if ($this->is_admin() == TRUE) {
            $data['main_content'] = 'home/admin_home';
            $this->load->view('home/home_template', $data);
            //$this->load->view('home/admin_home');
        }
         else            $this->load->view('invalid_member');
    }

    function add_moderator() {
        if ($this->is_admin() == TRUE) {
           // $this->load->model('bank_info_model');
           // $data['rows'] = $this->bank_info_model->getAll();
            $data['main_content'] = 'home/add_account_form';
            $this->load->view('home/home_template', $data);
        }
         else            $this->load->view('invalid_member');
    }

}