<?php
require_once('header.php');
include_once('includes/db.inc.php');
require 'PHPMailer-master/PHPMailerAutoload.php';
if(isset($_POST['save']))
{
  $mailSub = "Cyber Bullying Portal";

 $mail = new PHPMailer();
 $mail ->IsSmtp();
 $mail ->SMTPDebug = 0;
 $mail ->SMTPAuth = true;
 $mail ->SMTPSecure = 'ssl';
 $mail ->Host = "smtp.gmail.com";
 $mail ->Port = 465; // or 587
 $mail ->IsHTML(true);
 $mail ->Username = "neelkantha.apartment@gmail.com";
 $mail ->Password = "Neelkantha@123";
 $mail ->SetFrom("neelkantha.apartment@gmail.com");

 //$mail ->AddAddress($mailto);
 $t=time();
    if(isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $filename =time ().$_FILES['attachment']['name'];

        fileUpload($_FILES['attachment'], 'assets/images/complaints/', $filename, "Any");
    } else {
        $filename = "";
    }
    $today = date("Y-m-d H:i:s");
    $mailMsg="Thank you...!! Your complaint is registered with us with complaint id as ".$t.".....you can check the status of your complaint by clicking on the link http://localhost/portal/complaintsearch.php";
    $mail ->Subject = $mailSub;
    $mail ->Body = $mailMsg;
    $mail ->AddAddress($_POST['victim_email']);
    if(isset($_SESSION['logindetails']) && $mail->Send()){
          $user_id=(string)$_SESSION['logindetails']['uname'];
$query = "insert into complaint(user_name,created_at,message,file,bully_type, source,ip_address,victim_name,victim_email,victim_contact_no,ticket_id) VALUES('".$user_id."','".$today."','".$_POST['message']."','".$filename."','".$_POST['bully_type']."','".$_POST['source']."','".$_SERVER['REMOTE_ADDR']."','".$_POST['victim_name']."','".$_POST['victim_email']."','".$_POST['victim_contact_no']."','".$t."')";

if($mail->Send() && mysqli_query($conn,$query)){
  mysqli_query($conn,$query);
}else{
  echo 'mail not sent';
}
  }elseif($mail->Send()){
    $query = "insert into complaint(created_at,message,file,bully_type, source,ip_address,victim_name,victim_email,victim_contact_no,ticket_id) VALUES('".$today."','".$_POST['message']."','".$filename."','".$_POST['bully_type']."','".$_POST['source']."','".$_SERVER['REMOTE_ADDR']."','".$_POST['victim_name']."','".$_POST['victim_email']."','".$_POST['victim_contact_no']."','".$t."')";
    mysqli_query($conn,$query);
  }else{
    echo 'mail not sent';
    echo $mailMsg;
    echo $mailSub;
    echo $_POST['victim_email'];

  }
}


?>
<style type="text/css">
/*form {
    max-width: 400px;
    margin: auto;
    display: block;
}*/
</style>
<section>
  <?php
  if(isset($_SESSION['logindetails'])){
    echo '<div class="container">
      <div class="row">
            <div class="col-xs-6">
            <form method="post" action="" enctype="multipart/form-data">
                <h3>Report Complaint</h3>
        <label>Victim Name:</label><br>
        <input type="text" name="victim_name" class="form-control" value="'.$_SESSION['logindetails']['fname'].' '.$_SESSION['logindetails']['lname'].'">
        <label>Victim Email:</label><br>
        <input type="text" name="victim_email" class="form-control" value="'.$_SESSION['logindetails']['email'].'">
        <label>Victim Contact Number:</label><br>
        <input type="text" name="victim_contact_no" class="form-control" value="'.$_SESSION['logindetails']['contact'].'">
                   <label>Complaint Detail:</label><br>
                   <textarea name="message" class="form-control"></textarea>

                  <lable>Attachment:</label><br>
                <input class="form-control" type="file" name="attachment" address="attachment"><br>

                <label>Types of Bullies:</label><br>
                <select class="form-control" name="bully_type">
                      <option value="Exclusion">Exclusion</option>
                      <option value="Harrasment">Harrasment</option>
                      <option value="Cyber Stalking">Cyber Stalking</option>
                      <option value="Fraping">Fraping</option>
                    <option value="Fake Profile">Fake Profile</option>
                    <option value="Trolling">Trolling</option>
                    <option value="Cat Fishing">Cat Fishing</option>
                    <option value="Fraud">Fraud</option>
                    <option value="Email Bombing">Email Bombing</option>

                </select><br>

                <label>Site on which bulling occur:</label><br>
                <select class="form-control" name="source">
                  <option value="Facebook">Facebook</option>
                  <option value="Twitter">Twitter</option>
                  <option value="Google">Google</option>
                  <option value="Yahoo">Yahoo</option>
                <option value="Whatsapp">Whatsapp</option>
                <option value="Gmail">Gmail</option>
                <option value="Others">Others</option>


                </select><br>




                </label>

                <button class="btn btn-primary" type="submit" name="save">Save</button>
                <br><br>

                </form>
      </div>';

}



?>


    </tbody>
  </table>
                </div>
        </div>

    </div>

  <?php
  require_once('footer.php');
  ?>