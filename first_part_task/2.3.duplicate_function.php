<?php

$value = array('marin', 'neso', 'neso', 'inga', 'marinela');

function getDuplicateValue($value) {

	$count = 1;
	$tempCount = 0;
	$repeating = $value[0];
	$temp = 0;

	for($i = 0; $i < count($value) - 1; $i++) {

		$temp = $value[$i];
		$tempCount = 0;

		for($j = 1; $j < count($value); $j++) {

			if($temp == $value[$j]) {

				$tempCount++;
			}

			if($tempCount > $count) {

				$repeating = $temp;
				$count = $tempCount;
			}
		}
		
	}
	return $repeating;
}

print_r(getDuplicateValue($value));

