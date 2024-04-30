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

        // if(isset($_GET['phanloai'])){
        //     $c = $_GET['phanloai'];
        // }else{
        //     $c ='';
        // }

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
        elseif($a == 'quanlydonhang' && $b == 'them'){
            include("modules/quanlydonhang/xemdonhang.php");
        }
        elseif($a == 'quanlydonhang' && $b == 'xemchitiet'){
            include("modules/quanlydonhang/chitietdonhang.php");
        }
        elseif($a == 'quanlybaiviet' && $b == 'them'){
            include("modules/quanlybaiviet/them.php");
            include("modules/quanlybaiviet/lietke.php");
        }
        elseif($a == 'quanlybaiviet' && $b == 'sua'){
            include("modules/quanlybaiviet/sua.php");
            
        }
        elseif($a == 'chamsockhachhang' && $b == 'them'){
            include("modules/chamsockhachhang/xemlienhe.php");
            
        }
        
        else{
            include("modules/dashboard.php");
        }
    ?>
</div>