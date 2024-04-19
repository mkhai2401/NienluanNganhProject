<?php
    $sql_danhmuc = "SELECT * FROM danhmucsp ORDER BY id_danhmuc DESC";
    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
   
?>


<div class="menu">
    <ul class="">
        <li><a href="index.php" style="font-family: 'Times New Roman', Times, serif;">Trang chủ</a></li>
        <li><a href="index.php?quanly=gioithieu" style="font-family: 'Times New Roman', Times, serif;">Giới thiệu</a></li>
        <li><a href="index.php?quanly=tintuc" style="font-family: 'Times New Roman', Times, serif;">Tin tức</a></li>
        <li><a href="index.php?quanly=lienhe" style="font-family: 'Times New Roman', Times, serif;">Liên hệ</a></li>
    </ul>


    <div class="dropdown">
        <a class="dropdown-toggle text-decoration-none text-dark" 
        style="font-size: 20px;font-family: 'Times New Roman', Times, serif;" href="#" 
        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Danh mục cây
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <?php 
                while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
            ?>
            <b><li><a  class="dropdown-item" href="index.php?quanly=danhmuccay&id=<?php echo  $row_danhmuc['id_danhmuc'] ?>">
                <?php echo  $row_danhmuc['tendanhmuc'] ?>
            </a></li></b>
            <?php } ?>

        </ul>
    </div>

</div>