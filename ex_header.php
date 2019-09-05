<?php
include 'config/app.php';
//session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cyber Bullying Portal</title>
    <link href="css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link href="css/prettyPhoto.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />

	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/parsley.min.js"></script>
	<style src="css/parsley.css"></style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5aba03c94b401e45400e15fd/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <header>
    		<nav class="navbar navbar-default navbar-static-top navbar-fixedtop" role="navigation">
    			<div class="navigation">
    				<div class="container">
    					<div class="navbar-header">
    						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
    							<span class="sr-only">Toggle navigation</span>
    							<span class="icon-bar"></span>
    							<span class="icon-bar"></span>
    							<span class="icon-bar"></span>

    						</button>
    						<div class="navbar-brand" style="margin-top:-1px; padding-top:5px;">
    							<a href="index.php"><span><img src="images/logo.png" alt="" style="max-width: 62%;"></span></a>


    						</div>
    					</div>

    					<div class="navbar-collapse collapse">
                <?php
                if(isset($_SESSION['logindetails'])){
                  echo '<div class="navbar-brand">Welcome Counsellor, <b><span>'. $_SESSION['logindetails']['fname'].'</b></span></div>';

                }
                ?>
    						<div class="menu">

    							<ul class="nav nav-tabs" role="tablist">

    								<li role="presentation"><a href="excounsellorhome.php" class="active">Home</a></li>
    								<!-- <li role="presentation"><a href="#cyberbullying">Cyber Bullying</a></li>
    								<li role="presentation"><a href="prevention.php">Prevention</a></li> -->
                    <li role="presentation"><div class="dropdown" style="padding-top:14%;"><span class=" dropdown-toggle" type="button" data-toggle="dropdown">Safety Tips
                      </span>
                      <ul class="dropdown-menu">
                      <li><a href="tipswomen.php">Women</a></li>
                      <li><a href="tipschild.php">Children</a></li>
                      <li><a href="tipsSC.php">Senior Citizen</a></li>
                      <li><a href="tipsParents.php">Parents</a></li>
                      <li><a href="tipsBusiness.php">Business Person</a></li>
                      <li><a href="tipsSM.php">Social Media</a></li>
                      <li><a href="tipsNetBanking.php">Net Banking</a></li>
                    </ul> </div></li>
                    <li role="presentation"><a href="addvideo.php">Add Video</a></li>
                    <li role="presentation"><a href="bio.php">My Videos</a></li>
    								<li role="presentation"><a href="blogs.php">Add Blog</a></li>
                    <li role="presentation"><a href="contact.php">Contact</a></li>
                    
                      <li>
                      <?php
            					if(isset($_SESSION['logindetails'])){

                        echo '<div class="dropdown">
                              <button class="dropbtn"><i class="fa fa-cog fa-2x"></i></button>
                              <div class="dropdown-content">
                                <form action="includes/logout.inc.php" method="POST"><button type="submit" name="submit" class="btn btn-primary">LogOut</button></form>
                                <form action="editpro.php" method="POST"><button type="submit" name="submit" href="editpro.php" class="btn btn-primary">Edit Profile</button></form>
                              
                              </div>
                            </div>
                            </form>';

            					}
            					else{
    								     echo '<a href="login.php" class="btn btn-primary">LogIn</a><a href="excounsellorsignup.php" class="btn btn-primary">Become a Counsellor</a>';
                      }
                    ?>
                    </li>
                          							</ul>
    						</div>
    					</div>
    				</div>
    			</div>

    		</nav>

    	</header>
