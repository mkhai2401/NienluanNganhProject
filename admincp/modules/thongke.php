<?php 
    include '../../admincp/config/config.php';
    require '../../carbon/autoload.php';
    use Carbon\Carbon;
    use Carbon\CarbonInterval;

    $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $a = $date;
    $b = Carbon::parse($a);
    $now = $b->format('d/m/Y');

    $c = Carbon::now('Asia/Ho_Chi_Minh')->subdays()->toDateString();
    $dat = Carbon::parse($c);
    $subdays = $dat->format('d/m/Y');

    $sql = "SELECT * FROM tbl_thongke ";
    // WHERE ngaydat BETWEEN '01/05/2023' AND '$now' ORDER BY id DESC
    $sql_query = mysqli_query($mysqli,$sql);

    while ($val = mysqli_fetch_array($sql_query)) {
        $chart_data[] = array(
            'date' => $val['ngaydat'],
            'order' => $val['sodonhang'],
            'sales' => $val['doanhthu']
        );
    }
    echo $data = json_encode($chart_data);

?>