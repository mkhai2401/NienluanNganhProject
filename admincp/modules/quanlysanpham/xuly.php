<?php
include("../../config/config.php");

$tensanpham = $_POST['tensp'];
$masp = $_POST['masp'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluongsp'];
//XỬ LÝ HÌNH ẢNH
$hinhanh = $_FILES['hinhanhsp']['name'];
$hinhanh_tmp = $_FILES['hinhanhsp']['tmp_name'];
// $hinhanh = time() . '_' . $hinhanh;

$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$trangthai = $_POST['trangthai'];
$danhmuc = $_POST['danhmuc'];

//THEM
if (isset($_POST['themsp'])) {
    $sql_them = "INSERT INTO  sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,trangthai) 
        VALUE('" . $tensanpham . "', '" . $masp . "', '" . $giasp . "', '" . $soluong . "', '" . $hinhanh . "', 
        '" . $tomtat . "', '" . $noidung . "', '" . $trangthai . "')";
    
        $sql_sp = "SELECT * FROM sanpham,danhmucsp WHERE sanpham.id_sp=danhmucsp.id_danhmuc ORDER BY id_sp DESC";
        $query_sp = mysqli_query($mysqli,$sql_sp);
        while($row_sp = mysqli_fetch_array($query_sp)){ 
        $sql_themspdm ="INSERT INTO sp_dm(id_danhmuc, id_sp) VALUE('".$danhmuc."','".$idsanpham."')" ;
        mysqli_query($mysqli,$sql_themspdm);
        }
     
    mysqli_query($mysqli, $sql_them);

    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);



    // $sql_danhmuc = "SELECT id_danhmuc FROM danhmucsp ";
    // $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
    // while($a_danhmuc = mysqli_fetch_array($query_danhmuc)){
//    $sql_themdm = "INSERT INTO sanpham() VALUE ()";
    // }
    

    header('Location:../../index.php?action=quanlysanpham&query=them');
}
//SUA

elseif (isset($_POST['suasp'])) {

    if ($hinhanh != '') {
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
            
        // move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        $sql_sua = " UPDATE sanpham SET tensanpham='" . $tensanpham . "',masp='" . $masp . "' 
            ,giasp = '" . $giasp . "',soluong = '" . $soluong . "',hinhanh = '" . $hinhanh . "',
            tomtat = '" . $tomtat . "',noidung = '" . $noidung . "',trangthai = '" . $trangthai . "',id_danhmuc = '" . $danhmuc . "'
            WHERE id_sp = '$_GET[idsanpham]' ";

        $sql = "SELECT * FROM sanpham WHERE id_sp = '$_GET[idsanpham]' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);

        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['hinhanh']);
        }
        mysqli_query($mysqli, $sql_sua);

    } else {
        // move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        $sql_sua = "UPDATE sanpham SET tensanpham='" . $tensanpham . "',masp='" . $masp . "' 
            ,giasp = '" . $giasp . "',soluong = '" . $soluong . "', tomtat = '" . $tomtat . "',
            noidung = '" . $noidung . "',trangthai =  '" . $trangthai . "', id_danhmuc = '" . $danhmuc . "'
            WHERE id_sp = '$_GET[idsanpham]' ";
        mysqli_query($mysqli, $sql_sua);
    }

    header('Location:../../index.php?action=quanlysanpham&query=them');
} //XOA
else {
    $id = $_GET['idsanpham'];
    $sql = " SELECT * FROM sanpham WHERE id_sp= '$id' LIMIT 1 ";
    $query = mysqli_query($mysqli, $sql);

    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM sanpham WHERE id_sp='" . $id . "' ";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlysanpham&query=them');
}
