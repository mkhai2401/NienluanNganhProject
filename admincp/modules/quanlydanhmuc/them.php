<br>
<h3>Thêm danh mục sản phẩm</h3>

<form method="POST" action="modules/quanlydanhmuc/xuly.php" enctype="multipart/form-data">
    <table border="3" style="border-collapse:collapse;">

        <tr>
            <td>Tên Danh mục sản phẩm mới: </td>
            <td><input type="text" name="tendanhmuc"></td>
        </tr>

        <tr>
            <td>Hình ảnh: </td>
            <td><input type="file" name="hinhanhdm"></td>
        </tr>

        <!-- <tr>
            <td>Thứ tự: </td>
            <td><input type="text" name="thutu"></td>
        </tr> -->

        <tr>
            <td colspan="2"><input type="submit" name="themdanhmuc" value="Thêm danh mục"></td>
        </tr>

    </table>
</form>
