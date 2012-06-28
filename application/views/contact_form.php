<div id="contact_form">
    <h1> Contact us</h1>

    <?php
    echo form_open('contact/submit');
    echo form_input('username', 'Username', 'id="name"');
    echo form_input('email_address', 'Email Address', 'id="email"');
    $data = array(
        'name' => 'message',
        'id' => 'message',
        'value' => 'Message',
        'cols' => '30'
    );
    echo form_textarea($data);
    echo form_submit('submit', 'Submit', 'id="submit"');
    ?>
</div>

<script type="text/javascript">
$('#submit').click(function() {
	
	var name = $('#name').val();
	
	if (!name || name == 'Username') {
		alert('Please enter your name');
		return false;
	}
        
        var email = $('#email').val();
	
	if (!email || email == 'Email Address') {
		alert('Please enter proper mail address');
		return false;
	}
        
        var msg = $('#message').val();
	
	if (!msg || msg == 'Message') {
		alert('Please enter your message');
		return false;
	}
	
	var form_data = {
		name: $('#name').val(),
		email: $('#email').val(),
		message: $('#message').val(),
		ajax: '1'		
	};
	
	$.ajax({
		url: "<?php echo site_url('contact/submit'); ?>",
		type: 'POST',
		data: form_data,
		success: function(msg) {
			$('#main_content').html(msg);
		}
	});
	
	return false;
});
	
	
</script>
