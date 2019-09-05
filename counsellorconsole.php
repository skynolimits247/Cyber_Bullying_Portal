<?php
require_once('header.php');
include_once('includes/db.inc.php');
?>

<div class="container" style="color:black;">
	<div class="row">
        <div class="span12">
    		<div class="" id="loginModal">

              <div class="">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab" style="color:black;">Pending Complaint(s)</a></li>
                    <li><a href="#create" data-toggle="tab" style="color:black;">Closed Complaint(s)</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                        
                          
                        
							<?php
							$i=$_SESSION['logindetails']['uname'];
							$j="open";
							$sql="select * from complaint where status ='$j' ORDER BY created_at DESC;";
							$result=mysqli_query($conn, $sql);
							$resultCheck=mysqli_num_rows($result);
							if($resultCheck<1){
							  echo '<h3>Sorry...There Are No Complaints Pending For You...!<h3>';
							}else{
							  echo '   <h2 style="text-center">Complaint(s) Pending : '.$resultCheck.'</h2>

								 <table class="table table-hover datatable">
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
							    echo '<tr><td>'.$results['user_name'].'</td><td>'.$results['created_at'].'</td><td>'.$results['message'].'</td><td>'.$results['file'].'</td><td>'.$results['bully_type'].'</td><td>'.$results['source'].'</td>';

							      echo '<td><form action="counsellorcomplaintinfo.php" method="POST">&nbsp;<input type="hidden" name="id" value="'.$results['complaint_id'].'"><button type="submit" class="btn btn-success">'.$results['status'].'</button></form></td></tr>';

							}
							}


							echo " </tbody>
														  </table>";
							?>


														   

                    </div>
                        
                     <div class="tab-pane fade" id="create">
                      
						<?php
						$i=$_SESSION['logindetails']['uname'];
						$j="closed";
						$sql="select * from complaint where action_taken_by ='$i' and status ='$j' ORDER BY created_at DESC;";
						$result=mysqli_query($conn, $sql);
						$resultCheck=mysqli_num_rows($result);
						if($resultCheck<1){
						  echo '<h3>Sorry...There Are No Complaints Closed By You...!<h3>';
						}else{
						  echo '     <h2 style="text-center">Complaint(s) closed by you : '.$resultCheck.'</h2>

							<table class="table table-hover datatable">
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
						    echo '<tr><td>'.$results['user_name'].'</td><td>'.$results['created_at'].'</td><td>'.$results['message'].'</td><td>'.$results['file'].'</td><td>'.$results['bully_type'].'</td><td>'.$results['source'].'</td>';
						    if($results['status'] == "open"){
						      echo '<td><form action="counsellorcomplaintinfo.php" method="POST">&nbsp;<input type="hidden" name="id" value="'.$results['complaint_id'].'"><button type="submit" class="btn btn-success">'.$results['status'].'</button></form></td></tr>';
						    }else{
						        echo '<td><form action="counsellorcomplaintinfo.php" method="POST">&nbsp;<input type="hidden" name="id" value="'.$results['complaint_id'].'"><button type="submit" class="btn btn-danger">'.$results['status'].'</button></form></td></tr>';
						    }
						}
						}

						echo "</tbody>
				                    </table>";

						?>
										
                    </div> 
                </div>
              </div>
            </div>
        </div>
	</div>
</div>

</div>

<?php include 'footer.php' ?>
