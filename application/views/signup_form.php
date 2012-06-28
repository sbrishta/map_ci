<h1>Create an account</h1>
<fieldset>
    <legend>Personal Information</legend>  
    <?php
    echo form_open('login/create_member');
    echo form_input('firstname', set_value('firstname', 'First name'));
    echo form_input('lastname', set_value('lastname', 'Last name'));
    echo form_input('email_address', set_value('email_address', 'Email Address'));
    ?>
</fieldset>

<fieldset>
    <legend>Login info</legend>
    <?php
    echo form_input('username', set_value('username', 'User name'));
    echo form_input('password', set_value('password', 'Password'));
    echo form_input('password2', set_value('password2', 'Confirm Password'));

    echo form_submit('submit', 'Create Account');
    ?>

    <?php
    echo validation_errors('<p class="error">');
    ?>
</fieldset>
