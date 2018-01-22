<?php

	function checkPalindrom($word) {

		$a = 0;
		$b = strlen($word) - 1;

		while($b > $a) {

			if($word[$a] != $word[$b]) {
				return false;
			}

			++$a;
			--$b;
		}
		return true;
	}

	var_dump(checkPalindrom("trkasodnas"));


?>












