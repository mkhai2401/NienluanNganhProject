<?php
    // Lấy thông tin người dùng từ cơ sở dữ liệu để hiển thị trên biểu mẫu
    if (isset($_GET['id_user'])) {
        $id = $_GET['id_user'];
    $sql_sua_nguoidung = "SELECT * FROM users WHERE id_user ='".$id."' LIMIT 1";
    $query_sua_nguoidung = mysqli_query($mysqli, $sql_sua_nguoidung);
    $dong = mysqli_fetch_array($query_sua_nguoidung);
?>

<h2>Chỉnh sửa thông tin người dùng</h2>

<form method="POST" action="modules/quanlynguoidung/xuly.php" enctype="multipart/form-data">

<?php
    // while ($dong = mysqli_fetch_array($query_sua_nguoidung)) {
?>
    <table border="2" style="border-collapse: collapse; width: 100%;" class="tablecard">
        <tr>
            <td style="width: 33%;">
                <label for="username">User Name:</label>
                <input type="text" value="<?php echo $dong['username'] ?>" name="username" style="width: 100%;">
            </td>
            <td style="width: 33%; padding: 10px;">
                <label for="password">Mật khẩu mới:</label>
                <input type="password" name="password" style="width: 100%;">
            </td>
            <td>
                
            </td>
        </tr>
        <tr>
            <td style="width: 33%;">
                <label for="hoten">Họ tên:</label>
                <input type="text" value="<?php echo $dong['hotenkh'] ?>" name="hoten" style="width: 100%;">
            </td>
            <td style="width: 33%; ">
                <label for="gmail">Email:</label>
                <input type="text" value="<?php echo $dong['gmail'] ?>" name="gmail" style="width: 100%;">
            </td>
            <td style="width: 33%; ">
                <label for="diachi">Địa chỉ:</label>
                <input type="text" value="<?php echo $dong['diachi'] ?>" name="diachi" style="width: 100%;">
            </td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 10px; text-align: center;">
                <input type="hidden" name="id_user" value="<?php echo $dong['id_user']; ?>">
    
                <input type="submit" class="nutnhan" name="suanguoidung" value="Lưu lại" style="width: 100px;">
            </td>
        </tr>
    </table>
<?php
    // }
}
?>

</form>
