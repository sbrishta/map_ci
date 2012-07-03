<?php

class Signup extends CI_Controller {

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
            $data['main_content'] = 'home/add_account_form';
            $this->load->view('home/home_template', $data);
        }
        else
            $this->load->view('invalid_member');
    }

    function create_member() {

        if ($this->is_admin() == TRUE) {

            $this->load->library('form_validation');


            if ($this->form_validation->run('register') == FALSE) {
                $this->index();
            } else {
                $this->load->model('membership_model');
                if ($query = $this->membership_model->create_member()) {
                    $data['main_content'] = 'home/signup_success';
                    $this->load->view('home/home_template', $data);
                } else {
                    $this->index();
                }
            }
        }
        else
            $this->load->view('invalid_member');
    }

}
