<?php 
    session_start();
    if(!isset($_SESSION['position'])){
        header('Location: ../pages/dangnhap.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/stylecp.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <title>Admin page</title>
</head>

<body>
    <h1>WELCOM TO ADMIN PAGE</h1>

<?php 
    include("config/config.php");
    include("modules/header.php");
    include("modules/menu.php");
    include("modules/main.php");
    include("modules/footer.php");
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</body>


<script type="text/javascript">
    $(document).ready(function(){
        thongke();
   var char =  new Morris.Area({
  
  element: 'chart',
  
//   data: [
//     { year: '2008', value: 20 },
//     { year: '2009', value: 10 },
//     { year: '2010', value: 5 },
//     { year: '2011', value: 5 },
//     { year: '2012', value: 20 }
//   ],
  
  xkey: 'date',
 
  ykeys: ['date','order', 'sales'],
  
  labels: ['Ngày', 'Đơn hàng', 'Doanh thu']
});
function thongke(){
    var text = '365 ngay';
    $('#text-date').text(text);
    $.ajax({
        url: "modules/thongke.php",
        method: "POST",
        dataType: "JSON",
        success: function(data){
            char.setData(data);
            $('#text-date').text(text);
        }
    });
}
});
</script>
</html>