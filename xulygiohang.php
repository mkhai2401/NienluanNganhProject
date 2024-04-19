<?php 
include 'admincp/config/config.php'; 

    session_start();
    ob_start();

    //THEM SP VAO GIO HANG 
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = array();
    if(isset($_POST['themgiohang']) && ($_POST['themgiohang']) ){
        $id = $_POST['idsp'];
        $hinhanh = $_POST['hinhanh'];
        $tensp = $_POST['tensp'];
        $gia = $_POST['gia'];
        
        if(isset($_POST['sl'])&&($_POST['sl']>0)){
            $sl = $_POST['sl'];
        }else{
            $sl = 1;
        }
        
        $fg = 0;
    //kiem tra san pham da them co ton tai trong gio hang hay khong
        $i = 0;
    foreach($_SESSION['giohang'] as $sp){
            if($sp[2]===$tensp){
                $slnew = $sl + $sp[4];
                if($slnew <20){
                    $_SESSION['giohang'][$i][4] = $slnew;
                    $fg=1;
                    break;
                }else{
                    $_SESSION['giohang'][$i][4] = 20;
                    $fg=1;
                    break; 
                }
            }
            $i++;
        }
        
    if($fg==0){
        $sp = array($id, $hinhanh, $tensp, $gia, $sl);
        array_push($_SESSION['giohang'], $sp);
    }

    header('location: xemgiohang.php');

    }

    //CAP NHAT SO LUONG SAN PHAM TRONG GIO HANG
    if(isset($_GET['cong'])&&($_GET['cong'])){ 
        $idsp=$_GET['cong'];
        $i=0;
        foreach ($_SESSION['giohang'] as $sl1) {
            if(($sl1[0]==$idsp) && $sl1[4]<20){
                $slnew = 1 + $sl1[4];
                $_SESSION['giohang'][$i][4] = $slnew;
                break;
            } $i++;
        }
        header('location: xemgiohang.php');
    }elseif (isset($_GET['tru'])&&($_GET['tru'])) {
        $idsp=$_GET['tru'];
        $i=0;
        foreach ($_SESSION['giohang'] as $sl1) {
            if($sl1[0]==$idsp && $sl1[4]>1){
                $slnew =  $sl1[4] - 1;
                $_SESSION['giohang'][$i][4] = $slnew;
                break;
            } $i++;
        }
        header('location: xemgiohang.php');
    }

                
                // THEM DON HANG
    if(isset($_POST['thanhtoan'])&&($_POST['thanhtoan'])){
        $hoten = $_POST['hoten'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $pttt = $_POST['pttt'];
        $tongdonhang = $_POST['tongdonhang'];
        $mdh ="5C".rand(0,999999);
                    
                    //tao don hang
        $sql_them = "INSERT INTO tbl_order(madh,tongdonhang,pttt,hoten,diachi,email,sdt) 
        VALUE('".$mdh."','".$tongdonhang."', '".$pttt."', '".$hoten."', '".$diachi."', '".$email."', '".$sdt."')";
        mysqli_query($mysqli,$sql_them);
        // $sp = array($id, $hinhanh, $tensp, $gia, $sl);
        if(isset($_SESSION['giohang']) && count($_SESSION['giohang'])>0){
            foreach($_SESSION['giohang'] as $item){
                $sql_themgiohang = "INSERT INTO btl_giohang(iddh,id_sp,soluong,dongia,tensp,img) 
                VALUE('".$mdh."','".$item[0]."', '".$item[4]."', '".$item[3]."', '".$item[2]."', '".$item[1]."')";
                mysqli_query($mysqli,$sql_themgiohang);
            }
        }
        
        header('Location:xemgiohang.php');
    }
    
    ?>

    