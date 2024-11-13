<?php
    //adding products in wishlist
    if(isset($_POST["add_to_wishlist"])){
        if($user_id != ""){
            $id = unique_id();
            $product_id = $_POST['product_id'];
            $verify_wishlist = "SELECT * FROM `wishlist` WHERE `user_id`='$user_id' AND `product_id`='$product_id'";
            $verify_wishlist = mysqli_query($con,$verify_wishlist);

            $cart_num = "SELECT * FROM `cart` WHERE `user_id`='$user_id' AND `product_id`='$product_id'";
            $cart_num = mysqli_query( $con,$cart_num);

            if(mysqli_num_rows($verify_wishlist) > 0){
                $warning_msg[] = 'product alredy exist in your wishlist';
            }
            elseif(mysqli_num_rows($cart_num) > 0){
                $warning_msg[] = 'product alredy exist in your cart';
            }
            elseif($user_id !=  ''){
                $select_price = "SELECT * FROM `products` WHERE `id`='$product_id' LIMIT 1";
                $select_price = mysqli_query($con,$select_price);
                $fetch_price = mysqli_fetch_assoc($select_price);

                $fetch_price = $fetch_price['price'];

                $insert_wishlist = " INSERT INTO `wishlist` (`id`,`user_id`,`product_id`,`price`) VALUES ('$id','$user_id','$product_id','$fetch_price') ";
                $insert_wishlist = mysqli_query($con,$insert_wishlist);

                $success_msg[] = 'product added into your wishlist successfully';
            }
        }
        else{
            $warning_msg[] = 'plese login first';
        }
        
    }
?>