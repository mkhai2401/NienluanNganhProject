<?php
    $sql_lietke_sp = "SELECT * FROM sanpham,danhmucsp WHERE sanpham.id_danhmuc=danhmucsp.id_danhmuc ORDER BY id_sp DESC";
    $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>


<h2 style="padding-top:50px">Danh sách sản phẩm</h2>

<table class="tablecard" style="border-collapse:collapse; width:125%; margin-left:25px">
    <tr style="width: 100%;">
        <th witdh="50px">ID</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th width="85px">Danh mục</th>
        <!-- <th>Mã sản phẩm</th> -->
        <th witdh="550px" >Tóm tắt</th>
        <th width="75px">Trạng thái</th>
        <th width="80px">Quản lý</th>
    </tr>

    <?php
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_sp)){
            $i++;
    ?>
        <tr>
            <td > <?php echo $i ?> </td>
            <td> <?php echo  $row['tensanpham'] ?></td>
            <td><img src="modules/quanlysanpham/uploads/<?php echo  $row['hinhanh'] ?>" height="150px" width="150px"> </td>
            <td> <?php echo  $row['giasp'] ?></td>
            <td> <?php echo  $row['soluong'] ?></td>
            <td> <?php echo  $row['tendanhmuc'] ?></td>
            <!-- <td> <?php echo  $row['masp'] ?></td> -->
            <td ><?php echo  $row['tomtat'] ?></td>

            <td> <?php if($row['trangthai']==1){
                echo 'Mở bán';
            }else{
                echo 'Ẩn';
            }   ?></td>
            <td><a href="modules/quanlysanpham/xuly.php?idsanpham=<?php echo $row['id_sp'] ?>"><i class="fa-solid fa-trash" style="color: #1A4D2E;"></i></a> | 
            <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sp'] ?>"><i class="fa-solid fa-pen" style="color: #1A4D2E;"></i></a></td>
        </tr>
        <?php
        }
        ?>
         
</table>