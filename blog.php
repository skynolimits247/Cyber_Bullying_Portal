<?php
require_once('header.php');
include_once('includes/db.inc.php');
$sql="select * from blog ORDER BY date_created DESC;";
$result=mysqli_query($conn, $sql);
$resultCheck=mysqli_num_rows($result);
if($resultCheck<1){
  header("Location: ../index.php?login=errornoblog");
  exit();
}
?>
<div class="container" style="color:black;">
	<div class="row">
        <div class="span12">
    		<div class="" id="loginModal">
              <?php
              if(isset($_SESSION['logindetails'])){
                echo '<div class="modal-header">
                    <a href="#" class="btn btn-primary btn-lg"><h3>Ask Question</h3></a>
                    </div>
                    <div class="contact-form" style=" margin-bottom:20px;">
                    <form action="includes/askquest.inc.php" method="POST">
                    <div class="container">
                    <div class="col-lg-12">
                    <textarea class="form-control" rows="5" name="question" id="question" placeholder="Type Your Question Here...!"></textarea>
                    <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit Message</button>
                    </div> </form>';
                  }else{
              echo '<div class="modal-header">
                    <a href="login.php" class="btn btn-primary btn-lg"><h3>Ask Question</h3></a>
                    </div>';
                }
            echo '</div></div></div>';
              ?>


              <div class="modal-body" "container">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li><h3>Top Questions</h3></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="topiclist">
                    <!--<table id="palak" class="display">

                      <thead>
                          <tr>
                              <th>Column 1</th>
                              <th>Column 2</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>Row 1 Data 1</td>
                              <td>Row 1 Data 2</td>
                          </tr>
                          <tr>
                              <td>Row 2 Data 1</td>
                              <td>Row 2 Data 2</td>
                          </tr>
                      </tbody>
                  </table>-->

                          <table id="palak"  class=" table table-hover table-striped " style="color:black;">

                          <thead>
                            <tr>
                            <th>Question Asked</th>
                            <th><span>Total Comments</span></th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                          <tbody>
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

                            foreach($result as $results){
                            //  $date=$date-strtotime($results['date_created']);
                            echo '<form action="forum.php" method="POST">';
                            echo '<tr><td><input type="hidden" name="id" value="'.$results['topic_id'].'"><button type="submit" data-placement="top" title="Click to visit forum" name="submit" class="btn btn-default btn-xs">'.$results['topic'].'  ?</button></td><td colspan="2"><strong><span class="badge" style="top: -4px;">'.$results['no_comments'].'</span></td><td><b>POSTED BY : <i>'.$results['topic_username'].'</i></strong></b> ('.timeago($results['date_created']).')</form>';
                            if(isset($_SESSION['logindetails']) && $_SESSION['logindetails']['uname'] == $results['topic_username']){
                              echo '</td><td><form action="includes/delquest.inc.php" method="POST">&nbsp;<input type="hidden" name="id" value="'.$results['topic_id'].'"><button type="submit" data-placement="top" title="Delete Question" name="submit" class="fa fa-trash fa-2x"></button></form>';
                            }
                              echo '</td></tr>';

                          }?>

                          </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
        </div>
	</div>
</div>
</div>

<?php include 'footer.php' ?>
