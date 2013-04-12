<?php
	// Form variables
	
	$email = array(
		'name'	=> 'email',
		'id'	=> 'email',
		'value'	=> set_value('email'),
		'maxlength'	=> 80,
		'size'	=> 30,
	);
?>

<?php $this->load->view('/auth/partials/messages.php', $alerts); ?>

<?= form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?= form_label('Email Address', $email['id']); ?></td>
		<td><?= form_input($email); ?></td>
		<td style="color: red;"><?= form_error($email['name']); ?><?= isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
	</tr>
</table>
<?= form_submit('send', 'Send'); ?>
<?= form_close(); ?>