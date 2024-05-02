<?php
    include('../../config/config.php');
   
    $taikhoan = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $gmail = $_POST['gmail'];
    $hoten = $_POST['hoten'];
    $diachi = $_POST['diachi'];
    if(isset($_POST['themnguoidung'])){
    
    $sqlkd= mysqli_query($mysqli, "INSERT INTO users(username, passwork, hotenkh, gmail, diachi,position) 
    VALUE('" . $taikhoan . "', '" . $matkhau . "', '" . $hoten . "', '" . $gmail . "', '" . $diachi . "','" . 2 . "') " );
    
    if($sqlkd){
     header('Location:../../index.php?action=quanlynguoidung&query=them'); 
    }
         
 }
    //SỬA
    else if(isset($_POST['suanguoidung'])){
        // Sử dụng tên người dùng để xác định người dùng cần chỉnh sửa
            $id = $_POST['id_user'];
            $taikhoan = $_POST['username'];
            $matkhau = $_POST['password'];
            $gmail = $_POST['gmail'];
            $diachi = $_POST['diachi'];
            $tennv = $_POST['hotenkh'];
            
            // Cập nhật thông tin người dùng trong cơ sở dữ liệu
            $sql_sua_nguoidung = "UPDATE users SET 
                username = '".$taikhoan."',
                passwork = '".$matkhau."',
                hotenkh = '".$tennv."',
                gmail = '".$gmail."',
                diachi = '".$diachi."'
                WHERE id_user = '".$id."' ";
                
                // Thực thi truy vấn SQL
                $query_sua_nguoidung = mysqli_query($mysqli, $sql_sua_nguoidung);
                
                // Kiểm tra và chuyển hướng sau khi cập nhật
                if($query_sua_nguoidung) {
                    header('Location: ../../index.php?action=quanlynguoidung&query=them');
                    exit; // Kết thúc việc thực thi file sau khi chuyển hướng
                } else {
                    echo "Có lỗi xảy ra khi cập nhật thông tin người dùng.";
                }
        
    }
    //XÓA
    else{
        $username = $_GET['user_name'];
        $sql_xoa = "DELETE FROM users WHERE username='".$username."' ";
        mysqli_query($mysqli,$sql_xoa);
        header('Location:../../index.php?action=quanlynguoidung&query=them');
    }
?>