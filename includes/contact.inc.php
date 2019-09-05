<?php
if(isset($_POST['submit'])){
  include_once 'db.inc.php';

  $name =mysqli_real_escape_string($conn, $_POST['name']);
  $email =mysqli_real_escape_string($conn, $_POST['email']);
  $phone =mysqli_real_escape_string($conn, $_POST['phone']);
    $query =mysqli_real_escape_string($conn, $_POST['query']);
  if((empty($name)) || (empty($email)) || (empty($phone)) || (empty($query))){
      header("Loaction: ../contact.php?submit=empty");
      exit();
  } else{
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../contact.php?submit=erremail");
        exit();
      }else{
        $sql = "insert into contact (name, email, contact_no, query) values('$name','$email','$phone','$query');";
        mysqli_query($conn, $sql);
        header("Location: ../contact.php?submit=success");
        exit();
}
}
}else{
  header("Location: ../contact.phpsubmit=false");
  exit();
}
?>
