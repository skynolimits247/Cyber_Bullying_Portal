<?php
session_start();
if(isset($_POST['submit'])){
  include 'db.inc.php';
  $id=mysqli_real_escape_string($conn, $_POST['id']);
  $status =mysqli_real_escape_string($conn, $_POST['status']);


  if((empty($id)) && $status == "closed"){
      header("Loaction: ../complaint.php?form=empty");
      exit();
  } else{
    $today = date("Y-m-d H:i:s");
    $i="closed by user";
    $j=$_SESSION['logindetails']['uname'];
    $sql1="UPDATE  complaint SET status = '$status', action_taken='$i', action_taken_by='$j',action_taken_on='$today' WHERE complaint_id='$id';";
    if(mysqli_query($conn, $sql1)){
    //header("Location: ../complaint.php?closed=success");
    header("Location: ../reviews.php?id=$id");

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
header("Location: ../complaint.php");
exit();
}
?>
