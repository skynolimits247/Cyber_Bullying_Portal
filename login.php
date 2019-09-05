<?php
require_once('header.php');
//var_dump($_SESSION['logindetails']);
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container" style="color:black;">
	<div class="row">
        <div class="span12">
    		<div class="" id="loginModal">
              <div class="modal-header">
                <h3>In order to serve you better and get in touch with you.<br> Please Sign Up</h3>
              </div>
              <div class="">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab" style="color:black;">Login</a></li>
                    <li><a href="#create" data-toggle="tab" style="color:black;">Create Account</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                      <form class="form-horizontal" action="includes/login.inc.php" method="POST" data-parsley-validate="">
                        <fieldset>
                          <div id="legend">
                            <legend class="" style="padding:10px;">Login</legend>
                          </div>
                          <div class="control-group">
                            <!-- Username -->
                            <label class="control-label"  for="username" style="color:black;">Username</label>
                            <div class="controls">
                              <input type="text" id="username"  required="" name="uname" placeholder="" class="input-xlarge">
                            </div>
                          </div>

                          <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" for="password" style="color:black;">Password</label>
                            <div class="controls">
                              <input type="password" id="password"  required="" name="pass" placeholder="" class="input-xlarge">
                              <br><br><div class="g-recaptcha" data-sitekey="6LevClAUAAAAAHEPHPo9k9x1IPX5-Omckx9OfSid"></div>
                            </div>

                          </div>



                          <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                              <button class="btn btn-success" type="submit" name="submit">Login</button>
                            </div>
                          </div>

													<div class="control-group">
														<!-- Button -->
														<div class="controls">
															<a href="complaint.php" class="btn btn-success">Continue as a Guest to Lodge a Complaint</a>
														</div>
													</div>


                        </fieldset>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="create">
                      <form id="tab" action="includes/signup.inc.php" method="POST" data-parsley-validate="">
                        <table class="table table-hover" style="color:black;">
                          <tbody><tr><td>
                        <label style="color:black;">Username</label></td><td>
                        <input type="text"  required="" value="" name="uname" class="input-xlarge"></td></tr>
                        <tr><td><label style="color:black;">First Name</label></td><td>
                        <input type="text" value=""  required="" name="fname" class="input-xlarge"></td></tr>
                        <tr><td><label style="color:black;">Last Name</label></td><td>
                        <input type="text" value=""  required="" name="lname" class="input-xlarge"></td></tr>
												<tr><td><label style="color:black;">Gender</label></td><td>
												<input type="radio" name="gender" value="male"> Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												<input type="radio" name="gender" value="female">Female</label></td></tr>
                        <tr><td><label style="color:black;">Contact Number</label></td><td>
                        <input type="text"  required=""value="" name="contact" class="input-xlarge" data-parsley-type="number"></td></tr>
                        <tr><td><label style="color:black;">Email</label></td><td>
                        <input type="email" value="" required="" name="email" class="input-xlarge"  data-parsley-type="email"></td></tr>
                        <tr><td><label style="color:black;">Password</label></td><td>
                        <input type="password" required="" name="pass" value="" class="input-xlarge"></td></tr>
                        <tr><td><label  style="color:black;">Confirm Password</label></td><td>
                        <input type="password" required="" name="conpass" value="" class="input-xlarge"></td></tr>
                        <tr><td><label style="color:black;">Address</label></td><td>
                        <textarea class="form-control" name="addrs" id="addrs" rows="3"required="" placeholder="Type Your Address Here...!"></textarea></td></tr>
                        <tr>
                          <td><br><br><div class="g-recaptcha" data-sitekey="6LevClAUAAAAAHEPHPo9k9x1IPX5-Omckx9OfSid"></div></td>
                        </tr>

                      </tbody>

                    </table>

                        <div>
                          <button type="submit" name="submit" class="btn btn-primary">Create Account</button>
                        </div>
                      </form>
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
//var_dump($_SESSION['logindetails']);
?>