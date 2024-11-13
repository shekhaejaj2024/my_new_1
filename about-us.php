<?php
    include 'components/connect.php';
    if(isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id']; 
    }
    else{
        $user_id = '';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us Page</title>
    <link rel="stylesheet" href="./css/user_style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <!-- Font Awesomw link -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'components/user_header.php';?>
    <div class="banner">
        <div class="details">
            <h1>about us</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ducimus explicabo <br>
              rerum excepturi quas at consectetur pariatur mollitia. Cumque fuga tempore recusandae magni.</p>
              <span> <a href="./home.php">home</a> <i class="bx bx-right-arrow-alt"></i>about us</span>
        </div>
    </div>
    <div class="chef">
        <div class="box-container">
            <div class="box">
                <div class="heading">
                    <span>Alex Doe</span>
                    <h1>MasterChef</h1>
                    <img src="./image/separator-img.png" alt="" srcset="">
                </div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias sed asperiores <br> 
                nihil at. Nemo accusantium quae voluptate recusandae commodi ipsa optio eligendi <br>
                reprehenderit laudantium error magni iusto quibusdam, beatae culpa separator-img <br>
                quos quam deleniti officia aliquam quasi. Quis fuga est delectus.</p>
                <div class="flex-btn">
                    <a href="./menu.php" class="btn">explore our menu</a>
                    <a href="./home.php" class="btn">visit our shop</a>
                </div>
            </div> 
            <div class="box">
                <img src="./image/ceaf.png" alt="" srcset="" class="img">
            </div>    
        </div>
    </div>
    <!-- chef section end here -->
     <div class="story">
        <div class="box">
        <div class="heading">
            <h1>our story</h1>
            <img src="./image/separator-img.png" alt="" srcset="">
        </div>
        <p style="font-size:2.2rem">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias sed asperiores <br> 
                nihil at. Nemo accusantium quae voluptate recusandae commodi ipsa optio eligendi <br>
                reprehenderit laudantium error magni iusto quibusdam, beatae culpa separator-img <br>
                quos quam deleniti officia aliquam quasi. Quis fuga est delectus.</p>
        <a href="./menu.php" class="btn">our services</a>
        </div> 
    </div>
     <div class="container">
        <div class="box-container">
            <div class="img-box">
                <img src="./image/about.png" alt="" srcset="">
            </div>
            <div class="box">
                <div class="heading">
                    <h1>Taking Ice cream To New heights</h1>
                    <img src="./image/separator-img.png" alt="" srcset="">
                </div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias sed asperiores <br> 
                nihil at. Nemo accusantium quae voluptate recusandae commodi ipsa optio eligendi <br>
                reprehenderit laudantium error magni iusto quibusdam, beatae culpa separator-img <br>
                quos quam deleniti officia aliquam quasi. Quis fuga est delectus.</p>
                <a href="" class="btn">learn more</a>
            </div>
        </div>
     </div>
    <!-- story section end here -->
    <div class="team">
        <div class="heading">
            <span>our team</span>
            <h1>Quality and passion with our servoices.</h1>
            <img src="./image/separator-img.png" alt="" srcset="">
        </div>
        <div class="box-container">
                <div class="box">
                    <img src="./image/team-1.jpg" alt="" srcset="">
                    <div class="content">
                        <img src="./image/shape-19.png" alt="shap" srcset="" class="shap">
                        <h2>Realf jhonson</h2>
                        <p>coffee chef</p>
                    </div>
                </div>
                <div class="box">
                    <img src="./image/team-2.jpg" alt="" srcset="">
                    <div class="content">
                        <img src="./image/shape-19.png" alt="shap" srcset="" class="shap">
                        <h2>mario jhonson</h2>
                        <p>pastry chef</p>
                    </div>
                </div>
                <div class="box">
                    <img src="./image/team-3.jpg" alt="" srcset="">
                    <div class="content">
                        <img src="./image/shape-19.png" alt="shap" srcset="" class="shap">
                        <h2>junathon jhonson</h2>
                        <p>other chef</p>
                    </div>
                </div>
        </div>
    </div>
    <!-- team section end here -->
    <div class="standers">
        <div class="detail">
            <div class="heading">
                <h1>our standers</h1>
                <img src="./image/separator-img.png" alt="" srcset="">
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae</p>
            <i class="bx bxs-heart"></i>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae</p>
            <i class="bx bxs-heart"></i>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae</p>
            <i class="bx bxs-heart"></i>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae</p>
            <i class="bx bxs-heart"></i>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae</p>
            <i class="bx bxs-heart"></i>
        </div>
    </div>
    <!-- standers section end here -->
    <div class="testimonial">
            <div class="heading">
                <h1>testimonial</h1>
                <img src="./image/separator-img.png" alt="" srcset="">
            </div>
            <div class="testimonial-container">
                <div class="slide-row" id="slide">
                    <div class="slide-col">
                        <div class="user-text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab odio quas <br>
                             maxime rerum iure adipisci est excepturi nihil ea officia.</p>
                             <h2>Zen</h2>
                             <p>Author</p>
                        </div>
                        <div class="user-img">
                            <img src="./image/testimonial (1).jpg" alt="" srcset="">
                        </div>
                    </div>
                    <div class="slide-col">
                        <div class="user-text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab odio quas <br>
                             maxime rerum iure adipisci est excepturi nihil ea officia.</p>
                             <h2>Zen</h2>
                             <p>Author</p>
                        </div>
                        <div class="user-img">
                            <img src="./image/testimonial (2).jpg" alt="" srcset="">
                        </div>
                    </div>
                    <div class="slide-col">
                        <div class="user-text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab odio quas <br>
                             maxime rerum iure adipisci est excepturi nihil ea officia.</p>
                             <h2>Zen</h2>
                             <p>Author</p>
                        </div>
                        <div class="user-img">
                            <img src="./image/testimonial (3).jpg" alt="" srcset="">
                        </div>
                    </div>
                    <div class="slide-col">
                        <div class="user-text">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab odio quas <br>
                             maxime rerum iure adipisci est excepturi nihil ea officia.</p>
                             <h2>Zen</h2>
                             <p>Author</p>
                        </div>
                        <div class="user-img">
                            <img src="./image/testimonial (4).jpg" alt="" srcset="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="indicator">
                <span class="btn1 active"></span>
                <span class="btn1"></span>
                <span class="btn1"></span>
                <span class="btn1"></span>
            </div>
    </div>       
    <!-- testimonial section end here -->
    <div class="mission">
        <div class="box-container">
            <div class="box">
                <div class="heading">
                    <h1>Our Mission</h1>
                    <img src="./image/separator-img.png" alt="" srcset="">
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="./image/mission.webp" alt="" srcset="">
                    </div>
                    <div>
                        <h2>mexicon chocalate</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, facilis <br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, facilis.</p>
                    </div>
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="./image/mission0.jpg" alt="" srcset="">
                    </div>
                    <div>
                        <h2>mexicon chocalate</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, facilis <br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, facilis.</p>
                    </div>
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="./image/mission1.webp" alt="" srcset="">
                    </div>
                    <div>
                        <h2>mexicon chocalate</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, facilis <br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, facilis.</p>
                    </div>
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="./image/mission2.webp" alt="" srcset="">
                    </div>
                    <div>
                        <h2>mexicon chocalate</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, facilis <br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, facilis.</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="./image/form.png" alt="" class="img">
            </div>     
        </div>
    </div>
    <!-- mission section end here -->

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