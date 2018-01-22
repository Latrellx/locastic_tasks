<?php
 
    // Array of whole numbers
 
    $array = array(25, 23, 4, 56, 257);
 
    // Custom function that returns minimum value of an array
 
    function getMinValue($array) { 
        $min = $array[0];
 
        foreach($array as $key => $val) {
            if($min > $val) {
                $min = $val;               
            }                        
        } 
        return $min;        
    }

    // Checking is there any values in array and outputing result ?? insert into function
 
    try {
        if(empty($array)) {
            throw new Exception("No values in array");
        }  
        echo getMinValue($array);
    } catch(Exception $e) {
        echo $e->getMessage();
    }
 
?>