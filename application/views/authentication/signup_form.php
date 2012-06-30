<?php
$this->load->view('authentication/header');
?>
<h1>Create an account</h1>
<fieldset>
    <legend>Personal Information</legend>  
    <?php
    echo form_open('signup/create_member');
    ?>
    <label>First Name</label>
    <?php echo form_input('firstname', set_value('firstname', '')); ?>
    <label>Last Name</label>
    <?php echo form_input('lastname', set_value('lastname', '')); ?>
    <label>Email:</label>
    <?php echo form_input('email', set_value('email', 'yourmail@gmail.com'));
    ?>
    <label>Select your bank name</label>
    <select name="bank_id">

        <?php
        foreach ($rows as $r) {

            echo '<option value="' . $r->bank_id . '">' . $r->bank_name . '</option>';
        }
        ?>
    </select>

    <label>Register as</label>
    <select name="type">
        <option value="m">Moderator</option>
        <option value="a">Admin</option>
    </select>


</fieldset>

<fieldset>
    <legend>Login info</legend>
    <label>User Name</label>
    <?php echo form_input('username', set_value('username', '')); ?>
    <label>Password</label>
    <?php echo form_password('password', set_value('password', '')); ?>
    <label>Confirm Password</label>
    <?php
    echo form_password('password2', set_value('password2', ''));

    echo form_submit('submit', 'Create Account');
    ?>

    <?php
    echo validation_errors('<p class="error">');
    ?>
</fieldset>
<?php
$this->load->view('authentication/footer');
?>