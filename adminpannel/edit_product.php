<?php
include '../components/connect.php';


    if (isset($_COOKIE['seller_id'])) {
       $seller_id=$_COOKIE['seller_id'];
       
       if(isset($_POST['update'])) {
        $product_id=$_POST['product_id'];
        $product_id=filter_var($product_id,FILTER_SANITIZE_STRING);

        $name=$_POST['name'];
        $name=filter_var($name,FILTER_SANITIZE_STRING);

        $price=$_POST['price'];
        $price=filter_var($price,FILTER_SANITIZE_STRING);

        $description=$_POST['description'];
        $description=filter_var($description,FILTER_SANITIZE_STRING);

        $stock=$_POST['stock'];
        $stock=filter_var($stock,FILTER_SANITIZE_STRING);

        $status=$_POST['status'];
        $status=filter_var($status,FILTER_SANITIZE_STRING);
        
        $update_product_query="UPDATE `products` SET `name`='$name',`price`='$price',`stock`='$stock',`product_detail`='$description',`status`='$status' WHERE `id`='$product_id' AND `seller_id`='$seller_id'"; 
        $update_product_query=mysqli_query($con, $update_product_query);
        // $update_product="UPDATE `products` SET `name`='$name',price`='$price',`stock`='$stock',`product_detail`='$description',`status`='$status' WHERE `id`='$product_id'";
        
        // `status`='$status' `id`='$product_id'";
        $success_msg[]='Product updated successfully';
        // $old_image=filter_var($old_image,FILTER_SANITIZE_STRING);
        
        $old_image=$_POST['old_image'];
        $image=$_FILES['image']['name'];
        $image=filter_var($image,FILTER_SANITIZE_STRING);
        $image_size=$_FILES['image']['size'];
        $image_tmp_name=$_FILES['image']['tmp_name'];
        $image_folder='../uploaded_files/'.$image;

        $select_image="SELECT * FROM `products` WHERE `image`='$old_image' AND `id`='$product_id'";
        $select_image=mysqli_query($con,$select_image);
        // while($row=mysqli_fetch_assoc($select_image)>0){

        // }
           
            if(!empty($image)){
                if($image_size > 20000000){
                    $warning_msg[]='image size is too large';
                }
                elseif($old_image==$image){
                    $warning_msg[]='rename your image';
                }
                else{
                    $update_pro="UPDATE `products` SET `image`='$image' WHERE `seller_id`='$seller_id' AND `id`='$product_id'";
                    $update_pro=mysqli_query($con,$update_pro);
                    move_uploaded_file($image_tmp_name,$image_folder);
                                if($old_image!=$image AND $old_image!=''){
                                unlink('../uploaded_files/'.$old_image);
                                }
                    $success_msg[]='Product updated with image';
                }
            }
        
        
// below is last brecket
    }


       //delete image
       if(isset($_POST['delete_image'])){
            $empty_image='';

            $product_id=$_POST['product_id'];
            $product_id=filter_var($product_id,FILTER_SANITIZE_STRING);

            $delete_image="SELECT * FROM `products` WHERE `id`='$product_id'";
            $delete_image=mysqli_query($con,$delete_image);
            $fetch_delete_image=mysqli_fetch_assoc($delete_image);
            if($fetch_delete_image['image']!=''){
                unlink('../uploaded_files/'.$fetch_delete_image['image']);
            }
            $unset_image="UPDATE `products` SET `image`='$empty_image' WHERE `id`='$product_id'";
            $unset_image=mysqli_query($con,$unset_image);
            $success_msg[]='image deleted successfully';
        }

        // delete product
        if(isset($_POST['delete_product'])){
            $product_id=$_POST['product_id'];
            $product_id=filter_var($product_id,FILTER_SANITIZE_STRING);
            
            $delete_product="SELECT * FROM `products` WHERE `id`='$product_id'";
            $delete_product=mysqli_query($con,$delete_product);
            $fetch_delete_product=mysqli_fetch_assoc($delete_product);
            if($fetch_delete_product['image']!=''){
                unlink('../uploaded_files/'.$fetch_delete_product['image']);
            }
            $delete_product="DELETE FROM `products` WHERE `id`='$product_id'";
            $delete_product=mysqli_query($con,$delete_product);
            $success_msg[]='product deleted successfully';
            header('location:view_product.php');
        }
        
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
        <section class="post-editor">
            <div class="heading">
                <h1>edit product</h1>
                <img src="../image/separator-img.png" style="display:block;width:20rem;margin:auto">
            </div>
            <div class="box-container" style="align-items: start;">

            <?php 
            $product_id=$_GET['id'];
            $select_product="SELECT * FROM `products` WHERE `id`='$product_id' AND `seller_id`='$seller_id'";
             $select_product=mysqli_query( $con,$select_product);
            if(mysqli_num_rows($select_product)>0){
                while($fetch_product=mysqli_fetch_assoc($select_product)){

            ?>
            <div class="form-container">
             <form action="" method="post" class="register" enctype="multipart/form-data">
                    <input type="hidden" name="old_image" value="<?= $fetch_product['image'];?>">

                    <input type="hidden" name="product_id" value="<?= $fetch_product['id'];?>">
                    <div class="input-field">
                        <p>product status <span>*</span></p>
                        <select name="status" class="box">
                            <option value="<?= $fetch_product['status'];?>"></option>
                            <option value="active">active</option>
                            <option value="deactive">deactive</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <p>product name <span>*</span></p>
                        <input type="text" name="name" value="<?=$fetch_product['name'];?>" class="box">
                    </div>
                    <div class="input-field">
                        <p>product price <span>*</span></p>
                        <input type="number" name="price" value="<?=$fetch_product['price'];?>" class="box">
                    </div>
                    <div class="input-field">
                        <p>product description <span>*</span></p>
                        <textarea name="description" class="box"><?=$fetch_product['product_detail'];?></textarea>
                    </div>
                    <div class="input-field">
                        <p>product stock <span>*</span></p>
                        <input type="number" name="stock" min="0" max="999999999" value="<?=$fetch_product['stock'];?>" class="box" maxlength="10">
                    </div>
                    <div class="input-field">
                        <p>product image <span>*</span></p>
                        <input type="file" name="image" accept="image/*" class="box">
                    </div>
                    <?php if($fetch_product['image']!=''){?>
                    <div class="input-field">
                            <img src="../uploaded_files/<?= $fetch_product['image'];?>" class="image">
                            <div class="flex-btn">
                                <input type="submit" name="delete_image" class="btn" value="delete_image">
                                <a href="../adminpannel/view_product.php" class="btn" style="width: 49%; text-align: center; height: 5rem;">go back</a>
                            </div>    
                    </div>  
                            <?php } ?>
                    <div class="flex-btn">
                        <input type="submit" name="update" value="update product" class="btn">
                        <input type="submit" name="delete_product" value="delete product" class="btn">
                    </div> 
             </form>
            </div>   
            <?php
                }
            }else{
                echo '
                    <div class="empty">
                        <p>no product added yet!</p>
                    </div
                ';
                
            ?> 
            <br><br>
               <div class="flex-btn">
                <a href="../adminpannel/view_product.php" class="btn">view product</a>
                <a href="../adminpannel/add_product.php" class="btn">add product</a>
               </div>   
            <?php } ?>
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