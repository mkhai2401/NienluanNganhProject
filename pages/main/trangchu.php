<img src="images/home5.webp" alt="" width="100%" height="550px">
<div class="vanbanhome"><p> <b><h3 style="font-family: 'Times New Roman', Times, serif;">Hòa mình vào không gian xanh</h3></b>
    <br>  Trang trí thêm cây xanh là lựa chọn tuyệt vời để mang lại không gian xanh tươi mới, 
    cải thiện chất lượng không khí và tạo cảm giác thư thái cho không gian sống. </p>
</div>

<?php 
$sql_dm = "SELECT * FROM  danhmucsp ORDER BY id_danhmuc DESC ";
$query_dm = mysqli_query($mysqli,$sql_dm);
?>

<div class="sidebar">
    <h2><b style="color: #0A5C36;">Danh mục Sản phẩm</b></h2>

    <ul class="listsidebar">
    <?php 
            while($row_dm = mysqli_fetch_array($query_dm)){
        ?> 
        <li>
            <a href="index.php?quanly=danhmuccay&id=<?php echo  $row_dm['id_danhmuc'] ?>">
            <img src="admincp/modules/quanlydanhmuc/uploads/<?php echo $row_dm['hinhanhdm'] ?>">
                <div class="tag">
                    <p style="font-family: 'Quicksand', sans-serif;"><b><?php echo $row_dm['tendanhmuc'] ?></b></p>
                </div>
            </a>       
        </li> 
        <?php 
        }
        ?>

    </ul>

</div>

<?php 
$sql_pro = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT 25";
$query_pro = mysqli_query($mysqli,$sql_pro);
?>

<div class="maincontent">
    <h2><b style="color: #0A5C36;">Sản phẩm mới</b></h2><br>
    <ul class="sanpham">  
    <?php 
            while($row_pro = mysqli_fetch_array($query_pro)){
                if($row_pro['trangthai']==1){
        ?>      
        <a href="index.php?quanly=sanpham&id=<?php echo  $row_pro['id_sp'] ?>"><li>
        <img src="admincp/modules/quanlysanpham/uploads/<?php echo $row_pro['hinhanh'] ?>">        
        <p ><b style="color: #000;"><?php echo $row_pro['tensanpham'] ?></b></p>
        <b style="font-family: Tahoma, Geneva, sans-serif;">Giá: 
            <?php echo number_format($row_pro['giasp'],0,',','.'); ?> VNĐ</b>
                <!-- number_format($row_pro['giasp'],0,',','.') -->
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
    } ?>
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

<!-- <script> -->
    <!-- // Lấy thẻ button và thông báo -->
<!-- var button = document.getElementById('myButton'); -->
<!-- var alertBox = document.getElementById('myAlert'); -->

<!-- // Gắn sự kiện click cho button -->
<!-- button.addEventListener('click', function() { -->
    <!-- // Hiển thị thông báo -->
    <!-- alertBox.style.display = 'block'; -->

    <!-- // Đợi 3 giây rồi ẩn thông báo đi -->
    <!-- setTimeout(function() { -->
        <!-- alertBox.style.display = 'none'; -->
    <!-- }, 3000); -->
<!-- }); -->

<!-- </script> -->
