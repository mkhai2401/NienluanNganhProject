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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"> -->
    <title>Admin page</title>
</head>

<body>
    
    
    <?php 
    include("config/config.php");
    
    // include("modules/menu.php");
    ?>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white px-2" id="sidebar-wrapper">
            <div class="sidebar-heading py-4 fs-4 fw-bold second-text text-uppercase border-bottom"><a href="../indexkh.php"><img width="20%" style=" border-radius: 100%;" src="../images/logo11.jpg"></a> ADMIN PAGE</div>
            <div class="list-group list-group-flush my-3">
                <a style="color:aliceblue;font-family: Times New Roman, Times, serif;" href="index.php?action=quanlythongke&query=them" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-chart-simple" style="color: #ffffff;"></i> Thống kê doanh thu</a>
                <a style="color:aliceblue;font-family: Times New Roman, Times, serif;" href="index.php?action=quanlydanhmuc&query=them" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-list"></i> Quản lý danh mục</a>
                <a style="color:aliceblue;font-family: Times New Roman, Times, serif;" href="index.php?action=quanlysanpham&query=them" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-brands fa-product-hunt"></i> Quản lý sản phẩm</a>
                <a style="color:aliceblue;font-family: Times New Roman, Times, serif;" href="index.php?action=quanlynguoidung&query=them" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-users"></i> Quản lý người dùng</a>
                <a style="color:aliceblue;font-family: Times New Roman, Times, serif;" href="index.php?action=quanlybaiviet&query=them" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-pencil"></i> Quản lý bài viết</a>
                <a style="color:aliceblue;font-family: Times New Roman, Times, serif;" href="index.php?action=quanlydonhang&query=them" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-shopping-cart me-2"></i> Quản lý đơn hàng</a>
                <a style="color:aliceblue;font-family: Times New Roman, Times, serif;" href="index.php?action=chamsockhachhang&query=them" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-square-envelope"></i> Chăm sóc khách hàng</a>
                <?php
                include("modules/header.php");
                ?>
            </div> 
        </div>
</div>
    <div id="page-content-wrapper">
        
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4"> -->
            <!-- <h1>WELCOM TO ADMIN PAGE</h1> -->
            <?php
    
    include("modules/main.php");
    ?>
<!-- </nav> -->
<!-- include("../admincp/modules/main.php") -->
</div>

<?php
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
            
             xkey: 'date',
            
            ykeys: ['date', 'order', 'sales'],
            
            labels: ['Ngày','Đơn hàng', 'Doanh thu']
        });
       
            // $.ajax({
            //     url: "modules/thongke.php",
            //     method: "POST",
            //     dataType: "JSON",
                
            //     success: function(date){
            //         char.setData(date);
            //         $('#text-date').text(text);
            //     }
            // });
       
        
        
        function thongke(){
            var text = ':';
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
<?php
$sql = "SELECT * FROM tbl_thongke  ORDER BY id DESC";
// 
$sql_query = mysqli_query($mysqli,$sql);
$val = mysqli_fetch_array($sql_query);
$q=$val['doanhthu'];
?>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>