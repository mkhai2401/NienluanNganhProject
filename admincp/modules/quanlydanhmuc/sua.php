<br>

<?php
    $sql_sua_danhmuc = "SELECT * FROM danhmucsp WHERE id_danhmuc ='$_GET[iddanhmuc]' LIMIT 1";
    $query_sua_danhmuc = mysqli_query($mysqli,$sql_sua_danhmuc);
?>

<h3 style="font-family: Times New Roman, Times, serif;color:#75A47F; margin-left:150px; margin-top:50px">Chỉnh sửa danh mục sản phẩm</h3>

<form method="POST" action="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>" enctype="multipart/form-data">

<?php
    while($dong = mysqli_fetch_array($query_sua_danhmuc))
    {
?>
    <table  style="border-collapse:collapse; margin-left: 200px; font-family: Times New Roman, Times, serif;" class="tablecard">
        <tr>
            <td width="250px">Tên Danh mục sản phẩm: </td>
            <td width="200px"><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc" style="border-radius: 10px;"></td>
        </tr>

        <tr>
            <td>Hình ảnh: </td>
            <td><input type="file" name="hinhanhdm">
            <img src="modules/quanlydanhmuc/uploads/<?php echo  $dong['hinhanhdm'] ?>" width="200px"></td>
            
        </tr>

        <!-- <tr>
            <td>Thứ tự: </td>
            <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
        </tr> -->

        
    </table>
    <input type="submit" name="suadanhmuc" value="Lưu lại" class="nutnhan" style="margin-left: 690px;margin-top:10px">
    <?php
        }
    ?>

</form>
