<div class="main">
    <?php
        if(isset($_GET['quanly'])){
            $a = $_GET['quanly'];
        }else {
            $a = '';
        }

        if($a == 'gioithieu'){
            include("main/gioithieu.php");
        }elseif($a == 'tintuc'){
            include("main/tintuc.php");
        }elseif($a == 'lienhe'){
            include("main/lienhe.php");
        }elseif($a== 'danhmuccay'){
            include("main/danhmuccay.php");
        }elseif($a == 'sanpham'){
            include("main/sanpham.php");
        } else{
            include("main/trangchu.php");
        }
        
       
        
    ?>

</div>