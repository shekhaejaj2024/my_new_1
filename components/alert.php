<?php
if(isset($success_msg)){
    foreach ($success_msg as $success_message) {
        echo '<script>swal("'.$success_message.'","","success");</script>';
    }

}
if(isset($warning_msg)){
    foreach ($warning_msg as $warning_message) {
        echo '<script>swal("'.$warning_message.'","","warning");</script>';
    }

}
if(isset($info_msg)){
    foreach ($info_msg as $info_message) {
        echo '<script>swal("'.$info_message.'","","info");</script>';
    }
}
if(isset($error_msg)){
    foreach ($error_msg as $error_message) {
        echo '<script>swal("'.$error_message.'","","error");</script>';
    }

}
?>