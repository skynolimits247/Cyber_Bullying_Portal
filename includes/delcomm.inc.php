<?php
session_start();
if(isset($_POST['submit'])){
  include 'db.inc.php';
  $id=mysqli_real_escape_string($conn, $_POST['id']);
  $topic_id=mysqli_real_escape_string($conn, $_POST['topic_id']);
  if(empty($id) || empty($topic_id)){
    header("Location: ../blog.php?forum=erroremptyform");
    exit();
  }else{
    $sql="select * from blog where topic_id ='$topic_id'";
    $result=mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);
    $row=mysqli_fetch_row($result);
    if($resultCheck != 0 ){
      $i=$row[1]-1;
      $sql1 = "update blog set no_comments='$i'where topic_id='$topic_id'";
      $sql2 = "delete from posts where id='$id'";
      if(mysqli_query($conn, $sql2) && mysqli_query($conn, $sql1)){
      header("Location: ../blog.php?deleted");
      exit();
    }else{
      header("Location: ../blog.php?err=norecfound");
      exit();
    }
  }
}
}else{
  header("Location: ../blog.php?return=false");
  exit();
}
