<?php
	// Form variables
	
	$login = array(
		'name'	=> 'login',
		'id'	=> 'input_login',
		'value' => set_value('login'),
		'maxlength'	=> 80,
		'size'	=> 30,
	);
	
	// Language
	
	if ($this->config->item('use_username', 'tank_auth')) {
		$login_label = 'Email or login';
	} else {
		$login_label = 'Email';
	}
?>

<?php $this->load->view('/auth/partials/messages.php', $alerts); ?>

<?= form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?= form_label($login_label, $login['id']); ?></td>
		<td><?= form_input($login); ?></td>
		<td style="color: red;"><?= form_error($login['name']); ?><?= isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
	</tr>
</table>
<?= form_submit('reset', 'Get a new password'); ?>
<?= form_close(); ?>