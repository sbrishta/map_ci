<?php

class Admin_approve extends CI_Controller{
    function index(){
        $this->load->model('temp_member_model');
        $this->load->library('table');
        $data['rows']=$this->temp_member_model->getAll();
       // echo $this->table->generate($data);
        /////
        $this->load->view('admin_home');
    }
}