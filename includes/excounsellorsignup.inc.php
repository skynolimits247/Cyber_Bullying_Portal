<?php
if(isset($_POST['submit'])){
  include_once('db.inc.php');

  $fname =mysqli_real_escape_string($conn, $_POST['fname']);
  $lname =mysqli_real_escape_string($conn, $_POST['lname']);
  $uname =mysqli_real_escape_string($conn, $_POST['uname']);
  $contact =mysqli_real_escape_string($conn, $_POST['contact']);
  $email =mysqli_real_escape_string($conn, $_POST['email']);
  $addrs =mysqli_real_escape_string($conn, $_POST['addrs']);
  $pass =mysqli_real_escape_string($conn, $_POST['pass']);
  $conpass =mysqli_real_escape_string($conn, $_POST['conpass']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);

  $experience =  mysqli_real_escape_string($conn, $_POST['experience']);
  $certification =  mysqli_real_escape_string($conn, $_POST['certification']);
  $organization =  mysqli_real_escape_string($conn, $_POST['organization']);
  $fees =  mysqli_real_escape_string($conn, $_POST['fees']);
  $designation =  mysqli_real_escape_string($conn, $_POST['designation']);
  if((empty($fname)) || (empty($lname)) || (empty($uname)) || (empty($contact)) || (empty($email)) || (empty($addrs)) || (empty($pass)) || (empty($conpass)) || (empty($gender)) || (empty($contact))
  || (empty($experience)) || (empty($certification)) || (empty($organization)) || (empty($designation)) || (empty($fees)) ){
      header("Loaction: ../excounsellorsignup.php?signup=empty");
      exit();
  } else{
    if((!preg_match("/^[a-zA-Z]*$/",$fname)) || (!preg_match("/^[a-zA-Z]*$/",$lname))){
      header("Location: ../excounsellorsignup.php?signup=invalid");
      exit();
    }else{
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../excounsellorsignup.php?signup=email");
        exit();
      }else{
        $sql = "select * from counsellor_info where user_name='$uname';";
        $result = mysqli_query($conn, $sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0) {
          header("Location: ../excounsellorsignup.php?signup=usernametaken");
          exit();
        }else{
          /*$hashpwd = password_hash($pwd, PASSWORD_DEFAULT);*/
          $hashpwd = base64_encode($pass);

          $sql1 = "insert into counsellor_info(user_name, email, f_name, l_name,gender, contact_no, password, address, experience, certifications, organization, fees, designation) values
                            ('$uname','$email','$fname','$lname','$gender','$contact','$hashpwd','$addrs', '$experience', '$certification', '$organization', '$fees', '$designation');";
          if(mysqli_query($conn, $sql1)){
          header("Location: ../excounsellorsignup.php?signup=success");
          exit();
        }else{
          var_dump($sql1);

          //header("Location: ../excounsellorsignup.php?sqlerr");
          //exit();
        }

        }
      }
    }
  }

}
else{
  header("Location: ../excounsellorsignup.php");
  exit();
}
?>
