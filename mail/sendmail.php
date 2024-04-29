<?php

  require("PHPMailer-master/src/PHPMailer.php");
  require("PHPMailer-master/src/SMTP.php");
  require("PHPMailer-master/src/Exception.php");

  class Mailer {
   public function dathangmail($tieude,$noidung,$maildathang){
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->CharSet = 'UTF8';
    $mail->IsSMTP(); // enable SMTP

    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);

    $mail->Username = "lmkhai1212@gmail.com";
    $mail->Password = "ygggakkigxwzlnvl";
    $mail->SetFrom("lmkhai1212@gmail.com");

    $mail->AddAddress($maildathang);

    $mail->Subject = $tieude;
    $mail->Body = $noidung;
    

   //  $mail->AddAddress("builehuuthang@gmail.com");

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }
     
     }
   }
?>