<?php
    include("../../config/config.php");

    $tendanhmuc = $_POST['tendanhmuc'];
    //XỬ LÝ HÌNH ẢNH
    $hinhanhdm = $_FILES['hinhanhdm']['name'];
    $hinhanhdm_tmp = $_FILES['hinhanhdm']['tmp_name'];
    $thutu = $_POST['thutu'];

    if(isset($_POST['themdanhmuc'])){
        $sql_them = "INSERT INTO  danhmucsp(tendanhmuc,hinhanhdm,thutu) VALUE('".$tendanhmuc."','".$hinhanhdm."', '".$thutu."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanhdm_tmp, 'uploads/' . $hinhanhdm);
        header('Location:../../index.php?action=quanlydanhmuc&query=them');
    }
    
    //SỬA
    elseif(isset($_POST['suadanhmuc'])){
        if ($hinhanhdm != '') {
        move_uploaded_file($hinhanhdm_tmp, 'uploads/' . $hinhanhdm);
        $sql_sua = "UPDATE  danhmucsp 
        SET tendanhmuc='".$tendanhmuc."', hinhanhdm='".$hinhanhdm."' ,thutu='".$thutu."' 
        WHERE id_danhmuc = '$_GET[iddanhmuc]' ";
        

        $sql = "SELECT * FROM danhmucsp WHERE id_danhmuc = '$_GET[iddanhmuc]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);

        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['hinhanhdm']);
        }
        mysqli_query($mysqli, $sql_sua);
        
        
    }else{
        $sql_sua = "UPDATE  danhmucsp SET tendanhmuc='".$tendanhmuc."',thutu='".$thutu."' WHERE id_danhmuc = '$_GET[iddanhmuc]' ";
        mysqli_query($mysqli,$sql_sua);
    }
    header('Location:../../index.php?action=quanlydanhmuc&query=them');
}

    //XÓA
    else{
        $id = $_GET['iddanhmuc'];
        $sql_xoa = "DELETE FROM danhmucsp WHERE id_danhmuc='".$id."' ";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlydanhmuc&query=them');
    }
?>