<?php 
// session_start();
include 'admincp/config/config.php'; 
if(isset($_SESSION['user']) ){
  $sql = "SELECT * FROM users WHERE username = '".$_SESSION['user']."' ";
  $row = mysqli_query($mysqli,$sql);      
  // $count = mysqli_num_rows($row);
  $row_user = mysqli_fetch_array($row);
?>
  
<div class="xulytt">

  <h3 class="ps-5" style="font-family: 'Times New Roman', Times, serif; color: #114232;"><b>Thay đổi mật khẩu</b></h3><br> 
<form  method="POST" action="pagesKH/capnhatthongtin.php" enctype="multipart/form-data">

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
    <!-- <?php if(isset($_POST['dangky'])){
        echo "<font color='green'><p>Đăng ký thành công!<?p></font>" ;}
        ?> -->
</form>
</div>

<?php
}

?>