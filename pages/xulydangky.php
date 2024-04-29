<?php 
    include('../admincp/config/config.php');
        session_start();
        ob_start();
        $gmail = $_POST['gmail'];
        $hoten = $_POST['hoten'];
        $taikhoan = $_POST['sdt'];
        $matkhau = md5($_POST['password']);
        $diachi = $_POST['diachi'];
        
    if(isset($_POST['dangky'])){
        
        $sqlkd= mysqli_query($mysqli, "INSERT INTO users(username, passwork, hotenkh, gmail, diachi) 
        VALUE('" . $taikhoan . "', '" . $matkhau . "', '" . $hoten . "', '" . $gmail . "', '" . $diachi . "') " );
        
        if($sqlkd){
        header('Location: dangky.php'); 
        $thongbao = "Đăng ký thành công!";
        }
             
     }
?>
    

    
