<!DOCTYPE html>
<html>
	<head>
		<title>Assignment 4 - Extract Email</title>
		<link href="assets/stylesheets/main.css" rel="stylesheet" type="text/css" />
		<link href="assets/stylesheets/assignment4.css" rel="stylesheet" type="text/css" />
		<meta content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
	</head>
	<body>
		<div id="contents" class="page-wrap">
			<h1>Extract email</h1>

			<form action="" method="post">
				<input type="text" name="email" placeholder="your@email.com" />
				<input type="submit" value="YAY!" />
			</form>
			<?php
			function extractUsername($email){
				$index = strrpos($email, "@");
				return substr($email, 0, $index);
			} ?>
			<?php
			if($_POST){
				$email = $_POST['email'];
				$username = extractUsername($email);
				?>
				<h3>THANK YOU FOR VISITING, <?php echo $username; ?></h3>
			<?php } ?>
		</div>
	</body>
</html>
