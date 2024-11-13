<header class="header">
    <section class="flex">
        <a href="../home.php" class="logo" style="width:15rem;"><img src="../image/logo-shop.png" alt="icon" class="logo-img" style="width:100%;"></a>
        <nav class="navbar">
            <a href="../home.php">home</a>
            <a href="../about-us.php">about us</a>
            <a href="../menu.php">shop</a>
            <a href="../order.php">order</a>
            <a href="../contact.php">contact us</a>
        </nav>
        <form action="search_product.php" method="post" class="search-form">
            <input type="text" name="search_product" placeholder="search product..." id="#searchbar" required maxlength="100">
            <button type="submit" class="fa fa-search" id="search_product_btn"></button>
        </form>
        <div class="icons">
            <div class="fa fa-list" id="menu-btn"></div>
            <div class="fa fa-search" id="search-btn"></div>
            <?php
                $count_wishlist_item="SELECT * FROM `wishlist` WHERE `user_id`='$user_id'";
                $count_wishlist_item=mysqli_query($con, $count_wishlist_item);
                $total_wishlist_item=mysqli_num_rows($count_wishlist_item);

            ?>
            <a href="wishlist.php"><i class="fa fa-heart"></i><sup><?=$total_wishlist_item;?></sup></a>
            <?php
                $count_cart_item="SELECT * FROM `cart` WHERE `user_id`='$user_id'";
                $count_cart_item=mysqli_query($con, $count_cart_item);
                $total_cart_item=mysqli_num_rows($count_cart_item);

            ?>
            <a href="cart.php"><i class="fa fa-shopping-cart"></i><sup><?=$total_cart_item;?></sup></a>
            <div class="fa fa-user" id="user-btn"></div>
        </div>
        <div class="profile-detail">
            <?php
                $select_profile="SELECT * FROM `users` WHERE `id`='$user_id'";
                $select_profile=mysqli_query($con,$select_profile);
                
                if(mysqli_num_rows($select_profile)>0){
                 $fetch_profile=mysqli_fetch_assoc($select_profile);

                
            ?>
            <img src="../uploaded_files/<?=$fetch_profile['image'];?>" alt="fetched image">
            <h3 style="margin-bottom: 1.6rem; font-size:3rem;"><?=$fetch_profile['name'];?></h3>
            <div class="flex-btn">
                <a href="profile.php" class="btn">view profile</a>
                <a href="../components/user_logout.php" onclick="return confirm('logout from this website?');" class="btn">logout</a>
            </div>
            <?php }
            else{?>
                
            <h3 style="margin-bottom: 1.6rem; font-size: 3rem;">please login or register</h3>
            <div class="flex-btn">
                <a href="login.php" class="btn">login</a>
                <a href="register.php" class="btn">register</a>
            </div>
        <?php }?>
        </div>
    </section>
</header>