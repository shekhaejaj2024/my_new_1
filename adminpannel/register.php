<?php
include '../components/connect.php';

if (isset($_POST['submit'])) {
    $id = unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $cpass = sha1($_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = unique_id().'.'.$ext; 
    
    //$ext = pathinfo($image, PATHINFO_EXTENSION);

    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../uploaded_files/'.$rename;
    // move_uploaded_file($_FILES['image']['tmp_name'],'../uploaded_files/'.basename($_FILES['image']['name']));
    
    
    // 'class="1rename">
    $select_query = "SELECT * FROM `sellers` WHERE `email`= '$email'";
    $select_seller = mysqli_query($con, $select_query);

    // $select_seller = $con->prepare("SELECT * FROM `sellers` WHERE email="$email);
    //$select_seller->execute([$email]);
    if (mysqli_num_rows($select_seller) > 0) {
        $warning_msg[] = 'email already exist';
    } 
    else {
        if ($pass != $cpass) {
            $warning_msg[] = 'confirm Password Not Match!';
        } 
        else {
            $insert_query = "INSERT INTO `sellers` (`id`, `name`, `email`, `password`, `image`) VALUES ('$id','$name','$email','$cpass','$rename')";
            $insert_seller=mysqli_query($con,$insert_query);
            // $insert_seller = $con->prepare("INSERT INTO `sellers`(`id`,`name`,`email`,`password`,`image`)values(?,?,?,?,?)");
            //$insert_seller->execute([$id, $name, $email, $cpass, $rename]);
            move_uploaded_file($image_tmp_name, $image_folder);
            //move_uploaded_file($_FILES['image']['tmp_name'],'../uploaded_files/'.$rename.basename($_FILES['image']['name']));
            $success_msg[] = 'New Seller registared Please login now';
            
        }
    }
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
    <div class="form-container">
        <form action="register.php" method="post"  enctype="multipart/form-data" class="register">
            <h3>register now</h3>
            <div class="flex">
                <div class="col">
                    <div class="input-field">
                        <p>Your Name:<span>*</span></p>
                        <input type="text" name="name" id="name" placeholder="enter Name" class="box" maxlength="50" required>
                    </div>
                    <div class="input-field">
                        <p>Your email:<span>*</span></p>
                        <input type="email" name="email" id="email" placeholder="enter email" class="box" maxlength="50" required>
                    </div>
                    <div class="input-field">
                        <p>Your password:<span>*</span></p>
                        <input type="password" name="pass" id="pass" placeholder="enter password" class="box" maxlength="50" required>
                    </div>
                    <div class="input-field">
                        <p>Your Confirm Password: <span>*</span></p>
                        <input type="password" name="cpass" id="cpass" placeholder="enter confirm password" class="box" maxlength="50" required>
                    </div>
                    <div class="input-field-image">
                        <p>Your profile: <span>*</span></p>
                        <input type="file" name="image" accept="image/*" id="profile" placeholder="upload photo" class="box" maxlength="50" required>
                    </div>
                    <p class="link">Already Have an Account? <a href="login.php">Login Now</a></p>
                    <input type="submit" name="submit" value="reister now" class="btn">
                </div>
            </div>
        </form>
    </div>

    <!-- Sweetalert cdn Link Paste Here By Example-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Custom(Our Folder Js Link Ex Below) -->
    <script src="../js/script.js"></script>

    <!-- include Alert Php file -->
    <?php include '../components/alert.php'; ?>
</body>

</html>