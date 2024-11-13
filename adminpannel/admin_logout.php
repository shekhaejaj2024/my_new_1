<?php
 include '../components/connect.php';
 setcookie('seller_id','', time() -1,'/');
 header('location:../adminpannel/login.php');

?>