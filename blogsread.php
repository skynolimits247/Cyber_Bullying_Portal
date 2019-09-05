<?php
require_once('header.php');
$id = $_GET['id'];
$result = mysqli_query($con,"SELECT * FROM blogs1 WHERE id = $id ");

$row = mysqli_fetch_array($result);
?>
<div class="contact-form" >
<div class="container" style="text-center">
<?php
function timeago($date) {
     $timestamp = strtotime($date);

     $strTime = array("second", "minute", "hour", "day", "month", "year");
     $length = array("60","60","24","30","12","10");

     $currentTime = time();
     if($currentTime >= $timestamp) {
      $diff     = time()- $timestamp;
      for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
      $diff = $diff / $length[$i];
      }

      $diff = round($diff);
      return $diff . " " . $strTime[$i] . "(s) ago ";
     }
  }
  ?>
  <img src="assets/images/complaints/<?php echo $row['image']; ?>" />
  <?php
  echo  '<i>Description : </i>'.$row['description'];
  echo '<br><b>Posted on :</b>'.timeago($row['posted_on']);
?>
</div>



<?php
if(isset($_SESSION['logindetails'])){
  echo '<div class="contact-form" >
  <div class="container" style="text-center">
  <h3> Enter Your Comments : </h3>
    <form action="includes/comment.inc.php" method="POST">
    <table><tr><td>

    <input type="hidden" name="id" value="'.$row['id'].'" >

  <div class="container">

      <textarea class="form-control" rows="5"  id="query" name="comment" required="" placeholder="Enter your comments here"></textarea>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-lg" >Submit Message</button>
    </div>
  </div><td></tr></table>
  </form>
  </div>
</div>';
}
?>

<div class="contact-form" >
<div class="container" style="text-center">
<h3>  Comments : </h3>
<table>
<tr>
<?php
$result = mysqli_query($con,"SELECT * FROM comments ORDER BY posted_on DESC; ");
while($row = mysqli_fetch_array($result))
{
echo '<td>Posted By : '.$row['user_id'].'</td><td>'.timeago($row['posted_on']).'</td></tr><td colspan="2"><div><strong>Comment: </strong>'.$row['comments'].'</div></td></tr>';

}
?>
</table>
</div>
</div>
<?php 
require_once('footer.php');
?>