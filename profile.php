<?php
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }
    else{
        $user_id = 'location:./login.php';
    }
    
        $select_orders = "SELECT * FROM `orders` WHERE  `user_id`='$user_id'";
        $select_orders = mysqli_query($con, $select_orders);
        $total_orders=mysqli_num_rows($select_orders);

        $select_message = "SELECT * FROM `message` WHERE  `user_id`='$user_id'";
        $select_message = mysqli_query($con, $select_message);
        $total_message=mysqli_num_rows($select_message);
       

           
    
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Page</title>
    <link rel="stylesheet" href="./css/user_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
 <body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="details"> 
        <h1>Profile</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ducimus explicabo <br>
              rerum excepturi quas at consectetur pariatur mollitia. Cumque fuga tempore recusandae magni.</p>
              <span> <a href="./home.php">home</a> <i class="bx bx-right-arrow-alt"></i>Profile</span>
        </div>
    </div>

<!--  profile section start here-->
  <section class="profile">
        <div class="heading">
            <h1>Profile Detail</h1>
            <img src="./image/separator-img.png" alt="" srcset="">
        </div>
        <div class="detail">
            <div class="user">
                <img src="./uploaded_files/<?=$fetch_profile['image'];?>" alt="" srcset="">
                <h3><?=$fetch_profile['name'];?></h3>
                <p>user</p>
                <a href="./update.php" class="btn">Update Profile</a>
            </div>
            <!-- if(){

            } -->
            <div class="box-container">
                <div class="box">
                    <div class="flex">
                        <i class="bx bxs-folder-minus"></i>
                        <h3><?=$total_orders;?></h3>
                    </div>
                    <a href="./order.php" class="btn">View Orders</a>
                </div>
                <div class="box">
                    <div class="flex">
                        <i class="bx bxs-chat"></i>
                        <h3><?=$total_message;?></h3>
                    </div>
                    <a href="./message.php" class="btn">View Messages</a>
                </div>
            </div>
        </div>
  </section>

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