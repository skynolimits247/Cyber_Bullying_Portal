<?php
session_start();
if(isset($_POST['submit'])){
  include 'db.inc.php';
  $blogid =mysqli_real_escape_string($conn, $_POST['id']);
  $comment =mysqli_real_escape_string($conn, $_POST['comment']);
  //var_dump($_SESSION['logindetails']['uname']);
  $today = date("Y-m-d H:i:s");
  $postedby=(string)$_SESSION['logindetails']['uname'];
  if(empty($comment)){
    header("Location: ../blogsread.php?blog=erroremptyform");
    exit();
  }else{
    $sql = "insert into comments(user_id, post_id, comments, posted_on) values('$postedby','$blogid','$comment','$today');";
    mysqli_query($conn, $sql);
    header("Location: ../blogsread.php?id='$blogid'");
   exit();
  }
}
  else{
    header("Location: ../blogsread.php");
    exit();
  }
  ?>
