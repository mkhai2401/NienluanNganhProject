<?php 
    session_start();
    ob_start();
    include('../admincp/config/config.php');
    // ob_start();
    // include('xulydangky.php');
    // if((isset($_POST['dangnhap']))&&($_POST['dangnhap'])){
    //     $user = $_POST['user'];
    //     $pass = $_POST['pass'];
    //     $role = checkuser($user, $pass);
    //     $_SESSION['role']=$role;
    //     if($role == 1) header('location: ../modules/index.php');
    //     else header('location: dangnhap.php');
    // }
    if(isset($_POST['dangnhap']) ){
       
        $taikhoan = $_POST['user'];
        $matkhau = md5($_POST['pass']);

        $sql = "SELECT * FROM users WHERE username = '".$taikhoan."' AND passwork='".$matkhau."'";
        $row = mysqli_query($mysqli,$sql); 
        $count = mysqli_num_rows($row);
        $row_user = mysqli_fetch_array($row);

        // if( $row_user['username'] == $taikhoan && $row_user['passwork'] != $matkhau){
        //     $baoloi = "<p>Mật khẩu không đúng!</p>";
        // }
        // elseif($row_user['username'] != $taikhoan){
        //     $baoloi = "<p>Tài khoản không tồn tại!</p>";

        //  }else{ 
        //     $sqlkt = "SELECT * FROM users WHERE username = '".$taikhoan."' AND passwork='".$matkhau."'";
        //     $rowkt = mysqli_query($mysqli,$sqlkt);
        //     $count = mysqli_num_rows($rowkt);

            if($count==0){
                $baoloi = "<p>Tài khoản hoặc Mật khẩu không đúng!</p>"; 
            }
            //Thực hiện đăng nhập
            else{
                $_SESSION['position'] = $row_user['position'];

                if($_SESSION['position'] == 3){
                    $iduser = $row_user['id_user'];
                $_SESSION['user']= $iduser; 
                header("Location: ../index.php");   
                }elseif($_SESSION['position'] == 1){
                    
                    header('Location: ../admincp/index.php');
                               
            }
    }
        
    //     if($count>0 ){
    //         if($row_user['position']==1){
    //             $_SESSION['dangnhap'] = $taikhoan;
    //             header("Location: ../admincp/index.php");
    //         }elseif($row_user['position']==3){
    //             $_SESSION['dangnhap'] = $taikhoan;
    //             header("Location: ../indexkh.php");
    //         }
    // }else{
    //     $baoloi = "Tài khoản không tồn tại!";
    // }
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
    <div class="dangnhapform">

        <img src="../images/dangnhap1.jpeg" alt="">

        <h4 style="font-family: 'Times New Roman', Times, serif; color: #114232;" class="td">
        WELCOM TO 5C GARDEN</h4>
          
        <div class="dkform">

            <h1 style="font-family: 'Times New Roman', Times, serif; color: #114232;"><b>ĐĂNG NHẬP</b></h1>  

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off" method="POST">

                <div>
                <i class="fa-solid fa-user" style="color: #114232;"></i> <input name="user" class="br" type="text" placeholder="Số điện thoại" required>
                </div>

                <div>
                <i class="fa-solid fa-lock" style="color: #114232;"></i> <input name="pass" class="br" type="password" placeholder="Mật khẩu" required  >
                </div>

                <button type="submit" name="dangnhap" class="tbn">Đăng nhập</button><br>
                <div><?php if(isset($baoloi)&&($baoloi!='')){
                    echo "<font color='red'> ".$baoloi." </font>"; 
                }?></div>
               
            </form>         
        </div>      
    </div>
    <a class="gototop" href="../index.php"><i class="fa-solid fa-house" style="color:#0A5C36;"></i></a>
    <a class="gotoDangNhap" href="dangky.php"><i class="fa-solid fa-user-plus" style="color: #0A5C36;"></i></a>
</body>
</html>