<?php
function is_christmas()
{
	$month = date("m");
	$day = date("d");

	return $month == 12 or ($month == 1 and $day < 7);
}
?>
