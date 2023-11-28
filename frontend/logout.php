<?php 
    // echo "Đăng xuất thành công";
    session_start();
    session_destroy();


    header("Location: ../index.php");
?>

