<?php
session_start();
if(isset($_POST['submit'])){
  include 'db.inc.php';
  //var_dump($_POST['id']);
  $id=mysqli_real_escape_string($conn, $_POST['id']);
  if(empty($id)){
    header("Location: ../blog.php?blog=erroremptyform");
  //  exit();
  }else{
  $sql="select * from blog where topic_id ='$id'";
  $result=mysqli_query($conn, $sql);
  $resultCheck=mysqli_num_rows($result);
  if($resultCheck<1){
    header("Location: ../blog.php?err=norecfound");
    exit();
  }else{
    $sql1="select * from posts where topic_id ='$id'";
    $result=mysqli_query($conn, $sql1);
    $resultCheck=mysqli_num_rows($result);
    if($resultCheck>1){
      $sql2 = "delete from posts where topic_id='$id'";
      $sql3="delete from blog where topic_id='$id'";
      $result=mysqli_query($conn, $sql2);
      $result=mysqli_query($conn, $sql3);
      header("Location: ../blog.php?deletedboth");
      exit();
    }else{
      $sql3="delete from blog where topic_id='$id'";
      $result=mysqli_query($conn, $sql3);
      header("Location: ../blog.php?deleted");
      exit();
    }
  }
}
}else{
  header("Location: ../blog.php?return=false");
  exit();
}
