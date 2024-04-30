
<?php 
    $sql = "SELECT * FROM  sanpham,danhmucsp WHERE sanpham.id_danhmuc=danhmucsp.id_danhmuc 
    AND sanpham.id_sp = '$_GET[id]' LIMIT 1 ";
    $query = mysqli_query($mysqli,$sql);
    $row_a = mysqli_fetch_array($query);

    $sql_pro = "SELECT * FROM  sanpham WHERE id_danhmuc = '".$row_a['id_danhmuc']."' AND id_sp <> '".$row_a['id_sp']."' ORDER BY id_sp DESC ";
    $query_pro = mysqli_query($mysqli,$sql_pro);

    ?>
<div class="wrapper">
    <div class="main">

    <?php 
        // while($row_a = mysqli_fetch_array($query)){
    ?>
    <form method="POST" action="xulygiohang.php?idsp=<?php echo $row_a['id_sp'] ?>">
        <div class="chitietsp">
            <h3 style="font-family: 'Times New Roman', Times, serif;color:#0A5C36;"><b>Chi tiết sản phẩm</b></h3><br>
            <ul style="font-family: 'Times New Roman', Times, serif;">
                <li>
                    <img width="25%" src="admincp/modules/quanlysanpham/uploads/<?php echo $row_a['hinhanh'] ?>" style="width:90%; height:450px; border-radius:15px" ></li>
                <li>
                    <h4 style="color:#0A5C36;"><b><?php echo $row_a['tensanpham'] ?></b></h4>
                    <p>Giá: <?php echo number_format($row_a['giasp'],0,',','.');  ?> VNĐ</p>
                    
                    <p ><b style="color:#0A5C36;">Chi tiết:</b> <?php ; 
                    $paragraphs = explode("\n", $row_a['tomtat']);
        
                    // Hiển thị từng đoạn trên trang web
                    foreach ($paragraphs as $paragraph) {
                        echo "<p>" . $paragraph . "</p>";
                    }
                    ?>
                </p>
                    
                    <form action="../../xulygiohang.php" method="POST">
                        <input type="hidden" name="idsp" value="<?php echo  $row_a['id_sp'] ?>">
                        <input type="hidden" name="hinhanh" value="admincp/modules/quanlysanpham/uploads/<?php echo $row_a['hinhanh'] ?>">
                        <input type="hidden" name="tensp" value="<?php echo $row_a['tensanpham'] ?>">
                        <input type="hidden" name="gia" value="<?php echo $row_a['giasp'] ?>">
                        <input type="number" name="sl" value="1" min=1 max=20 required=""><br><br>
                        <input 
                            style="
                            background-color:#75A47F; 
                            color:white;
                            border-radius:10px;
                            border: 1px solid #75A47F;" 
                            type="submit" name="themgiohang" value="Thêm vào giỏ hàng">
                    </form>

                </li>
            </ul>     
    </div>
</form>
    
<?php 
// } 
?>

<div class="maincontent">  
<h3 style="font-family: 'Times New Roman', Times, serif;color:#0A5C36; margin-left:200px;"><b>Sản phẩm liên quan</b></h3><br>
<ul class="sanpham">
        <?php 
            while($row_pro = mysqli_fetch_array($query_pro)){
        ?>        
        <!-- <a href="index.php?quanly=sanpham&id=<?php echo  $row_pro['id_sp'] ?>"><li> 
            <img src="admincp/modules/quanlysanpham/uploads/<?php echo $row_pro['hinhanh'] ?>">        
            <p style="color: #000;"><?php echo $row_pro['tensanpham'] ?></p>
            <b style="font-family: 'Quicksand', sans-serif;">Giá: 
                <?php echo number_format($row_pro['giasp'],0,',','.'). 'VNĐ' ?></b> 
        </li></a> -->

        <a href="index.php?quanly=sanpham&id=<?php echo  $row_pro['id_sp'] ?>"><li>
        <img src="admincp/modules/quanlysanpham/uploads/<?php echo $row_pro['hinhanh'] ?>">        
            <p ><b style="color: #000;"><?php echo $row_pro['tensanpham'] ?></b></p>
            <b style="font-family: Tahoma, Geneva, sans-serif;">Giá: 
                <?php echo $row_pro['giasp']. 'VNĐ' ?> </b>
                <!-- number_format(,0,',','.') -->
        <form action="xulygiohang.php" method="POST">
            <input type="hidden" name="idsp" value="<?php echo  $row_pro['id_sp'] ?>">
            <input type="hidden" name="hinhanh" value="admincp/modules/quanlysanpham/uploads/<?php echo $row_pro['hinhanh'] ?>">
            <input type="hidden" name="tensp" value="<?php echo $row_pro['tensanpham'] ?>">
            <input type="hidden" name="gia" value="<?php echo $row_pro['giasp'] ?>">
            <input 
                style="
                    background-color:#75A47F; 
                    color:white;
                    border-radius:10px;
                    border: 1px solid #75A47F;
                    margin: 10px"
                type="submit" name="themgiohang" id="myButton" value="Thêm vào giỏ hàng">
        </form>
        </li></a>

        <?php 
            }
        ?>
    </ul>
</div>

<div class="maincontent">
<h3 style="font-family: 'Times New Roman', Times, serif;color:#0A5C36;margin-left:200px;"><b>Đánh giá của khách hàng</b></h3><br>
</div>

    </div>
</div>




