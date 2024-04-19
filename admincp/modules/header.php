<?php 
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1) {
        unset($_SESSION['position']);
        header('Location: ../pages/dangnhap.php');
    }
?>
<p><a href="index.php?dangxuat=1">Đăng xuất </a></p>