<?php
require_once('header.php');
?>
<style type="text/css">
/*form {
	max-width: 400px;
	margin: auto;
	display: block;
}*/
</style>
<section>
	<div class="container">
	<div class="container">	<a href="blogs.php" class="btn btn-primary" style="text-center">Post a Blog</a></div>
  	<div class="row">

				<?php
				function timeago($date) {
						 $timestamp = strtotime($date);

						 $strTime = array("second", "minute", "hour", "day", "month", "year");
						 $length = array("60","60","24","30","12","10");

						 $currentTime = time();
						 if($currentTime >= $timestamp) {
							$diff     = time()- $timestamp;
							for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
							$diff = $diff / $length[$i];
							}

							$diff = round($diff);
							return $diff . " " . $strTime[$i] . "(s) ago ";
						 }
					}
					$i=$_SESSION['logindetails']['id'];
				$result = mysqli_query($con,"SELECT * FROM blogs1 where posted_by='$i'order by posted_on DESC");
				while($row = mysqli_fetch_array($result))
				{
					?>

					<div class="col-md-12">
					<div class="col-md-6">
					<?php
				$id = $row["id"];
				$videourl = $row["video"];

				// $date_added = $row["date_added"];
				?>
				<video width="500" height="300" controls>
				<source src="assets/images/complaints/<?php echo $videourl; ?>" type="video/mp4">
				<!---<source src="assets/images/complaints/<?php echo $videourl; ?>" type="video/ogg">-->

				</video>
			</div>
			<div class="col-md-6">
		   <?php
			  echo  "<h2>".$row['title']."</h2>"   ;
			 $j = substr ( $row['description'], 0 , 100 );

			 echo $j.'<br>';
			 echo timeago($row['posted_on']).'<br>'; ?>

			<!-- <button class="btn btn-primary" type="submit" name="save">Read more</button>-->
			 		<a href="blogsread.php?id=<?php echo $row['id'] ?>">Read More</a>
			 <br><br>

			</div>
		</div>
				<?php
				}
				//echo  "<iframe src=\"{$videourl}\" height="300" width="500">  </iframe>";
				?>

		</div>
	</div>

</section>

<?php
require_once("footer.php");
?>
