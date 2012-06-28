<?php

class Login extends CI_Controller {

    function index() {
        $data['main_content'] = 'login_form';
        $this->load->view('includes/template', $data);
    }

    function validate_credentials() {
        $this->load->model('membership_model');
        $query = $this->membership_model->validate();

        if ($query) { //if the user's credential is validated 
            $data = array(//to handle cookies and session data
                'username' => $this->input->post('usrename'),
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            //redirect('site/members_area');
            redirect('csv_ci/csv_load');
        } else {
            $this->index();
        }
    }

    function signup() {
        $data['main_content'] = 'signup_form';
        $this->load->view('includes/template', $data);
    }

    function create_member() {
        $this->load->library('form_validation');

        //field name, error message,validation rules

        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');

        $this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');


        if ($this->form_validation->run() == FALSE) {
            $this->signup();
        } else {
            $this->load->model('membership_model');
            if ($query = $this->membership_model->create_member()) {
                $data['main_content'] = 'signup_success';
                $this->load->view('includes/template', $data);
            } else {
                $this->signup();
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        $this->index();
    }

}
