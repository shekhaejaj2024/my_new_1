<?php
    //adding products in cart
    if(isset($_POST["add_to_cart"])){
        if($user_id != ""){
            $id = unique_id();
            $product_id = $_POST['product_id'];

            $qty=$_POST['qty'];
            $qty=filter_var($qty,FILTER_SANITIZE_STRING);

            $verify_cart = "SELECT * FROM `cart` WHERE `user_id`='$user_id' AND `product_id`='$product_id'";
            $verify_cart = mysqli_query($con,$verify_cart);

            $max_cart_items = "SELECT * FROM `cart` WHERE `user_id`='$user_id'";
            $max_cart_items = mysqli_query( $con,$max_cart_items);

            if(mysqli_num_rows($verify_cart) > 0){
                $select_qty = mysqli_fetch_assoc($verify_cart);
                $fetch_qty=$select_qty['qty'];  
                if($fetch_qty!=$qty){

                    $insert_cart = "UPDATE `cart` SET `qty`='$qty' WHERE `user_id`='$user_id' AND `product_id`='$product_id'";
                    $insert_cart = mysqli_query($con,$insert_cart);
    
                    $success_msg[]='product quantity updated into your cart successfully';
                }
                else{
                    $warning_msg[] = 'product alredy exist in your cart';
                }
            }
            elseif(mysqli_num_rows($max_cart_items)>20){
                $warning_msg[] = 'your cart is full';
            }
            else{
                $select_price = "SELECT * FROM `products` WHERE `id` = '$product_id'";
                $select_price = mysqli_query( $con,$select_price);

                $fetch_price = mysqli_fetch_assoc($select_price);
                $fetch_price = $fetch_price['price'];

                $insert_cart = "INSERT INTO `cart` (`id`,`user_id`,`product_id`,`price`,`qty`) VALUES ('$id','$user_id','$product_id','$fetch_price','$qty')";
                $insert_cart = mysqli_query($con,$insert_cart);

                $success_msg[]='product added into your cart successfully';
            }
        }
        else{
            $warning_msg[] = 'plese login first';
        }
        
    }
?>