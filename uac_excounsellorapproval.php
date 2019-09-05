<?php
require_once('uac_header.php');

if(isset($_POST)){
include_once('includes/db.inc.php');
                      $id=mysqli_real_escape_string($conn, $_POST['id']);
                      if(empty($id)){
                        header("Location: ../uac_counsellorconsole.php?comp=erroremptyform");
                        exit();
                      }else{
                        $sql="select * from counsellor_info where id ='$id'";
                        $result=mysqli_query($conn, $sql);
                        $resultCheck=mysqli_num_rows($result);
                        $row=mysqli_fetch_row($result);
                        if($resultCheck<1){
                          header("Location: ../uac_counsellorconsole.php?err=norecfound");
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
                  <form id="tab" action="includes/uac_excounsellorapproval.inc.php" method="POST">
                    <table class="table table-hover" style="color:black;">

                      <?php
                      echo '<tbody><tr><td>
                              <input type="hidden" value="'.$row[0].'" name="id" class="input-xlarge">
                              <label style="color:black;">User Name</label></td><td>
                              <input type="text" value="'.$row[1].'" name="user_name" class="input-xlarge" ></td></tr>
                              <tr><td><label style="color:black;">First Name</label></td><td>
                              <input type="text" value="'.$row[2].'" name="f_name" class="input-xlarge" ></td></tr>
                              <tr><td><label style="color:black;">Last Name</label></td><td>
                              <input type="text" value="'.$row[3].'" name="l_name" class="input-xlarge" ></td></tr>
                              <tr><td><label style="color:black;">Email</label></td><td>
                              <input type="text" value="'.$row[4].'" name="email" class="input-xlarge" ></td></tr>
                              <tr><td><label style="color:black;">Contact Number</label></td><td>
                              <input type="text" name="contact_no" value="'.$row[6].'" class="input-xlarge" ></td></tr>
                              <tr><td><label style="color:black;">Experience</label></td><td>
                              <input type="text" name="experience" value="'.$row[7].'" class="input-xlarge" ></td></tr>

                              <tr><td><label style="color:black;">Certifications</label></td><td>
                              <input type="text" value="'.$row[8].'" name="certifications" class="input-xlarge" ></td></tr>
                              <tr><td><label style="color:black;">Address</label></td><td>
                              <input type="text" name="address" value="'.$row[9].'" class="input-xlarge" ></td></tr>
                              <tr><td><label style="color:black;">Organization</label></td><td>
                              <input type="text" name="organization" value="'.$row[10].'" class="input-xlarge" ></td></tr>

                              <tr><td><label style="color:black;">Fees</label></td><td>
                              <input type="text" value="'.$row[11].'" name="fees" class="input-xlarge" ></td></tr>
                              <tr><td><label style="color:black;">Designation</label></td><td>
                              <input type="text" name="designation" value="'.$row[12].'" class="input-xlarge" ></td></tr>
                              <tr><td><label style="color:black;">Gender</label></td><td>
                              <input type="text" name="gender" value="'.$row[14].'" class="input-xlarge"></td></tr>




                              ';

                                      echo '
                                     <tr><td><label style="color:black;">Status</label></td><td>
                                      <select name="status"><option value="0">Awaiting Approval</option>
                                      <option value="1">Approved Counsellor</option>


                                    </select></td></tbody>
                                  </table>
                                      <div>
                                        <button type="submit" name="submit" class="btn btn-primary">Take Action</button>
                                      </div>';


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

                                      else{
                                         header("Location: ../uac_counsellorconsolet.php");
                                          exit();
                                        }
                                        ?>
                                        <?php
                                        require_once('footer.php');
                                        ?>
