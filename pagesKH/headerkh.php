<?php 
    if(isset($_GET['dangxuat']) && $_GET['dangxuat']==1) { 
            unset($_SESSION['position']);
            header('Location: pages/dangnhap.php');
    }
?>

<div class="header">
    <a href="indexkh.php"><img width="5%" src="images/logo11.jpg"></a>

    <input class="timkiem" type="search" name="search" placeholder="Tìm kiếm...">

    <div><a href="index.php?quanly=donhang" style="text-decoration: none;color: white">Đơn hàng</a> | 
        <a href="index.php?quanly=thongtin" style="text-decoration: none;color: white">Thông tin</a><br>
        <!-- <a href="index.php?dangxuat=1" style="text-decoration: none;color: white">Đăng xuất</a> -->
        <div>
    <a href="xemyeuthich.php" style="text-decoration: none;color: white"><i class="fa-regular fa-heart"></i></a>
    </div>
    </div>
    
    <p style="font-family: 'Times New Roman', Times, serif;">
    <i class="fa-solid fa-clock" style="color: #f6f7f9;"></i>  8:00 - 20:00    
    |  <i class="fa-solid fa-phone" style="color: #fafafa;"></i>  0123456789 - 0999999999</p>        
 </div>
    