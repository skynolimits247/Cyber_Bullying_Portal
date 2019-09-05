<?php
if(isset($_POST['submit'])){
  include_once('db.inc.php');
  /*if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) { 
    $secret = "6LevClAUAAAAAG0PsmHgA6LYYpQvCJZlwa1saHnB";
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
    //$rsp = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&captcha=$captcha&remoteip=$ip";
    
    $arr = json_decode($rsp, TRUE);
    if($arr['success']) {*/
  $fname =mysqli_real_escape_string($conn, $_POST['fname']);
  $lname =mysqli_real_escape_string($conn, $_POST['lname']);
  $uname =mysqli_real_escape_string($conn, $_POST['uname']);
  $contact =mysqli_real_escape_string($conn, $_POST['contact']);
  $email =mysqli_real_escape_string($conn, $_POST['email']);
  $addrs =mysqli_real_escape_string($conn, $_POST['addrs']);
  $pass =mysqli_real_escape_string($conn, $_POST['pass']);
  $conpass =mysqli_real_escape_string($conn, $_POST['conpass']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);

  if((empty($fname)) || (empty($lname)) || (empty($uname)) || (empty($contact)) || (empty($email)) || (empty($addrs)) || (empty($pass)) || (empty($conpass)) || (empty($gender))){
      header("Loaction: ../login.php?signup=empty");
      exit();
  } else{
    
        $sql = "select * from user_info where user_name='$uname';";
        $result = mysqli_query($conn, $sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0) {
          header("Location: ../login.php?signup=usernametaken");
          exit();
        }else{
          /*$hashpwd = password_hash($pwd, PASSWORD_DEFAULT);*/
          $hashpwd = base64_encode($pass);

          $sql = "insert into user_info(user_name, email, f_name, l_name,gender, contact_number, password, address) values('$uname','$email','$fname','$lname','$gender','$contact','$hashpwd','$addrs');";
          mysqli_query($conn, $sql);
          header("Location: ../login.php?signup=success");
          exit();

        }
      
    }
  /*}
  } else {
      header("Location: ../login.php?signup=errorspamfail");
          exit();
    }*/
  
}
else{
  header("Location: ../login.php");
  exit();
}
?>
