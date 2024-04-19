<?php 
    $mysqli = new mysqli("localhost","root","","NienLuanNganhProject");

    // Check connection
    if ($mysqli -> connect_errno) {
      echo "Kết nối không thành công" . $mysqli->connect_error;
      exit();
    }

//    function connectdtb(){ 
// $servername = "localhost";
// $username = "root";
// $password = "";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=NienLuanNganhProject", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   // echo "Connected successfully";
// } catch(PDOException $e) {
//   // echo "Connection failed: " . $e->getMessage();
  
// }return $conn;
// }
?>