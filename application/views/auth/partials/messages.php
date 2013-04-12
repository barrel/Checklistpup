<div id="Messages">
	<?php if ($messages): ?>
		<?php foreach ($messages as $message): ?>
		<div class="message">
			<p><?= is_array($message) ? implode(' ', $message) : $message; ?></p>
		</div>
		<?php endforeach; ?>
	<?php endif; ?>
	
	<?php if ($errors): ?>
		<?php foreach ($errors as $error): ?>
		<div class="error">
			<p><?= is_array($error) ? implode(' ', $error) : $error; ?></p>
		</div>
		<?php endforeach; ?>
	<?php endif; ?>
	
	<?= validation_errors('<div class="error"><p>', '</p></div>'); ?>
</div>
