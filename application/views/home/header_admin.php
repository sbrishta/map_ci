<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen"
              charset="utf-8">
    <div class="menuWrapper">
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
        
        <div class="menu">
            <ul>
                <li> <?php echo anchor('bank_admin/add_moderator', 'Add an account'); ?>
                </li>
                <li>
                    <input type="button" value="Go Back " onclick="history.back(-1)" />
                </li>

            </ul>


        </div>



    </div>


</head>
<body>
