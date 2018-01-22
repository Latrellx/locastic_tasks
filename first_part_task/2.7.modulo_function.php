<?php

	function render($num) {			

		for($i = 1; $i<=$num; $i++) {
			
			if($i % 15 == 0) {
				echo $i . "LOCASTIC" . "<br>";
			} elseif($i % 5 == 0) {
				echo $i . "STIC" . "<br>";
			} elseif($i % 3 == 0) {
				echo $i . "LOCA" . "<br>";
			}
		}
	}	

	echo render(100);



