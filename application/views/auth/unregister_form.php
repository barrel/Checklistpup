<?php
	// Form variables
	
	$password = array(
		'name'	=> 'password',
		'id'	=> 'password',
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
</table>
<?= form_submit('cancel', 'Delete account'); ?>
<?= form_close(); ?>