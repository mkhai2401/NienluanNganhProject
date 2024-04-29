<div class="main">
    <?php
        if(isset($_GET['quanly'])){
            $a = $_GET['quanly'];
        }else{
        
            $a = '';
        }
    
        // if(isset($_GET['thongtin'])){
        //         $thongtin = $_GET['thongtin'];
        //     }else{
        //         $thongtin = '';
        //     }

    if(isset($_GET['thongtin']) && isset($_GET['matkhau'])){
            $thongtin = $_GET['thongtin'];
            $matkhau = $_GET['matkhau'];
    }else{
            $thongtin = '';
            $matkhau = '';
        }
            
        

        if($a == 'gioithieu'){
            include("pages/main/gioithieu.php");
        }elseif($a == 'tintuc'){
            include("pages/main/tintuc.php");
        }elseif($a == 'lienhe'){
            include("pages/main/lienhe.php");
        }elseif($a== 'danhmuccay'){
            include("pages/main/danhmuccay.php");
        }elseif($a == 'sanpham'){
            include("pages/main/sanpham.php");
        }elseif($a == 'giohang'){
            include("pages/main/giohang.php");
        }elseif ($a == 'thongtin') {
            include("pagesKH/thongtin.php");
        }elseif ($a == 'donhang') {
            include("pagesKH/donhang.php");
        }
        elseif ( $thongtin== 1  && $matkhau == 0) {
            include("pagesKH/xulythongtin.php");
        }elseif ($thongtin == 0 && $matkhau == 1) {
            include("pagesKH/xulymatkhau.php");
        }
        else{
            include("pages/main/trangchu.php");
        }  
    ?>
    <a class="gototop" href="#"><i class="fa-solid fa-angle-up" style="color: #0A5C36;"></i></a>
    <a class="giohang" href="xemgiohang.php"><i class="fa-solid fa-cart-shopping" style="color:#0A5C36;"></i></a>
</div>