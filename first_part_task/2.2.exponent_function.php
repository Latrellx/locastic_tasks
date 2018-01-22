
<?php

function getExponent($n, $m) {

	$result = 1;

	for($i = 1; $i<=$m; $i++) {
		$result = $result * $n;
	}

	return $result;
}


echo getExponent(3,3);
