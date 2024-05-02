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

                <input
                        style="
                            background-color:#FA7070; 
                            color:white;
                            border-radius: 10%;
                            border: 1px solid #FA7070;
                            margin: 10pxl;
                            border-radius: 10px"
                        type="submit" name="yeuthichsp" value="Thích" class="heart-icon-input">
    
        </form>
        </li></a>

        <?php 
            }
        ?>
    </ul>
</div>

<style>
    .heart-icon-input {
        background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"%3E%3Cpath d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" fill="%23fff" /%3E%3C/svg%3E');
        background-size: 20px; /* Kích thước của icon */
        background-repeat: no-repeat; /* Không lặp lại icon */
        background-position: left center; /* Vị trí của icon */
        padding-left: 30px; /* Khoảng cách giữa icon và nội dung của input */
    }
</style>