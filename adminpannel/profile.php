<?php
include '../components/connect.php';


    if (isset($_COOKIE['seller_id'])) {
       $seller_id=$_COOKIE['seller_id'];
    } 
    else {
        $seller_id="";
        header('location:login.php');//location:loging.php
    } 

    $select_products="SELECT * FROM `products` WHERE `seller_id`='$seller_id'";
    $select_products=mysqli_query($con,$select_products);
    $total_products=mysqli_num_rows($select_products);  

    $select_orders="SELECT * FROM `orders` WHERE `seller_id`='$seller_id'";
    $select_orders=mysqli_query($con,$select_orders);
    $total_orders=mysqli_num_rows($select_orders);  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>--seller profile Page</title>
    <link rel="stylesheet" href="../css/adminstyle_1.css">
    <!-- Font Awesomw link -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Paste it On me -->

</head>

<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="saller-profile">
            <div class="heading">
                <h1>profile details</h1>
                <img src="../image/separator-img.png" alt="" >
            </div>
            <div class="details">
                <div class="seller">
                    <img src="../uploaded_files/<?=$fetch_profile['image'];?>">
                    <h3 class="name"><?=$fetch_profile['name'];?></h3>
                    <span>saller</span>
                    <a href="../adminpannel/update.php" class="btn">update profile</a>
                </div>
                <div class="flex">
                    <div class="box">
                        <span><?=$total_products;?></span>
                        <p>total products</p>
                        <a href="../adminpannel/view_product.php" class="btn">view product</a>
                    </div>
                    <div class="box">
                        <span><?=$total_orders;?></span>
                        <p>total orders placed</p>
                        <a href="../adminpannel/admin_order.php" class="btn">view orders</a>
                    </div>
                </div>
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