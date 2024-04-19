<?php
    include 'admincp/config/config.php';
    // session_start();
    // ob_start();

    if(isset($_SESSION['user']) ){
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['user']."' ";
    $row = mysqli_query($mysqli,$sql);      
    // $count = mysqli_num_rows($row);
    $row_user = mysqli_fetch_array($row);
    
?>

<div>
    <form action="">
    <ul>
        <li>Tên khách hàng: <?php echo $row_user['hotenkh']?></li>
        <li>SĐT: <?php echo $row_user['username']?></li>
        <li>Gmail: <?php echo $row_user['gmail']?></li>
        <li>Địa Chỉ: <?php echo $row_user['diachi']?></li>
    </ul>
    </form>
    <p><a href="?thongtin=1">Cập nhật thông tin cá nhân</a> | 
    <a href="">Đổi mật khẩu</a> | 
    <a href="index.php?dangxuat=1" style="text-decoration: none;color: #0A5C36">Đăng xuất</a></p>
</div>

<?php
    }
?>