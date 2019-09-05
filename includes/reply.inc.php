<?php
session_start();
if(isset($_POST['submit'])){
  include 'db.inc.php';
  //var_dump($_SESSION['logindetails']['uname']);
  $today = date("Y-m-d H:i:s");
  $reply=mysqli_real_escape_string($conn, $_POST['reply']);
  $topic_id=mysqli_real_escape_string($conn, $_POST['topic_id']);
  $uname=(string)$_SESSION['logindetails']['uname'];
  if(empty($reply)){
    header("Location: ../blog.php?forum=erroremptyform");
    exit();
  }else{
    $sql="select * from blog where topic_id ='$topic_id'";
    $result=mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);
    $row=mysqli_fetch_row($result);
    if($resultCheck != 0 ){
    mysqli_query($conn, $sql);
    $i=$row[1]+1;
    $sql2 = "insert into posts(topic_id, author, comment, date_created) values('$topic_id','$uname','$reply','$today');";
    $sql1 = "update blog set no_comments='$i'where topic_id='$topic_id'";
    if(mysqli_query($conn, $sql2) && mysqli_query($conn, $sql1)){
    header("Location: ../blog.php?submit=success");
    exit();
 }else{
   header("Location: ../blog.php?submitfail");
   exit();
 }
 }
  }
}
  else{
    header("Location: ../blog.php?returnfalse");
    exit();
  }
  ?>
