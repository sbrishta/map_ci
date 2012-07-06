
<?php

class Csv_model extends CI_Model {

    var $gallery_path;
    var $gallery_path_url;

    function Csv_model() {
        parent::__construct();


        $this->gallery_path = realpath(APPPATH . '../csv');
        $this->gallery_path_url = base_url() . 'csv/';
    }

    /* function do_upload() {

      $config = array(
      'allowed_types' => 'text/plain|text/csv|csv|text/x-comma-separated-values|text/comma-separated-values|application/octet-stream|application/vnd.ms-excel|application/x-csv|text/x-csv|text/csv|application/csv|application/excel|application/vnd.msexcel',
      'upload_path' => $this->gallery_path,
      'max_size' => 2000
      );

      $this->load->library('upload', $config);
      $this->upload->do_upload();
      /* $image_data = $this->upload->data();

      $config = array(
      'source_image' => $image_data['full_path'],
      'new_image' => $this->gallery_path . '/thumbs',
      'maintain_ration' => true,
      'width' => 150,
      'height' => 100
      );

      $this->load->library('image_lib', $config);
      $this->image_lib->resize(); */

    function do_upload() {
        $config = array(
            'upload_path' => $this->gallery_path,
            'allowed_types' => 'text/csv|csv|text/x-comma-separated-values|text/comma-separated-values|application/x-csv|text/x-csv|text/csv|application/csv|',
            'max_size' => '5000',
            'file_name' => 'upload' . time()
        );
        //$config['upload_path'] = 'uploads/';
        //$config['allowed_types'] = 'text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel',
        //$config['max_size'] = '5000';
        //$config['file_name'] = 'upload' . time();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload())
            echo $this->upload->display_errors();
        else {
            $file_info = $this->upload->data();
            $csvfilepath = "csv/" . $file_info['file_name'];
            $this->addfromcsv($csvfilepath);
            $filename=$file_info['file_name'];
           // print_r($filename);
            return $filename;
        }
        //echo var_dump($csvfilepath);
//        //return $csvfilepath;
//        $filePath = './csv/' . $file_info['file_name'];
//        //$filePath = './csv/r_data.csv';
//        $row = 1;
//        if (($handle = fopen($filePath, "r")) !== FALSE) {
//            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
//                $num = count($data);
//                echo "<p> $num fields in line $row: <br /></p>\n";
//                $row++;
//                for ($c = 0; $c < $num; $c++) {
//                    echo $data[$c] . "<br />\n";
//                }
//                /* $mdata = array(
//                  'lon' => $data[1],
//                  'lat' => $data[2]
//                  );
//                  $this->db->insert('r_data',$mdata); */
//
//
//                fclose($handle);
//            }
//        }
    }

    /* function getAll() {
      $this->db->select('lon,lat');
      $q = $this->db->get('r_data');
      if ($q->num_rows() > 0) {
      foreach ($q->result() as $row) {
      $data[] = $row;
      }
      return $data;
      }
      } */

    function bank_data_insert($data) {
        $this->db->insert('bank_data',$data);
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