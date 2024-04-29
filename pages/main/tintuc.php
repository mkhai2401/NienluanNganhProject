<?php
    include 'admincp/config/config.php';

    $sql = "SELECT * FROM tbl_baiviet WHERE phanloai=0 ORDER BY id DESC";
    $query_sql = mysqli_query($mysqli,$sql);
    // $a = mysqli_fetch_array($query_sql);
?>
<div class="wrapper">

    <div class="wallcommon">
        <div>
        <img src="images/tintuc22.webp" alt="">
        <h1 style="font-family: 'Times New Roman', Times, serif;"><b>Tin tức</b></h1>
        </div>
    </div>

    <?php 
    $i = 0;
    while ($a = mysqli_fetch_array($query_sql)) {   
        if($i % 2 == 0){
     ?>
        <div class="tintuc">
            <ul style="background-color: #E8DFCA; padding: 20px; border-radius: 10px;">
                <h1 style="font-family: 'Times New Roman', Times, serif;" ><b style="color: #0A5C36;"><?php echo $a['tieudetintuc'] ?></b></h1><br>
                <li >
                    <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $a['img_tintuc'] ?>" width="90%" height="450px" style="border-radius: 10px;">
                </li>
                <li style="font-family: 'Lora', serif;">
                    <?php ; 
                    $paragraphs = explode("\n", $a['tintuc']);
        
                    // Hiển thị từng đoạn trên trang web
                    foreach ($paragraphs as $paragraph) {
                        echo "<p>" . $paragraph . "</p>";
                    }
                    ?>
                </li>
            </ul>           
        </div>
        <br>
<?php 
    $i++;
    }elseif($i % 2 != 0){
?>      
        <div class="tintuc" > 
            <ul style=" background-color: #E8DFCA;border-radius: 10px;padding: 20px;">
            <h1 style="font-family: 'Times New Roman', Times, serif;color: #0A5C36; right: inherit;" ><b><?php echo $a['tieudetintuc'] ?></b></h1><br>
                <li style="font-family: 'Lora', serif;">
                <?php ; 
                    $paragraphs = explode("\n", $a['tintuc']);
        
                    // Hiển thị từng đoạn trên trang web
                    foreach ($paragraphs as $paragraph) {
                        echo "<p>" . $paragraph . "</p>";
                    }
                    ?>
                </li>
                <li style="padding-left:50px ;">
                    <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $a['img_tintuc'] ?>" alt="Hình ở đây" width="100%" height="450px" style="border-radius: 10px;">
                </li>
            </ul>           
        </div>
        <br>
                    
<?php 
    $i--;
    }
} ?>                  
                    
                    
</div>
                