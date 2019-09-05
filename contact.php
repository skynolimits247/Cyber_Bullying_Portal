<?php
require_once('header.php');
include_once('includes/db.inc.php');

?>

	<div class="contact">
		<div class="container">
			<div class="text-center">
				<div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.3s">
					<h2>Contact Us</h2>
				</div>
				<div class="wow bounceInDown" data-wow-offset="0" data-wow-delay="0.6s">
					<p>Problem with cyber bullying is everything . So,we are here to help you.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="col-md-6">
			<div class="map">
				<iframe src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kuningan,+Jakarta+Capital+Region,+Indonesia&amp;aq=3&amp;oq=kuningan+&amp;sll=37.0625,-95.677068&amp;sspn=37.410045,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Kuningan&amp;t=m&amp;z=14&amp;ll=-6.238824,106.830177&amp;output=embed">
				</iframe>
			</div>
		</div>

		<div class="contact-info" >
			<div class="col-md-4">
				<h2>CYBER BULLYING PORTAL</h2>

				<p>CyberBullying portal is a website which provides information about cyber crime trends, precautions and advises for victims.</p>
				<ul>
					<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-home fa-2x"></i> Office #38, Suite 54 Elizebth Street,Victoria State &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	Newyork,USA 33026</li>
					<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-phone fa-2x"></i> 100</li>
					<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-envelope fa-2x"></i> noname@noname.com</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="contact-form" >
		<div class="container">
			<form action="includes/contact.inc.php" method="POST">
			<table><tr><td>

					<input type="text" required="" class="form-control" id="name" name="name" placeholder="name" style="height:20%;">

			</td><td>

					<input type="email" required="" class="form-control"  id="email" name="email" placeholder="email"data-parsley-type="email" style="height:20%;">

			</td><td>

					<input type="text" required="" class="form-control" id="phone" name="phone" placeholder="phone" data-parsley-type="number" style="height:20%;">

		</td><tr><td colspan="3">
		</div>

		<div class="container">

				<textarea class="form-control" rows="5"  id="query" name="query" required="" placeholder="Enter your query here"></textarea>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-primary btn-lg" >Submit Message</button>
			</div>
		</div><td></tr></table>
		</form>
		</div>
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
