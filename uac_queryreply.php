<?php
require_once('uac_header.php');
include_once('includes/db.inc.php');
?>

<div class="container" style="color:black;">
	<div class="row">
        <div class="span12">
    		<div class="" id="loginModal">

              <div class="modale-body">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab" style="color:black;">Query Info</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                        <fieldset>
                          <div class="control-group">
														<form action="includes/uac_queryreply.inc.php" method="POST">
                            <!-- Username -->
														<?php
														if(isset($_POST['id'])){
														$i=$_SESSION['logindetails']['uname'];
														$j=$_POST['id'];
														$sql="select * from contact where id ='$j'";
														$result=mysqli_query($conn, $sql);
														$resultCheck=mysqli_num_rows($result);
														$row=mysqli_fetch_row($result);
														if($resultCheck<1){
														  echo '<h3>Sorry...There Are No Queries For You...!<h3>';
														}else{
															echo '<table class="table"><tbody><tr><td>
																			<input type="hidden" value="'.$row[9].'" name="id" class="input-xlarge">
																			<label style="color:black;">Query Date</label></td><td>
																			<input type="text" value="'.$row[7].'" name="created_at" class="input-xlarge" disabled></td></tr>
																			<tr><td><label style="color:black;">Name</label></td><td>
																			<input type="text" value="'.$row[0].'" name="name" id="name"  class="input-xlarge" disabled></td></tr>
																			<tr><td><label style="color:black;">Email</label></td><td>
																			<input type="text" value="'.$row[1].'" name="email" id="email" class="input-xlarge" disabled></td></tr>
																			<tr><td><label style="color:black;">Contact Number</label></td><td>
																			<input type="text" value="'.$row[2].'" name="contact_no" class="input-xlarge" disabled></td></tr>
																			<tr><td><label style="color:black;">Query</label></td><td>
																			<input type="text" name="query" value="'.$row[3].'" class="input-xlarge" disabled></td></tr>

																			<tr><td><label style="color:black;">Reply From</label></td><td>
																			<input type="text" name="reply_from" value="'.$row[6].'" class="input-xlarge" disabled></td></tr>
																			<tr><td><label style="color:black;">Replied At</label></td><td>
																			<input type="text" name="reply_at" value="'.$row[8].'" class="input-xlarge" disabled></td></tr>
																			<tr><td><label style="color:black;">Reply</label></td><td>';


																							echo '<textarea class="form-control" value="'.$row[5].'" name="reply" id="reply" class="input-xlarge">'.$row[5].'</textarea></td></tr>
																						 <tr><td><label style="color:black;">Status</label></td><td>
																							<select name="status"><option value="open">Open</option>
																							<option value="closed">Closed</option>


																						</select></td><td><button type="submit" name="submit" class="btn btn-primary">Take Action</button></td></tr></tbody>';
														}
													}else{
														print_r($_POST);
													}




														?>

													</form>

														  </table>

                          <div class="control-group">
                            <!-- Button -->

                          </div>
                        </fieldset>

                    </div>

                </div>
              </div>
            </div>
        </div>
	</div>
</div>
</div>


<?php
require_once('footer.php');
?>
