<?php
require_once('ex_header.php');

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
      <div class="col-md-12">
				<?php
       			$id = $_SESSION['logindetails']['uname'];
       			//var_dump($id);
				$result = mysqli_query($con,"select * from video where userid = '".$id."'");
				
				while($row = mysqli_fetch_array($result))
				{
					
					echo '<div class="col-md-3 col-xs-6">';
					echo youtubeEmbed($row['link']);	
					echo "</div>";	

					
					
				//$id = $row["id"];
				

				// $date_added = $row["date_added"];
				?>
				
				<?php
				}
				
				?>


	</div>

</section>

<?php
require_once("footer.php");
?>
