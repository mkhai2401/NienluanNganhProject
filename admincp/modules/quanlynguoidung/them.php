<br>
<h2>Tạo người dùng</h2>

<form method="POST" action="modules/quanlynguoidung/xuly.php" enctype="multipart/form-data" class="tablecard">
    <table border="3" style="border-collapse: collapse; width: 100%;">
        <tr>
            <td style="width: 33%; padding: 10px;">
                <label style="display: block;">User Name:</label>
                <input type="text" name="username" style="width: 100%;">
            </td>
            
            <td style="width: 33%; padding: 10px;">
                <label style="display: block;">Mật khẩu:</label>
                <input type="password" name="password" style="width: 100%;">
            </td>
            <td></td>      
        </tr>
        <tr>
            <td style="width: 33%; padding: 10px;">
                <label style="display: block;">Họ tên:</label>
                <input type="text" name="hoten" style="width: 100%;">
            </td>
            <td style="width: 33%; padding: 10px;">
                <label style="display: block;">Email:</label>
                <input type="text" name="gmail" style="width: 100%;">
            </td>
            <td style="width: 33%; padding: 10px;">
                <label style="display: block;">Địa chỉ:</label>
                <input type="text" name="diachi" style="width: 100%;">
            </td>
        </tr>
        <tr>
            <td colspan="4" style="padding: 10px;">
                <input type="submit" name="themnguoidung" value="Xác Nhận" style="width: 100px;" class="nutnhan">
            </td>
        </tr>
    </table>
</form>



