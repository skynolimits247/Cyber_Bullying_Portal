<?php
session_start();
if(isset($_POST['submit']) && isset($_SESSION['logindetails'])){
  include 'db.inc.php';
  $id=mysqli_real_escape_string($conn, $_POST['id']);
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
      header("Loaction: ../uac_editpro.php?signup=empty");
      exit();
  } else{
    if((!preg_match("/^[a-zA-Z]*$/",$fname)) || (!preg_match("/^[a-zA-Z]*$/",$lname))){
      header("Location: ../uac_editpro.php?signup=invalid");
      exit();
    }else{
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../uac_editpro.php?signup=email");
        exit();
      }else{
        $sql = "select * from uac_info where username='$uname';";
        $result = mysqli_query($conn, $sql);
        $resultCheck=mysqli_num_rows($result);
        $row=mysqli_fetch_row($result);
        if($resultCheck>0 && $row[0] != $id ) {
          header("Location: ../uac_editpro.php?signup=usernametaken");
          exit();
          //exit();
        }else{
          /*$hashpwd = password_hash($pwd, PASSWORD_DEFAULT);*/
          $hashpwd = base64_encode($pass);
    $sql = "insert into user_info(user_name, email, f_name, l_name,gender, contact_number, password, address, id) values('$uname','$email','$fname','$lname','$gender','$contact','$hashpwd','$addrs','$id')";

    $sql1="update uac_info set username = '$uname', email='$email', f_name='$fname', l_name='$lname',gender='$gender', contact_no='$contact', password='$hashpwd', address='$addrs' where id='$id'";
    $sql2="delete from user_info where id='$id'";
      //var_dump($uname);
    if(mysqli_query($conn, $sql1)){
    header("Location: ../uac_home.php?signup=success");
    //var_dump($uname);
    exit();
  }else{
    header("Location: ../uac_editpro.php?sql=err");
    exit();
  }

  }
}
}
}

}
else{
header("Location: ../uac_home.php");
exit();
}
?>
