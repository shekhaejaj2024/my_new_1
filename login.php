<?php
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }
    else{
        $user_id = '';
    }
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
    
        $pass = sha1($_POST['pass']);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    
      
        // 'class="1rename">
        $select_query = "SELECT * FROM `users` WHERE `email`= '$email' AND `password`='$pass'";
        $select_user = mysqli_query($con, $select_query);
        $row=mysqli_fetch_assoc($select_user);
        // $select_seller = $con->prepare("SELECT * FROM `sellers` WHERE email="$email);
        //$select_seller->execute([$email]);
        if (mysqli_num_rows($select_user) > 0) {
            setcookie("user_id", $row['id'], time() + 60*60*24*30,'/');
            header('location:home.php');
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
    <title>User Login Page</title>
    <link rel="stylesheet" href="./css/user_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
 <body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="details"> 
        <h1>Login</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ducimus explicabo <br>
              rerum excepturi quas at consectetur pariatur mollitia. Cumque fuga tempore recusandae magni.</p>
              <span> <a href="./home.php">home</a> <i class="bx bx-right-arrow-alt"></i>Login</span>
        </div>
    </div>
<!--  form start here-->
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