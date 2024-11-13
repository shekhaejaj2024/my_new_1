<?php
include '../components/connect.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

  
    // 'class="1rename">
    $select_query = "SELECT * FROM `sellers` WHERE `email`= '$email' AND `password`='$pass'";
    $select_seller = mysqli_query($con, $select_query);
    $row=mysqli_fetch_assoc($select_seller);
    // $select_seller = $con->prepare("SELECT * FROM `sellers` WHERE email="$email);
    //$select_seller->execute([$email]);
    if (mysqli_num_rows($select_seller) > 0) {
        setcookie("seller_id", $row['id'], time() + 60*60*24*30,'/');
        header('location:dashboard.php');
    } 
    else {
        $warning_msg[] = 'Incorrect Email Or Password';
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
        <form action="" method="post"  enctype="multipart/form-data" class="login">
            <h3>login now</h3>
            <div class="flex">
                <div class="col">
                    <div class="input-field">
                        <p>Your email:<span>*</span></p>
                        <input type="email" name="email" id="email" placeholder="enter email" class="box" maxlength="50" require>
                    </div>
                    <div class="input-field">
                        <p>Your password:<span>*</span></p>
                        <input type="password" name="pass" id="pass" placeholder="enter password" class="box" maxlength="50" require>
                    </div>
                  
                    <p class="link">You Have new A/C Account? please <a href="register.php">register Now</a></p>
                    <input type="submit" name="submit" value="login now" class="btn">
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