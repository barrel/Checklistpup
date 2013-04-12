<?php
	// Extract data array
	
	extract($data);

	// Form variables
	
	if ($use_username) {
		$username = array(
			'name'	=> 'username',
			'id'	=> 'username',
			'value' => set_value('username'),
			'maxlength'	=> $this->config->item('username_max_length', 'tank_auth'),
			'size'	=> 30,
		);
	}
	$email = array(
		'name'	=> 'email',
		'id'	=> 'email',
		'value'	=> set_value('email'),
		'maxlength'	=> 80,
		'size'	=> 30,
	);
	$password = array(
		'name'	=> 'password',
		'id'	=> 'password',
		'value' => set_value('password'),
		'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
		'size'	=> 30,
	);
	$confirm_password = array(
		'name'	=> 'confirm_password',
		'id'	=> 'confirm_password',
		'value' => set_value('confirm_password'),
		'maxlength'	=> $this->config->item('password_max_length', 'tank_auth'),
		'size'	=> 30,
	);
	$captcha = array(
		'name'	=> 'captcha',
		'id'	=> 'captcha',
		'maxlength'	=> 8,
	);
?>

<?php $this->load->view('/auth/partials/messages.php', $alerts); ?>

<?= form_open($this->uri->uri_string()); ?>
<table>
	<?php if ($use_username) { ?>
	<tr>
		<td><?= form_label('Username', $username['id']); ?></td>
		<td><?= form_input($username); ?></td>
		<td style="color: red;"><?= form_error($username['name']); ?><?= isset($errors[$username['name']])?$errors[$username['name']]:''; ?></td>
	</tr>
	<?php } ?>
	<tr>
		<td><?= form_label('Email Address', $email['id']); ?></td>
		<td><?= form_input($email); ?></td>
		<td style="color: red;"><?= form_error($email['name']); ?><?= isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
	</tr>
	<tr>
		<td><?= form_label('Password', $password['id']); ?></td>
		<td><?= form_password($password); ?></td>
		<td style="color: red;"><?= form_error($password['name']); ?></td>
	</tr>
	<tr>
		<td><?= form_label('Confirm Password', $confirm_password['id']); ?></td>
		<td><?= form_password($confirm_password); ?></td>
		<td style="color: red;"><?= form_error($confirm_password['name']); ?></td>
	</tr>

	<?php if ($captcha_registration) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?= form_error('recaptcha_response_field'); ?></td>
		<?= $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p>Enter the code exactly as it appears:</p>
			<?= $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td><?= form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?= form_input($captcha); ?></td>
		<td style="color: red;"><?= form_error($captcha['name']); ?></td>
	</tr>
	<?php }
	} ?>
</table>
<?= form_submit('register', 'Register'); ?>
<?= form_close(); ?>