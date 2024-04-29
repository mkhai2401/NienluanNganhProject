<?php
    include 'config/config.php';

    ?>
    <br>
<h3>Thêm bài Giới thiệu</h3>
<form method="POST" action="modules/quanlybaiviet/xuly.php" enctype="multipart/form-data">
    <table border="3" style="border-collapse:collapse;">

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
            <td colspan="2"><input type="submit" name="thembaigioithieu" value="Thêm bài viết"></td>
        </tr>
    </table>
</form><br>

<h3>Thêm Tin tức</h3>
<form method="POST" action="modules/quanlybaiviet/xuly.php" enctype="multipart/form-data">
    <table border="3" style="border-collapse:collapse;">

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
            <td colspan="2"><input type="submit" name="themtin" value="Thêm Tin"></td>
        </tr>
    </table>
</form><br>
