<?php
    $sql_lietke_sp = "SELECT * FROM sanpham ORDER BY masp DESC";
    $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>
<!-- , danhmucsp WHERE sanpham.id_danhmuc=danhmucsp.id_danhmuc -->

<h3>Danh sách sản phẩm</h3>

<table border="3" style="border-collapse:collapse;" >
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <!-- <th>Danh mục</th> -->
        <th>Mã sản phẩm</th>
        <th>Tóm tắt</th>
        <th>Trạng thái</th>
        <th>Quản lý</th>
    </tr>

    <?php
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_sp)){
            $i++;
    ?>
        <tr>
            <td > <?php echo $i ?> </td>
            <td> <?php echo  $row['tensanpham'] ?></td>
            <td><img src="modules/quanlysanpham/uploads/<?php echo  $row['hinhanh'] ?>" width="200px"> </td>
            <td> <?php echo  $row['giasp'] ?></td>
            <td> <?php echo  $row['soluong'] ?></td>
            <!-- <th> <?php echo  $row['tendanhmuc'] ?></th> -->
            <td> <?php echo  $row['masp'] ?></td>
            <td> <?php echo  $row['tomtat'] ?></td>

            <td> <?php if($row['trangthai']==1){
                echo 'Mở bán';
            }else{
                echo 'Ẩn';
            }   ?></td>
            <td><a href="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sp'] ?>">Xóa</a> | 
            <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sp'] ?>">Sửa</a></td>
        </tr>
        <?php
        }
        ?>
         
</table>