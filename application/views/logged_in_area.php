<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <title>untitled</title>
    <p><?php echo anchor('contact/index', 'Contact us'); ?></p>
</head>
<body>
    
    <h2>Welcome Back<?php echo $this->session->userdata('username'); ?>!</h2>
    <p>This section represents the area that only logged in members can access.</p>
    <h3><?php echo anchor('csv_ci/csv_load', 'show csv'); ?></h3>
    <h3><?php echo anchor('newExpCI/', 'show map'); ?></h3>
    <h3><?php echo anchor('csv_ci/', 'File upload'); ?></h3>

    <h4><?php echo anchor('login/logout', 'Logout'); ?></h4>
</body>
</html>	