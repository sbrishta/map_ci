<div id="login_form">
<h1> Log In </h1>

<?php
echo form_open('login/validate_credentials');
echo form_input('username','Username');
echo form_password('password','Password');
echo form_submit('submit','Log In');
echo anchor('login/signup','Create new Account');
?>
</div>