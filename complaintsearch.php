<?php
require_once('header.php');
include_once('includes/db.inc.php');

?>



	<div class="contact-form" align="center">
		<div class="container">
			<form action="complaintinfo.php" method="POST">
			<table><tr><td>

					<input type="text" required="" class="form-control" id="ticket_id" name="ticket_id" placeholder="Enter complaint id" style="height:20%;">

			</td></tr><tr><td>

				<div class="form-group" align="center">
					<button type="submit" name="submit" class="btn btn-primary btn-lg" ><i class="fa fa-search fa-2x"></i> Search</button>
			</div>

			</td></tr></table>
		</form>
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
