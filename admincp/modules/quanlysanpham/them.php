<br>
<h3>Thêm sản phẩm</h3>

<form method="POST" action="modules/quanlysanpham/xuly.php" enctype="multipart/form-data">
    <table border="3" style="border-collapse:collapse;">

        <tr>
            <td>Tên sản phẩm mới: </td>
            <td><input type="text" name="tensp"></td>
        </tr>

        <tr>
            <td>Mã sản phẩm: </td>
            <td><input type="text" name="masp"></td>
        </tr>

        <tr>
            <td>Giá: </td>
            <td><input type="text" name="giasp"></td>
        </tr>

        <tr>
            <td>Số lượng: </td>
            <td><input type="text" name="soluongsp"></td>
        </tr>

        <tr>
            <td>Hình ảnh: </td>
            <td><input type="file" name="hinhanhsp"></td>
        </tr>

        <tr>
            <td>Tóm tắt: </td>
            <td><textarea name="tomtat" rows="10" cols="50" style="resize: none"></textarea></td>
        </tr>

        <tr>
            <td>Nội dung: </td>
            <td><textarea name="noidung" rows="10" cols="50" style="resize: none"></textarea></td>
        </tr>

        <tr>
            <td>Danh mục: </td>

            <td>
                <!-- <select name="danhmuc" id=""> -->
                
                <?php 
                    $sql_danhmuc = "SELECT * FROM danhmucsp ORDER BY id_danhmuc DESC";
                    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){             
                ?>
                <!-- <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option> -->
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" name="danhmuc">
            <label  class="btn btn-outline-primary" value="<?php echo $row_danhmuc['id_danhmuc'] ?>"
            ><?php echo $row_danhmuc['tendanhmuc'] ?></label>
            </div> 
            <?php } ?>
            <!-- </select> -->
        </td>

            
        </tr>

        <tr>
            <td>Trạng thái: </td>
            <td><select name="trangthai" id="">
                <option value="1">Mở bán</option>
                <option value="0">Ẩn</option>
            </select></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="themsp" value="Thêm sản phẩm"></td>
        </tr>
    </table>
</form>
