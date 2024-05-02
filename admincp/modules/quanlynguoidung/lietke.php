<?php
    // Truy vấn SQL chỉ lấy các tài khoản không phải là admin
    $sql_lietke_nv = "SELECT * FROM users WHERE position = 2";
    $query_lietke_nv = mysqli_query($mysqli, $sql_lietke_nv);
?>

<h2 style="margin-top:50px">Danh sách Nhân viên</h2>

<table class="tablecard" style="width: 100%; margin-left:100px">
    <tr>
        <th width="10%px">User Name</th>
        <th width="20%">Họ tên</th>
        <th width="20%">Email</th>
        <th width="20%">Địa chỉ</th>
        <th width="10%">Thao tác</th>
        <!-- Thêm một cột ẩn để tăng không gian -->
        <th style="display: none;"></th>
    </tr>

    <?php
        $i = 0;
        while($row = mysqli_fetch_array($query_lietke_nv)){
            $i++;
    ?>
        <tr>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['hotenkh']; ?></td>
            <td><?php echo $row['gmail']; ?></td>
            <td><?php echo $row['diachi']; ?></td>
            <td>
                <a href="?action=quanlynguoidung&query=sua&id_user=<?php echo $row['id_user']; ?>">Sửa</a> |
                <a href="modules/quanlynguoidung/xuly.php?user_name=<?php echo $row['username']; ?>">Xóa</a>
            </td>
    
            <td style="display: none;"></td>
        </tr>
    <?php
        }
    ?>
</table>

    

