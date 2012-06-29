<div id="upload">
    <?php
    echo form_open_multipart('csv_ci');
    echo form_upload('userfile');
    echo form_submit('upload', 'Upload');
    echo form_close();
    ?>		
</div>
<p>new line here</p>
<div>
    <p><?php echo anchor('site/members_area', 'go back'); ?></p>
    <p><?php echo anchor('login/logout', 'Logout'); ?></p>
</div>