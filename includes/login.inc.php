<?php
session_start();
if(isset($_POST['submit'])){
  include 'db.inc.php';
  /*if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) { 
    $secret = "6LevClAUAAAAAG0PsmHgA6LYYpQvCJZlwa1saHnB";
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
    //$rsp = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&captcha=$captcha&remoteip=$ip";
    
    $arr = json_decode($rsp, TRUE);
    if($arr['success']) {*/
  $uname=mysqli_real_escape_string($conn, $_POST['uname']);
  $pass=mysqli_real_escape_string($conn, $_POST['pass']);
  if((empty($uname)) || (empty($pass))){
    header("Location: ../login.php?login=erroremptyform");
    exit();
  }else{
    $sql = "select * from user_info where user_name='$uname'";
    $result=mysqli_query($conn, $sql);
    $resultCheck=mysqli_num_rows($result);
    if($resultCheck<1){
      header("Location: ../login.php?login=errornorec");
      exit();
    }else{
      if($row = mysqli_fetch_assoc($result)){
      /*$hashpwdcheck = password_verify($pass , $row['password']);*/
      if(base64_encode($pass) == $row['password']){
        //login in the user here
        $array = array(
            'uname' => $row['user_name'],
            'fname' => $row['f_name'],
            'lname' => $row['l_name'],
            'email' => $row['email'],
            'contact' => $row['contact_number'],
            'addrs' => $row['address'],
            'status' => $row['staff_status'],
            'id' => $row['id'],
            'status' => $row['staff_status']
         );

         $_SESSION['logindetails'] = $array;
        
        header("Location: ../index.php?login=success");
        exit();
        //var_dump($_SESSION['logindetails']);

      }
      else{
        header("Location: ../login.php?login=errorpassfail");
        exit();
      }
      }
      }
    }
  /*} else {
    header("Location: ../login.php?login=errorspamfail");
        exit();
  }
  }*/
}
else{
  header("Location; ../login.php?login=error");
}
?>
