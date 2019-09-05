<?php
require_once('header.php');
if(isset($_POST)){
include_once('includes/db.inc.php');
                      $id=mysqli_real_escape_string($conn, $_POST['id']);
                      if(empty($id)){
                        header("Location: ../complaint.php?comp=erroremptyform");
                        exit();
                      }else{
                        $sql="select * from complaint where complaint_id ='$id'";
                        $result=mysqli_query($conn, $sql);
                        $resultCheck=mysqli_num_rows($result);
                        $row=mysqli_fetch_row($result);
                        if($resultCheck<1){
                          header("Location: ../complaint.php?err=norecfound");
                          exit();
                        }
?>
<div class="row">
        <div class="span12">
    		<div class="" id="loginModal">
          <div class="modale-body">
            <div class="well">
              <ul class="nav nav-tabs">
                <li><h2>Complaint Details</h2></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="create">
                  <form id="tab" action="includes/counsellorcompclose.inc.php" method="POST">
                    <table id="palak" class="table table-hover" style="color:black;">

                      <?php
                      echo '<tbody><tr><td>
                              <input type="hidden" value="'.$row[0].'" name="id" class="input-xlarge">
                              <label style="color:black;">Complaint Date</label></td><td>
                              <input type="text" value="'.$row[2].'" name="created_at" class="input-xlarge" disabled></td></tr>
                              <tr><td><label style="color:black;">Source</label></td><td>
                              <input type="text" value="'.$row[6].'" name="source" class="input-xlarge" disabled></td></tr>
                              <tr><td><label style="color:black;">Bully Type</label></td><td>
                              <input type="text" value="'.$row[5].'" name="bully_type" class="input-xlarge" disabled></td></tr>
                              <tr><td><label style="color:black;">Complaint Details</label></td><td>
                              <input type="text" value="'.$row[3].'" name="message" class="input-xlarge" disabled></td></tr>
                              <tr><td><label style="color:black;">Action Taken</label></td><td>
                              <textarea class="form-control" value="'.$row[10].'" name="action_taken" id="action_taken" class="input-xlarge">'.$row[10].'</textarea></td></tr>

                              <tr><td><label style="color:black;">Action Taken By</label></td><td>
                              <input type="text" name="action_taken_by" value="'.$row[11].'" class="input-xlarge" disabled></td></tr>
                             <tr><td><label style="color:black;">Status</label></td><td>';
                            if($row[7] == "open"){
                                      echo '<select name="status">
                                      <option value="open">Open</option>
                                      <option value="closed">Closed</option>
                                    </select></td></tbody>
                                  </table>

                                      <div>
                                        <button type="submit" name="submit" class="btn btn-primary">Take Action</button>
                                      </div>';
                            }else{
                              echo '<select name="status" disabled>
                              <option value="'.$row[7].'">'.$row[7].'</option>
                            </select></td></tbody>
                          </table>
                              ';
                            }


                                        echo '
                                          </form>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>';

                                        }
                                      }else{
                                         header("Location: ../complaint.php");
                                          exit();
                                        }
                                        ?>
                                        <!--<script src="js/jquery-2.1.1.min.js"></script>
                                        <!-- Include all compiled plugins (below), or include individual files as needed
                                        <script src="js/bootstrap.min.js"></script>
                                        <script src="js/wow.min.js"></script>
                                        <script src="js/fancybox/jquery.fancybox.pack.js"></script>
                                        <script src="js/jquery.easing.1.3.js"></script>
                                        <script src="js/jquery.bxslider.min.js"></script>
                                        <script src="js/jquery.prettyPhoto.js"></script>
                                        <script src="js/jquery.isotope.min.js"></script>
                                        <script src="js/functions.js"></script>-->

                                        <?php include 'footer.php' ?>
