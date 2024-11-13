<?php
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }
    else{
        $user_id = 'location:./login.php';
    }
   
    include './components/add_cart.php';
    // remove product from wishlist
    if (isset($_POST['delete_item'])){
        $wishlist_id=$_POST['wishlist_id'];
        $wishlist_id=filter_var($wishlist_id,FILTER_SANITIZE_STRING);

        $verify_delete="SELECT * FROM `wishlist` WHERE `id`='$wishlist_id'";
        $verify_delete=mysqli_query($con,$verify_delete);
        if(mysqli_num_rows($verify_delete)>0){
            $delete_wishlist_item="DELETE FROM `wishlist` WHERE `id`='$wishlist_id'";
            $delete_wishlist_item=mysqli_query($con,$delete_wishlist_item);
            $success_msg[]='item removed from wish list';
        }
        else{
            $warning_msg[]='item alredy removed';
        }
    }
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wish_list</title>
    <link rel="stylesheet" href="./css/user_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
 <body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="details"> 
        <h1>My Wishlist</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ducimus explicabo <br>
              rerum excepturi quas at consectetur pariatur mollitia. Cumque fuga tempore recusandae magni.</p>
              <span> <a href="./home.php">home</a> <i class="bx bx-right-arrow-alt"></i>My WishList</span>
        </div>
    </div>
    <div class="products">
        <div class="heading">
            <h1>Our Wishlist</h1>
            <img src="./image/separator-img.png" alt="" srcset="">
        </div>
        <div class="box-container">
            <?php
                $grand_total = 0;

                $select_wishlist="SELECT * FROM `wishlist` WHERE `user_id`='$user_id'";
                $select_wishlist=mysqli_query($con,$select_wishlist);
                
                if(mysqli_num_rows($select_wishlist)>0){
                    while($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)){

                        $fetched_product_id=$fetch_wishlist['product_id'];

                        $select_products = "SELECT * FROM `products` WHERE `id`='$fetched_product_id'";
                        $select_products = mysqli_query( $con,$select_products);

                        if(mysqli_num_rows($select_products)>0){

                        $fetch_products = mysqli_fetch_assoc($select_products);
            ?>
            <form action="" method="post" enctype="multipart/form-data" class="box <?php if($fetch_products['stock'] == 0){echo 'disabled';}?>">
                <input type="hidden" name="wishlist_id" value="<?=$fetch_wishlist['id'];?>">
                <img src="./uploaded_files/<?=$fetch_products['image'];?>" alt="" srcset="">
                <?php if($fetch_products['stock'] > 9){?>
                    <span class="stock" style="color: green;">In Stock</span>
                <?php }elseif($fetch_products['stock'] == 0){ ?>
                    <span class="stock" style="color: red;">out of stock</span>
                <?php }else{ ?> 
                    <span class="stock" style="color: red;">Hurry,Only <?=$fetch_products['stock'];?>left</span>
                <?php } ?>  
                <div class="content">
                    <img src="./image/shape-19.png" alt="" class="shap">
                    <div class="button">
                        <div><h3><?=$fetch_products['name'];?></h3></div>
                        <div>
                            <button type="submit" name="add_to_cart"> <i class="bx bx-cart"></i></button>
                            <a href="./view_page.php" class="bx bxs-show"></a>
                            <button type="submit" name="delete_item" onclick="return confirm('remove from wishlist?');"><i class="bx bx-x"></i></button>
                        </div>
                    </div>
                    <input type="hidden" name="product_id" value="<?=$fetch_products['id'];?>">
                    <div class="flex">
                        <p class="price">price &#8377;<?=$fetch_products['price'];?></p>
                    </div>
                    <br>
                    <div class="flex">
                        <input type="hidden" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
                        <a href="./checkout.php?get_id=<?=$fetch_products['id'];?>" class="btn">Buy Now</a>
                    </div>
                </div>     
            </form>
            <?php
                    $grand_total+=$fetch_products['price'];  
                    }
                }
            }
            
                else{
                    echo '
                    <div class="empty">
                        <P>no products added yet!</p>
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