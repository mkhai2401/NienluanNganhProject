<br>
<h2>Đơn đặt hàng</h2>
<?php 
    include 'config/config.php';
    $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
    $row = mysqli_query($mysqli,$sql);
?>

<table style="border-collapse:collapse;width:110%; margin-left:75px" class="tablecard">
    <tr>
        <th>STT</th>
        <th>Mã đơn hàng</th>
        <th>Tên Khách hàng</th>
        <th>Giá đơn hàng</th>
        <th>Email Khách hàng</th>
        <th>Ngày đặt hàng</th>
        <th>Chi tiết</th>
        <th>Xác nhận</th>
    </tr>
<?php 
    $i = 0;
    while ($row_dh = mysqli_fetch_array($row)) {
    $i++;
    
?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row_dh['madh'] ?></td>
        <td><?php echo $row_dh['hoten'] ?></td>
        <td><?php echo number_format($row_dh['tongdonhang'],0,',','.') ?> VNĐ</td>
        <td><?php echo $row_dh['email'] ?></td>
        <td><?php echo $row_dh['ngaydathang'] ?></td>
        <td><a href="index.php?action=quanlydonhang&query=xemchitiet&madh=<?php echo $row_dh['madh'] ?>"><i class="fa-regular fa-eye" style="color: #294B29;"></i></a></td>
        <td>
            <?php if($row_dh['trangthai'] == 0 ){ ?>
                <a style="color:#789461" href="modules/quanlythongke/thongke.php?madh=<?php echo $row_dh['madh'] ?> ">Đợi gói hàng</a></td>
            <?php 
                }elseif($row_dh['trangthai'] == 1){   
            ?>
                <a style="color:#50623A" href="modules/quanlythongke/thongke.php?madh=<?php echo $row_dh['madh'] ?>">Đã đóng gói</a></td>
            <?php 
            }elseif ($row_dh['trangthai'] == 2) {
            ?>
            <a style="color:#294B29" href="modules/quanlythongke/thongke.php?iddh=<?php echo $row_dh['madh'] ?>">Đang vận chuyển</a></td>
            <?php 
            }else{
                ?>
                <i class="fa-solid fa-check" style="color: #294B29"> </i>
                <?php
            }
            ?>
    </tr>

<?php 
}
?>
</table>