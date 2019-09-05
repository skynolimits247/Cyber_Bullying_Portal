<?php
require_once('uac_header.php');
//var_dump($_SESSION['logindetails']);
?>
<div class="container" style="color:black;">
	<div class="row">
        <div class="span12">
    		<div class="" id="loginModal">
              <div class="modal-header">
                <h3>UAC Login</h3>
              </div>
              <div class="modale-body">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab" style="color:black;">Login</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                      <form class="form-horizontal" action="includes/uac_login.inc.php" method="POST" data-parsley-validate="">
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
                            </div>
                          </div>


                          <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                              <button class="btn btn-success" type="submit" name="submit">Login</button>
                            </div>
                          </div>
                        </fieldset>
                      </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
	</div>
</div>
</div>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/fancybox/jquery.fancybox.pack.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/functions.js"></script>
<!--<script src="js/parsley.min.js"></script>
<script type="text/javascript">
$(function () {
  $('#demo-form').parsley().on('field:validated', function() {
    var ok = $('.parsley-error').length === 0;
    $('.bs-callout-info').toggleClass('hidden', !ok);
    $('.bs-callout-warning').toggleClass('hidden', ok);
  })
  .on('form:submit', function() {
    return false; // Don't submit form for this demo
  });
});
</script>
wow = new WOW(
{

}	)
.init();
</script>-->

</body>
</html>
