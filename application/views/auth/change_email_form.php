<?php
	// Form variables
	
	$password = array(
		'name'	=> 'password',
		'id'	=> 'password',
		'size'	=> 30,
	);
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
		<td><?= form_label('Password', $password['id']); ?></td>
		<td><?= form_password($password); ?></td>
		<td style="color: red;"><?= form_error($password['name']); ?><?= isset($errors[$password['name']])?$errors[$password['name']]:''; ?></td>
	</tr>
	<tr>
		<td><?= form_label('New email address', $email['id']); ?></td>
		<td><?= form_input($email); ?></td>
		<td style="color: red;"><?= form_error($email['name']); ?><?= isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
	</tr>
</table>
<?= form_submit('change', 'Send confirmation email'); ?>
<?= form_close(); ?>