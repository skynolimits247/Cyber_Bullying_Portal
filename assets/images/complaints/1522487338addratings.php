<?php
include 'config/app.php';
  $ipaddress 		= $_SERVER['REMOTE_ADDR'];
  		$pcode 			= $_POST['pcode'];
  		$ratingpoints 	= $_POST['ratingpoints'];
      $query = "SELECT * FROM ratings WHERE pcode = '".$pcode."' AND ip_addr  = '".$ipaddress."' LIMIT 1";

      $result = mysqli_query($con, $query);
      $hasRating  = mysqli_fetch_assoc($result);

  		if($hasRating)
  		{	//Update Rating
        $query = "UPDATE ratings SET rating_number = $ratingpoints WHERE pcode = '".$pcode."' AND ip_addr = '".$ipaddress."' LIMIT 1";
        $result = mysqli_query($con, $query);

  		}
  		else
  		{	//Add Rating
        $query = "INSERT INTO ratings(pcode,ip_addr,rating_number) VALUES ('".$pcode."','".$ipaddress."','".$ratingpoints."' )";
        $result = mysqli_query($con, $query);

  		}
  		return "Success";

?>
