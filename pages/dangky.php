
<?php 
    include('../admincp/config/config.php');
        session_start();
        ob_start();
    if(isset($_POST['dangky'])){
        $gmail = $_POST['gmail'];
        $hoten = $_POST['hoten'];
        $taikhoan = $_POST['sdt'];
        $matkhau = md5($_POST['password']);
        $rematkhau = md5($_POST['repassword']);
        $diachi = $_POST['diachi'];

        $sql_kt = "SELECT * FROM users WHERE username = '".$taikhoan."'";
        $row = mysqli_query($mysqli,$sql_kt); 
        $row_kt = mysqli_fetch_array($row);
        $count = mysqli_num_rows($row);

        if($matkhau != $rematkhau){
            $thongbao = "<font color='red'>Mật khẩu chưa <br> trùng khớp!</font>";

        }elseif ($count == 0) {
            
            $sqlkd= mysqli_query($mysqli, "INSERT INTO users(username, passwork, hotenkh, gmail, diachi) 
            VALUE('" . $taikhoan . "', '" . $matkhau . "', '" . $hoten . "', '" . $gmail . "', '" . $diachi . "') " );
        
                if($sqlkd){
            // header('Location: dangky.php'); 
                $thongbao = "<font color='green'>Đăng ký thành công!</font>";
                } 
        }
        else{
            $thongbao = "<font color='red'>SĐT không hợp lệ!</font>";
        
        }          
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo11.jpg" type="images/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Cây kiểng 5C</title>
</head>

<body>
    <div class="dangkyform">

        <img src="../images/dangky.jpeg" alt="">
        <h4 style="font-family: 'Times New Roman', Times, serif; color: #114232;" class="td">
        Hãy bắt đầu hành trình của bạn <br> với chúng tôi.</h3>

        <div class="dkform">

            <form method="POST" action="dangky.php" enctype="multipart/form-data">
                <h1 class="ps-5" style="font-family: 'Times New Roman', Times, serif; color: #114232;"><b>ĐĂNG KÝ</b></h1> 
        
                <div>
                    <i class="fa-solid fa-envelope" style="color:#114232 ;"></i>
                    <input class="br" name="gmail" type="email" placeholder="Gmail">
                </div>

                <div>
                <i class="fa-solid fa-user" style="color: #114232;"></i>
                    <input class="br" name="hoten" type="text" placeholder="Họ tên khách hàng" >
                </div>

                <div>
                    <i class="fa-solid fa-phone" style="color: #114232;"></i> 
                    <input class="br" name="sdt" type="text" placeholder="Số điện thoại" required>
                </div>

                <div>
                    <i class="fa-solid fa-lock" style="color: #114232;"></i> 
                    <input class="br" name="password" type="password" placeholder="Mật khẩu" required  >
                </div>

                <div>
                <i class="fa-solid fa-lock" style="color: #114232;"></i> 
                <input class="br" name="repassword" type="password" placeholder="Nhập lại mật khẩu" required  >
                </div>

                <div>
                <i class="fa-solid fa-location-dot" style="color: #114232;"></i> 
                <input class="br" type="text" name="diachi" placeholder="Địa chỉ">
                </div>

                <input type="submit" name="dangky" class="dangky" value="Đăng ký">
                <br>
                
    </form>
        </div>
        <div style="margin-left: 450px; margin-top:-60px"><?php if(isset($thongbao)&&($thongbao!='')){
                    echo " ".$thongbao." "; 
            }?></div>
        
</div>
<a class="gototop" href="../index.php"><i class="fa-solid fa-house" style="color:#0A5C36;"></i></a>
<a class="gotoDangNhap" href="dangnhap.php"><i class="fa-solid fa-right-to-bracket" style="color: #0A5C36;"></i></a>
</body>
</html>