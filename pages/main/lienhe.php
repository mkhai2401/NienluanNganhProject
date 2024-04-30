<div class="wrapper">
    <div id="main">
    <div class="wallcommon">
        <div>
        <img src="images/lienhe.jpeg" alt="">
        <h1 style="font-family: 'Times New Roman', Times, serif;"><b>Liên hệ với chúng tôi</b></h1>
        </div>
    </div>

    </div>

    <div class="contentlienhe">

        <div class="thongtinlienhe">
            <h4 style="font-family: 'Times New Roman', Times, serif;"><b>Thông tin liên hệ</b></h4>
            <p class="cangiua"><hr></p>
            <ul>
                <li style="font-family: 'Times New Roman', Times, serif;">Địa chỉ: Hẻm 391, 5C - MiniHoanHao</li>
                <li style="font-family: 'Times New Roman', Times, serif;">Số điện thoại: 0123456789 - 0999999999</li>
                <li style="font-family: 'Times New Roman', Times, serif;">Email: email1234@gmail.com</li>
                <li style="font-family: 'Times New Roman', Times, serif;">Mở cửa: 8h - 20h</li>
            </ul>
        </div>

        <div class="formlienhe">
            <h4 style="font-family: 'Times New Roman', Times, serif;"><b>Gửi ý kiến</b></h4>
            <p class="cangiua"><hr></p>
            <form action="index.php?quanly=lienhe" method="post">
                <!-- <label for="name">Họ và Tên:</label><br> -->
                <input type="text" name="name" placeholder="Tên"><br>
                <!-- <label for="email">Email:</label><br> -->
                <input type="email" name="gmail" placeholder="Email"><br>
                <!-- <label for="message">Tin nhắn:</label><br> -->
                <textarea name="mess" rows="4" cols="50" placeholder="Lời nhắn của bạn..."></textarea><br>

                <input type="submit" name="gui" class="inputGui" value="Gửi">
                <?php 
                include('admincp/config/config.php');

                if (isset($_POST['gui']) && $_POST['gui']) {
                    $tenlh = $_POST['name'];
                    $gmail = $_POST['gmail'];
                    $loinhan = $_POST['mess'];
            
                    $sql = "INSERT INTO tbl_lienhe(tenlh,gmail,noidunglienhe) 
                    VALUE('".$tenlh."','".$gmail."','".$loinhan."')";
                    $a = mysqli_query($mysqli,$sql);
                   
                   
                        $_SESSION['thongbaolh'] = "Gửi thông tin thành công!
                        <br>Chúng tôi sẽ phản hồi cho bạn trong thời gian sớm nhất!";
                        // header('location: ../index.php?quanly=lienhe'); 
                }

                    if(isset($_SESSION['thongbaolh']) && ($_SESSION['thongbaolh'] != '')){
                        echo "<font color: green;>" .$_SESSION['thongbaolh']."</font>" ;
                        unset($_SESSION['thongbaolh']);
                    }
                ?>
            </form>
        </div>
    </div>
        
</div>

