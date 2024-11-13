<?php
include '../components/connect.php';


if (isset($_COOKIE['seller_id'])) {
    $seller_id=$_COOKIE['seller_id'];
       
       // add product in data base
    if(isset($_POST['publish'])){
        $id=unique_id();
        $name=$_POST['name'];
        $name=filter_var($name,FILTER_SANITIZE_STRING);

        $price=$_POST['price'];
        $price=filter_var($price,FILTER_SANITIZE_STRING);

        $description=$_POST['description'];
        $description=filter_var($description,FILTER_SANITIZE_STRING);

        $stock=$_POST['stock'];
        $stock=filter_var($stock,FILTER_SANITIZE_STRING);
        $status='active';

        $image=$_FILES['image']['name'];
        $image=filter_var( $image,FILTER_SANITIZE_STRING);
  
        $image_size=$_FILES['image']['size'];
        $image_tmp_name=$_FILES['image']['tmp_name'];
        $image_folder='../uploaded_files/'.$image;

        $select_image="SELECT * FROM `products` WHERE `image`='$image' AND `seller_id`='$seller_id'";
        $select_image=mysqli_query($con,$select_image);
        if(isset($image)){
            if(mysqli_num_rows($select_image)>0){
                $warning_msg[]='image name repeated';
            }
            elseif($image_size>2000000){
                $warning_msg[]='image size is too large';
            }
            else{
                move_uploaded_file($image_tmp_name,$image_folder);
            }
        }
        else{
            $image='';
        }
        if(mysqli_num_rows($select_image)>0 AND $image != ''){
                $warning_msg[]='please rename your image';
            }
            else{
                $insert_product="INSERT INTO `products`(`id`,`seller_id`,`name`,`price`,`image`,`stock`,`product_detail`,`status`) VALUES('$id','$seller_id','$name','$price','$image','$stock','$description','$status')";
                $insert_product=mysqli_query($con,$insert_product);
                $success_msg[]='product inserted successfully';
            }
    }


         // add product in data base as draft
    if(isset($_POST['draft'])){
        $id=unique_id();
        $name=$_POST['name'];
        $name=filter_var($name,FILTER_SANITIZE_STRING);

        $price=$_POST['price'];
        $price=filter_var($price,FILTER_SANITIZE_STRING);

        $description=$_POST['description'];
        $description=filter_var($description,FILTER_SANITIZE_STRING);

        $stock=$_POST['stock'];
        $stock=filter_var($stock,FILTER_SANITIZE_STRING);
        $status='deactive';

        $image=$_FILES['image']['name'];
        $image=filter_var( $image,FILTER_SANITIZE_STRING);
        $image_size=$_FILES['image']['size'];
        $image_tmp_name=$_FILES['image']['tmp_name'];
        $image_folder='../uploaded_files/'.$image;

        $select_image="SELECT * FROM `products` WHERE `image`='$image' AND `seller_id`='$seller_id'";
        $select_image=mysqli_query($con,$select_image);
        if(isset($image)){
            if(mysqli_num_rows($select_image)>0){
                $warning_msg[]='image name repeated';
            }
            elseif($image_size>2000000){
                $warning_msg[]='image size is too large';
            }
            else{
                move_uploaded_file($image_tmp_name,$image_folder);
            }
        }
        else{
            $image='';
        }
        if(mysqli_num_rows($select_image)>0 AND $image != ''){
            $warning_msg[]='please rename your image';
        }
        else{
            $insert_product="INSERT INTO `products`(`id`,`seller_id`,`name`,`price`,`image`,`stock`,`product_detail`,`status`) VALUES('$id','$seller_id','$name','$price','$image','$stock','$description','$status')";
            $insert_product=mysqli_query($con,$insert_product);
            $success_msg[]='product save in draft successfully';
        }
    }
} 
else {
    $seller_id="";
    header('location:login.php');
} 
       

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin add product Page</title>
    <link rel="stylesheet" href="../css/adminstyle_1.css">
    <!-- Font Awesomw link -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Paste it On me -->

</head>

<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="dashboard">
            <div class="heading">
                <h1>Add Product</h1>
                <img src="../image/separator-img.png" alt="" >
            </div>
            <div class="form-container">
                <form action="" method="post" enctype="multipart/form-data" class="register">
                    <div class="input-field">
                        <p>Product name <span>*</span></p>
                        <input type="text" name="name" maxlength="100" placeholder="add product name" class="box" required>
                    </div>
                    <div class="input-field">
                        <p>Product price <span>*</span></p>
                        <input type="text" name="price" maxlength="100" placeholder="add product price" class="box" required>
                    </div>
                    <div class="input-field">
                        <p>Product detail<span>*</span></p>
                        <textarea name="description" required maxlength="1000" placeholder="add product detail" class="box"></textarea>    
                    </div>
                    <div class="input-field">
                        <p>Product stock <span>*</span></p>
                        <input type="text" name="stock" min="0" max="999999999" placeholder="add product stock" class="box" required>
                    </div>
                    <div class="input-field">
                        <p>Product image<span>*</span></p>
                        <input type="file" name="image" accept="image/*" class="box" required>
                    </div>
                    <div class="flex-btn">
                        <input type="submit" name="publish" value="add product" class="btn">
                        <input type="submit" name="draft" value="save as draft" class="btn">
                    </div>
                </form>
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