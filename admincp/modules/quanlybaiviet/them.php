<?php
    include 'config/config.php';

    ?>
    <br>
<h2>Thêm bài Giới thiệu</h2>
<form method="POST" action="modules/quanlybaiviet/xuly.php" enctype="multipart/form-data">
    <table border="3" style="border-collapse:collapse;" class="tablecard">

        <tr>
            <td>Tiêu đề bài viết: </td>
            <td><input type="text" name="tieudegioithieu"></td>
        </tr>

        <tr>
            <td>Hình ảnh: </td>
            <td><input type="file" name="hinhanhgt"></td>
        </tr>

        <tr>
            <td>Nội dung bài viết: </td>
            <td><textarea name="noidunggt" rows="10" cols="50" style="resize: none"></textarea></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="thembaigioithieu" value="Thêm bài viết" class="nutnhan" style="margin-left: 420px"></td>
        </tr>
    </table>
</form><br>

<h2>Thêm Tin tức</h2>
<form method="POST" action="modules/quanlybaiviet/xuly.php" enctype="multipart/form-data">
    <table border="3" style="border-collapse:collapse;" class="tablecard">

        <tr>
            <td>Tiêu đề Tin: </td>
            <td><input type="text" name="tieudetin"></td>
        </tr>

        <tr>
            <td>Hình ảnh: </td>
            <td><input type="file" name="hinhanhtin"></td>
        </tr>

        <tr>
            <td>Nội dung Tin: </td>
            <td><textarea name="noidungtin" rows="10" cols="50" style="resize: none"></textarea></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="themtin" value="Thêm Tin" class="nutnhan" style="margin-left: 420px"></td>
        </tr>
    </table>
</form><br>
