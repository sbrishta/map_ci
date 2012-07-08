<?php
class Csv_ci extends CI_Controller {

    function is_logged() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != true)
            return false;
        else
            return true;
    }

    function index() {
        if ($this->is_logged() == TRUE) {
            $this->load->model('Csv_model');

            if ($this->input->post('upload')) {
                $name = $this->Csv_model->do_upload();
              
              
                if (isset($name)) {
                    $filePath = './csv/'.$name;

                    $row = 1;
                    if (($handle = fopen($filePath, "r")) !== FALSE) {
                        while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                            $num = count($data);

                            $file_data[$row]['district_name'] = $data[1];
                            $file_data[$row]['bank_name'] = $data[2];
                            $file_data[$row]['area_name'] = $data[3];
                            $file_data[$row]['address'] = $data[4];
                            $row++;
                        }

                        fclose($handle);
                    }
                   // $this->load->view('csvshow', array('file_data' => $file_data));
                
                    $this->load->view('csv_view', array('file_data' => $file_data));
                }
            }
        }
        else $this->load->view('invalid_member');
    }
}
//function csv_load() {
//        $this->load->model('csv_model');
//        //$filePath=$filepath;
//        $filePath = './csv/bank_data.csv';
//        $row = 1;
//        if (($handle = fopen($filePath, "r")) !== FALSE) {
//            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
//                $num = count($data);
//                // echo "<p> $num fields in line $row: <br /></p>\n";
//
//                /*  for ($c = 0; $c < $num; $c++) {
//                  echo $data[$c] . "<br />\n";
//                  } */
//
//                $file_data[$row]['district_name'] = $data[1];
//                $file_data[$row]['bank_name'] = $data[2];
//                $file_data[$row]['area_name'] = $data[3];
//                $file_data[$row]['address'] = $data[4];
//                $row++;
//
//
//                //$this->csv_model->bank_data_insert($csvdata); 
//            }
//
//            fclose($handle);
//        }
//
//
//////         foreach ($file_data as $tempone) {
////          foreach ($tempone as $key => $temptwo) {
////          echo "$key: $temptwo". "<br />";
////
////          }
////          echo "\n";
////          } 
////          var_dump($file_data);
//        //$this->session->set_userdata($file_data);
//        //redirect('csv_show/');
//        $this->load->view('csvshow', array('file_data' => $file_data));
//    }
//    
//    function is_logged_in() {
//        $is_logged_in = $this->session->userdata('is_logged_in');
//        if (!isset($is_logged_in) || $is_logged_in != true) {
//            $this->load->view('invalid_member');
//            // echo 'You don\'t have permission to access this page. <a href="../login">Login</a>';
//            //die();		
//            //$this->load->view('login_form');
//        }
//    }
//}
