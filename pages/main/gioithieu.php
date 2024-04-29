<?php
    include 'admincp/config/config.php';

    $sql = "SELECT * FROM tbl_baiviet WHERE phanloai=1 ORDER BY id DESC  ";
    $query_sql = mysqli_query($mysqli,$sql);
    $a = mysqli_fetch_array($query_sql);
?>

<div class="wrapper">
    <div class="main">
    <div class="wallcommon">
        <div>
        <img src="images/home3.jpeg" alt="">
        <h1 style="font-family: 'Times New Roman', Times, serif;"><b>Giới thiệu</b></h1>
        </div>
    </div>

    <div class="maingioithieu">
        <ul>
            <h1 style="font-family: 'Times New Roman', Times, serif;" ><b style="color: #0A5C36;"><?php echo $a['tieudegioithieu'] ?></b></h1><br>
            <li style="font-family: 'Lora', serif;">
                    <?php ; 
                    $paragraphs = explode("\n", $a['baigioithieu']);
        
                    // Hiển thị từng đoạn trên trang web
                    foreach ($paragraphs as $paragraph) {
                        echo "<p>" . $paragraph . "</p>";
                    }
                    ?>
                </li>

            <li>
                <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $a['img_gioithieu'] ?>" height="500px" width="450px">
            </li>
            
            <div class="danhngon"><p style="font-family: 'Times New Roman', Times, serif;">
                <b>"Cây cối là ngôn ngữ của trái đất, một thông điệp từ tự nhiên về sự sống và hy vọng."</b> 
                <br><br>- Diane Dreher</p>
            </div>
        </ul>
    </div>
        
    </div>
                
</div>
