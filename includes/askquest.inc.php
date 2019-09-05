<?php
session_start();
if(isset($_POST['submit'])){
  include 'db.inc.php';
  //var_dump($_SESSION['logindetails']['uname']);
  $today = date("Y-m-d H:i:s");
  $question=mysqli_real_escape_string($conn, $_POST['question']);
  $uname=(string)$_SESSION['logindetails']['uname'];
  var_dump($uname);
  if(empty($question)){
    header("Location: ../blog.php?blog=erroremptyform");
    exit();
  }else{
    $sql = "insert into blog(topic_username, topic, date_created) values('$uname','$question','$today');";
    mysqli_query($conn, $sql);
    header("Location: ../blog.php?submit=success");
   exit();
  }
}
  else{
    header("Location: ../blog.php");
    exit();
  }
  ?>
