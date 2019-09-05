<?php
require_once('header.php');
if(isset($_POST['submit'])){
include_once('includes/db.inc.php');
?>
<div class="container" style="color:black;">
	<div class="row">
        <div class="span12">
    		<div class="" id="loginModal">
<?php
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
      foreach($result as $results){
      echo '  <div class="modal-body">
          <div class="well">
            <ul class="nav nav-tabs">
              <li><h3>'.$results['topic'].' ?</h3><i>Asked by : '.$results['topic_username'].'</i></li>

            </ul>';
          }
      $sql1="select * from posts where topic_id ='$id'";
      $result1=mysqli_query($conn, $sql1);
      $resultCheck1=mysqli_num_rows($result1);
      if($resultCheck1>0){
        echo '<div id="myTabContent" class="tab-content">
          <div class="tab-pane active in" id="topiclist">
              <table class="table table-hover" style="color:black;">
                <thead><th>Replies</th><th>Total Replies : '.$resultCheck1.'</th><th>&nbsp;
                </th></thead>
                <tbody>';
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
                  foreach($result1 as $results){
                    echo '<tr><td><b>'.$results['comment'].'</b></td><td><b>POSTED BY : <i>'.$results['author'].'</i></strong></b> ('.timeago($results['date_created']).')</td>';
                    if(isset($_SESSION['logindetails']) && $_SESSION['logindetails']['uname'] == $results['author']){
                      echo '<td colspan="2"><form action="includes/delcomm.inc.php" method="POST">&nbsp;<input type="hidden" name="id" value="'.$results['id'].'"><input type="hidden" name="topic_id" value="'.$results['topic_id'].'"><button type="submit" data-placement="top" title="Delete Reply" name="submit" class="fa fa-trash fa-2x"></button></form>';
                    }

                    echo '</td></tr>
                  ';

                }
              }else{
                echo 'No Comments...!  </tbody>
                </table></div>
                  </div>
                  </div>
                  </div>';
              }
            }
            }
          }
            ?>
          </tbody>
          </table>
            <?php
            if(isset($_SESSION['logindetails'])){
              echo '<div class="contact-form" style=" margin-bottom:20px;">
                  <form action="includes/reply.inc.php" method="POST">
                  <input type="hidden" name="topic_id" value="'.$results['topic_id'].'">
                  <div class="container">
                  <div class="col-lg-6">
                  <textarea class="form-control" rows="3" name="reply" id="reply" placeholder="Type Your Reply Here...!"></textarea>
                  <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit Reply</button>
                  </div> </form>';
                }else{
            echo '<div class="modal-header">
                  <a href="login.php" class="btn btn-primary btn-lg"><h3>Reply</h3></a>
                  </div>';
              }
          echo '</div></div></div>';
            ?>


</div>
</div>
</div>
</div>

<script src="js/jquery-2.1.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/fancybox/jquery.fancybox.pack.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/functions.js"></script>
<script>
wow = new WOW(
{

}	)
.init();
</script>
