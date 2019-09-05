<?php
session_start();
if(isset($_POST['submit'])){
  include 'db.inc.php';
  $queryid =mysqli_real_escape_string($conn, $_POST['id']);
  $comment =mysqli_real_escape_string($conn, $_POST['comment']);
  //var_dump($_SESSION['logindetails']['uname']);
  $today = date("Y-m-d H:i:s");
  $postedby=(string)$_SESSION['logindetails']['uname'];
//  var_dump($uname);
  if(empty($comment)){
    header("Location: ../complaint.php?blog=erroremptyform");
    exit();
  }else{
    $sql = "insert into complaint_query(user_id, post_id, comments) values('$postedby','$blogid','$comment');";
    mysqli_query($conn, $sql);
    header("Location: ../complaint.php?id='$blogid'");
   exit();
  }
}
  else{
    header("Location: ../complaint.php");
    exit();
  }
  ?>
