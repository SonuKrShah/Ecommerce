<?php
    // Connecting to the database
    function pr($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }
    function prx($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
        die();
    }

    // Utility function to get a safe string value to insert into the string.
    function get_safe_value($con, $str){
        if($str != ""){
            $str=trim($str);
            return mysqli_real_escape_string($con, $str);
        }
    }

?>