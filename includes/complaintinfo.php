<?php
require_once('header.php');
?>
<div class="row">
        <div class="span12">
    		<div class="" id="loginModal">
          <div class="modale-body">
            <div class="well">
              <ul class="nav nav-tabs">
                <li><h2>Complaint Details</h2></li>
              </ul>
              <div class="col-lg-12">
                <div class="col-lg-8">
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="create">
                  <form id="tab" action="includes/compclose.inc.php" method="POST">
                    <table class="table table-hover" style="color:black;">

<?php
if(isset($_POST)){
include_once('includes/db.inc.php');
$id =mysqli_real_escape_string($conn, $_POST['id']);

                      if(empty($id)){
                        if(isset($_POST)){
                          $ee=$_POST['ticket_id'];
                          $sql="select * from complaint where ticket_id ='$ee'";
                          $result=mysqli_query($conn, $sql);
                          $resultCheck=mysqli_num_rows($result);
                          if($resultCheck < 1){
                            header("Location: complaintsearch.php?comp=errortickeid");
                            exit();
                          }else{
                            $row=mysqli_fetch_row($result);
                            echo '<tbody><tr><td>
                                    <input type="hidden" value="'.$row[17].'" name="id" class="input-xlarge">
                                    <label style="color:black;">Complaint Date</label></td><td>
                                    <input type="text" value="'.$row[2].'" name="created_at" class="input-xlarge" disabled></td></tr>
                                    <tr><td><label style="color:black;">Complaint ID</label></td><td>

                                    <input type="text" value="'.$row[16].'" name="complaint_id" class="input-xlarge" disabled></td></tr>
                                    <tr><td><label style="color:black;">Victim Email</label></td><td>
                                    <input type="text" value="'.$row[15].'" name="victim_email" class="input-xlarge" disabled></td></tr>
                                    <tr><td><label style="color:black;">Contact Number</label></td><td>
                                    <input type="text" value="'.$row[14].'" name="victim_contact_no" class="input-xlarge" disabled></td></tr>

                                    <tr><td><label style="color:black;">Source</label></td><td>
                                    <input type="text" value="'.$row[6].'" name="source" class="input-xlarge" disabled></td></tr>
                                    <tr><td><label style="color:black;">Bully Type</label></td><td>
                                    <input type="text" value="'.$row[5].'" name="bully_type" class="input-xlarge" disabled></td></tr>
                                    <tr><td><label style="color:black;">Complaint Details</label></td><td>
                                    <input type="text" value="'.$row[3].'" name="message" class="input-xlarge" disabled></td></tr>
                                    <tr><td><label style="color:black;">Action Taken</label></td><td>
                                    <input type="text" value="'.$row[10].'" name="action_taken" class="input-xlarge" disabled></td></tr>
                                    <tr><td><label style="color:black;">Action Taken By</label></td><td>
                                    <input type="text" name="action_taken_by" value="'.$row[11].'" class="input-xlarge" disabled></td></tr>
                                    <tr><td><label style="color:black;">Action Taken On</label></td><td>
                                    <input type="text" name="action_taken_by" value="'.$row[12].'" class="input-xlarge" disabled></td></tr>
                                   <tr><td><label style="color:black;">Status</label></td><td>';
                                  if($row[7] == "open"){
                                            echo '<select name="status">
                                            <option value="open">Open</option>
                                            <option value="closed">Close Complaint</option>
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
                        }
                      }else{
                        header("Location: complaintsearch.php?comp=erroremptyform");
                        exit();
                      }
                    }
                }elseif(isset($_POST)){
                        $id=mysqli_real_escape_string($conn, $_POST['id']);
                        $sql="select * from complaint where complaint_id ='$id'";
                        $result=mysqli_query($conn, $sql);
                        $resultCheck=mysqli_num_rows($result);
                        $row=mysqli_fetch_row($result);
                        if($resultCheck<1){
                          header("Location: ../complaint.php?err=norecfound");
                          exit();
                        }
                      else{
                      echo '<tbody><tr><td>
                              <input type="hidden" value="'.$row[0].'" name="id" class="input-xlarge">
                              <label style="color:black;">Complaint Date</label></td><td>
                              <input type="text" value="'.$row[2].'" name="created_at" class="input-xlarge" disabled></td></tr>

                              <tr><td><label style="color:black;">Complaint ID</label></td><td>

                              <input type="text" value="'.$row[16].'" name="complaint_id" class="input-xlarge" disabled></td></tr>
                              <tr><td><label style="color:black;">Victim Email</label></td><td>
                              <input type="text" value="'.$row[15].'" name="victim_email" class="input-xlarge" disabled></td></tr>
                              <tr><td><label style="color:black;">Contact Number</label></td><td>
                              <input type="text" value="'.$row[16].'" name="victim_contact_no" class="input-xlarge" disabled></td></tr>

                              <tr><td><label style="color:black;">Source</label></td><td>
                              <input type="text" value="'.$row[6].'" name="source" class="input-xlarge" disabled></td></tr>
                              <tr><td><label style="color:black;">Bully Type</label></td><td>
                              <input type="text" value="'.$row[5].'" name="bully_type" class="input-xlarge" disabled></td></tr>
                              <tr><td><label style="color:black;">Complaint Details</label></td><td>
                              <input type="text" value="'.$row[3].'" name="message" class="input-xlarge" disabled></td></tr>
                              <tr><td><label style="color:black;">Action Taken</label></td><td>
                              <input type="text" value="'.$row[10].'" name="action_taken" class="input-xlarge" disabled></td></tr>
                              <tr><td><label style="color:black;">Action Taken By</label></td><td>
                              <input type="text" name="action_taken_by" value="'.$row[11].'" class="input-xlarge" disabled></td></tr>
                              <tr><td><label style="color:black;">Action Taken On</label></td><td>
                              <input type="text" name="action_taken_by" value="'.$row[12].'" class="input-xlarge" disabled></td></tr>
                             <tr><td><label style="color:black;">Status</label></td><td>';
                            if($row[7] == "open"){
                                      echo '<select name="status">
                                      <option value="open">Open</option>
                                      <option value="closed">Close Complaint</option>
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
                          }



                                        echo '
                                          </form>
                                        </div>
                                    </div>  </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>';


                      }else{
                                         header("Location: ../complaint.php");
                                          exit();
                                        }
                                        ?>
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
