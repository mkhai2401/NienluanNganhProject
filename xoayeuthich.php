<?php
session_start();
ob_start();
if (isset($_SESSION['yeuthichsp'])) {
    if (isset($_GET['id'])) {
        array_splice($_SESSION['yeuthichsp'], $_GET['id'], 1);
        header('location: xemyeuthich.php');
    } else {
        unset($_SESSION['yeuthichsp']);
        header('location: xemyeuthich.php');
    }
}
?>