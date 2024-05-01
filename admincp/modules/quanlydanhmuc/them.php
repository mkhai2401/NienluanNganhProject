<br>
<h2 style="font-family: Times New Roman, Times, serif;color:#75A47F;margin-left:150px;">Thêm danh mục sản phẩm</h2>

<form method="POST" action="modules/quanlydanhmuc/xuly.php" enctype="multipart/form-data">
    <table  class="tablecard" style="border-collapse:collapse; margin-left:200px; margin-top:50px;font-family: Times New Roman, Times, serif;" border="2">

        <tr>
            <td>Tên Danh mục sản phẩm mới: </td>
            <td><input type="text" name="tendanhmuc" style="
                    width:400px;
                    border-radius:10px;
                    border: 1px solid #75A47F;"></td>
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
            <td style="padding-left:450px" colspan="2"><input type="submit" name="themdanhmuc" value="Thêm danh mục" class="nutnhan"></td>
        </tr>

    </table>
</form>
