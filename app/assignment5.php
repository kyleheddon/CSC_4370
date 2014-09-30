<?php
	function getFontFamily($key){
		$fontFamilies = array(
			"times" => '"Times New Roman", Times, serif',
			"helvetica" => 'Helvetica, Arial, sans-serif',
			"palatino" => '"Palatino Linotype", "Book Antiqua", Palatino, serif'
		);
		return $fontFamilies[$key];
	}

	if($_POST){
		$style = $_POST['style'];
		$text = $_POST['text'];
		$fontFamily = getFontFamily($style);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Assignment 4 - Select Styles</title>
		<link href="assets/stylesheets/main.css" rel="stylesheet" type="text/css" />
		<link href="assets/stylesheets/assignment5.css" rel="stylesheet" type="text/css" />
		<meta content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
<?php if(isset($fontFamily)){ ?>
		<style>
			body {
				font-family: <?php echo $fontFamily; ?>;
			}
		</style>
<?php	} ?>
	</head>
	<body>
		<div id="contents" class="page-wrap">
			<h1>Select Styles</h1>

			<form action="" method="post">
				<label>
					<h2>Select Font Family</h2>
					<select name="style">
						<option value="times">Times New Roman</option>
						<option value="helvetica">Helvetica</option>
						<option value="palatino">Palatino</option>
					</select>
				</label>
				<label>
					<h2>Enter some text</h2>
					<textarea name="text"><?php
						if(isset($text)){
							echo $text;
						}
					?></textarea>
				</label>
				<input type="submit" value="YAY!" />
			</form>
<?php if(isset($fontFamily)){ ?>
			<p>
				<?php echo str_replace("\n", '<br />', $text); ?>
			</p>
<?php	} ?>
		</div>
	</body>
</html>
