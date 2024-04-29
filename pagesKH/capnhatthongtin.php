<?php
include '../admincp/config/config.php';

//CẬP NHẬT THÔNG TIN KHÁCH HÀNG
if (isset($_POST['capnhat'])) {

  $hoten = $_POST['hoten'];
  $gmail = $_POST['gmail'];
  $diachi = $_POST['diachi'];
  $user = $_POST['sdt'];
  $iduser = $_POST['iduser'];

  $sql = "SELECT * FROM users WHERE id_user = '".$iduser."' LIMIT 1";
  $query_kt = mysqli_query($mysqli, $sql);

  while($row= mysqli_fetch_array($query_kt)) {
    
    $sql_capnhat = " UPDATE users SET hotenkh= '".$hoten."', gmail= '".$gmail."' 
    , username = '".$user."', diachi = '".$diachi. "' WHERE id_user = '".$row['id_user']."'";
    $query = mysqli_query($mysqli, $sql_capnhat);
    header('location: ../index.php?quanly=thongtin');
  }
  }

  //THAY ĐỔI MẬT KHẨU KHÁCH HÀNG
  if (isset($_POST['xacnhan']) && ($_POST['xacnhan']) ) {
    
    $iduser = $_POST['iduser'];
    $pass = md5($_POST['pass']);
    $passnew = md5($_POST['passnew']);
    
      if($pass == $passnew){
      $sql_capnhatpass = " UPDATE users SET passwork = '".$pass."' WHERE id_user = '".$iduser."' ";
      $query = mysqli_query($mysqli, $sql_capnhatpass);
      header('location: ../index.php?quanly=thongtin');
      }
      else{
        $_SESSION['thongbao'] = "Mật khẩu không trùng khớp!";
        header('location: ../index.php?thongtin=0&matkhau=1');
      }
    }
?>