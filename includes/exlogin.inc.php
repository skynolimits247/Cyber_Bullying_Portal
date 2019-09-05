<?php
session_start();
if(isset($_POST['submit'])){
  include 'db.inc.php';

  $uname=mysqli_real_escape_string($conn, $_POST['uname']);
  $pass=mysqli_real_escape_string($conn, $_POST['pass']);
  if((empty($uname)) || (empty($pass))){
    header("Location: ../excounsellorsignup.php?login=erroremptyform");
    exit();
  }else{
    $sql = "select * from counsellor_info where user_name='$uname'";
    $result=mysqli_query($conn, $sql);
    $resultCheck=mysqli_num_rows($result);
    if($resultCheck<1){
      header("Location: ../excounsellorsignup.php?login=errornorec");
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
            'id' => $row['id']
         );

         $_SESSION['logindetails'] = $array;
        /*$_SESSION['uname']=$row['user_name'];
        $_SESSION['fname']=$row['fname'];
        $_SESSION['lname']=$row['lname'];
        $_SESSION['email']=$row['email'];
        $_SESSION['contact']=$row['contact_number'];
        $_SESSION['addrs']=$row['address'];*/
        header("Location: ../excounsellorhome.php?login=success");
        exit();
        //var_dump($_SESSION['logindetails']);

      }
      else{
        header("Location: ../excounsellorsignup.php?login=errorpassfail");
        exit();
      }
      }
    }
  }
}
else{
  header("Location; ../excounsellorsignup.php?login=error");
}
?>
