<?php
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }
    else{
        $user_id = '';
    }
    
    if (isset($_GET['get_id'])) {
        $get_id=$_GET['get_id'];
    }else{
        $get_id=$_GET[''];
        header('location:./order.php');
    }
    if (isset($_POST['cancel'])) {
        $get_id=$_GET['get_id'];
        $update_order = "UPDATE `orders` SET `status` ='cancled' WHERE `id`='$get_id'";
        $update_order=mysqli_query($con, $update_order);
        $success_msg[]="order canceled";
        header('location:./order.php');
    }
    
           
    
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User orders details Page</title>
    <link rel="stylesheet" href="./css/user_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
</head>
 <body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="details"> 
        <h1>orders details</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ducimus explicabo <br>
              rerum excepturi quas at consectetur pariatur mollitia. Cumque fuga tempore recusandae magni.</p>
              <span> <a href="./home.php">home</a> <i class="bx bx-right-arrow-alt"></i>order details</span><i class="bxbxs-down alt" style="font-size: larger;"></i>
        </div>
    </div>
    <div class="order-detail">
        <div class="heading">
            <h1>my orders details</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.  <br>
             Error harum itaque est vel doloremque deserunt quaerat accusantium doloribus deleniti iste!</p>
            <img src="./image/separator-img.png" alt="" srcset="">
        </div>
        <div class="box-container">
        <?php
                $grand_total = 0;

                $select_order="SELECT * FROM `orders` WHERE `id`='$get_id' LIMIT 1";
                $select_order=mysqli_query($con,$select_order);
                
                if(mysqli_num_rows($select_order)>0){
                    while($fetch_order = mysqli_fetch_assoc($select_order)){

                        $fetched_product_id=$fetch_order['product_id'];

                        $select_products = "SELECT * FROM `products` WHERE `id`='$fetched_product_id' LIMIT 1";
                        $select_products = mysqli_query( $con,$select_products);

                        if(mysqli_num_rows($select_products)>0){
                          while($fetch_products = mysqli_fetch_assoc($select_products)){

                          $sub_total=($fetch_order['price']* $fetch_order['qty']);
                          $grand_total += $sub_total;
            ?>
            <div class="box">
                <div class="col">
                    <p class="title">
                     <i class="fa fa-calendar fa-lg"></i><?=$fetch_order['date'];?>  
                    </p>
                    <img src="./uploaded_files/<?=$fetch_products['image'];?>" alt="" srcset="" class="image">
                    <p class="price">Price: &#8377;<?=$fetch_products['price'];?>/-</p>
                    <h3 class="name"><?=$fetch_products['name'];?></h3>
                    <p class="grand-total">total amount payable: <span>&#8377;<?=$grand_total;?>/-</span></p>
                  
                </div>
                <div class="col">
                    <p class="title">billing address</p>
                    <p class="user"><i class="fa fa-user"></i><?=$fetch_order['name'];?></p>
                    <p class="user"><i class="fa fa-phone"></i><?=$fetch_order['number'];?></p>
                    <p class="user"><i class="fa fa-envelope"></i><?=$fetch_order['email'];?></p>
                    <p class="user"><i class="fa fa-address-card"></i><?=$fetch_order['address'];?></p>
                    <p class="status" style="color:<?php if($fetch_order['status']=='delivered'){echo 'green';}elseif($fetch_order['status']=='cancled'){echo 'red';}else{echo 'orange';}?>"><?=$fetch_order['status'];?></p>

                    <?php if($fetch_order['status'] == 'cancled'){?>
                        <a href="./checkout.php?get_id=<?=$fetch_products['id'];?>" class="btn" style="line-height: 3;">order again</a>
                        <?php }else{ ?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <button type="submit" name="cancel" onclick="return confirm('do you want to cancel this product');" class="btn">cancel</button>     
                        </form>

                    <?php } ?>
                   
                </div>
            </div>
            
            <?php
                    // $grand_total += $sub_total; 
                        } 
                    }
                }
            }else{
                echo '
                        <div class="empty">
                            <P>no ordered products placed yet!</p>
                        </div>
                        ';
            }
            
            ?>
        </div>
    </div>
<!--  form start here-->

    <!--  -->
    <!--  -->
    <!--  -->
    <?php include './components/footer.php';?>
    
    <!-- Sweetalert cdn Link Paste Here By Example-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <!-- Custom(Our Folder Js Link Ex Below) -->
    <script src="./js/user_script.js"></script>

    <!-- include Alert Php file -->
    <?php include 'components/alert.php'; ?>    
 </body>
 </html>