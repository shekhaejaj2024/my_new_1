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
    <title>Home Page</title>
    <link rel="stylesheet" href="./css/user_style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
    <!-- Font Awesomw link -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'components/user_header.php';?>
    <div class="slider-container">
        <div class="slider">
            <div class="sliderBox active">
                <div class="textBox">
                    <h1>We Pride Our Selfs On<br>Making This</h1>
                    <a href="./menu.php" class="btn">Shop Now</a>
                </div>
                <div class="imageBox">
                    <img src="./image/slider.jpg" alt="slider.." srcset="">
                </div>
            </div>
            <div class="sliderBox">
                <div class="textBox">
                    <h1>Cold Treats are my kind<br>of Comfort food</h1>
                    <a href="./menu.php" class="btn">Shop Now</a>
                </div>
                <div class="imageBox">
                    <img src="./image/slider0.jpg" alt="slider.." srcset="">
                </div>
            </div> 
        </div>
        <ul class="controls">
            <li onclick="nextSlide();" class="next"><i class="fa fa-arrow-right"></i></li>
            <li onclick="prevSlide();" class="prev"><i class="fa fa-arrow-left"></i></li>
        </ul>
    </div>
    <div class="service">
        <div class="box-container">
            <!-- start of service item box -->
                <div class="box">
                    <div class="icon">
                        <div class="icon-box">
                            <img src="./image/services.png" alt="img1">
                            <img src="./image/services (1).png" alt="img2">
                        </div>
                    </div>
                    <div class="detail">
                        <h4>delivery</h4>
                        <span>100% secure</span>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <div class="icon-box">
                            <img src="./image/services (5).png" alt="img1">
                            <img src="./image/services (6).png" alt="img2">
                        </div>
                    </div>
                    <div class="detail">
                        <h4>payment</h4>
                        <span>100% secure</span>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <div class="icon-box">
                            <img src="./image/services (2).png" alt="img1">
                            <img src="./image/services (3).png" alt="img2">
                        </div>
                    </div>
                    <div class="detail">
                        <h4>support</h4>
                        <span>24*7 hours</span>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <div class="icon-box">
                            <img src="./image/services (7).png" alt="img1">
                            <img src="./image/services (8).png" alt="img2">
                        </div>
                    </div>
                    <div class="detail">
                        <h4>Gift service</h4>
                        <span>support Gift service</span>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <div class="icon-box">
                            <img src="./image/service.png" alt="img1">
                            <img src="./image/service (1).png" alt="img2">
                        </div>
                    </div>
                    <div class="detail">
                        <h4>returns</h4>
                        <span>24*7 free return</span>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <div class="icon-box">
                            <img src="./image/services.png" alt="img1">
                            <img src="./image/services (1).png" alt="img2">
                        </div>
                    </div>
                    <div class="detail">
                        <h4>deliver</h4>
                        <span>100% secure</span>
                    </div>
                </div>
                <!-- end of service item box -->
            </div>
        </div>
        <!-- service section end here..... -->

        <!-- categories section start -->
        <div class="categories">
            <div class="heading">
                <h1>categories features</h1>
                <img src="./image/separator-img.png" alt="heading logo" srcset="">
            </div>
            <div class="box-container">
                <div class="box">
                    <img src="./image/categories.jpg" alt="categories" srcset="">
                    <a href="./menu.php" class="btn">coconuts</a>
                </div>
                <div class="box">
                    <img src="./image/categories0.jpg" alt="categories" srcset="">
                    <a href="./menu.php" class="btn">chocalates</a>
                </div>
                <div class="box">
                    <img src="./image/categories2.jpg" alt="categories" srcset="">
                    <a href="./menu.php" class="btn">strawberry</a>
                </div>
                <div class="box">
                    <img src="./image/categories1.jpg" alt="categories" srcset="">
                    <a href="./menu.php" class="btn">corn</a>
                </div>
            </div>
        </div>
    <!-- categories section end -->
    <img src="./image/menu-banner.jpg" alt="" class="menu-banner">
    <div class="taste">
        <div class="heading">
            <span>Taste</span>
            <h1>buy any ice cream @ get one free</h1>
            <img src="./image/separator-img.png" alt="">
        </div>
        <div class="box-container">
            <div class="box">
                <img src="./image/taste.webp" alt="" srcset="">
                <div class="detail">
                    <h2>natural sweets</h2>
                    <h1>vanila</h1>
                </div>
            </div>
            <div class="box">
                <img src="./image/taste0.webp" alt="" srcset="">
                <div class="detail">
                    <h2>natural sweets</h2>
                    <h1>matcha</h1>
                </div>
            </div>
            <div class="box">
                <img src="./image/taste1.webp" alt="" srcset="">
                <div class="detail">
                    <h2>natural sweets</h2>
                    <h1>blueberry</h1>
                </div>
            </div>
        </div> 
    </div>
    <!-- taste section end -->
    <div class="ice-container">
        <div class="overlay"></div>
        <div class="detail">
            <h1>Ice cream is cheaper than <br> therapy for stress</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. <br> 
            Facere sed id enim voluptatibus incidunt saepe minus mollitia,<br> 
            inventore, labore illum cupiditate. Nemo, accusamus?</p>
            <a href="./menu.php" class="btn">shop now</a>
        </div>
    </div>
    <!-- container section end -->
    <div class="taste2">
        <div class="t-banner">
            <div class="overlay"></div>
            <div class="detail">
                <h1>find your taste of dessert</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore, dicta.</p>
                <a href="./menu.php" class="btn">shop now</a>
            </div>
        </div>
        <div class="box-container">
            <div class="box">
                <div class="box-overlay"></div>
                <img src="./image/type4.jpg" alt="" srcset="">
                <div class="box-details fadeIn-bottom">
                    <h1>strawberry</h1>
                    <p>find taste of dessert</p>
                    <a href="./menu.php" class="btn">explore more</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="./image/type.avif" alt="" srcset="">
                <div class="box-details fadeIn-bottom">
                    <h1>strawberry</h1>
                    <p>find taste of dessert</p>
                    <a href="./menu.php" class="btn">explore more</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="./image/type1.png" alt="" srcset="">
                <div class="box-details fadeIn-bottom">
                    <h1>strawberry</h1>
                    <p>find taste of dessert</p>
                    <a href="./menu.php" class="btn">explore more</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="./image/type2.png" alt="" srcset="">
                <div class="box-details fadeIn-bottom">
                    <h1>strawberry</h1>
                    <p>find taste of dessert</p>
                    <a href="./menu.php" class="btn">explore more</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="./image/type0.avif" alt="" srcset="">
                <div class="box-details fadeIn-bottom">
                    <h1>strawberry</h1>
                    <p>find taste of dessert</p>
                    <a href="./menu.php" class="btn">explore more</a>
                </div>
            </div>
            <div class="box">
                <div class="box-overlay"></div>
                <img src="./image/type4.jpg" alt="" srcset="">
                <div class="box-details fadeIn-bottom">
                    <h1>strawberry</h1>
                    <p>find taste of dessert</p>
                    <a href="./menu.php" class="btn">explore more</a>
                </div>
            </div>
        </div>
    </div>
    <!-- taste2 section end -->
     <div class="flavor">
        <div class="box-container">
            <img src="./image/left-banner2.webp" alt="" srcset="">
            <div class="detail">
                <h1>Hot deail ! Sale Up To <span>20% off</span> </h1>
                <p>expired</p>
                <a href="./menu.php" class="btn">shop now</a>
            </div>
        </div>
    </div>
    <!-- flavour section end -->

    <div class="usage">
        <div class="heading">
            <h1>how it works</h1>
            <img src="./image/separator-img.png" alt="" srcset="">
        </div>
        <div class="row">
            <div class="box-container">
                <div class="box">
                    <img src="./image/icon.avif" alt="" srcset="">
                    <div class="detail">
                        <h3>scoop ice cream</h3>
                        <p>Lorem ipsum dolor sit <br> 
                            delectus quos labore assumenda illo esse.</p>
                    </div>
                </div>
                <div class="box">
                    <img src="./image/icon0.avif" alt="" srcset="">
                    <div class="detail">
                        <h3>scoop ice cream</h3>
                        <p>Lorem ipsum dolor sit <br> 
                        delectus quos labore assumenda illo esse.</p>
                    </div>
                </div>
                <div class="box">
                    <img src="./image/icon1.avif" alt="" srcset="">
                    <div class="detail">
                        <h3>scoop ice cream</h3>
                        <p>Lorem ipsum dolor sit <br> 
                        delectus quos labore assumenda illo esse.</p>
                    </div>
                </div>
            </div>
            
                <img src="./image/sub-banner.png" alt="" srcset="" class="divider">
            
            <div class="box-container">
                <div class="box">
                    <img src="./image/icon2.avif" alt="" srcset="">
                    <div class="detail">
                        <h3>scoop ice cream</h3>
                        <p>Lorem ipsum dolor sit <br> 
                        delectus quos labore assumenda illo esse.</p>
                    </div>
                </div>
                <div class="box">
                    <img src="./image/icon3.avif" alt="" srcset="">
                    <div class="detail">
                        <h3>scoop ice cream</h3>
                        <p>Lorem ipsum dolor sit <br> 
                        delectus quos labore assumenda illo esse.</p>
                    </div>
                </div>
                <div class="box">
                    <img src="./image/icon4.avif" alt="" srcset="">
                    <div class="detail">
                        <h3>scoop ice cream</h3>
                        <p>Lorem ipsum dolor sit <br> 
                        delectus quos labore assumenda illo esse.</p>
                    </div>
                </div>
            </div>
        </div>
     </div>

    <!-- usage section end -->
    <div class="pride">
        <div class="detail">
            <h1>We pride our self on<br> Exceptional Flavours.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae animi veritatis incidunt vitae neque. <br>
             Expedita provident optio labore.</p>
             <a href="./shop.php" class="btn">Shop now</a>
        </div>
    </div>
    <!-- pride section end -->
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