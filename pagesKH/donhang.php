<br><h2 style="color: #0A5C36; font-family: Times New Roman, Times, serif; "><b>Đơn Hàng Của Tôi</b></h2>
<br>
<?php
    include 'admincp/config/config.php';
    // session_start();
    // ob_start();

    if(isset($_SESSION['user']) ){    

        $sql_order = "SELECT * FROM tbl_order WHERE iduser = '".$_SESSION['user']."' ORDER BY id DESC";
        $row = mysqli_query($mysqli,$sql_order); 
             
        while($row_order = mysqli_fetch_array($row)){

            $madh = $row_order['madh'];
          
            $sql_cart = "SELECT * FROM btl_giohang WHERE iddh = '".$madh."'";
            $rowc = mysqli_query($mysqli,$sql_cart);

?>
<form  action="">
     <h4 style="margin-left: 100px;color: #0A5C36; font-family: Times New Roman, Times, serif;">
        Mã Đơn Hàng: <?php echo $row_order['madh'] ?></h4>

    <table class="tablecard" >
        <tr> 
            <th>STT</th>
            <th width="120px"">Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
  
    <?php
        $i = 0;
        while( $row_cart = mysqli_fetch_array($rowc)){
            $i++;
            $t = $row_cart['soluong']*$row_cart['dongia'];
        ?>

        <tr >
            <td><?php echo $i ?></td>
            <td height="120px"><img src="<?php echo $row_cart['img']?>" height="100px"> </td>
            <td> <?php echo $row_cart['tensp'] ?> </td>
            <td> <?php echo number_format($row_cart['dongia'],0,',','.'). ' VNĐ'?> </td> 
            <td> <?php echo $row_cart['soluong'] ?> </td>
            <td> <?php echo number_format($t,0,',','.'). ' VNĐ' ?> </td>
        </tr>
        <?php 
             }
        ?>

        <tr>
            <td colspan="3" style="font-family: 'Times New Roman', Times, serif; font-size: 25px; color:#294B29"><b>Tổng:</b></td>
            <td colspan="2"></td>
            <td style="color:#294B29 ;"><b><?php  echo number_format($row_order['tongdonhang'],0,',','.'). ' VNĐ'  ?></b></td>
        </tr>
    </table>
</form>


<div height="auto" class="thongtindathang">
    <h3 style="font-family: 'Times New Roman', Times, serif; color:#0A5C36 ;" >THÔNG TIN GIAO HÀNG</h3>
    <ul>

      <form action="xulygiohang.php" method="post">
        <li><b>Người nhận:</b> <?php echo $row_order['hoten']?></li>
        <li><b>SĐT:</b> <?php echo $row_order['sdt']?></li>
        <li><b>Email:</b> <?php echo $row_order['email']?></li>
        <li><b>Địa chỉ giao hàng:</b> <?php echo $row_order['diachi']?></li>
        <li><b>Ngày đặt hàng:</b> <?php echo $row_order['ngaydathang']?></li>
        <!-- <li><input type="hidden" name="iduser" value="<?php echo $row_order['id_user'] ?>"></li> -->
      <li>
        <?php 
            if($row_order['pttt']==3){      
            ?>  
                <p><b>Phương thức thanh toán:</b> Ví MoMo</p>
            <?php }elseif ($row_order['pttt']==2) { ?>
                <p><b>Phương thức thanh toán:</b> Chuyển khoản</p>
            <?php }else { ?>
                <p><b>Phương thức thanh toán:</b> Thanh toán khi nhận hàng</p>
           <?php 
           }

           if ($row_order['trangthai']==0) {
            ?>
            <p style="font-family: 'Times New Roman', Times, serif; color:#0A5C36 ; font-size:22px">
            <b>Đang gói hàng!</b></p>
            <?php 
           }elseif($row_order['trangthai']==1){
           ?>
           <p style="font-family: 'Times New Roman', Times, serif; color:#0A5C36 ; font-size:22px">
            <b>Đã đóng gói!</b></p>
           <?php
            }elseif($row_order['trangthai']==2){
             ?>
             <p style="font-family: 'Times New Roman', Times, serif; color:#0A5C36 ; font-size:22px">
            <b>Đang giao hàng!</b></p>
             <?php   
            }
           elseif($row_order['trangthai']==3){
            ?>             
            <a href="index.php?quanly=danhgia&iddh=<?php echo $row_order['madh'] ?>">
                <input type="button" name="danhgia" value="Đánh giá đơn hàng"
                    style="
                    background-color:#75A47F; 
                    color:white;
                    border-radius:10px;
                    border: 1px solid #75A47F;"></a>
            <?php 
           }else{
            ?>
            <p style="font-family: 'Times New Roman', Times, serif; color:#0A5C36 ; font-size:22px">
            <b>Đã đánh giá!</b></p>
          <?php 
          }
            ?>
            <!-- <p style="font-family: 'Times New Roman', Times, serif; color:#0A5C36 ; font-size:22px">
            <b>Đang giao hàng!</b></p> -->

        </li>

        <!-- <li><input type="submit" name="xacnhandon" value="Xác nhận"></li><br> -->
      </form>
    </ul>
  </div>
  <hr style="color: #f4f4ee;" width="100%">
  <hr style="border: none; background-color: #4F6F52; height: 1.5px; width: 80%; margin: 0 auto;">
  <br>
<?php
}
}

?>
