<?php 

    function getLongestCommonSubstring($array_one, $array_two) {

        $charArray = array();
        $tempArray = array();

        $longestArray = $array_two;
        $shortestArray = $array_one;

        if(count($array_one) > count($array_two)) {

            $longestArray = $array_one;
            $shortestArray = $array_two;
        }

        $index = 0;
        for($i = 0; $i < count($longestArray); $i++) {
            for($j = $index; $j < count($shortestArray); $j++) {
                if($longestArray[$i] == $shortestArray[$j]) {
                    $tempArray = array_push($longestArray[$i]);                   
                    $index = $j+1;
                    break;
                } else {
                    $index = 0;
                    $tempArray = array();
                }
                if(count($tempArray) > count($charArray)) {

                    $charArray = $tempArray;
                }
            }
            return $charArray;
        }
    }

?>