<?php foreach ($file_data as $row){
    
    $row1['bank_name']=$row['bank_name'];
    $row1['area_name']=$row['area_name'];
    $row1['address']=$row['address'];
    $row1['add']=$row['address'].$row['area_name']."bangladesh";
    $this->load->view('newExp2',array('row1' => $row1));
}

$this->load->view('home/footer');
?>