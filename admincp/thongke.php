<?php 
    require('../carbon/autoload.php');
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    // printf("Now: %s", Carbon::now('Asia/Ho_Chi_Minh'));

    
    // printf("1 day: %s", CarbonInterval::day()->forHumans());
?>
<br>
<?php
    $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
$a = $date;
$b = Carbon::parse($a);
$now = $b->format('d/m/Y');

// In ra ngày đã được định dạng
echo $now ."<br>"; // Kết quả: 28/04/2024

$c = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
$dat = Carbon::parse($c);
$subdays = $dat->format('d-m-Y');

echo $subdays; // Kết quả: 27/04/2024
?>