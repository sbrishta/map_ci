<?php

class Login extends CI_Controller {

    function index() {
        $data['main_content'] = 'login_form';
        $this->load->view('authentication/template', $data);
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

  

    function logout() {
        $this->session->sess_destroy();
        $this->index();
    }

}
