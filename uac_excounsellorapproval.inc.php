<?php
session_start();
if(isset($_POST['submit']) && isset($_SESSION['logindetails'])){
  include 'db.inc.php';

  $id=mysqli_real_escape_string($conn, $_POST['id']);
  $user_name =mysqli_real_escape_string($conn, $_POST['user_name']);
  $f_name =mysqli_real_escape_string($conn, $_POST['f_name']);
  $l_name=mysqli_real_escape_string($conn, $_POST['l_name']);
  $email =mysqli_real_escape_string($conn, $_POST['email']);
  $contact_no=mysqli_real_escape_string($conn, $_POST['contact_no']);
  $experience =mysqli_real_escape_string($conn, $_POST['experience']);
  $certifications =mysqli_real_escape_string($conn, $_POST['certifications']);
  $address=mysqli_real_escape_string($conn, $_POST['address']);
  $organization =mysqli_real_escape_string($conn, $_POST['organization']);
  $fees =mysqli_real_escape_string($conn, $_POST['fees']);
  $designation=mysqli_real_escape_string($conn, $_POST['designation']);
  $status =mysqli_real_escape_string($conn, $_POST['status']);
  $gender =mysqli_real_escape_string($conn, $_POST['gender']);
var_dump('hjgjg');

  if((empty($user_name)) || (empty($id)) ){
      header("Loaction: ../uac_counsellorconsole.php?form=empty");
      exit();
  } else{
    var_dump($POST);
      //$today = date("Y-m-d H:i:s");
    //$j=$_SESSION['logindetails']['uname'];
    $sql1="UPDATE  counsellor_info SET status = '$status', contact_no='$contact_no', email='$email',fees='$fees' WHERE id='$id';";
    if(mysqli_query($conn, $sql1)){
    header("Location: ../uac_counsellorconsole.php?closed=success");
    exit();
  }else{
    header("Location: ../uac_counsellorconsole.php?sql=err");
    var_dump($sql1);
    var_dump(mysqli_query($conn, $sql1));
    //exit();
  }
  }
}
else{
header("Location: ../uac_counsellorconsolel.php?returnfalse");
exit();
}
?>
