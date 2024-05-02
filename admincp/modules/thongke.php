<?php 
    include '../../admincp/config/config.php';
    require '../../carbon/autoload.php';
    use Carbon\Carbon;
    use Carbon\CarbonInterval;

    // if(isset($_POST['thoigian'])){
    //     $thoigian = $_POST['thoigian'];
    // }else{
    //     $thoigian='';
    //         $c = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    //         $dat = Carbon::parse($c);
    //     $subdays = $dat->format('d/m/Y');
    // }

    // if($thoigian =='7ngay'){
    //     $c = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
    //         $dat = Carbon::parse($c);
    //     $subdays = $dat->format('d/m/Y');
    // }elseif($thoigian =='30ngay'){
    //     $c = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
    //         $dat = Carbon::parse($c);
    //     $subdays = $dat->format('d/m/Y');
    // }elseif($thoigian =='1ngay'){
    //     $c = Carbon::now('Asia/Ho_Chi_Minh')->subdays()->toDateString();
    //         $dat = Carbon::parse($c);
    //     $subdays = $dat->format('d/m/Y');
    // }elseif($thoigian =='365ngay'){
    //     $c = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    //         $dat = Carbon::parse($c);
    //     $subdays = $dat->format('d/m/Y');
    // }

    $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $a = $date;
    $b = Carbon::parse($a);
    $now = $b->format('d/m/Y');

    $c = Carbon::now('Asia/Ho_Chi_Minh')->subdays(5)->toDateString();
    $dat = Carbon::parse($c);
    $subdays = $dat->format('d/m/Y');

    $sql = "SELECT * FROM tbl_thongke WHERE id BETWEEN '0' AND '20' ORDER BY id DESC";
     
    $sql_query = mysqli_query($mysqli,$sql);

    while ($val = mysqli_fetch_array($sql_query)) {
        $chart_data[] = array(
            'date' => $val['ngaydat'],
            'order' => $val['sodonhang'],
            'sales' => $val['doanhthu']
        );

       
    }
    // echo ;
 echo $data = json_encode($chart_data);
    

?>