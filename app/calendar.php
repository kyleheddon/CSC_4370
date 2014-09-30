<?php
	$hours_to_show = 12;

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

	function randomThingToDo(){
		$things = array('Eat', 'Sleep', 'Dance', 'Run', 'Class', 'Paint', 'Meditate', 'Laugh');
		$i = rand(0, count($things) - 1);
		return $things[$i];
	}

	date_default_timezone_set('America/New_York');
	$hour = date('H');
	$minute = date('i');
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
			<table id="event_table">
				<tr class="table_header">
					<th>Time</th>
					<th>Event</th>
					<th>Event</th>
					<th>Event</th>
				</tr>
<?php for($i = 0; $i < $hours_to_show; $i++){ ?>
				<tr class="<?php echo $i%2 == 0 ? 'even_row' : 'odd_row'; ?>">
					<td><?php echo getDisplayForTime($hour + $i, '00'); ?></td>
	<?php for($j = 0; $j < 3; $j++){ ?>
					<td><?php echo randomThingToDo(); ?></td>
	<?php } ?>
				</tr>
<?php	} ?>
				</tbody>
			</table>
		</div>
	</body>
</html>
