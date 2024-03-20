<div></div>
<div class="main">
    <?php 
        if(isset($_GET['action'] ) && $_GET['query']){
            $a = $_GET['action'];
            $b = $_GET['query'];
        }else{
            $a = '';
            $b = '';
        }

        if($a == 'quanlydanhmuc' && $b == 'them'){
            include("modules/quanlydanhmuc/them.php");
            include("modules/quanlydanhmuc/lietke.php");
        }
        elseif($a == 'quanlydanhmuc' && $b == 'sua'){
            include("modules/quanlydanhmuc/sua.php");
        }
        elseif($a == 'quanlysanpham' && $b == 'them'){
            include("modules/quanlysanpham/them.php");
            include("modules/quanlysanpham/lietke.php");
        }
        elseif($a == 'quanlysanpham' && $b == 'sua'){
            include("modules/quanlysanpham/sua.php");
        }
        
        else{
            include("modules/dashboard.php");
        }
    ?>
</div>