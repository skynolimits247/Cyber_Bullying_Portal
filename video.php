<?php
require_once('header.php');
?>
<script type="text/javascript">
	function getId(url) {
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[2].length == 11) {
        return match[2];
    } else {
        return 'error';
    }
}

/*var videoId = getId('http://www.youtube.com/watch?v=zbYf5_S7oJo');

var iframeMarkup = '<iframe width="560" height="315" src="//www.youtube.com/embed/' 
    + videoId + '" frameborder="0" allowfullscreen></iframe>';*/
</script>
<section>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<br><br>
				<?php
				$sql="select * from video ORDER BY created_at DESC;";
				$result=mysqli_query($con, $sql);
				while($row = mysqli_fetch_assoc($result)) {
					echo '<div class="col-md-3 col-xs-6">';
					echo youtubeEmbed($row['link']);	
					echo "</div>";		
				}
				?>
			
		</div>
	</div>
</div>
</section>
<?php
require_once('footer.php');
?>