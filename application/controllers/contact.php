<?php

class Contact extends CI_Controller {

    function index() {
        $data['main_content'] = 'contact_form';
        $this->load->view('includes/template', $data);
    }

    function submit() {

        $data['main_content'] = 'contact_form_submitted';
        if ($this->input->post('ajax')) {
            $this->load->view($data['main_content']);
        } else {
            $this->load->view('includes/template', $data);
        }
    }

}
