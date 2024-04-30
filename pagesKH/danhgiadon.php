<h2 style="font-family: 'Times New Roman', Times, serif; color:#0A5C36;margin-top:50px">Viết đánh giá</h2>
<?php 
    include 'admincp/config/config.php';
    require 'carbon/autoload.php';
    use Carbon\Carbon;
    use Carbon\CarbonInterval;

    if(isset($_GET['iddh']) && isset($_SESSION['user'])){
        $madh = $_GET['iddh'];
        $iduser = $_SESSION['user'];

        $sql_user = "SELECT * FROM users WHERE id_user = '".$iduser."'";
        $u = mysqli_query($mysqli,$sql_user);
        $user = mysqli_fetch_array($u);

        $sql_cart = "SELECT * FROM btl_giohang WHERE iddh = '".$madh."'";
        $rowc = mysqli_query($mysqli,$sql_cart);

   
?>

<div>
    <h4 style="font-family: 'Times New Roman', Times, serif; color:#0A5C36;margin-top:50px;margin-left:10%">5C Garden Xin cảm ơn quý khách đã mua hàng <br>
    Hãy cho chúng tôi ý kiến về đơn hàng của bạn!</h4>
    <!-- <h5>Mã đơn hàng <?php echo $madh ?></h5> 
    <h5>Tên khách hàng <?php echo $user['hotenkh'] ?></h5> -->
    <table class="tablecard" >
        <tr> 
            <th>STT</th>
            <th width="120px"">Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
    <?php
        $i = 0;
        while( $row_cart = mysqli_fetch_array($rowc)){
            $i++;
            $t = $row_cart['soluong']*$row_cart['dongia'];
        ?>

        <tr >
            <td><?php echo $i ?></td>
            <td height="120px"><img src="<?php echo $row_cart['img']?>" height="100px"> </td>
            <td> <?php echo $row_cart['tensp'] ?> </td>
            <td> <?php echo number_format($row_cart['dongia'],0,',','.'). ' VNĐ'?> </td> 
            <td> <?php echo $row_cart['soluong'] ?> </td>
            <td> <?php echo number_format($t,0,',','.'). ' VNĐ' ?> </td>
        </tr>
        <?php 
             }
        ?>
    </table>

    <?php 
    } 
    ?>

    <form action="index.php?quanly=danhgia" method="post">
    <input type="hidden" name="tenkh" value="<?php echo $user['hotenkh'] ?>">
    <input type="hidden" name="madh" value="<?php echo $madh ?>">
    <textarea style="margin-left: 50px;border:1.5px solid#0A5C36; border-radius:15px;padding:10px" name="danhgia" rows="4" cols="50" placeholder="Nhận xét của bạn về đơn hàng..."></textarea>
    <br><input style="margin-left: 50px;margin-top:10px;background-color:#75A47F; 
            color:white;
            border-radius:10px;
            border: 1px solid #75A47F;" 
    type="submit" name="thuchien" value="Thực hiện">
    </form>
    
</div>

<?php 
    if (isset($_POST['thuchien']) && ($_POST['thuchien'])) {
        $tenkh = $_POST['tenkh'];
        $madh = $_POST['madh'];
        $noidung = $_POST['danhgia'];
        
        $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $a = $date;
        $b = Carbon::parse($a);
        $now = $b->format('d/m/Y');

        $sql_them = "INSERT INTO tbl_danhgia(tenkh,madh,noidungdanhgia,tgdanhgia) 
            VALUE('".$tenkh."', '".$madh."', '".$noidung."', '".$now."')";
        mysqli_query($mysqli,$sql_them);

        $sql_cntrangthai = "UPDATE tbl_order SET trangthai=2 WHERE madh= '".$madh."'";
        $query = mysqli_query($mysqli,$sql_cntrangthai);
        header('location: index.php?quanly=donhang');
    }
?>