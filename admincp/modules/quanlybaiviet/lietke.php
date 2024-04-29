<?php
    $sql_lietke_baiviet = "SELECT * FROM tbl_baiviet WHERE phanloai = 1 ORDER BY id DESC";
    $query_lietke_baiviet = mysqli_query($mysqli,$sql_lietke_baiviet);

    $sql_lietke_tin = "SELECT * FROM tbl_baiviet WHERE phanloai = 0 ORDER BY id DESC";
    $query_lietke_tin = mysqli_query($mysqli,$sql_lietke_tin);
?>


<ul style="list-style: none">
    <li>
        <h3 style="padding-left: 10%;">Danh sách Bài Giới thiệu</h3>
        <table border="3" style="border-collapse:collapse; width:80%; margin-left:10%" >
        <tr>
            <th>STT</th>
            <th width = "150px">Tên bài Giới thiệu</th>
            <th width = "150px">Hình ảnh</th>
            <th>Nội dung</th>
            <th width = "75px">Quản lý</th>
        </tr>

        <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_lietke_baiviet)){
                $i++;
        ?>
        <tr>
            <td > <?php echo $i ?> </td>
            <td> <?php echo  $row['tieudegioithieu'] ?></td>
            <td><img src="modules/quanlybaiviet/uploads/<?php echo  $row['img_gioithieu'] ?>" height="200px" width="200px"></td>
            <td><?php echo  $row['baigioithieu'] ?></td>
            <td><a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>">Xóa</a> | 
            <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id'] ?>&phanloai=1">Sửa</td>
        </tr>
        <?php
        }
        ?>
        </table>
    </li>

    <li><br>
    <h3 style="padding-left: 10%;">Danh sách Tin tức</h3>
        <table border="3" style="border-collapse:collapse; width:80%; margin-left:10%" >
        <tr>
            <th>STT</th>
            <th width = "150px">Tiêu đề tin tức</th>
            <th width = "150px">Hình ảnh</th>
            <th>Nội dung</th>
            <th width = "75px">Quản lý</th>
        </tr>

        <?php
        $i = 0;
        while($row1 = mysqli_fetch_array($query_lietke_tin)){
                $i++;
        ?>
        <tr>
            <td > <?php echo $i ?> </td>
            <td> <?php echo  $row1['tieudetintuc'] ?></td>
            <td><img src="modules/quanlybaiviet/uploads/<?php echo  $row1['img_tintuc'] ?>" height="200px" width="200px"></td>
            <td><?php echo  $row1['tintuc'] ?></td>
            <td><a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row1['id'] ?>">Xóa</a> | 
            <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row1['id'] ?>&phanloai=0">Sửa</td>
        </tr>
        <?php
        }
        ?>
        </table>
    </li>
</ul>
