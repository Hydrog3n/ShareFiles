<!DOCTYPE html>
<html>
	<header>
		<meta charset="UTF-8">
		<title><?php echo $name_site; ?></title>

		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="js/ZeroClipboard.js"></script>
		<script src="js/app.js"></script>

	</header>
	<body>
	<div class="site-wrapper">
	<div class="site-wrapper-inner">
		<div class="cover-container">

			<div class="masthead clearfix">
				<div class="inner">
					<h3 class="masthead-brand"><a href="./"><?php echo $name_site;?></a></h3>
					<ul class="nav masthead-nav">
						<li><a href="./">Home</a></li>
						<?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 1){ ?>
						<li><a href="?p=administration">Administration</a></li>
						<?php } ?>
						<li><a href="#">Contact</a></li>
					</ul>
				</div>
			</div>
