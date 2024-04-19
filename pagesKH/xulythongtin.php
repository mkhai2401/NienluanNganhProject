<?php 
// session_start();
include 'admincp/config/config.php'; 
if(isset($_SESSION['user']) ){
  $sql = "SELECT * FROM users WHERE username = '".$_SESSION['user']."' ";
  $row = mysqli_query($mysqli,$sql);      
  // $count = mysqli_num_rows($row);
  $row_user = mysqli_fetch_array($row);
?>
  
<div class="">

<form method="POST" action="capnhatthontin.php" enctype="multipart/form-data">
    <h1 class="ps-5" style="font-family: 'Times New Roman', Times, serif; color: #114232;"><b>Cập nhật thông tin cá nhân</b></h1> 

    <div>
        <i class="fa-solid fa-envelope" style="color:#114232 ;"></i>
        <input class="br" name="gmail" type="email" value="<?php echo $row_user['gmail']?>" required>
    </div>

    <div>
      <i class="fa-solid fa-user" style="color: #114232;"></i>
        <input class="br" name="hoten" type="text" value="<?php echo $row_user['hotenkh']?>" required>
    </div>

    <div>
        <i class="fa-solid fa-phone" style="color: #114232;"></i> 
        <input class="br" name="sdt" type="text" value="<?php echo $row_user['username']?>" required>
    </div>

    <div>
    <i class="fa-solid fa-location-dot" style="color: #114232;"></i> 
    <input class="br" type="text" name="diachi" value="<?php echo $row_user['diachi']?>" required>
    </div>

    <input type="submit" name="capnhat"  value="Cập nhật">
    <!-- class="dangky" -->
    <br>
    <?php if(isset($_POST['dangky'])){
        echo "<font color='green'><p>Đăng ký thành công!<?p></font>" ;}
        ?>
</form>
</div>

<?php
}

?>
