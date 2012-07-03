<?php

class Login extends CI_Controller {

    //public $session = "";

    function index() {
        $data['main_content'] = 'authentication/login_form';
        $this->load->view('authentication/template', $data);
    }

    function validate_credentials() {
 

            $this->load->model('membership_model');
            $query = $this->membership_model->validate();

            if (isset($query)) { //if the user's credential is validated 
                $id = $this->membership_model->getBankId();
               
                if (isset($id)) {
                    $data = array(//to handle cookies and session data
                        'username' => $this->input->post('usrename'),
                        'is_logged_in' => true,
                        'type' => $query,
                        'bank_id' => $id
                    );
                    $this->session->set_userdata($data);
                    //   print_r($data);
                }
                $ses_type = $this->session->userdata('type');
                // echo $ses_type;
                if ($ses_type == 'a') {
                    redirect('bank_admin');
                }
                else
                    redirect('moderator');
              
            } else {
                $this->index();
            }
        
    }

    function logout() {
        $this->session->sess_destroy();
        $this->index();
    }

}
