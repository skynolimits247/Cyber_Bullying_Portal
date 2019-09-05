<?php
session_start();
if(isset($_POST['submit']) && isset($_SESSION['logindetails'])){
  include 'db.inc.php';
  $id=mysqli_real_escape_string($conn, $_POST['id']);
  $status =mysqli_real_escape_string($conn, $_POST['status']);
  $action =mysqli_real_escape_string($conn, $_POST['action_taken']);
  if((empty($status)) || (empty($id)) || (empty($action))){
      header("Loaction: ../uac_complaintinfo.php?form=empty");
      exit();
  } else{
      $today = date("Y-m-d H:i:s");
    $j=$_SESSION['logindetails']['uname'];
    $sql1="UPDATE  complaint SET status = '$status', action_taken='$action', action_taken_by='$j',action_taken_on='$today' WHERE complaint_id='$id';";
    if(mysqli_query($conn, $sql1)){
    header("Location: ../uac_complaintconsole.php?closed=success");
    exit();
  }else{
    //header("Location: ../complaint.php?sql=err");
    var_dump($sql1);
    var_dump(mysqli_query($conn, $sql1));
    //exit();
  }
  }
}
else{
header("Location: ../uac_complaintinfo.php");
exit();
}
?>
