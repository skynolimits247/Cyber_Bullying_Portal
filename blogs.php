<?php
require_once('ex_header.php');
include_once('includes/db.inc.php');
if(isset($_POST['save']))
{

    if(isset($_FILES['Image']) && $_FILES['Image']['error'] == 0) {
      $filename =time ().$_FILES['Image']['name'];

      fileUpload($_FILES['Image'], 'assets/images/complaints/', $filename, "Any");
      }
      else {
      $filename="";
      }

      if(isset($_FILES['Video']) && $_FILES['Video']['error'] == 0) {
      $filename1 =time ().$_FILES['Video']['name'];

      fileUpload($_FILES['Video'], 'assets/images/complaints/', $filename1, "Any");

    } else{

      $filename1 = "";

    }
    $today = date("Y-m-d H:i:s");

    $query = "insert into blogs1(title,image,video,description,posted_on) VALUES('".$_POST['title']."','".$filename."','".$filename1  ."','".$_POST['details']."','".$today."')";

    mysqli_query($con,$query);




}
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
			<div class="col-xs-6">
			<form method="post" action=""  enctype="multipart/form-data" >
				<h3>Blogs</h3>
			  	 <label>Title</label><br>
			  	 <textarea name="title" class="form-control"></textarea><br>

			  	<label>Image</label><br>
				<input class="form-control" type="file" name="Image" address="attachment"><br>

				<label>Video</label><br>
				<input class="form-control" type="file" name="Video" address="attachment"><br>
                 </select><br>

				<label>Details</label><br>
                <textarea name="details" class="form-control"></textarea>

				<button class="btn btn-primary" type="submit" name="save">Save</button>
				<br><br>

				</form>

				      </div>


				      <div class="col-xs-6">





    </tbody>
  </table>
				</div>
		</div>

	</div>

</section>
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
<?php
require_once("footer.php");
?>
