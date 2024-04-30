<?php
    include "../../config/config.php";
    if(isset($_GET['id'])){
     $id = $_GET['id'];
     $sql = "UPDATE tbl_lienhe SET trangthai=1 WHERE id = '".$id."'";
     $query = mysqli_query($mysqli,$sql);
     header('location: ../../index.php?action=chamsockhachhang&query=them');
    }
    
    if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $sql = "DELETE FROM tbl_lienhe WHERE id='".$id."'";
        $query = mysqli_query($mysqli,$sql);
        header('location: ../../index.php?action=chamsockhachhang&query=them');
       }
?>