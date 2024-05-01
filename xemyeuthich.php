<?php
session_start();
include 'admincp/config/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../images/logo11.jpg" type="images/x-icon">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Cây kiểng 5C</title>
</head>

<?php
include 'admincp/config/config.php';

if (isset($_SESSION['position']) && ($_SESSION['position'] == 3)) {
  include("pagesKH/headerkh.php");
  include("pagesKH/menukh.php");
} elseif (!isset($_SESSION['position'])) {
  unset($_SESSION['position']);
  include("header.php");
  include('menu.php');
}

if (isset($_SESSION['yeuthichsp'])) {
  // echo var_dump($_SESSION['giohang']);   
?>

  <br>
  <h2 style="font-family: 'Times New Roman', Times, serif; color:#0A5C36 ;"><b>SẢN PHẨM ĐÃ THÍCH</b></h2>
  <br><br>
  <table class="tablecard" border="1">
    <tr>
      <th>STT</th>
      <th width="50px" , height="50px">Hình ảnh</th>
      <th>Tên sản phẩm</th>
      <th>Giá</th>
      <th>Xóa</th>
    </tr>

    <?php
    $i = 0;
    foreach ($_SESSION['yeuthichsp'] as $sp) {
    ?>
      <tr>
        <td><?php echo $i + 1 ?></td>
        <td width="50px" , height="50px"><img width="100px" src="<?php echo $sp[1] ?>"> </td>
        <td><?php echo $sp[2] ?></td>
        <td><?php echo number_format($sp[3], 0, ',', '.') . ' VNĐ' ?></td>
        <td><a href="xoayeuthich.php?id=<?php echo $i ?>"><i class="fa-solid fa-trash" style="color: #50623A;"></i></a></td>
      </tr>

    <?php
      $i++;
    }
    // 
    ?>
  </table>
  <a href="xoayeuthich.php" style="text-decoration: none; color:#75A47F;"><i class="fa-solid fa-trash" style="color: #75A47F;"></i> Xóa tất cả </a>



  
<?php
}else{
  echo "Danh sách yêu thích trống!";
}
include 'footer.php';
?>



</html>