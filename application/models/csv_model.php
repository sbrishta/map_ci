
<?php

class Csv_model extends CI_Model {

    var $gallery_path;
    var $gallery_path_url;

    function Csv_model() {
        parent::__construct();


        $this->gallery_path = realpath(APPPATH . '../csv');
        $this->gallery_path_url = base_url() . 'csv/';
    }

    function do_upload() {
        $config = array(
            'upload_path' => $this->gallery_path,
            'allowed_types' => 'text/csv|csv|text/x-comma-separated-values|text/comma-separated-values|application/x-csv|text/x-csv|text/csv|application/csv|',
            'max_size' => '5000',
            'file_name' => 'upload' . time()
        );


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload())
            echo $this->upload->display_errors();
        else {
            $file_info = $this->upload->data();

            return $file_info['file_name'];
        }
    }

    function bank_data_insert($data) {
        $this->db->insert('bank_data', $data);
    }

    function map_data_insert() {
        $data = array(
            //'address' =>  $this->input->post('Postcode'),
            'lon' => $this->input->post('hidLong'),
            'lat' => $this->input->post('hidLat')
        );
        $insert = $this->db->insert('r_data', $data);
        return $insert;
    }

}