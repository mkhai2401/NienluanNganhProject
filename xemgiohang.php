<?php 
session_start();
include 'admincp/config/config.php';
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo11.jpg" type="images/x-icon">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cây kiểng 5C</title>
  </head>

<?php 
  include 'admincp/config/config.php'; 

  if(isset($_SESSION['position']) && ($_SESSION['position']==3)){
    include("pagesKH/headerkh.php");
    include("pagesKH/menukh.php");

  }elseif(!isset($_SESSION['position'])){
    unset($_SESSION['position']);
    include("header.php");
    include('menu.php');
}

if (isset($_SESSION['giohang'])) {
  // echo var_dump($_SESSION['giohang']);   
?>
  
 <br><h2 style="font-family: 'Times New Roman', Times, serif; color:#0A5C36 ;"><b>GIỎ HÀNG</b></h2>
  <br><br><table  class="tablecard" border="1" >
  <tr>    
    <th>STT</th>
    <th width="50px", height="50px">Hình ảnh</th>
    <th>Tên sản phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    <th>Xóa</th> 
  </tr>
  
  <?php
    $i = 0;
    $tong = 0;
    foreach ($_SESSION['giohang'] as $sp) {
      $t = $sp[3] * $sp[4];
      $tong += $t;
      ?>
      <tr>
      <td><?php echo $i + 1 ?></td>
      <td width="50px", height="50px"><img width="100px" src="<?php echo $sp[1] ?>"> </td>
      <td><?php echo $sp[2] ?></td>
      <td><?php echo number_format($sp[3],0,',','.'). ' VNĐ'?></td> 
      <td width="90px"><a href="xulygiohang.php?cong=<?php echo $sp[0]?>"><i class="fa-solid fa-plus fa-xs" style="color: #50623A;"></i></a>
            <?php echo $sp[4] ?>
          <a href="xulygiohang.php?tru=<?php echo $sp[0]?>"><i class="fa-solid fa-minus fa-xs" style="color: #50623A;"></i></a></td>
      <td><?php echo number_format($t,0,',','.'). ' VNĐ' ?> </td>
      <td><a href="xoagiohang.php?id=<?php echo $i?>"><i class="fa-solid fa-trash" style="color: #50623A;"></i></a></td>
      </tr>

      <?php
      $i++;
    }
    // 
    ?>
    <tr>
      <td colspan="3" style="font-family: 'Times New Roman', Times, serif; font-size: 25px; color:#294B29"><b>Tổng:</b></td>
      <td colspan="2"></td>
      <td style="color:#294B29 ;"><b><?= number_format($tong,0,',','.'); ?> VNĐ</b></td>
      <td></td>
      
    </tr>
  </table>



<?php 
  if(isset($_SESSION['position']) && ($_SESSION['position']==3)){
    // if(isset($_SESSION['user']) ){
      $sql = "SELECT * FROM users WHERE id_user = '".$_SESSION['user']."' ";
      $row = mysqli_query($mysqli,$sql);      
      // $count = mysqli_num_rows($row);
      $row_user = mysqli_fetch_array($row);
?>
<div class="thongtindathang">
    <h3 style="font-family: 'Times New Roman', Times, serif; color:#0A5C36 ;" >THÔNG TIN ĐẶT HÀNG</h3>
    <ul>

      <form action="xulygiohang.php" method="post">
      <li><input type="text" name="hoten" value="<?php echo $row_user['hotenkh']?>"  ></li>
        <li><input type="phonenumber" name="sdt" required value="<?php echo $row_user['username']?>" ></li>
        <li><input type="text" name="email" required value="<?php echo $row_user['gmail']?>" ></li>
        <li><input type="text" name="diachi" required value="<?php echo $row_user['diachi']?>"> </li>
        <li><input type="hidden" name="iduser" value="<?php echo $row_user['id_user'] ?>"></li>
      <li>
        <p>Phương thức thanh toán</p>
        <input type="hidden" name="tongdonhang" value="<?=$tong?>">
        <input type="radio" name="pttt" required value="1">Thanh toán khi nhận hàng<br>
        <input type="radio" name="pttt" required value="2">Chuyển khoản<br>
        <input type="radio" name="pttt" required value="3">Ví MoMo<br>
        </li>
        <li><input type="submit" name="thanhtoan" value="Thanh Toán"></li>
      </form>


    </ul>
    <p ><a href="index.php" style="text-decoration:  none;">Tiếp tục đặt hàng</a></p>
  <p><a href="xoagiohang.php" style="text-decoration: none;">Xóa tất cả sản phẩm trong giỏ hàng</a></p>
  </div>
<?php 
}else{
//CHƯA ĐĂNG NHẬP
?>
<div class="thongtindathang">
    <h3 style="font-family: 'Times New Roman', Times, serif; color:#0A5C36 ;" >THÔNG TIN ĐẶT HÀNG</h3>
    <ul>

      <form action="xulygiohang.php" method="post">
      <li><input type="text" name="hoten" required placeholder="Họ tên khách hàng"></li>
      <li><input type="text" name="diachi" required placeholder="Địa chỉ"></li>
      <li><input type="text" name="email" required placeholder="Email khách hàng"></li>
      <li><input type="phonenumber" name="sdt" required placeholder="Số điện thoại"></li>
      <li>
        <br>
        <p>Phương thức thanh toán</p>
        <input type="hidden" name="tongdonhang" value="<?=$tong?>">
        <input type="radio" name="pttt" value="1">Thanh toán khi nhận hàng<br>
        <input type="radio" name="pttt" value="2">Chuyển khoản<br>
        <input type="radio" name="pttt" value="3">Ví MoMo<br>
        </li>
        <li><input type="submit" name="thanhtoan" value="Thanh Toán"></li>
      </form>


    </ul>
    <p ><a href="index.php" style="text-decoration:  none;">Tiếp tục đặt hàng</a></p>
  <p><a href="xoagiohang.php" style="text-decoration: none;">Xóa tất cả sản phẩm trong giỏ hàng</a></p>
  </div>
<?php 
  }
?>

<!-- ************************************************************************************** -->

<?php
} else {
  if(isset($_SESSION['dathangthanhcong']) && ($_SESSION['dathangthanhcong'])==0){
    echo '<h4 style="display: flex; justify-content: center; margin-top: 50px;">
    Bạn đã đặt hàng thành công!  <a href="index.php?quanly=donhang" style="text-decoration: none;color: #A8E890">Xem đơn hàng</a></h4>';
    unset($_SESSION['dathangthanhcong']);
  }
  echo '<h4 style="display: flex; justify-content: center; margin-top: 100px;">
  Giỏ hàng của bạn trống, tiếp tục <a href="index.php" style="text-decoration: none;color: #A8E890"> đặt hàng</a>?</h4>';
}
include'footer.php';
// }
?>
  


  </html>
 