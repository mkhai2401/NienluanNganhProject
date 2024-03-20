<br>

<?php
    $sql_sua_danhmuc = "SELECT * FROM danhmucsp WHERE id_danhmuc ='$_GET[iddanhmuc]' LIMIT 1";
    $query_sua_danhmuc = mysqli_query($mysqli,$sql_sua_danhmuc);
?>

<h3>Chỉnh sửa danh mục sản phẩm</h3>

<form method="POST" action="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">

<?php
    while($dong = mysqli_fetch_array($query_sua_danhmuc))
    {
?>
    <table border="3" style="border-collapse:collapse;">
        <tr>
            <td>Tên Danh mục sản phẩm: </td>
            <td><input type="text" value="<?php echo $dong['tendanhmuc'] ?>" name="tendanhmuc"></td>
        </tr>

        <tr>
            <td>Thứ tự: </td>
            <td><input type="text" value="<?php echo $dong['thutu'] ?>" name="thutu"></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="suadanhmuc" value="Lưu lại"></td>
        </tr>
    </table>
    <?php
        }
    ?>

</form>
