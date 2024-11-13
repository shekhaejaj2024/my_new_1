<?php
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }
    else{
        $user_id = 'location:./login.php';
    }
   
    include './components/add_cart.php';
    
//update quantity in cart 
    if (isset($_POST['update_cart'])){
        $cart_id=$_POST['cart_id'];
        $cart_id=filter_var($cart_id,FILTER_SANITIZE_STRING);

        $qty=$_POST['qty'];
        $qty=filter_var($qty, FILTER_SANITIZE_STRING);

        $update_qty="UPDATE `cart` SET `qty`='$qty' WHERE `id` = '$cart_id'";
        $update_qty=mysqli_query($con,$update_qty);

        $success_msg[]='Cart quantity updated successfully';
    }
//delete cart item
     if (isset($_POST['delete_item'])){
        $cart_id=$_POST['cart_id'];
        $cart_id=filter_var($cart_id,FILTER_SANITIZE_STRING);

        $verify_delete_item="SELECT * FROM `cart` WHERE `id` = '$cart_id'";
        $verify_delete_item=mysqli_query($con,$verify_delete_item);

        if(mysqli_num_rows($verify_delete_item)>0){
            $delete_cart_item="DELETE FROM `cart` WHERE `id`='$cart_id'";
            $delete_cart_item=mysqli_query($con,$delete_cart_item);
            $success_msg[]='item removed from cart';
        }
        else{
            $warning_msg[]='cart item alredy deleted';
        }
    }
    
// empty cart
    if (isset($_POST['empty_cart'])){
        $verify_empty_item="SELECT * FROM `cart` WHERE `user_id` = '$user_id'";
        $verify_empty_item=mysqli_query($con,$verify_empty_item);

    
        if(mysqli_num_rows($verify_empty_item)>0){
            $delete_cart_id="DELETE FROM `cart` WHERE `user_id`='$user_id'";
            $delete_cart_id=mysqli_query($con,$delete_cart_id);
            $success_msg[]='empty cart successfully';
        }
        else{
            $warning_msg[]='your cart is alredy empty';
        }
    }

?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart Page</title>
    <link rel="stylesheet" href="./css/user_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
 <body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="details"> 
        <h1>My Cart</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ducimus explicabo <br>
              rerum excepturi quas at consectetur pariatur mollitia. Cumque fuga tempore recusandae magni.</p>
              <span> <a href="./home.php">home</a> <i class="bx bx-right-arrow-alt"></i>My Cart</span>
        </div>
    </div>
    <div class="products">
        <div class="heading">
            <h1>My Cart</h1>
            <img src="./image/separator-img.png" alt="" srcset="">
        </div>
        <div class="box-container">
            <?php
                $grand_total = 0;

                $select_cart="SELECT * FROM `cart` WHERE `user_id`='$user_id'";
                $select_cart=mysqli_query($con,$select_cart);
                
                if(mysqli_num_rows($select_cart)>0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){

                        $fetched_product_id=$fetch_cart['product_id'];

                        $select_products = "SELECT * FROM `products` WHERE `id`='$fetched_product_id'";
                        $select_products = mysqli_query( $con,$select_products);

                        if(mysqli_num_rows($select_products)>0){

                        $fetch_products = mysqli_fetch_assoc($select_products);
            ?>
            <form action="" method="post" enctype="multipart/form-data" class="box <?php if($fetch_products['stock'] == 0){echo 'disabled';}?>">
                <input type="hidden" name="cart_id" value="<?=$fetch_cart['id'];?>">
                <img src="./uploaded_files/<?=$fetch_products['image'];?>" alt="" srcset="" class="image">
                <?php if($fetch_products['stock'] > 9){?>
                    <span class="stock" style="color: green;">In Stock</span>
                <?php }elseif($fetch_products['stock'] == 0){ ?>
                    <span class="stock" style="color: red;">out of stock</span>
                <?php }else{ ?> 
                    <span class="stock" style="color: red;">Hurry,Only <?=$fetch_products['stock'];?>left</span>
                <?php } ?>  
                <div class="content">
                    <img src="./image/shape-19.png" alt="" class="shap">
                    <div class="flex">
                        <p class="price">price &#8377;<?=$fetch_products['price'];?></p>
                    </div><br><br>
                    <div class="button">
                    <h3 class="name"><?=$fetch_products['name'];?></h3>
                    </div>
                    <br>
                    <div class="flex-btn" style="display:flex;justify-content:space-around; height:8rem">
                            <!-- <span class="qty" style="font-size: large;padding-bottom:5%;border:2px solid green;">Quantity<i class="bx bx-right-arrow-alt"></i></span> -->
                            <input type="number" name="qty" required min="1" value="<?=$fetch_cart['qty']?>" max="99" maxlength="2" class="box qty" style="margin-right:auto;">
                            <button type="submit" name="update_cart" class="fa fa-edit bx-edit box" style="margin-right:2rem;">
                            </button>
                        </div>
                        <div class="flex" style="display:flex;justify-content:space-between;">
                            <p class="sub-total">sub total: <span>&#8377; <?=$sub_total=($fetch_cart['qty'] * $fetch_cart['price']);?></span> </p>   
                            <button type="submit" name="delete_item" onclick="return confirm('remove from cartt');" class="btn">delete</button>
                        </div>

               
                </div>     
            </form>
            <?php
                    $grand_total += $sub_total;  
                    }
                    else{
                        echo '
                        <div class="empty">
                            <P>no products was found!</p>
                        </div>
                        ';
                    }
                }
            }else{
                echo '
                        <div class="empty">
                            <P>no products added yet!</p>
                        </div>
                        ';
            }
            
            ?>
        </div>
        <?php if($grand_total != 0){ ?>
            <div class="cart-total">
                <p>total amount payable : <span>&#8377;<?=$grand_total;?></span> </p>
                <div class="buttton">
                    <form action="" method="post">
                        <button type="submit" name="empty_cart" class="btn" onclick="return confirm('are you sure to empty cart ?');">empty cart</button><br><br>
                    </form>
                    <a href="./checkout.php" class="btn">proceed to checkout</a>
                </div>
            </div>
        <?php } ?>    
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