
<?php 
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1) {
        unset($_SESSION['position']);
        header('Location: ..\pages\dangnhap.php');
    }
?>
<a href="index.php?dangxuat=1"  class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
    <i class="fas fa-power-off me-2"></i> Logout </a>