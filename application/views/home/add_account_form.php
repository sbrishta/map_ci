<h1>Create an account</h1>
<fieldset>
    <legend>Personal Information</legend>  
    <?php
    echo form_open('signup/create_member');
    ?>

    <label>Email:</label>
    <?php echo form_input('email', set_value('email', 'yourmail@gmail.com'));
    ?>
   

    <label>Add as</label>
    <select name="type">
        <option value="m">Moderator</option>
        <option value="a">Admin</option>
    </select>


</fieldset>

<fieldset>
    <legend>Login info</legend>
    <label>User Name</label>
    <?php echo form_input('username', set_value('username', '')); ?>

    <?php
    
    echo form_submit('submit', 'Create Account');
    ?>

    <?php
    echo validation_errors('<p class="error">');
    ?>
</fieldset>