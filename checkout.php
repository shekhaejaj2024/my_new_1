<?php
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }
    else{
        $user_id = '';
        header ('location:../login.php');
    }


    if (isset($_POST['place_order'])) {

        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        
        $number = $_POST['number'];
        $number = filter_var($number, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);

        $address=$_POST['flat'].', '.$_POST['street'].', '.$_POST['city'].', '.$_POST['country'].', '.$_POST['pin'];
        $address=filter_var( $address, FILTER_SANITIZE_STRING);

        $address_type=$_POST['address_type'];
        $address_type=filter_var( $address_type, FILTER_SANITIZE_STRING);
        $method=$_POST['method'];
        $method=filter_var($method,FILTER_SANITIZE_STRING);

        $verify_cart = "SELECT * FROM `cart` WHERE `user_id`= '$user_id'";
        $verify_cart = mysqli_query($con, $verify_cart);
        // $row=mysqli_fetch_assoc($select_user);
    
        if (isset($_GET['get_id'])) {
            $get_id=$_GET['get_id'];
            $get_product="SELECT * FROM `products` WHERE `id`='$get_id' LIMIT 1";
            $get_product=mysqli_query( $con, $get_product);

            if(mysqli_num_rows($get_product)>0){
                while($fetch_p = mysqli_fetch_assoc($get_product)){
                    $seller_id = $fetch_p['seller_id'];
                    $product_id = $fetch_p['id'];
                    $price = $fetch_p['price'];
                    $id=unique_id();
                    $id=filter_var($id,FILTER_SANITIZE_STRING);
                    $insert_order="INSERT INTO `orders` (`id`,`user_id`,`seller_id`,`name`,`number`,`email`,`address`,`address_type`,`method`,`product_id`,`price`,`qty`) VALUES ('$id','$user_id','$seller_id','$name','$number','$email','$address','$address_type','$method','$product_id','$price','1')";
                    $insert_order=mysqli_query( $con, $insert_order);
                    header('location:./order.php');
                }
            }else{
                $warning_msg[] = 'something went wrong';
            }
        }elseif(mysqli_num_rows($verify_cart)>0){
            while($f_cart = mysqli_fetch_assoc($verify_cart)){
                $product_id=$f_cart['product_id'];
                $s_products = "SELECT * FROM `products` WHERE `id`='$product_id' LIMIT 1";
                $s_products = mysqli_query( $con, $s_products );
                $f_product = mysqli_fetch_assoc($s_products);
                $seller_id = $f_product['seller_id'];
               $fetched_cart_id =$f_cart['product_id'];
               $fetched_cart_price =$f_cart['price'];
               $fetched_cart_qty =$f_cart['qty'];
    

                $insert_order="INSERT INTO `orders` (`id`,`user_id`,`seller_id`,`name`,`number`,`email`,`address`,`address_type`,`method`,`product_id`,`price`,`qty`) VALUES ('$id','$user_id','$seller_id','$name','$number','$email','$address','$address_type','$method','$fetched_cart_id','$fetched_cart_price','$fetched_cart_qty')";
                $insert_order=mysqli_query( $con, $insert_order);
                
            } 
            if($insert_order){
                $delete_cart="DELETE FROM `cart` WHERE `user_id`='$user_id'";
                $delete_cart=mysqli_query($con, $delete_cart);
                header('location:./order.php');
                
            }else{
                $warning_msg[] = 'something went wrong';
            }
        }
    }  
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Chekout Page</title>
    <link rel="stylesheet" href="./css/user_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
 <body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="details"> 
        <h1>Checkout</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ducimus explicabo <br>
              rerum excepturi quas at consectetur pariatur mollitia. Cumque fuga tempore recusandae magni.</p>
              <span> <a href="./home.php">home</a> <i class="bx bx-right-arrow-alt"></i>Checkout <i class="bx bx-down-arrow-alt" style="font-size: larger;"></i></span>
        </div>
    </div>
    <div class="checkout">
        <div class="heading">
            <h1>checkout summary</h1>
            <img src="./image/separator-img.png" alt="" srcset="">
        </div>
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data" class="register">
                    <input type="hidden" name="p_id" value="<?=$get_id;?>">
                    <h3>billing details</h3>
                    <div class="flex">
                        <div class="box">

                                <div class="input-field">
                                    <p>your name <span>*</span></p>
                                    <input type="text" name="name" id="" required maxlength="50" placeholder="Enter Your Name" class="input">
                                </div>
                                <div class="input-field">
                                    <p>your number <span>*</span></p>
                                    <input type="number" name="number" id="" required maxlength="10" placeholder="Enter Your number" class="input">
                                </div>
                                <div class="input-field">
                                    <p>your email <span>*</span></p>
                                    <input type="email" name="email" id="" required maxlength="50" placeholder="Enter Your email" class="input">
                                </div>
                                <div class="input-field">
                                    <p>your payment method <span>*</span></p>
                                    <select name="method" id="" class="input">
                                        <option value="cash on delivery">cash on delivery</option>
                                        <option value="cradit or debit card">cradit or debit card</option>
                                        <option value="net banking">net banking</option>
                                        <option value="UPI or RuPay">UPI or RuPay</option>
                                        <option value="Paytm">Paytm</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <p>address type<span>*</span></p>
                                    <select name="address_type" id="" class="input">
                                        <option value="home">home</option>
                                        <option value="office">office></option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <p>address line 1 <span>*</span></p>
                                    <input type="text" name="flat" id="" required maxlength="50" placeholder="e.g flat or building name" class="input">
                                </div>
                                <div class="input-field">
                                    <p>address line 2 <span>*</span></p>
                                    <input type="text" name="street" id="" required maxlength="50" placeholder="e.g street name" class="input">
                                </div>
                                <div class="input-field">
                                    <p>city name <span>*</span></p>
                                    <input type="text" name="city" id="" required maxlength="50" placeholder="city name" class="input">
                                </div>
                                <div class="input-field">
                                    <p>country name <span>*</span></p>
                                    <input type="text" name="country" id="" required maxlength="50" placeholder="only india" value="india" class="input">
                                </div>
                                <div class="input-field">
                                    <p>pincode <span>*</span></p>
                                    <input type="number" name="pin" id="" required maxlength="6" min="0" placeholder="e.g 387462" class="input">
                                </div>
                        </div>
                    </div>
                    <button type="submit" name="place_order" class="btn">place order</button>
                </form>
                
                <div class="summary">
                    <h3>my bag</h3>
                    <div class="box">
                    <?php
                        $grand_total=0;
                        if(isset($_GET['get_id'])){

                            $get_id=$_GET['get_id'];

                            $select_get="SELECT * FROM `products` WHERE `id`='$get_id'";
                            $select_get=mysqli_query($con,$select_get);

                            while($fetch_get=mysqli_fetch_assoc($select_get)){
                                $sub_total=$fetch_get['price'];
                                $grand_total+=$sub_total;
                    ?>
                    <div class="flex">
                        <img src="./uploaded_files/<?= $fetch_get['image']; ?>" alt="" class="image">
                        <div>
                            <h3 class="name"><?= $fetch_get['name']; ?></h3>
                            <p class="price"> <?= $fetch_get['price'];?> </p>
                        </div>
                    </div>
                    <?php
                            }
                        }else{
                            $select_cart="SELECT * FROM `cart` WHERE `user_id`='$user_id'";
                            $select_cart=mysqli_query($con,$select_cart);
                            if(mysqli_num_rows($select_cart)>0){
                                while($fetch_cart=mysqli_fetch_assoc($select_cart)){
                                    $product_id=$fetch_cart['product_id'];
                                    
                                    $select_products="SELECT * FROM `products` WHERE `id`='$product_id'";
                                    $select_products=mysqli_query($con,$select_products);
                                    
                                    $fetch_products=mysqli_fetch_assoc($select_products);
                                    $sub_total=($fetch_cart["qty"] * $fetch_products['price']);
                                    $grand_total += $sub_total;
                    ?>
                    <div class="flex">
                        <img src="./uploaded_files/<?= $fetch_products['image']; ?>" alt="" class="image">
                        <div>
                            <h3 class="name"><?= $fetch_products['name']; ?></h3>
                            <p class="price"> <?= $fetch_products['price'];?> X <?= $fetch_cart['qty']; ?> </p>
                        </div>
                    </div>
                    <?php
                                }
                            }
                            else{
                                echo '
                                <div class="empty">
                                    <p>your cart is empty</p>
                                </div>
                                ';
                            }
                        }
                    ?>
                </div>
                <div class="grand-total" >
                        <span style="padding:1rem;">total amount payable:</span>
                        <p><?= $grand_total; ?></p>
                </div>
            </div>
        </div>
    </div>
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