<div class="main">
    <?php
        if(isset($_GET['quanly'])){
            $a = $_GET['quanly'];
        }else {
            $a = '';
        }
        
        if(isset($_GET['thongtin'])){
                $thongtin = $_GET['thongtin'];
                // if($thongtin == 1){
                //     include 'pagesKH/xulythongtin.php';
                // }
            }else{
                $thongtin = '';
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
        }elseif ($thongtin == 1) {
            include("pagesKH/xulythongtin.php");
        }
        else{
            include("pages/main/trangchu.php");
        }  
    ?>
    <a class="gototop" href="#"><i class="fa-solid fa-angle-up" style="color: #0A5C36;"></i></a>
    <a class="giohang" href="xemgiohang.php"><i class="fa-solid fa-cart-shopping" style="color:#0A5C36;"></i></a>
</div>