<?php
    include '../../config/config.php';
    require '../../../carbon/autoload.php';
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $a = $date;
    $b = Carbon::parse($a);
    $now = $b->format('d/m/Y');

    if(isset($_GET['madh'])){
        $madh = $_GET['madh'];
        $sql = "UPDATE tbl_order SET trangthai=1 WHERE madh = '".$madh."'";
        $query = mysqli_query($mysqli,$sql);

        // $sql_lietke_dh = "SELECT * FROM btl_giohang, sanpham WHERE btl_giohang.id_sp = sanpham.id_sp 
        // AND btl_giohang.iddh = '".$madh."' ORDER BY btl_giohang.id DESC ";
        // $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);

        $sql_lietke_dh = "SELECT * FROM tbl_order WHERE madh = '".$madh."' ORDER BY id DESC ";
        $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);

        $sql_thongke = "SELECT * FROM tbl_thongke WHERE ngaydat ='".$now."'";
        $query_thongke = mysqli_query($mysqli,$sql_thongke);

        $luongmua =0;
        $doanhthu =0;
        while ($row = mysqli_fetch_array($query_lietke_dh)) {
            // $luongmua += $row['soluong'];
            // $doanhthu += $row['dongia'];
            $doanhthu = $doanhthu + $row['tongdonhang'];
        }

        if (mysqli_num_rows($query_thongke) == 0) {
            $luongban = $luongmua;
            $doanhthu = $doanhthu;
            $donhang = 1;
            $sql_update_thongke = mysqli_query($mysqli,
            "INSERT INTO tbl_thongke(ngaydat,doanhthu,sodonhang) VALUE('$now','$doanhthu','$donhang')");
        }elseif (mysqli_num_rows($query_thongke) != 0) {
            while($row_tk = mysqli_fetch_array($query_thongke)){
                $doanhthu = $doanhthu + $row_tk['doanhthu'];
                $donhang = $row_tk['sodonhang'] + 1;

                $sql_update_thongke = mysqli_query($mysqli,"UPDATE tbl_thongke 
                SET doanhthu = '$doanhthu', sodonhang = '$donhang' WHERE ngaydat = '$now' ") ;
            }
        }


        header('location: ../../index.php?action=quanlydonhang&query=them');
    }
    
?>