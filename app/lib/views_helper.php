<?php
	function render($viewName, $locals){
		foreach($locals as $key => $value){
			$$key = $value;
		}
		include "views/$viewName.php";
	}
?>
