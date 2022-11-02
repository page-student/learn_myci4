<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test</title>
	<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>"> -->
	<?= link_tag('public/css/style.css') ?>
	<!-- <script type="text/javascript" src="<?= base_url('js/script.js'); ?>"></script> -->
	<?= script_tag('public/js/script.js') ?>
</head>
<body>
<?php echo $this->include('partials/header') ?>

<?php echo $this->renderSection('content'); ?>

<?php echo $this->include('partials/footer') ?>
</body>
</html>