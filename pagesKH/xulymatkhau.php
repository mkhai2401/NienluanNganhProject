<?php 
// session_start();
include 'admincp/config/config.php'; 
if(isset($_SESSION['user']) ){
  $sql = "SELECT * FROM users WHERE id_user = '".$_SESSION['user']."' ";
  $row = mysqli_query($mysqli,$sql);      
  // $count = mysqli_num_rows($row);
  $row_user = mysqli_fetch_array($row);
?>
  
<div class="xulytt">

  <h3 class="ps-5" style="font-family: 'Times New Roman', Times, serif; color: #114232;"><b>Thay đổi mật khẩu</b></h3><br> 
<form  method="POST" action="pagesKH/capnhatthongtin.php" enctype="multipart/form-data">
<form  method="POST" action="xulymatkhau.php" enctype="multipart/form-data">
    <div>
        <i class="fa-solid fa-envelope" style="color:#114232 ;"></i>
        <input class="br" name="pass" type="password" placeholder="Nhập mật khấu mới" required>
    </div>
      <input type="hidden" name="iduser" value="<?php echo $row_user['id_user']?>">
    <div>
      <i class="fa-solid fa-user" style="color: #114232;"></i>
        <input class="br" name="passnew" type="password" placeholder="Nhập lại mật khẩu mới" required>
    </div>

    <input type="submit" name="xacnhan" class="capnhat" value="Xác nhận">
    <!-- class="dangky" -->
    <br>
    <?php if(isset($thongbao) && $thongbao != ''){
        echo $thongbao ;
      }
        ?>
</form>
</div>

<?php
}

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
      $thongbao = "Mật khẩu không trùng khớp!";
      header('location: ../index.php?thongtin=0&matkhau=1');
    }
  }
?>