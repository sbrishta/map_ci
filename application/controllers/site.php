<?php

class Site extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->is_logged_in();
    }

    function members_area() {
        
        //$this->load->view('logged_in_area');
        redirect('csv_ci/csv_load');
    }

    function another_page() { // just for sample
       
    }

    function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true) {
            $this->load->view('invalid_member');
           // echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';
            //die();		
            //$this->load->view('login_form');
        }
    }

}

