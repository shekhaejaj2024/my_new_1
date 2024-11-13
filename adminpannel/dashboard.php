<?php
include '../components/connect.php';


    if (isset($_COOKIE['seller_id'])) {
       $seller_id=$_COOKIE['seller_id'];
    }
    else {
        $seller_id="";
        header('location:login.php');//location:loging.php
    } 
       

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Sky -- seller registration Page</title>
    <link rel="stylesheet" href="../css/adminstyle_1.css">
    <!-- Font Awesomw link -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Paste it On me -->

</head>

<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="dashboard">
            <div class="heading">
                <h1>dashboard</h1>
                <img src="../image/separator-img.png" alt="" >
            </div>
            <div class="box-container">
                <div class="box">
                 <h3>welcome</h3>
                 <p> <?= $fetch_profile['name'];?></p>
                 <a href="../adminpannel/update.php" class="btn">Update Profile</a>
                </div> 
                <div class="box">
                    <?php
                        $select_message="SELECT *FROM `message`";
                        $select_message=mysqli_query($con, $select_message);
                        $number_of_msg=mysqli_num_rows($select_message);
                    ?>
                 <h3><?= $number_of_msg;?></h3>
                 <p> unread message</p>
                 <a href="../adminpannel/admin_message.php" class="btn">see message</a>
                </div>
                <div class="box">
                    <?php
                        $select_product="SELECT *FROM `products` WHERE `seller_id`='$seller_id'";
                        $select_product=mysqli_query($con, $select_product);
                        $number_of_product=mysqli_num_rows($select_product);
                    ?>
                 <h3><?= $number_of_product;?></h3>
                 <p> product added</p>
                 <a href="../adminpannel/add_product.php" class="btn">add product</a>
                </div> 
                <div class="box">
                    <?php
                        $select_active_product="SELECT *FROM `products` WHERE `seller_id`='$seller_id' AND `status`='active'";
                        $select_active_product=mysqli_query($con, $select_active_product);
                        $number_of_active_product=mysqli_num_rows($select_active_product);
                    ?>
                 <h3><?= $number_of_active_product;?></h3>
                 <p>total active products</p>
                 <a href="../adminpannel/view_product.php" class="btn">active products</a>
                </div> 
                <div class="box">
                    <?php
                        $select_deactive_product="SELECT *FROM `products` WHERE `seller_id`='$seller_id' AND `status`='deactive'";
                        $select_deactive_product=mysqli_query($con, $select_deactive_product);
                        $number_of_deactive_product=mysqli_num_rows($select_deactive_product);
                    ?>
                 <h3><?= $number_of_deactive_product;?></h3>
                 <p>totaldeactive products</p>
                 <a href="../adminpannel/view_product.php" class="btn">deactive products</a>
                </div> 
                <div class="box">
                    <?php
                        $select_users="SELECT *FROM `users`";
                        $select_users=mysqli_query($con, $select_users);
                        $number_of_users=mysqli_num_rows($select_users);
                    ?>
                 <h3><?= $number_of_users;?></h3>
                 <p> user accounts</p>
                 <a href="../adminpannel/user_accounts.php" class="btn">see user</a>
                </div> 
                <div class="box">
                    <?php
                        $select_sellers="SELECT *FROM `sellers`";
                        $select_sellers=mysqli_query($con, $select_sellers);
                        $number_of_sellers=mysqli_num_rows($select_sellers);
                    ?>
                 <h3><?= $number_of_sellers;?></h3>
                 <p>sellers accounts</p>
                 <a href="../adminpannel/sellers_accounts.php" class="btn">see sellers</a>
                </div> 
                <div class="box">
                    <?php
                        $select_orders="SELECT *FROM `orders`   where `seller_id`='$seller_id'";
                        $select_orders=mysqli_query($con, $select_orders);
                        $number_of_orders=mysqli_num_rows($select_orders);
                    ?>
                 <h3><?= $number_of_orders;?></h3>
                 <p>total orders placed</p>
                 <a href="../adminpannel/admin_order.php" class="btn">total orders</a>
                </div>
                <div class="box">
                    <?php
                        $select_confirm_orders="SELECT *FROM `orders`   where `seller_id`='$seller_id' AND `status`='in progress'";
                        $select_confirm_orders=mysqli_query($con, $select_confirm_orders);
                        $number_of_confirm_orders=mysqli_num_rows($select_confirm_orders);
                    ?>
                 <h3><?= $number_of_confirm_orders;?></h3>
                 <p>total confirm orders</p>
                 <a href="../adminpannel/admin_order.php" class="btn">confirm orders</a>
                </div>
                <div class="box">
                    <?php
                        $select_canceled_orders="SELECT *FROM `orders`   where `seller_id`='$seller_id' AND `status`='canceled'";
                        $select_canceled_orders=mysqli_query($con, $select_canceled_orders);
                        $number_of_canceled_orders=mysqli_num_rows($select_canceled_orders);
                    ?>
                 <h3><?= $number_of_canceled_orders;?></h3>
                 <p>total canceled orders</p>
                 <a href="../adminpannel/admin_order.php" class="btn">canceled orders</a>
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