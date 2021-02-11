<!-- Template des pages -->
<?php 
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="public/css/style.css">
		<link rel="icon" type="image/png" href="public/images/LOGO_GBAF_ROUGE.png">
		<title><?= $title ?></title>
	</head>
	<body>
		<?php
			include 'view/frontend/headerView.php';
		?>
		<section class="content-page">
			<div class="container">
				<?= $content ?>
			</div>
		</section>
		<?php
			include 'view/frontend/footerView.php';
		?>
	</body>
</html>