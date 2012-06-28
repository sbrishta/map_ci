<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen"
              charset="utf-8">
    <div id="upload">
        <title>Google Maps Web Data Collection</title>
        <?php
        echo form_open_multipart('csv_ci');
        // echo form_open('uploadC');
        echo form_upload('userfile');
        echo form_submit('upload', 'Upload');
        echo form_close();
        ?>		
    </div>
</head>
<body>
