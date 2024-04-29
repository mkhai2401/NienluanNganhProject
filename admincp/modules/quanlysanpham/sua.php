<br>

<?php
    $sql_sua_sanpham = "SELECT * FROM sanpham WHERE id_sp ='$_GET[idsanpham]' LIMIT 1";
    $query_sua_sanpham = mysqli_query($mysqli,$sql_sua_sanpham);
?>

<br>
<h3>Chỉnh sửa sản phẩm</h3>

<?php 
    while($row = mysqli_fetch_array($query_sua_sanpham)){
?>
<form method="POST" action="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sp'] ?>" enctype="multipart/form-data">
    <table border="3" style="border-collapse:collapse;">

        <tr>
            <td>Tên sản phẩm: </td>
            <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensp"></td>
        </tr>

        <!-- <tr>
            <td>Mã sản phẩm: </td>
            <td><input type="text" value="<?php echo $row['masp'] ?>" name="masp"></td>
        </tr> -->

        <tr>
            <td>Giá: </td>
            <td><input type="text" value="<?php echo $row['giasp'] ?>" name="giasp"></td>
        </tr>

        <tr>
            <td>Số lượng: </td>
            <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluongsp"></td>
        </tr>

        <tr>
            <td>Hình ảnh: </td>
            <td><input type="file" name="hinhanhsp">
            <img src="modules/quanlysanpham/uploads/<?php echo  $row['hinhanh'] ?>" width="200px"></td>
            
        </tr>

        <tr>
            <td>Tóm tắt: </td>
            <td><textarea name="tomtat" rows="10" cols="50"  style="resize: none"><?php echo $row['tomtat'] ?></textarea></td>
        </tr>

        <!-- <tr>
            <td>Nội dung: </td>
            <td><textarea name="noidung" rows="10" cols="50"  style="resize: none"><?php echo $row['noidung'] ?></textarea></td>
        </tr> -->

        <tr>
        <td>Danh mục: </td>
            <td>
                <select name="danhmuc" id="">

                <?php 
                    $sql_danhmuc = "SELECT * FROM danhmucsp ORDER BY id_danhmuc DESC";
                    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){  
                        if($row_danhmuc['id_danhmuc'] == $row['id_danhmuc']){

                ?>
                 <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                   <?php 
                   }else{
                    ?>
                 <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>     
                    <?php
                   }
                } 
                ?>
            </select></td>
        </tr>

        <tr>
            <td>Trạng thái: </td>
            <td>
                <select name="trangthai" id="">
                    <?php
                        if($row['trangthai'] == 1){ 
                    ?>
                        <option value="1" selected>Mở bán</option>
                        <option value="0">Ẩn</option>
                    <?php
                        }else{ 
                    ?>
                        <option value="1" >Mở bán</option>
                        <option value="0" selected>Ẩn</option>
                    <?php } ?>
            
            </select></td>
        </tr>

        <tr>
            <td colspan="2">
                <input type="submit" name="suasp" value="Lưu lại">
            </td>
        </tr>
    </table>
</form>
<?php }?>