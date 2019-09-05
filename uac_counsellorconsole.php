<?php
require_once('uac_header.php');
include_once('includes/db.inc.php');
?>

<div class="container" style="color:black;">
	<div class="row">
        <div class="span12">
    		<div class="" id="loginModal">

              <div class="modale-body">
                <div class="well">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#login" data-toggle="tab" style="color:black;">Counsellors Awaiting Approval(s)</a></li>
                    <li><a href="#create" data-toggle="tab" style="color:black;">Active Counsellors(s)</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                        <fieldset>
                          <div id="legend">

                          </div>
                          <div class="control-group">
                            <!-- Username -->
														<?php
														$i=$_SESSION['logindetails']['uname'];

														$sql="select * from counsellor_info where status = 0";
														$result=mysqli_query($conn, $sql);
														$resultCheck=mysqli_num_rows($result);
														if($resultCheck<1){
														  echo '<h3>Sorry...There Are No Counsellors Awaiting Approval For You...!<h3>';
														}else{
														  echo '   <h2 style="text-center">Apporval(s) Pending : '.$resultCheck.'</h2>   <table class="table table-hover">
														    <thead>
														      <tr>
														        <th>User Name</th>
														        <th>First Name</th>
																		<th>Last Name</th>

														        <th>Contact No</th>
														        <th>Experience</th>
														        <th>Certification</th>
																		<th>Address</th>
																		<th>Organization</th>
																		<th>Fees</th>
																		<th>Designation</th>
																		<th>Gender</th>
														        <th>Status</th>
														      </tr>
														    </thead>
														    <tbody>';
														foreach($result as $results){
echo '<tr><td>'.$results['user_name'].'</td><td>'.$results['f_name'].'</td><td>'.$results['l_name'].'</td><td>'.$results['contact_no'].'</td><td>'.$results['experience'].'</td><td>'.$results['certifications'].'</td><td>'.$results['address'].'</td><td>'.$results['organization'].'</td><td>'.$results['fees'].'</td><td>'.$results['designation'].'</td><td>'.$results['gender'].'</td>';
														      echo '<td><form action="uac_excounsellorapproval.php" method="POST">&nbsp;<input type="hidden" name="id" value="'.$results['id'].'"><button type="submit" class="btn btn-success">'.$results['status'].'</button></form></td></tr>';

														}
														}



														?>


														    </tbody>
														  </table>

                          <div class="control-group">
                            <!-- Button -->

                          </div>
                        </fieldset>

                    </div>
                    <div class="tab-pane fade" id="create">
                        <table class="table table-hover" style="color:black;">
                          <tbody><tr><td>
														<?php
		$i=$_SESSION['logindetails']['uname'];
		$j="closed";
		$sql="select * from counsellor_info where status =1";
		$result=mysqli_query($conn, $sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck<1){
		  echo '<h3>Sorry...There Are No Active Counsellors...!<h3>';
		}else{
		  echo '     <h2 style="text-center">Counsellor(s) active : '.$resultCheck.'</h2> <table class="table table-hover">
			<thead>
				<tr>
				<th>User Name</th>
				<th>First Name</th>
				<th>Last Name</th>

				<th>Contact No</th>
				<th>Experience</th>
				<th>Certification</th>
				<th>Address</th>
				<th>Organization</th>
				<th>Fees</th>
				<th>Designation</th>
				<th>Gender</th>
				<th>Status</th>
				</tr>
			</thead>
		    <tbody>';
		foreach($result as $results){
				echo '<tr><td>'.$results['user_name'].'</td><td>'.$results['f_name'].'</td><td>'.$results['l_name'].'</td><td>'.$results['contact_no'].'</td><td>'.$results['experience'].'</td><td>'.$results['certifications'].'</td><td>'.$results['address'].'</td><td>'.$results['organization'].'</td><td>'.$results['fees'].'</td><td>'.$results['designation'].'</td><td>'.$results['gender'].'</td>';

					echo '<td><form action="uac_excounsellorapproval.php" method="POST">&nbsp;<input type="hidden" name="id" value="'.$results['id'].'"><button type="submit" class="btn btn-success">'.$results['status'].'</button></form></td></tr>';

		}
		}



		?>

                      </tbody>
                    </table>
                    </div>
                </div>
              </div>
            </div>
        </div>
	</div>
</div>
</div>


<?php
require_once('footer.php');
?>
