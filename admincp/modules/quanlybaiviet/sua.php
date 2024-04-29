<br>

<?php
    if (isset($_GET['phanloai']) && ($_GET['phanloai'])==1) {
        
    $sql_sua_baiviet = "SELECT * FROM tbl_baiviet WHERE id ='$_GET[idbaiviet]' AND phanloai = 1 LIMIT 1";
    $query_sua_baiviet = mysqli_query($mysqli,$sql_sua_baiviet);
?>

<h3>Chỉnh sửa Bài viết</h3>
<form method="POST" action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>" enctype="multipart/form-data">

<?php
    while($dong = mysqli_fetch_array($query_sua_baiviet))
    {
?>
    <table border="3" style="border-collapse:collapse;">
        <tr>
            <td>Tiêu đề bài viết: </td>
            <td><input type="text" value="<?php echo $dong['tieudegioithieu'] ?>" name="tieudegioithieu"></td>
        </tr>

        <tr>
            <td>Hình ảnh: </td>
            <td><input type="file" name="hinhanhgt">
            <img src="modules/quanlybaiviet/uploads/<?php echo  $dong['img_gioithieu'] ?>" width="200px"></td>
            
        </tr>

        <tr>
            <td>Nội dung bài viết: </td>
            <td><textarea name="noidunggt" rows="10" cols="50" style="resize: none"><?php echo $dong['baigioithieu'] ?></textarea></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="suabaigt" value="Lưu lại"></td>
        </tr>
    </table>
    <?php
        }
    ?>    
    </form>
<?php
         
}elseif(isset($_GET['phanloai']) && ($_GET['phanloai'])==0){
        $sql_sua_tin = "SELECT * FROM tbl_baiviet WHERE id ='$_GET[idbaiviet]' AND phanloai = 0 LIMIT 1";
        $query_sua_tin = mysqli_query($mysqli,$sql_sua_tin);
?>
        
<h3>Chỉnh sửa Tin</h3>
<form method="POST" action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>" enctype="multipart/form-data">
<?php
    while($dong1 = mysqli_fetch_array($query_sua_tin))
    {
?>
    <table border="3" style="border-collapse:collapse;">
        <tr>
            <td>Tiêu đề tin: </td>
            <td><input type="text" value="<?php echo $dong1['tieudetintuc'] ?>" name="tieudetin"></td>
        </tr>

        <tr>
            <td>Hình ảnh: </td>
            <td><input type="file" name="hinhanhtin">
            <img src="modules/quanlybaiviet/uploads/<?php echo  $dong1['img_tintuc'] ?>" width="200px"></td>  
        </tr>

        <tr>
            <td>Nội dung tin: </td>
            <td><textarea name="noidungtin" rows="10" cols="50" style="resize: none"><?php echo $dong1['tintuc'] ?></textarea></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" name="suatin" value="Lưu lại"></td>
        </tr>
    </table>
<?php 
    }
?>
</form>

<?php
}
?>


