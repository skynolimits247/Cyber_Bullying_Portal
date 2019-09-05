<?php
session_start();
  if(isset($_POST) && isset($_POST['id'])){
    include 'db.inc.php';
    require '../PHPMailer-master/PHPMailerAutoload.php';

    $j=$_POST['id'];
    $sql="select * from contact where id ='$j'";
    $result=mysqli_query($conn, $sql);
    $resultCheck=mysqli_num_rows($result);
    $row=mysqli_fetch_row($result);
    $name = $row[0];
    $mailto = $row[1];
    $created_at = $row[7];
    $reply = $_POST['reply'];
    $z=$_POST['status'];
    $i=$_SESSION['logindetails']['uname'];
    $today = date("Y-m-d H:i:s");
    $j=$_POST['id'];
    $sql1="update contact set reply='$reply', replied_at='$today', reply_from='$i', status='$z' where id ='$j'";
    $mailSub = "ADMIN Cyber Bullying Portal";
    $mailMsg=$reply;
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "neelkantha.apartment@gmail.com";
   $mail ->Password = "Neelkantha@123";
   $mail ->SetFrom("neelkantha.apartment@gmail.com");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);
   if($mail->Send() && mysqli_query($conn, $sql1))
   {
     //print_r($mail);

       header("Location: ../uac_query.php?mailsent");
       exit();
   }
   else
   {
      //print_r($_POST['id']);
      //print_r($name);
      print_r($row[7]);
      //print_r($reply);
       //header("Location: ../uacquery.php?mailerr");
       //exit();
   }
 }else{
   //var_dump($_POST);
   header("Location: ../uacquery.php?returnfalse");
   exit();
 }


 ?>
