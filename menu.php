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
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu|Our Shop Page</title>
    <link rel="stylesheet" href="./css/user_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
 <body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="details"> 
        <h1>Our Shop</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ducimus explicabo <br>
              rerum excepturi quas at consectetur pariatur mollitia. Cumque fuga tempore recusandae magni.</p>
              <span> <a href="./home.php">home</a> <i class="bx bx-right-arrow-alt"></i>Menu|Our Shop</span>
        </div>
    </div>
    <div class="products">
        <div class="heading">
            <h1>Our Latest flavours</h1>
            <img src="./image/separator-img.png" alt="" srcset="">
        </div>
        <div class="box-container">
            <?php
                $select_products="SELECT * FROM `products` WHERE `status`='active'";
                $select_products=mysqli_query($con, $select_products);
                if(mysqli_num_rows(result: $select_products)>0){
                    while($fetch_products=mysqli_fetch_assoc($select_products)){
                
            ?>
            <form action="" method="post" class="box <?php if($fetch_products['stock']  ==  0){echo 'disabled';} ?>">
                <img src="./uploaded_files/<?=$fetch_products['image']; ?>" alt="" srcset="">
                <?php if($fetch_products['stock'] > 9){ ?>
                    <span class="stock" style="color: green;">In Stock</span>
                <?php } elseif($fetch_products['stock'] == 0){ ?>
                    <span class="stock" style="color: red;">Out Of Stock</span>
                <?php }else{?>
                    <span class="stock" style="color: red;">Hurry,only <?=$fetch_products['stock'];?></span>   
                <?php } ?>
                <div class="content">
                    <img src="./image/shape-19.png" alt="" class="shap">
                    <div class="button">
                        <div class="shap-btn"> <h3 class="name"><?=$fetch_products['name'];?></h3></div>
                        <div>
                            <button type="submit" name="add_to_cart"><i class="bx bx-cart"></i></button>
                            <button type="submit" name="add_to_wishlist"><i class="bx bx-heart"></i></button>
                            <a href="./view_page.php?pid=<?=$fetch_products['id'];?>" class="bx bxs-show"></a>
                        </div>
                    </div>
                    <p class="price">price: <?=$fetch_products['price'];?> &#8377;</p>
                    <input type="hidden" name="product_id" value="<?=$fetch_products['id'];?>">
                    <div class="flex-btn">
                        <a href="./checkout.php?get_id=<?=$fetch_products['id'];?>" class="btn">Buy Now</a>
                        <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty box">
                    </div>
                </div>
            </form>
            <?php
                    }
                }else{
                    echo '
                        <div class="empty">
                            <p>no products added yet!</p>
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