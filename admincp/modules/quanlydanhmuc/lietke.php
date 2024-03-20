<?php
    $sql_lietke_danhmuc = "SELECT * FROM danhmucsp ORDER BY thutu DESC";
    $query_lietke_danhmuc = mysqli_query($mysqli,$sql_lietke_danhmuc);
?>

<h3>Danh sách Danh mục sản phẩm</h3>

<table border="3" style="border-collapse:collapse;" >
    <tr>
        <th>Thứ tự</th>
        <th width = "300px">Tên danh mục</th>
        <th width = "150px">Quản lý</th>
    </tr>

    <?php
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_danhmuc)){
            $i++;
    ?>
        <tr>
            <td > <?php echo $i ?> </td>
            <td> <?php echo  $row['tendanhmuc'] ?></td>
            <td><a href="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xóa</a> | 
            <a href="?action=quanlydanhmuc&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a></td>
        </tr>
        <?php
        }
        ?>
         
</table>