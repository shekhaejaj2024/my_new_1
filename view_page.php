<?php
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }
    else{
        $user_id = '';
    }
    include './components/add_wishlist.php';
    include './components/add_cart.php';
    // if (isset($_POST['submit'])) {
    //     $email = $_POST['email'];
    //     $email = filter_var($email, FILTER_SANITIZE_STRING);
    
    //     $pass = sha1($_POST['pass']);
    //     $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    
      
    //     // 'class="1rename">
    //     $select_query = "SELECT * FROM `users` WHERE `email`= '$email' AND `password`='$pass'";
    //     $select_user = mysqli_query($con, $select_query);
    //     $row=mysqli_fetch_assoc($select_user);
    //     // $select_seller = $con->prepare("SELECT * FROM `sellers` WHERE email="$email);
    //     //$select_seller->execute([$email]);
    //     if (mysqli_num_rows($select_user) > 0) {
    //         setcookie("user_id", $row['id'], time() + 60*60*24*30,'/');
    //         header('location:home.php');
    //     } 
    //     else {
    //         $warning_msg[] = 'Incorrect Email Or Password';
    //     } 
           
    // }
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User product detail Page</title>
    <link rel="stylesheet" href="./css/user_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
 <body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="details"> 
        <h1>Product Detail</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ducimus explicabo <br>
              rerum excepturi quas at consectetur pariatur mollitia. Cumque fuga tempore recusandae magni.</p>
              <span> <a href="./home.php">home</a> <i class="bx bx-right-arrow-alt"></i>Product Detail</span>
        </div>
    </div>
    <div class="view_page">
        <div class="heading">
            <h1>Product Detail</h1>
            <img src="./image/separator-img.png" alt="" srcset="">
        </div>
        <?php
            if(isset($_GET['pid'])){
                $pid = $_GET['pid'];

                $select_products="SELECT * FROM `products` WHERE `id` = '$pid' ";
                $select_products=mysqli_query($con,$select_products);

                if(mysqli_num_rows($select_products)>0){
                    while($fetch_products=mysqli_fetch_assoc($select_products)){

              
        ?>
              <form action="" method="post" enctype="multipart/form-data" class="box">
                <div class="img-box">
                    <img src="./uploaded_files/<?=$fetch_products['image'];?>" alt="" srcset="" class="img">
                </div>
                
                <div class="detail">
                    <?php if($fetch_products['stock'] > 9){?>
                        <span class="stock" style="color: green;">In Stock</span>
                    <?php }elseif($fetch_products['stock'] == 0){ ?>
                        <span class="stock" style="color: red;">out of stock</span>
                    <?php }else{ ?> 
                        <span class="stock" style="color: red;">Hurry,Only <?=$fetch_products['stock'];?>left</span>
                    <?php } ?> 
                
                <p class="price">&#8377;<?=$fetch_products['price'];?></p>
                <div class="name"><?=$fetch_products['name'];?></div>
                    <p class="product-detail"><?=$fetch_products['product_detail'];?></p>
                    <input type="hidden" name="qty" min="0" value="1" maxlength="2" class="quantity">
                    <div class="button">
                        <button type="submit" name="add_to_wishlist" class="btn">add to wishlist <i class="bx bx-heart"></i> </button>
                        <button type="submit" name="add_to_cart" class="btn" style="margin-left: 1rem;">add to cart <i class="bx bx-cart"></i> </button>
                    </div>
                
                </div> 
                   
            </form>
        <?php
          }
         }
        }
        ?>
        </div>
        <section>
            <div class="products">
                <div class="heading">
                    <h1>similar products</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>
                     Atque nihil ipsam illo corrupti magni quibusdam quae impedit deserunt optio harum?</p><br>
                    <img src="./image/separator-img.png" alt="" srcset="">
                </div>
                <?php include './components/shop.php'; ?>
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