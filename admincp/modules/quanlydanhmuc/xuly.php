<?php
    include("../../config/config.php");

   

    if(isset($_POST['themdanhmuc'])){
        $tendanhmuc = $_POST['tendanhmuc'];
        //XỬ LÝ HÌNH ẢNH
        $hinhanhdm = $_FILES['hinhanhdm']['name'];
        $hinhanhdm_tmp = $_FILES['hinhanhdm']['tmp_name'];

        $sql_them = "INSERT INTO  danhmucsp(tendanhmuc,hinhanhdm) VALUE('".$tendanhmuc."','".$hinhanhdm."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanhdm_tmp, 'uploads/' . $hinhanhdm);
        header('Location:../../index.php?action=quanlydanhmuc&query=them');
    }
    
    //SỬA
    elseif(isset($_POST['suadanhmuc'])){
        $tendanhmuc = $_POST['tendanhmuc'];
        //XỬ LÝ HÌNH ẢNH
        $hinhanhdm = $_FILES['hinhanhdm']['name'];
        $hinhanhdm_tmp = $_FILES['hinhanhdm']['tmp_name'];
        
        if ($hinhanhdm != '') { 
            move_uploaded_file($hinhanhdm_tmp, 'uploads/' . $hinhanhdm);
            $sql_sua = "UPDATE  danhmucsp 
            SET tendanhmuc='".$tendanhmuc."', hinhanhdm='".$hinhanhdm."' 
            WHERE id_danhmuc = '$_GET[iddanhmuc]' ";
            
            $sql = "SELECT * FROM danhmucsp WHERE id_danhmuc = '$_GET[iddanhmuc]' LIMIT 1";
            $query = mysqli_query($mysqli, $sql);

            while ($row = mysqli_fetch_array($query)) {
                unlink('uploads/' . $row['hinhanhdm']);
            }
            mysqli_query($mysqli, $sql_sua);
        
        }else{
            $sql_sua = "UPDATE  danhmucsp SET tendanhmuc='".$tendanhmuc."' WHERE id_danhmuc = '$_GET[iddanhmuc]' ";
            mysqli_query($mysqli,$sql_sua);
        }
    header('Location:../../index.php?action=quanlydanhmuc&query=them');
}

    //XÓA
elseif(isset($_GET['iddanhmuc'])){
        $id = $_GET['iddanhmuc'];
        $sql_xoa = "DELETE FROM danhmucsp WHERE id_danhmuc='".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlydanhmuc&query=them');
    }
?>