<?php
    include("../../config/config.php");

    $tendanhmuc = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];

    if(isset($_POST['themdanhmuc'])){
        $sql_them = "INSERT INTO  danhmucsp(tendanhmuc,thutu) VALUE('".$tendanhmuc."', '".$thutu."')";
        mysqli_query($mysqli,$sql_them);
        header('Location:../../index.php?action=quanlydanhmuc&query=them');
    }
    
    elseif(isset($_POST['suadanhmuc'])){
        $sql_sua = "UPDATE  danhmucsp SET tendanhmuc='".$tendanhmuc."',thutu='".$thutu."' WHERE id_danhmuc = '$_GET[iddanhmuc]' ";
        mysqli_query($mysqli,$sql_sua);
        header('Location:../../index.php?action=quanlydanhmuc&query=them');
    }

    else{
        $id = $_GET['iddanhmuc'];
        $sql_xoa = "DELETE FROM danhmucsp WHERE id_danhmuc='".$id."' ";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlydanhmuc&query=them');
    }
?>