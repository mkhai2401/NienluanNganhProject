<?php 
    include("../../config/config.php");

    //Lấy dữ liệu GIỚI THIỆU && THÊM BÀI GIỚI THIỆU
    if(isset($_POST['thembaigioithieu'])){
        $tieudegt = $_POST['tieudegioithieu'];
        $noidunggt = $_POST['noidunggt'];
        //XỬ LÝ HÌNH ẢNH
        $hinhanhgt = $_FILES['hinhanhgt']['name'];
        $hinhanhgt_tmp = $_FILES['hinhanhgt']['tmp_name'];
        $sql_them = "INSERT INTO  tbl_baiviet(tieudegioithieu,baigioithieu,img_gioithieu,phanloai) 
        VALUE('".$tieudegt."','".$noidunggt."','".$hinhanhgt."','.1.')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanhgt_tmp, 'uploads/' . $hinhanhgt);
        header('Location:../../index.php?action=quanlybaiviet&query=them');
    }

    //Lấy dữ liệu TIN TỨC && THÊM TIN TỨC
    if(isset($_POST['themtin'])){
        $tieudetin = $_POST['tieudetin'];
        $noidungtin = $_POST['noidungtin'];
        //XỬ LÝ HÌNH ẢNH
        $hinhanhtin = $_FILES['hinhanhtin']['name'];
        $hinhanhtin_tmp = $_FILES['hinhanhtin']['tmp_name'];

        $sql_them = "INSERT INTO  tbl_baiviet(tieudetintuc,tintuc,img_tintuc,phanloai) 
        VALUE('".$tieudetin."','".$noidungtin."','".$hinhanhtin."','.0.')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanhtin_tmp, 'uploads/' . $hinhanhtin);
        header('Location:../../index.php?action=quanlybaiviet&query=them');
    }

    
    //SỬA BÀI GIỚI THIỆU
    elseif(isset($_POST['suabaigt'])){
        $tieudegt = $_POST['tieudegioithieu'];
        $noidunggt = $_POST['noidunggt'];
        //XỬ LÝ HÌNH ẢNH
        $hinhanhgt = $_FILES['hinhanhgt']['name'];
        $hinhanhgt_tmp = $_FILES['hinhanhgt']['tmp_name'];

        if ($hinhanhgt != '') {
            move_uploaded_file($hinhanhgt_tmp, 'uploads/' . $hinhanhgt);
            $sql_sua = "UPDATE  tbl_baiviet 
            SET tieudegioithieu='".$tieudegt."', baigioithieu='".$noidunggt."',  img_gioithieu='".$hinhanhgt."' 
            WHERE id = '$_GET[idbaiviet]' ";
            
            $sql = "SELECT * FROM tbl_baiviet WHERE id = '$_GET[idbaiviet]' LIMIT 1";
            $query = mysqli_query($mysqli, $sql);

            while ($row = mysqli_fetch_array($query)) {
                unlink('uploads/' . $row['img_gioithieu']);
            }
            mysqli_query($mysqli, $sql_sua);
            
        
        }else{
            $sql_sua = "UPDATE  tbl_baiviet 
            SET tieudegioithieu='".$tieudegt."', baigioithieu='".$noidunggt."'WHERE id = '$_GET[idbaiviet]' ";
            mysqli_query($mysqli,$sql_sua);
        }
    header('Location:../../index.php?action=quanlybaiviet&query=them');
}

    //SỬA TIN TỨC
    elseif(isset($_POST['suatin'])){
        $tieudetin = $_POST['tieudetin'];
        $noidungtin = $_POST['noidungtin'];
        //XỬ LÝ HÌNH ẢNH
        $hinhanhtin = $_FILES['hinhanhtin']['name'];
        $hinhanhtin_tmp = $_FILES['hinhanhtin']['tmp_name'];

        if ($hinhanhtin != '') {
            move_uploaded_file($hinhanhtin_tmp, 'uploads/' . $hinhanhtin);
            $sql_sua = "UPDATE  tbl_baiviet 
            SET tieudetintuc='".$tieudetin."', tintuc='".$noidungtin."',  img_tintuc='".$hinhanhtin."' 
            WHERE id = '$_GET[idbaiviet]' ";
            
            $sql = "SELECT * FROM tbl_baiviet WHERE id = '$_GET[idbaiviet]' LIMIT 1";
            $query = mysqli_query($mysqli, $sql);

            while ($row = mysqli_fetch_array($query)) {
                unlink('uploads/' . $row['img_tintuc']);
            }
            mysqli_query($mysqli, $sql_sua);
            
        
        }else{
            $sql_sua = "UPDATE  tbl_baiviet 
            SET tieudetintuc='".$tieudetin."', tintuc='".$noidungtin."'WHERE id = '$_GET[idbaiviet]' ";
            mysqli_query($mysqli,$sql_sua);
        }
    header('Location:../../index.php?action=quanlybaiviet&query=them');
} 

    //XÓA
    else{
        $id = $_GET['idbaiviet'];
        $sql_xoa = "DELETE FROM tbl_baiviet WHERE id='".$id."' ";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlybaiviet&query=them');
    }

?>