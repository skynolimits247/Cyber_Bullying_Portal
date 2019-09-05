<?php
require_once('ex_header.php');
if(isset($_POST['save']))
{      
      if(isset($_FILES['Video']) && $_FILES['Video']['error'] == 0) {
      $filename1 =time ().$_FILES['Video']['name'];

      fileUpload($_FILES['Video'], 'assets/images/complaints/', $filename1, "Any");

    } else{
      
      $filename1 = "";

    }



$user_id = "id";

    $query = "INSERT into video (link, userid, created_at) VALUES('".$_POST['vidurl']."','".$_SESSION['logindetails']['uname']."','".$currenttimestamp."')";
   
    mysqli_query($con,$query);
}
?>
<body>
<div class="container"><br><br>
      <div class="row">
			<div class="col-xs-6">
				<form method="post" action="" enctype="multipart/form-data">
                <label>Upload URL</label><br>
			  	 <textarea id="vidurl" name="vidurl" class="form-control" onchange="getId()"></textarea><br>
				<button class="btn btn-primary" type="submit" name="save">Save</button>
				</form>
			</div>
			<div class="col-xs-6">
             <iframe id="videoscreen" src="assets/images/complaints/<?php echo $videourl; ?>" width="500" height="300">
             </iframe>
			</div>
		</div>
	</div>

</body>

<?php
require_once("footer.php");
?>
<script>
function getId() {
	var url = $('#vidurl').val();
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[2].length == 11) {
        //return match[2];
        //$('#vidurl').src(match[2]);
        var vid = '//www.youtube.com/embed/'+match[2];
        $('#videoscreen').attr('src',vid); ;
    } else {
        return 'error';
    }
}
</script>