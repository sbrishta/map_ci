<?php
class Map extends CI_Controller{
    function index(){
        /*$data = array(
          'address' =>  $this->input->post('Postcode'),
            'lon' => $this->input->post('hidLong'),
            'lat' => $this->input->post('hidLat')
        );

        //var_dump($data);
        $this->load->view('map_view',$data);*/
        $this->load->model('Csv_model');
        $rows=$this->Csv_model->map_data_insert();
        if($rows){
            $rows_r=$this->Csv_model->getAll();
          $this->load->view('map_view',$rows_r);  
        }
        
      //  $this->load->model('newExp2Model');
      //  $this->newExp2Model->insert($data);
       // $this->load->view('newExp2');
    }
}
