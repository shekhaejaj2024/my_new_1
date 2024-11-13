<?php
include '../components/connect.php';


    if (isset($_COOKIE['seller_id'])) {
       $seller_id=$_COOKIE['seller_id'];
    } 
    else {
        $seller_id="";
        header('location:login.php');//location:loging.php
    }
   $get_id=$_GET['post_id'];
      
//    delete product
    if(isset($_POST['delete'] )){
        $p_id=$_POST['product_id'];
        $p_id=filter_var($p_id,FILTER_SANITIZE_STRING);
        
        $delete_image="SELECT * FROM `products` WHERE `id`='$p_id' AND `seller_id`='$seller_id'";
        $delete_image=mysqli_query($con,$delete_image);

        $fetch_delete_image=mysqli_fetch_assoc($delete_image);
        if($fetch_delete_image['' != '']){
            unlink('../uploaded_files/'.$fetch_delete_image['image']);
        }
        $delete_product="DELETE FROM `products` WHERE `id`='$p_id' AND `seller_id`='$seller_id'";
        $delete_product=mysqli_query($con,$delete_product);
        header('location:view_product.php');
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Sky -- show product Page</title>
    <link rel="stylesheet" href="../css/adminstyle_1.css">
    <!-- Font Awesomw link -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Paste it On me -->

</head>

<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="read-post">
            <div class="heading">
                <h1> product detail</h1>
                <img src="../image/separator-img.png" alt="" >
            </div>
            <div class="box-container">
            <?php $select_product="SELECT * FROM `products` WHERE `id`='$get_id' AND `seller_id`='$seller_id'";
             $select_product=mysqli_query( $con,$select_product);
            if(mysqli_num_rows($select_product)>0){
                while($fetch_product=mysqli_fetch_assoc($select_product)){

            ?>
            <form action="" method="post" class="box">
                    <input type="hidden" name="product_id" value="<?= $fetch_product['id'];?>">
                    <div class="status" style="color:<?php if($fetch_product['status']== 'active'){
                    echo 'limegreen';}else{echo 'coral';}?>"><?= $fetch_product['status'];?></div>
                    <?php if($fetch_product['image'] != ''){ ?>
                        <img src="../uploaded_files/<?= $fetch_product['image'];?>" class="image">

                    <?php } ?>   
                    <div class="price"><?= $fetch_product['price'];?></div>
                    <div class="title"><?= $fetch_product['name'];?></div>
                    <div class="content"><?= $fetch_product['product_detail'];?></div>
                    <div class="flex-btn">
                        <a href="edit_product.php?id=<?= $fetch_product['id'];?>" class="btn">edit</a>
                        <button type="submit" name="delete" class="btn" onclick="return confirm('delete this product');">delete</button>
                        <a href="view_product.php?post_id=<?= $fetch_product['id'];?>" class="btn">goBack</a>
                    </div>
                </form>    
            <?php
                }
            }else{
                echo '
                    <div class="empty">
                        <p>no product added yet! <br> <a href="add_product.php" class="btn" style="margin-top:2.2rem;">add products</a></p>
                    </div>
                ';
            }    
            ?>    
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