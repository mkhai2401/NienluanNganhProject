<?php
include '../admincp/config/config.php';

if (isset($_POST['capnhat'])) {
    $hoten = $_POST['hoten'];
    $gmail = $_POST['gmail'];
    $diachi = $_POST['diachi'];

  $sql_chapnhat = " UPDATE users SET hotenkh= '".$hoten."', gmail= '".$gmail."' 
    , diachi = '".$diachi. "' ";
    $query = mysqli_query($mysqli, $sql_capnhat);
    header('location: ../../index.php');
}
?>