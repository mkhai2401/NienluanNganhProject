<?php 
    include("config/config.php");
    $sql =" SELECT *FROM tbl_lienhe ORDER BY id DESC";
    $a = mysqli_query($mysqli,$sql);
   
?>

<br>
<h2>Chăm sóc khách hàng</h2>
<table class="tablecard" style="width:100%; margin-left:120px">
    <tr>
        <th>STT</th>
        <th>Tên khách hàng</th>
        <th>Lời nhắn</th>
        <th>Gmail Khách hàng</th>
        <th width="110px">Trạng thái</th>
        <th>Xóa</th>
    </tr>
    
    <?php 
    $i = 1;
    while ( $row = mysqli_fetch_array($a)) {
     ?>
     <tr>
       <td><?php echo $i++ ?></td>
       <td><?php echo $row['tenlh'] ?></td>
       <td><?php echo $row['noidunglienhe'] ?></td>
       <td><?php echo $row['gmail'] ?></td>
       <td><?php 
        if($row['trangthai'] == 0){ 
       ?>
        <a href="modules/chamsockhachhang/xulylienhe.php?id=<?php echo $row['id'] ?>">Đợi phản hồi</a>
        <?php 
        }elseif($row['trangthai'] == 1){
       ?>
            <a href="#">Đã phản hồi</a>
       </td>
       <td><a href="modules/chamsockhachhang/xulylienhe.php?xoa=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash" style="color: #1A4D2E;"></i></a></td>
    </tr>   
    <?php } 
    }
    ?>
</table>