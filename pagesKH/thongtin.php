<?php
    include 'admincp/config/config.php';
    // session_start();
    // ob_start();

    if(isset($_SESSION['user']) ){
    $sql = "SELECT * FROM users WHERE id_user = '".$_SESSION['user']."' ";
    $row = mysqli_query($mysqli,$sql);      
    // $count = mysqli_num_rows($row);
    $row_user = mysqli_fetch_array($row); 
    

?>

<div>
    <br><h2 style="color: #0A5C36; font-family: Times New Roman, Times, serif; "><b>Thông tin của tôi</b></h2>
    <form class="thongtin" action="">
    <ul>
        <li><b>Tên khách hàng:</b> <?php echo $row_user['hotenkh']?></li>
        <li><b>SĐT:</b> <?php echo $row_user['username']?></li>
        <li><b>Gmail:</b> <?php echo $row_user['gmail']?></li>
        <li><b>Địa Chỉ:</b> <?php echo $row_user['diachi']?></li>
    </ul>
    <p>
        <a href="?thongtin=1&matkhau=0" style="text-decoration: none;color: #0A5C36"><b>Cập nhật thông tin</b></a> | 
        <a href="?thongtin=0&matkhau=1" style="text-decoration: none;color: #0A5C36"><b>Đổi mật khẩu</b></a> | 
        <a href="index.php?dangxuat=1" style="text-decoration: none;color: #0A5C36"><b>Đăng xuất</b></a>
    </p>
    </form>
    
</div>
<!-- <?php echo $row_user['id_user']?> -->
<?php
    }
?>