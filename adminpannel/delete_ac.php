<?php
include '../components/connect.php';
if (isset($_COOKIE['seller_id'])) {
} 
else {
    $seller_id="";
    header('location:login.php');//location:loging.php
}
$seller_id=$_COOKIE['seller_id'];
$select_account="SELECT * FROM `sellers` WHERE `id`='$seller_id'";
$select_account=mysqli_query($con, $select_account);

if(mysqli_num_rows($select_account)>0){
    $row = mysqli_fetch_assoc($select_account);
    $select_account_id=$row["id"];

    $delete_account="DELETE FROM `sellers` WHERE `id`='$select_account_id'";
    $delete_account=mysqli_query( $con, $delete_account);
    // unlink('');
    $success_msg[]="account deleted permanatly";
    header('location:../adminpannel/login.php');
    $seller_id="";

}

else{
    $warning_msg[]= "account already deleted";
}
   
?>