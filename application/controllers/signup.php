<?php

class Signup extends CI_Controller {

    function index() {
        $this->load->model('bank_info_model');
        $data['rows'] = $this->bank_info_model->getAll();
        $this->load->view('authentication/signup_form', $data);
    }

    function create_member() {
        $this->load->library('form_validation');

        //field name, error message,validation rules

        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
//        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('bank_id', 'Bank Name', 'required');
        $this->form_validation->set_rules('bank_id', 'Bank Name', 'required');
        $this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');


        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $this->load->model('temp_member_model');
            if ($query = $this->temp_member_model->create_member()) {
                $data['main_content'] = 'signup_success';
                $this->load->view('authentication/template', $data);
            } else {
                $this->index();
            }
        }
    }

}
