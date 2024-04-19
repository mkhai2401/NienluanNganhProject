<?php 
 $sql_pro = "SELECT * FROM  sanpham WHERE sanpham.id_danhmuc = '$_GET[id]' ORDER BY id_sp DESC ";
 $query_pro = mysqli_query($mysqli,$sql_pro);

 $sql_cate = "SELECT * FROM  danhmucsp WHERE danhmucsp.id_danhmuc = '$_GET[id]' LIMIT 1 ";
 $query_cate = mysqli_query($mysqli,$sql_cate);
 $row_cate = mysqli_fetch_array($query_cate);
?>

<div class="wrapper">
    <div class="tuongdanhmuc">
    <img src="images/tintuc8.webp" alt="">
    <div class="tagdanhmuccay"><p> 
        <b><h2 style="font-family: 'Times New Roman', Times, serif;">
        <?php echo $row_cate['tendanhmuc'] ?></h2></b>
        <br> <b>Trang trí thêm cây xanh là lựa chọn tuyệt vời để mang lại không gian xanh tươi mới, 
        cải thiện chất lượng không khí và tạo cảm giác thư thái cho không gian sống. </b> </p>
        </div>
    </div>
    </div>

    <div class="maincontent">  
    <ul class="sanpham">
        <?php 
            while($row_pro = mysqli_fetch_array($query_pro)){
        ?>        
        <a href="index.php?quanly=sanpham&id=<?php echo  $row_pro['id_sp'] ?>"><li> 
            <img src="admincp/modules/quanlysanpham/uploads/<?php echo $row_pro['hinhanh'] ?>">        
            <p style="color: #000;"><?php echo $row_pro['tensanpham'] ?></p>
            <b style="font-family: 'Quicksand', sans-serif;">Giá: 
                <?php echo number_format($row_pro['giasp'],0,',','.'). 'VNĐ' ?></b> 
        </li></a>

        <?php 
            }
        ?>
    </ul>
</div>