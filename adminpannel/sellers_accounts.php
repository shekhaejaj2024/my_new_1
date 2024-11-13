<?php
include '../components/connect.php';


    if (isset($_COOKIE['seller_id'])) {
       $seller_id=$_COOKIE['seller_id'];
    } 
    else {
        $seller_id="";
        header('location:login.php');//location:loging.php
    }
    // // delete messge from database 
    // if(isset($_POST['delete_msg'])){
    //     $delete_id=$_POST['delete_id'];
    //     $delete_id=filter_var($delete_id,FILTER_SANITIZE_STRING);
        
    //     $verify_delete="SELECT * FROM `message` WHERE `id`='$delete_id'";
    //     $verify_delete=mysqli_query($con, $delete_id); 
        
    //     if(mysqli_num_rows($verify_delete)>0){
    //         $delete_msg="DELETE FROM `message` WHERE `id`='$delete_id";
    //         $delete_msg=mysqli_query($con,$delete_msg);
    //         $success_msg[]='message deleted successfully';

    //     }
    //     else{
    //         $warning_msg[]='message already deleted';
    //     }
    // }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Sky -- seller registared sellers Page</title>
    <link rel="stylesheet" href="../css/adminstyle_1.css">
    <!-- Font Awesomw link -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Paste it On me -->

</head>

<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="user-container">
            <div class="heading">
                <h1>registered sellers</h1>
                <img src="../image/separator-img.png" alt="" >
            </div>
            <div class="box-container">
                <?php
                 $select_sellers="SELECT * FROM `sellers` WHERE `id` ='$seller_id'";
                 $select_sellers=mysqli_query($con, $select_sellers);  
                 if(mysqli_num_rows($select_sellers)>0){
                    while($fetch_sellers = mysqli_fetch_assoc($select_sellers)){
                 
                ?>
                 <div class="box">
                    <img src="../uploaded_files/<?=$fetch_sellers['image'];?>">
                    <p>seller id:<span><?=$fetch_sellers['id'];?></span></p>
                    <p>seller name:<span><?=$fetch_sellers['name'];?></span></p>
                    <p>seller email:<span><?=$fetch_sellers['email'];?></span></p>
                 </div>
                <?php
                 }
                }else{
                    echo '
                        <div class="empty">
                            <p>no sellers registered yet! </p>
                        </div>
                    ';
                }
                ?>     
            </div>
        </section>
    </div>

    <!-- Sweetalert cdn Link Paste Here By Example-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <!-- Custom(Our Folder Js Link Ex Below) -->
    <script src="../js/admin_script.js"></script>

    <!-- include Alert Php file -->
    <?php include '../components/alert.php'; ?>
</body>

</html>