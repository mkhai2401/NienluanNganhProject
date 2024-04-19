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

</body>

</html>