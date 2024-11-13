<?php
include '../components/connect.php';


    if (isset($_COOKIE['seller_id'])) {
       $seller_id=$_COOKIE['seller_id'];
    } 
    else {
        $seller_id="";
        header('location:login.php');//location:loging.php
    } 
if(isset($_POST['submit'])){
    $select_seller="SELECT * FROM `sellers` WHERE `id`='$seller_id' ";
    $select_seller=mysqli_query($con,$select_seller);
    if(mysqli_num_rows($select_seller)> 0){
    while($fetch_seller=mysqli_fetch_assoc($select_seller)){
        
        $prev_pass=$fetch_seller['password'];
        $prev_image=$fetch_seller['image'];
        $name=$_POST['name'];
        $name=filter_var($name,FILTER_SANITIZE_STRING);
        $email=$_POST['email'];
        $email=filter_var($email,FILTER_SANITIZE_STRING);
    }
}



    // update username
    if(!empty($name)){
        $update_name="UPDATE `sellers` SET `name`='$name' WHERE `id`='$seller_id'";
        $update_name=mysqli_query( $con,$update_name);  
        $success_msg[]='username updated successfully';
    }
    // update email
    if(!empty($email)){
        $select_email="SELECT * FROM `sellers` WHERE `id`='$seller_id' AND `email`='$email'";
        $select_email=mysqli_query( $con,$select_email);
        if (mysqli_num_rows($select_email)>0){
            $warning_msg[]='email alredy exist';
         }
        else{
            $update_email="UPDATE `sellers` SET `email`='$email' WHERE `id`='$seller_id'";
            $update_email=mysqli_query( $con,$update_email);  
            $success_msg[]='email updated successfully';

        }
    }
     // update image
     $image=$_FILES['image']['name'];
     $image=filter_var($image,FILTER_SANITIZE_STRING);
     $ext =pathinfo($image,PATHINFO_EXTENSION);
     $rename=unique_id().'.'.$ext;
     $image_size=$_FILES['image']['size'];
     $image_tmp_name=$_FILES['image']['tmp_name'];
     $image_folder='../uploaded_files/'.$rename;
     if(!empty($image)){
         if($image_size > 200000){
             $warning_msg[]='image size is too large';
         }
         else{
             $update_image="UPDATE `sellers` SET `image`='$rename' WHERE `id`='$seller_id'";
             $update_image=mysqli_query( $con,$update_image);
             move_uploaded_file($image_tmp_name,$image_folder);
             if($prev_image != '' AND $prev_image != $rename){
                 unlink('../uploaded_files/'.$prev_image);
             }
             $success_msg[]='image updated with all updation successfully';
            }
        }
        
        // update password
        // 
        $empty_pass ='da39a3ee5e6b4b0d3255bfef95601890afd80709';
        $old_pass = sha1($_POST['old_pass']);
        $old_pass=filter_var($old_pass,FILTER_SANITIZE_STRING);
        $new_pass =sha1($_POST['new_pass']);
        $new_pass=filter_var($new_pass,FILTER_SANITIZE_STRING);
        $cpass=sha1($_POST['cpass']);
        $cpass=filter_var($cpass,FILTER_SANITIZE_STRING);
        
        if($old_pass != $empty_pass){
            if($old_pass != $prev_pass){
                $warning_msg[]='old password not match';
            }
            else if($new_pass != $cpass){
                $warning_msg[]='password not matched';
                
            }
            else{
                if($old_pass != $empty_pass){
                    $update_pass="UPDATE `sellers` SET `password`='$cpass' WHERE `id`='$seller_id'";
                    $update_pass=mysqli_query($con,$update_pass);
                    $success_msg[]='password updated succefully with other';
                    header('location:../adminpannel/profile.php');
                
            }
            else{
                $warning_msg[]='please enter a new password';
            }
        }
    }

    
   


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>--update profile Page</title>
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
            <div class="heading" style="padding-top:5%;">
                <h1>update profile details</h1>
                <img src="../image/separator-img.png" alt="" >
            </div>
            <div class="form-container">
           <form action="" method="post" enctype="multipart/form-data" class="register">
               <div class="img-box">
                   <img src="../uploaded_files/<?=$fetch_profile['image'];?>" alt="update profile img-box">
               </div>
               <!-- <h3>update profile</h3> -->
               <div class="flex">
                    <div class="col">
                        <div class="input-field">
                        <p>your name <span>*</span></p>
                        <input type="text" name="name" placeholder="<?=$fetch_profile['name'];?>" class="box">
                        </div>
                        <div class="input-field">
                        <p>your email <span>*</span></p>
                        <input type="email" name="email" placeholder="<?=$fetch_profile['email'];?>" class="box">
                        </div>
                        <div class="input-field">
                        <p>select pic <span>*</span></p>
                        <input type="file" name="image" accept="image/*" class="box">
                        </div>
                    
                        <!--  -->
                    
                        <div class="input-field">
                        <p>old password <span>*</span></p>
                        <input type="password" name="old_pass" placeholder="enter your old password" class="box">
                        </div>
                        <div class="input-field">
                        <p>new password <span>*</span></p>
                        <input type="password" name="new_pass" placeholder="enter your new password" class="box">
                        </div>
                        <div class="input-field">
                        <p>confirm password <span>*</span></p>
                        <input type="password" name="cpass" placeholder="enter your confirm password" class="box">
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" value="update profile" class="btn">
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