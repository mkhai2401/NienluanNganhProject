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

<h3 class="ps-5" style="font-family: 'Times New Roman', Times, serif; color: #114232;"><b>Cập nhật thông tin</b></h3><br>
<form method="POST" action="pagesKH/capnhatthongtin.php" enctype="multipart/form-data">

    <div>
        <i class="fa-solid fa-envelope" style="color:#114232 ;"></i>
        <input class="br" name="gmail" type="email" value="<?php echo $row_user['gmail']?>" required>
    </div>
      <input type="hidden" name="iduser" value="<?php echo $row_user['id_user']?>">
    <div>
      <i class="fa-solid fa-user" style="color: #114232;"></i>
        <input class="br" name="hoten" type="text" value="<?php echo $row_user['hotenkh']?>" required>
    </div>

    <div>
        <i class="fa-solid fa-phone" style="color: #114232;"></i> 
        <input class="br" name="sdt" type="text" value="<?php echo $row_user['username']?>" required>
        <br><em style="color: #789461;">*Lưu ý rằng: Số Điện Thoại cũng chính là tài khoản đăng nhập của bạn, <br>
            khi thay đổi SĐT thì trong lần đăng nhập sau <br>
            bạn phải đăng nhập bằng SĐT mới nhất mà bạn đã cập nhật</em>*
    </div>

    <div>
    <i class="fa-solid fa-location-dot" style="color: #114232;"></i> 
    <input class="br" type="text" name="diachi" value="<?php echo $row_user['diachi']?>" required>
    </div>
    
    <div><input type="submit" class="capnhat" name="capnhat" value="Cập nhật"></div>
    
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
