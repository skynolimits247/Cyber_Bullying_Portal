<?php
require_once('header.php');
include_once('includes/db.inc.php');
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
        <h2 style="text-center">Your Complaints :</h2>

		<?php
		$i=$_SESSION['logindetails']['uname'];
		$sql="select * from complaint where user_name ='$i' ORDER BY created_at DESC;";
		$result=mysqli_query($conn, $sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck<1){
		  echo '<h3>Sorry...There Are No Complaints Lodged By You...!<h3>';
		} else {
			echo '
		   	<table id="palak" class="table display">
		    <thead>
		    <tr>
				<th>User Name</th>
				<th>Date Created</th>
				<th>Message</th>
				<th>Attached File</th>
				<th>Bully Type</th>
				<th>Source</th>
				<th>Status</th>
			</tr>
			</thead>
			<tbody>';
			foreach($result as $results){
			    echo '
			    <tr>
			    	<td>'.$results['user_name'].'</td>
			    	<td>'.$results['created_at'].'</td>
			    	<td>'.$results['message'].'</td>
			    	<td><a href="assets/images/complaints/'.$results['file'].'" target="_blank">'.$results['file'].' </a></td>
			    	<td>'.$results['bully_type'].'</td>
			    	<td>'.$results['source'].'</td>';
			    if($results['status'] == "open"){
			      echo '<td><form action="complaintinfo.php" method="POST">&nbsp;<input type="hidden" name="id" value="'.$results['complaint_id'].'"><button type="submit" class="btn btn-success">'.$results['status'].'</button></form></td></tr>';
			    }else{
			        echo '<td><form action="complaintinfo.php" method="POST">&nbsp;<input type="hidden" name="id" value="'.$results['complaint_id'].'"><button type="submit" class="btn btn-danger">'.$results['status'].'</button></form></td></tr>';
			    }
			}
		}



		?>


    </tbody>
  </table>
				</div>
		</div>

	</div>

</section>

<?php include 'footer.php' ?>
