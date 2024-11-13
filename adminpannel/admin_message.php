<?php
include '../components/connect.php';


    if (isset($_COOKIE['seller_id'])) {
       $seller_id=$_COOKIE['seller_id'];
    } 
    else {
        $seller_id="";
        header('location:login.php');//location:loging.php
    }
    // delete messge from database 
    if(isset($_POST['delete_msg'])){
        $delete_id=$_POST['delete_id'];
        $delete_id=filter_var($delete_id,FILTER_SANITIZE_STRING);
        
        $verify_delete= "SELECT * FROM `message` WHERE `id`='$delete_id'";
        $verify_delete=mysqli_query($con, $verify_delete); 
        
        if(mysqli_num_rows($verify_delete)>0){

            $delete_msg="DELETE FROM `message` WHERE `id`='$delete_id'";
            $delete_msg=mysqli_query($con,$delete_msg);
            $success_msg[]='message deleted successfully';

        }
        else{
            $warning_msg[]='message already deleted';
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
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="message-container">
            <div class="heading">
                <h1>unreaded message</h1>
                <img src="../image/separator-img.png" alt="" >
            </div>
            <div class="box-container">
                <?php
                 $select_message="SELECT * FROM `message`";
                 $select_message=mysqli_query($con, $select_message);  
                 if(mysqli_num_rows($select_message)>0){
                    while($fetch_message = mysqli_fetch_assoc($select_message)){
                 
                ?>
                 <div class="box">
                    <h3 class="name"><?=$fetch_message['name'];?></h3>
                    <h4><?=$fetch_message['subject'];?></h4>
                    <p><?=$fetch_message['message'];?></p>
                    <form action="" method="post">
                        <input type="hidden" name="delete_id" value="<?=$fetch_message['id'];?>">
                        <input type="submit" style="font-size: 1.2rem;" name="delete_msg" value="delete message" class="btn" onclick="return confirm('delete this message');">
                    </form>
                 </div>
                <?php
                 }
                }else{
                    echo '
                        <div class="empty">
                            <p>no unread message yet! </p>
                        </div>
                    ';
                }
                ?>     
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