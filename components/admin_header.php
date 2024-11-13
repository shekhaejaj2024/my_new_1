<header>
        <div class="logo">
            <img src="../image/logo-shop.png" alt="Ice-Cream Shop" width="80">
        </div>
        <div class="right">
            <div class="fa-solid fa-user" id="user-btn"></div>
            <div class="toggle-btn"><i class="fa-solid fa-bars"></i></div>
        </div>
        <div class="profile">
        <?php 
            $select_query = "SELECT * FROM `sellers` WHERE `id`= '$seller_id'";
            $select_profile = mysqli_query($con, $select_query);
        
            if (mysqli_num_rows($select_profile) > 0) {
                $fetch_profile=mysqli_fetch_assoc($select_profile);
            
        ?>     
        <div class="profile-detail">
            <img src="../uploaded_files/<?= $fetch_profile['image'];?>" alt="Not Uploaded" class="logo-img" width="100">
            <p>
                <?= $fetch_profile['name']; ?>
            </p>
            <div class="flex-btn">
                <a href="../adminpannel/profile.php" class="btn">Profile</a>
                <a href="../adminpannel/admin_logout.php" class="btn" onclick="return confirm('Are You Sure to logout from Website?');">logout</a>
            </div>
        </div>
        <?php } ?>
        </div>
</header>
<div class="sidebar-container">
        <div class="sidebar">
        <?php $select_query = "SELECT * FROM `sellers` WHERE `id`= '$seller_id'";
            $select_profile = mysqli_query($con, $select_query);
           
            if (mysqli_num_rows($select_profile) > 0) {
                $fetch_profile=mysqli_fetch_assoc($select_profile);
            
        ?>     
        <div class="profile">
            <img src="../uploaded_files/<?= $fetch_profile['image']?>" alt="Profile Image" class="logo-img" width="100">
            <p>
                <?= $fetch_profile['name']; ?>
            </p>
        </div>
        <?php } ?>
        <h5>Menu</h5>
        <div class="navbar">
            <ul>
                <li><a href="../adminpannel/dashboard.php"><i class="fa-solid fa-house-user"></i>dashboard</a></li>
                <li><a href="../adminpannel/add_product.php"><i class="fa-solid fa-boxes-packing"></i>Add product</a></li>
                <li><a href="../adminpannel/view_product.php"><i class="fa-solid fa-eye"></i>View product</a></li>
                <li><a href="../adminpannel/user_accounts.php"><i class="fa-solid fa-people-group"></i>Accounts</a></li>
                <li><a href="../adminpannel/admin_logout.php" onclick="return confirm('logout from this website?');"><i class="fa-solid fa-right-from-bracket"></i>logout</a></li>
                <li><a href="../adminpannel/delete_ac.php" onclick="return confirm('do you want delete this account from this website?');"><i class="fa-solid fa-trash-can"></i>delete A/C</a></li>
            </ul>
        </div>
        <h5>Find Us</h5>
        <div class="social-links">
            <i class="fa-brands fa-facebook fa-2x"></i>
            <i class="fa-brands fa-instagram"></i>
        </div>
        </div>
</div>