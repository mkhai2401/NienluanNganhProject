<?php
    session_start();
    ob_start();
    //lay du lieu tu form
    // if(!isset($_SESSION['giohang'])) $_SESSION['giohang'] = array();
    // if(isset($_POST['themgiohang']) && ($_POST['themgiohang']) ){
    //     $id = $_POST['idsp'];
    //     $hinhanh = $_POST['hinhanh'];
    //     $tensp = $_POST['tensp'];
    //     $gia = $_POST['gia'];
        
    //     if(isset($_POST['sl'])&&($_POST['sl']>0)){
    //         $sl = $_POST['sl'];
    //     }else{
    //         $sl = 1;
    //     }
        
    //     $fg = 0;
    //kiem tra san pham da them co ton tai trong gio hang hay khong
    //     $i = 0;
    // foreach($_SESSION['giohang'] as $sp){
    //         if($sp[2]===$tensp){
    //             $slnew = $sl + $sp[4];
    //             $_SESSION['giohang'][$i][4] = $slnew;
    //             $fg=1;
    //             break;
    //         }
    //         $i++;
    //     }
        
    // if($fg==0){
    //     $sp = array($id, $hinhanh, $tensp, $gia, $sl);
    //     array_push($_SESSION['giohang'], $sp);
    // }

        
    
    // header('location: xemgiohang.php');
    // }

    if(isset($_SESSION['giohang'])){
        if(isset($_GET['id'])){
            array_splice($_SESSION['giohang'],$_GET['id'],1);
            header('location: xemgiohang.php');
        }else{
            unset($_SESSION['giohang']);
        header('location: xemgiohang.php');
        }
    }
    
?>
