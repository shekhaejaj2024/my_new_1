<?php
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }
    else{
        $user_id = '';
    }
    if (isset($_POST['send_message'])) {
        if($user_id != ''){
            $id=unique_id();
            $name=$_POST['name'];
            $name=filter_var($name,FILTER_SANITIZE_STRING);
            $email = $_POST['email'];
            $email = filter_var($email, FILTER_SANITIZE_STRING);
    
            $subject=$_POST['subject'];
            $subject = filter_var($subject, FILTER_SANITIZE_STRING);
    
            $message=$_POST['message'];
            $message = filter_var($message, FILTER_SANITIZE_STRING);
    
            $verify_message = "SELECT * FROM `message` WHERE `user_id`='$user_id' AND `name`='$name' AND `email`= '$email' AND `subject`='$subject' AND `message`='$message'";
            $verify_message = mysqli_query($con, $verify_message);
            
            if (mysqli_num_rows($verify_message)>0){
                $warning_msg[]='message alredy exist';
            }
            else{
                $insert_message="INSERT INTO `message` (`id`,`user_id`,`name`,`email`,`subject`,`message`) VALUES ('$id','$user_id','$name','$email','$subject','$message')";
                $insert_message=mysqli_query($con, $insert_message);

                $success_msg[]='comment inserted successfully';

            }
        }
        else{
            $warning_msg[]='plese login first';
        }           
    }
?>
 <!DOCTYPE html>
 <!-- <html lang="en"> -->
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link rel="stylesheet" href="./css/user_style.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
</head>
 <body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="details"> 
        <h1>Contact</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ducimus explicabo <br>
              rerum excepturi quas at consectetur pariatur mollitia. Cumque fuga tempore recusandae magni.</p>
              <span> <a href="./home.php">home</a> <i class="bx bx-right-arrow-alt"></i>Contact</span>
        </div>
    </div>
    <d
    iv class="services">
        <div class="heading">
            <h1>Our services</h1>
            <p>just few steps.</p>
            <img src="./image/separator-img.png" alt="" srcset="">
        </div>
    
        <div class="box-container">
            <div class="box">
                <img src="./image/0.png" alt="" srcset="">
                <div>
                    <h1>free shipping fast</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque, ratione?</p>
                </div>
            </div>
            <div class="box">
                <img src="./image/1.png" alt="" srcset="">
                <div>
                    <h1>money back and garantee</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque, ratione?</p>
                </div>
            </div>
            <div class="box">
                <img src="./image/2.png" alt="" srcset="">
                <div>
                    <h1>online support</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque, ratione?</p>
                </div>
            </div>
        </div>

    <div class="form-container">
        <div class="heading">
            <h1>drop us a line</h1>
            <p>Just A Few Clicks To Make A Reservation Online For Saving Your Time And Money</p>
            <img src="./image/separator-img.png" alt="" srcset="">
        </div>
       <form action="" method="post"  enctype="multipart/form-data" class="register">
            
                <div class="input-field">
                    <label>name<sup>*</sup></label>
                    <input type="text" name="name" id="name" required placeholder="enter your name" class="box">
                </div>
                <div class="input-field">
                <label>email<sup>*</sup></label>
                    <input type="email" name="email" id="email" required placeholder="enter your email" class="box">
                </div>
                <div class="input-field">
                <label>subject<sup>*</sup></label>
                    <input type="text" name="subject" id="subject" required placeholder="reson.." class="box">
                </div>
                <div class="input-field">
                <label>comment<sup>*</sup></label>
                <textarea name="message" id="" cols="30" rows="10" required placeholder="" class="box"></textarea>
                </div>
                <button type="submit" name="send_message" class="btn">send message</button>
              
        </form>
    </div>
    
    <div class="address">
            <div class="heading">
                <h1>Our Contact Details</h1>
                <p  style="font-size:1.8rem">Just A Few Clicks To Make A Reservation Online For Saving Your Time And Money</p>
                <img src="./image/separator-img.png" alt="" srcset="">
            </div>
            <div class="box-container">
                <div class="box">
                    <i class="bx bxs-map-alt"></i>
                    <div>
                        <h4>address</h4>
                        <p style="font-size:1.8rem">1045,Kureshimohalla,Main Road,Alina,Gujrat,387305</p>
                    </div>
                </div>
                <div class="box">
                    <i class="bx bxs-phone-incoming"></i>
                    <div>
                        <h4>phone</h4>
                        <p style="font-size:1.8rem">7265042553</p>
                    </div>
                </div>
                <div class="box">
                    <i class="bx bxs-envelope"></i>
                    <div>
                        <h4>email</h4>
                        <p style="font-size:1.8rem">shekhaejaj445501@gmail.com</p>
                    </div>
                </div>
            </div>

    </div>
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