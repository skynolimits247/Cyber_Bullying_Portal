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
				$result = mysqli_query($con,"SELECT * FROM blogs1 order by id DESC");
				while($row = mysqli_fetch_array($result))
				{
					?>

					<div class="col-md-12">
						<div class="blog-list">
						<?php 
						if(!empty($row["image"])) { ?>
					<div class="col-md-6">
					<?php
					$id = $row["id"];
					if(!empty($row["video"])) {

					
					?>
					<video width="500" height="300" controls>
					<source src="assets/images/complaints/<?php echo $videourl; ?>" type="video/mp4">
					<!---<source src="assets/images/complaints/<?php echo $videourl; ?>" type="video/ogg">-->

					</video>
					<?php
					} 
					elseif(!empty($row["image"])) {
						?>
						<img src="assets/images/complaints/<?php echo $row['image']; ?>" />
					<?php
					} 
					?>
					</div>
					<div class="col-md-6">
						<div class="blog-side-desc">
				   	<?php
					  echo  "<h2>".$row['title']."</h2>"   ;
					 $j = substr ( $row['description'], 0 , 500 );

					 echo $j.'<br>';
					 echo timeago($row['posted_on']).'<br>'; ?>

					
						 		<a href="blogsread.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Read More</a>
						 <br><br>
					 	</div>
					</div>
					<?php
					}  else {

						echo  "<h2>".$row['title']."</h2>"   ;
						$j = substr ( $row['description'], 0 , 500 );

						echo $j.'<br>';
						echo timeago($row['posted_on']).'<br>'; ?>

						<!-- <button class="btn btn-primary" type="submit" name="save">Read more</button>-->
						 		<a href="blogsread.php?id=<?php echo $row['id'] ?>" class="btn btn-default">Read More</a>
						 <br><br>
					<?php
					}
					?>
					
					</div>
					<hr>
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
