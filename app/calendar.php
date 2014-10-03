<?php
	date_default_timezone_set('America/New_York');
	$hour = date('H');
	$minute = date('i');
	$hours_to_show = 12;
	$starting_hour = 8;
	$max_hour = $starting_hour + $hours_to_show;


	function getDisplayForTime($hour, $minute){
		if($hour > 24){
			$hour -= 24;
		}

		if($hour == 12){
			return "12:$minute pm";
		} else if ($hour == 24 || $hour == 0){
			return "12:$minute am";
		} else if ($hour > 12){
			$currentHour = $hour - 12;
			return "$currentHour:$minute pm";
		} else {
			return "$hour:$minute am";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Assignment 5 - Calendar</title>
		<link href="calendar.css" rel="stylesheet" type="text/css" />
		<meta content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
	</head>
	<body>
		<div class="container">
			<h1>The current time and day is <?php echo getDisplayForTime($hour, $minute); ?></h1>

<?php if(!isset($_POST['submit'])) { ?>
			<form id="people" method="post" action="">
				<?php for($i = 0; $i < 3; $i++){ ?>
				<div class="person-input">
					<div class="field">
						<b>Person <?php echo $i + 1; ?></b>
						<input type="text" name="person_<?php echo $i; ?>_name" />
					</div>
					<div class="field">
						<b>Start Time</b>
						<select name="person_<?php echo $i; ?>_start_time">
							<?php for($j = $starting_hour; $j <= $max_hour - 1; $j++){ ?>
							<option value="<?php echo $j; ?>">
								<?php echo getDisplayForTime($j, '00'); ?>
							</option>
							<?php } ?>
						</select>
					</div>
					<div class="field">
						<b>End Time</b>
						<select name="person_<?php echo $i; ?>_end_time">
							<?php for($j = $starting_hour + 1; $j <= $max_hour; $j++){ ?>
							<option value="<?php echo $j; ?>">
								<?php echo getDisplayForTime($j, '00'); ?>
							</option>
							<?php } ?>
						</select>
					</div>
				</div>
				<?php } ?>
				<div class='submit'>
					<input type="submit" name="submit" value="Submit Hours" />
				</div>
			</form>
<?php } else { ?>
			<table id="event_table">
				<tr class="table_header">
					<th>Time</th>
					<?php for($i = 0; $i < 3; $i++) { ?>
					<th><?php echo $_POST["person_".$i."_name"]; ?></th>
					<?php } ?>
				</tr>
				<?php 
				for($i = 0; $i < $hours_to_show; $i++){ 
					$current_hour = $starting_hour + $i; ?>
				<tr class="<?php echo $i%2 == 0 ? 'even_row' : 'odd_row'; ?>">
					<td><?php echo getDisplayForTime($current_hour, '00'); ?></td>
					<?php for($j = 0; $j < 3; $j++){ 
						$start = $_POST["person_".$j."_start_time"];
						$end_hour = $_POST["person_".$j."_end_time"];
						$class = $start <= $current_hour && $current_hour <= $end_hour ? 'working' : 'not-working'; ?>
					<td class="<?php echo $class; ?>"></td>
					<?php } ?>
				</tr>
				<?php } ?>
				</tbody>
			</table>
<?php } ?>
		</div>
	</body>
</html>
