<br>
<h2>Xem chi tiết đơn hàng</h2>
<?php 
    include 'config/config.php';
    $sql = " SELECT * FROM btl_giohang WHERE iddh = '$_GET[madh]'";
    $sqla = " SELECT * FROM tbl_order WHERE madh = '$_GET[madh]' LIMIT 1";
    $row = mysqli_query($mysqli,$sql);
    
    $a = mysqli_query($mysqli,$sqla);
    $b = mysqli_fetch_array($a);
?>
<h3>Mã đơn hàng: <?php echo $b['madh'] ?></h3>
<h4>Ngày đặt hàng: <?php echo $b['ngaydathang'] ?></h4>
<h4>Khách hàng: <?php echo $b['hoten'] ?> | Địa chỉ: <?php echo $b['diachi'] ?> | Email: 
<?php echo $b['email'] ?></h4>

<table style="border-collapse:collapse;">
    <tr>
        <th>STT</th>
        <th>Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Tạm tính</th>
    </tr>

<?php 
    $i = 0;
    
    while ($row_dh = mysqli_fetch_array($row)) {
    $i++;
    $tam = $row_dh['dongia']*$row_dh['soluong'];
?>
    <tr>
        <td><?php echo $i ?></td>
        <td><img src="../<?php echo $row_dh['img'] ?>" width="150px" height="150px"></td>
        <td><?php echo $row_dh['tensp'] ?></td>
        <td><?php echo $row_dh['soluong'] ?></td>
        <td><?php echo number_format($row_dh['dongia'],0,',','.') ?></td>
        <td><?php echo number_format($tam,0,',','.') ?>đ</td>
    </tr>

<?php 
}
?>  
</table>
<h3>Tổng đơn hàng: <?php echo number_format($b['tongdonhang'],0,',','.')?> VNĐ</h3>