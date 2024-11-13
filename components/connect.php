<?php 
$con = mysqli_connect("localhost:3306", "root", "", "icecreamshop_db");
    if (!$con) {
        echo "Not connected";

    }
function unique_id(){
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $charLength = strLen($chars);
        $randomString = "";
         for ($i = 0; $i < 20; $i++) {
            $randomString.= $chars[mt_rand(0, $charLength - 1)];
         }
         return $randomString;

    }
?>