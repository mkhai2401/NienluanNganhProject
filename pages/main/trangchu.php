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
                <?php echo $row_pro['giasp']. 'VNĐ' ?> </b>
                <!-- number_format(,0,',','.') -->
        <form action="xulygiohang.php" method="POST">
            <input type="hidden" name="idsp" value="<?php echo  $row_pro['id_sp'] ?>">
            <input type="hidden" name="hinhanh" value="admincp/modules/quanlysanpham/uploads/<?php echo $row_pro['hinhanh'] ?>">
            <input type="hidden" name="tensp" value="<?php echo $row_pro['tensanpham'] ?>">
            <input type="hidden" name="gia" value="<?php echo $row_pro['giasp'] ?>">
            <input type="submit" name="themgiohang" id="myButton" value="Thêm vào giỏ hàng">
        </form>
        </li></a>
        
        <?php 
        }
    } ?>
    </ul>  
    

</div>

<script>
    // Lấy thẻ button và thông báo
var button = document.getElementById('myButton');
var alertBox = document.getElementById('myAlert');

// Gắn sự kiện click cho button
button.addEventListener('click', function() {
    // Hiển thị thông báo
    alertBox.style.display = 'block';

    // Đợi 3 giây rồi ẩn thông báo đi
    setTimeout(function() {
        alertBox.style.display = 'none';
    }, 3000);
});

</script>
