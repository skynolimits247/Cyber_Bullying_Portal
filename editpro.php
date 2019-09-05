<?php
require_once('header.php');

if(isset($_POST['submit'])) {

include_once('includes/db.inc.php');
$i=$_SESSION['logindetails']['uname'];
$sql="select * from user_info where user_name='$i';";
$result=mysqli_query($conn, $sql);
$resultCheck=mysqli_num_rows($result);
$row=mysqli_fetch_row($result);
$row[6]=base64_decode($row[6]);
if($resultCheck<1){
  header("Location: ../index.php?login=errornoblog");
  exit();
}else{
echo '<div class="container" style="color:black;">
	<div class="row">
        <div class="span12">
    		<div class="" id="loginModal">
              <div class="modal-header">
                <h3>Have an Account?</h3>
              </div>
              <div class="modale-body">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#create" data-toggle="tab" style="color:black;">Create Account</a></li>
                  </ul>';

                  echo '<div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="create">
                      <form id="tab" action="includes/editpro.inc.php" method="POST" data-parsley-validate="">
                        <table class="table table-hover" style="color:black;">
                          <tbody><tr><td>
                        <label style="color:black;">Username</label></td><td>
                        <input type="text" required="" value="'.$row[0].'" name="uname" class="input-xlarge" readonly></td></tr>
                        <tr><td><label style="color:black;">First Name</label></td><td>
                        <input type="text" required="" value="'.$row[2].'" name="fname" class="input-xlarge"></td></tr>
                        <tr><td><label style="color:black;">Last Name</label></td><td>
                        <input type="text" required="" value="'.$row[3].'" name="lname" class="input-xlarge"></td></tr>';

                        echo '<tr><td><label style="color:black;">Gender</label></td><td><input type="radio" name="gender" value="male"';
                      if($row[4]=="male"){
												echo 'checked';
                      }
                      echo '> Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp<input type="radio" name="gender" value="female"';
                      if($row[4]=="female"){
												echo 'checked';
                      }
                        echo '> Female</label></td></tr>
                        <tr><td><label style="color:black;">Contact Number</label></td><td>
                        <input type="text" required="" value="'.$row[5].'" name="contact"  id="contact" class="input-xlarge" data-parsley-type="number"></td></tr>
                        <tr><td><label style="color:black;">Email</label></td><td>
                        <input type="email" required=""value="'.$row[1].'" name="email" id="email" class="input-xlarge" data-parsley-type="email"></td></tr>
                        <tr><td><label style="color:black;">Password</label></td><td>
                        <input type="password" required="" name="pass" id="pass" value="'.$row[6].'" class="input-xlarge"></td></tr>
                        <tr><td><label style="color:black;">Confirm Password</label></td><td>
                        <input type="password" required="" name="conpass" id="conpass" value="'.$row[6].'" class="input-xlarge"></td></tr>
                        <tr><td><label style="color:black;">Address</label></td><td>
                        <textarea required="" class="form-control" value="" rows="3" name="addrs" id="addrs">'.$row[7].'</textarea><input type="hidden" name="id" value="'.$row[8].'"></td></tr>
                      </tbody>
                    </table>';
                  }
                }else{
                  header("Location: ../index.php?login=errornoblog");
                  exit();
                }
                    ?>
                        <div>
                          <button type="submit" name="submit" class="btn btn-primary">Update Info</button>
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
wow = new WOW({}).init();
</script>
</body>
</html>
