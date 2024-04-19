
<?php 
    $sql = "SELECT * FROM  sanpham,danhmucsp WHERE sanpham.id_danhmuc=danhmucsp.id_danhmuc 
    AND sanpham.id_sp = '$_GET[id]' LIMIT 1 ";
    $query = mysqli_query($mysqli,$sql);
    ?>
<div class="wrapper">
    <div class="main">

    <?php 
        while($row_a = mysqli_fetch_array($query)){
    ?>
    <form method="POST" action="xulygiohang.php?idsp=<?php echo $row_a['id_sp'] ?>">
        <div class="chitietsp">
            <ul>
                <li><img width="25%" src="admincp/modules/quanlysanpham/uploads/<?php echo $row_a['hinhanh'] ?>"></li>
                <li>
                    <h3><?php echo $row_a['tensanpham'] ?></h3>
                    <p>Giá: <?php echo ($row_a['giasp']). ' VNĐ' ?></p>
                    <p>Chi tiết: <?php echo $row_a['tomtat'] ?></p>
                    
            
                    <form action="../../xulygiohang.php" method="POST">
                        <input type="hidden" name="idsp" value="<?php echo  $row_a['id_sp'] ?>">
                        <input type="hidden" name="hinhanh" value="admincp/modules/quanlysanpham/uploads/<?php echo $row_a['hinhanh'] ?>">
                        <input type="hidden" name="tensp" value="<?php echo $row_a['tensanpham'] ?>">
                        <input type="hidden" name="gia" value="<?php echo $row_a['giasp'] ?>">
                        <input type="number" name="sl" value="1" min=1 max=20 required=""><br><br>
                        <input type="submit" name="themgiohang" value="Thêm vào giỏ hàng">
                    </form>

                </li>
            </ul>     
    </div>
</form>
<?php } ?>
    </div>
</div>




