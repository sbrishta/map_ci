<?php

class UploadC extends CI_Conntroller {

    function __construct() {
        parent::__construct();
        $this->gallery_path = realpath(APPPATH . '../csv');
        $this->gallery_path_url = base_url() . 'csv/';
    }

    function index() {
        if ($this->input->post('upload'))
            $this->do_upload();
        $this->load->view('csv_view');
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
            $csvfilepath = "csv/" . $file_info['file_name'];
            $this->addfromcsv($csvfilepath);
        }

        $filePath = './' . $csvfilepath;
        // $filePath = './csv/r_data.csv';
        $row = 1;
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                $num = count($data);
                echo "<p> $num fields in line $row: <br /></p>\n";
                $row++;
                for ($c = 0; $c < $num; $c++) {
                    echo $data[$c] . "<br />\n";
                }
                /* $mdata = array(
                  'lon' => $data[1],
                  'lat' => $data[2]
                  );
                  $this->db->insert('r_data',$mdata); */
            }

            fclose($handle);
        }
    }

}
