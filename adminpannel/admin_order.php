<?php
include '../components/connect.php';


    if (isset($_COOKIE['seller_id'])) {
       $seller_id=$_COOKIE['seller_id'];
    } 
    else {
        $seller_id="";
        header('location:login.php');//location:loging.php
    }
    
        if(isset($_POST['update_order'])){
                $order_id=$_POST['order_id'];
                $order_id=filter_var($order_id,FILTER_SANITIZE_STRING);
                
                $update_payment=$_POST['update_payment'];
                $update_payment=filter_var($update_payment,FILTER_SANITIZE_STRING);

                $update_pay="UPDATE `orders` SET `payment_status`='$update_payment' WHERE `id`='$order_id' ";
                $update_pay=mysqli_query($con,$update_pay);
                $success_msg[]='odrder payment status updated';
    }

    // delete order 
    if(isset($_POST['delete_order'])){
        $delete_id=$_POST['order_id'];
        $delete_id=filter_var($delete_id,FILTER_SANITIZE_STRING);
    
        $verify_delete="SELECT * FROM `orders` WHERE `id`='$delete_id'";
        $verify_delete=mysqli_query($con, $verify_delete); 
    
        if(mysqli_num_rows($verify_delete)>0){
                $delete_order="DELETE FROM `orders` WHERE `id`='$delete_id'";
                $delete_order=mysqli_query($con,$delete_order);
            $success_msg[]='order deleted';

        }
        else{
                $warning_msg[]='order already deleted';
            }
    }
//delete all orders
if(isset($_POST['delete_all_orders'])){
    $select_orders="SELECT * FROM `orders` WHERE `seller_id`='$seller_id'";
    $select_orders=mysqli_query( $con,$select_orders);
    if(mysqli_num_rows($select_orders)>0){

        $delete_allorders="DELETE FROM `orders` WHERE `seller_id`='$seller_id'";
        $delete_allorders=mysqli_query( $con, $delete_allorders);
        $success_msg[]='all This sellers orders deleted';
    }
    else{
        $warning_msg[]='orders already deleted';
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
        <section class="order-container">
            <div class="heading">
                <h1>total order placed</h1>
                <img src="../image/separator-img.png" alt="" >
            </div>
            <div class="box-container">
                <?php
                 $select_order="SELECT * FROM `orders` WHERE `seller_id`='$seller_id'";
                 $select_order=mysqli_query($con, $select_order);  
                 if(mysqli_num_rows($select_order)>0){
                    while($fetch_order = mysqli_fetch_assoc($select_order)){
                 
                ?>
                 <div class="box">
                    <div class="status" style="color: <?php if($fetch_order['status']=='in progress') {
                        echo "limegreen";           
                    }else{echo "red";} ?>"><?=$fetch_order['status'];?>
                    </div>
                    <div class="details">
                        <p>user id: <span><?=$fetch_order['user_id'];?></span></p>
                        <p>placed on: <span><?=$fetch_order['date'];?></span></p>
                        <p>user number: <span><?=$fetch_order['number'];?></span></p>
                        <p>user email: <span><?=$fetch_order['email'];?></span></p>
                        <p>total price: <span><?=$fetch_order['price'];?></span></p>
                        <p>payment method: <span><?=$fetch_order['method'];?></span></p>
                        <p>user address: <span><?=$fetch_order['address'];?></span></p>
                        <p>user name: <span><?=$fetch_order['name'];?></span></p>
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?=$fetch_order['id'];?>">
                        <select name="update_payment" class="box" style="width: 90%;">
                            <option disabled selected><?=$fetch_order['payment_status'];?></option>
                            <option value="pending">pending</option>
                            <option value="order delevered">order delevered</option>
                        </select>
                        <div class="flex-btn">
                            <input type="submit" name="update_order" value="update order" class="btn">
                            <input type="submit" name="delete_order" value="deleteorder" class="btn" onclick="return confirm('delete this order!');">
                        </div>
                    </form>
                </div>
                <?php
                 }
                }
                
                else{
                    echo '
                    <div class="empty">
                    <p>no order placed yet! </p>
                    </div>
                    ';
                }
                ?>     
            </div>
            <form action="" method="post">
            <div class="flex-btn">
                    <input type="submit" name="delete_all_orders" value="delete all orders" class="btn" onclick="return confirm('delete this order!');">
                </div>
            </form>
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