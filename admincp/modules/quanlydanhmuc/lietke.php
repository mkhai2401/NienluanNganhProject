<?php
    $sql_lietke_danhmuc = "SELECT * FROM danhmucsp ORDER BY id_danhmuc DESC";
    $query_lietke_danhmuc = mysqli_query($mysqli,$sql_lietke_danhmuc);
?>

<h2 style="margin-top:50px">Danh sách Danh mục sản phẩm</h2>

<table  style="border-collapse:collapse; " class="tablecard" >
    <tr>
        <th width = "75px">Thứ tự</th>
        <th width = "170px">Tên danh mục</th>
        <th width = "200px">Hình ảnh</th>
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
            <td><img src="modules/quanlydanhmuc/uploads/<?php echo  $row['hinhanhdm'] ?>" height="200px" width="200px"></td>

            <td><a href="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><i class="fa-solid fa-trash" style="color: #1A4D2E;"></i></a> | 
            <a href="?action=quanlydanhmuc&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>"><i class="fa-solid fa-pen" style="color: #1A4D2E;"></i></td>
        </tr>
        <?php
        }
        ?>
         
</table>