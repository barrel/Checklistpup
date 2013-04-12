<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Checklistpup</title>
	
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<link type="text/css" rel="stylesheet" href="<?= site_url('/public/ss/reset.css'); ?>" />
	<link type="text/css" rel="stylesheet" href="<?= site_url('/public/ss/main.css'); ?>" />
	
	<link rel="shortcut icon" href="<?= site_url('/public/favicon.ico'); ?>" />
	
	<script type="text/javascript">
		var siteUrl = '<?= site_url(); ?>';
	</script>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script type="text/javascript" src="<?= site_url('/public/js/main.js'); ?>"></script>
</head>

<body>

<?= $content; ?>

</body>
</html>

