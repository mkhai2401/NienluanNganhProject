<?php 
    include('../admincp/config/config.php');

    if (isset($_POST['gui']) && $_POST['gui']) {
        $tenlh = $_POST['name'];
        $gmail = $_POST['gmail'];
        $loinhan = $_POST['mess'];

        $sql = "INSERT INTO tbl_lienhe(tenlh,gmail,noidunglienhe) 
        VALUE('".$tenlh."','".$gmail."','".$loinhan."')";
        $a = mysqli_query($mysqli,$sql);
       
       
            $_SESSION['thongbaolh'] = "Gửi thông tin thành công!
            <br>Chúng tôi sẽ phản hồi cho bạn trong thời gian sớm nhất!";
            header('location: ../index.php?quanly=lienhe');
        
    }

    //     session_start();
    //     ob_start();
    //     $gmail = $_POST['gmail'];
    //     $hoten = $_POST['hoten'];
    //     $taikhoan = $_POST['sdt'];
    //     $matkhau = md5($_POST['password']);
    //     $diachi = $_POST['diachi'];
        
    // if(isset($_POST['dangky'])){
        
    //     $sqlkd= mysqli_query($mysqli, "INSERT INTO users(username, passwork, hotenkh, gmail, diachi) 
    //     VALUE('" . $taikhoan . "', '" . $matkhau . "', '" . $hoten . "', '" . $gmail . "', '" . $diachi . "') " );
        
    //     if($sqlkd){
    //     header('Location: dangky.php'); 
    //     $thongbao = "Đăng ký thành công!";
    //     }
             
    //  }
?>
    

    
