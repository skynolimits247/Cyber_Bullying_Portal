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
                    <li class="active"><a href="#login" data-toggle="tab" style="color:black;">Pending Query(s)</a></li>
                    <li><a href="#create" data-toggle="tab" style="color:black;">Closed Query(s)</a></li>
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
														$j="open";
														$sql="select * from contact where status ='$j' ORDER BY created_at DESC;";
														$result=mysqli_query($conn, $sql);
														$resultCheck=mysqli_num_rows($result);
														if($resultCheck<1){
														  echo '<h3>Sorry...There Are No Queries For You...!<h3>';
														}else{
														  echo '   <h2 style="text-center">Queries(s) Pending : '.$resultCheck.'</h2>   <table class="table table-hover">
														    <thead>
														      <tr>
														        <th>Name</th>
														        <th>Email</th>
														        <th>Contact Number</th>
														        <th>Query</th>
														        <th>Replied At</th>
														        <th>Reply</th>
														        <th>Reply From</th>
																		<th>Replied At</th>
																		<th>Status</th>
														      </tr>
														    </thead>
														    <tbody>';
														foreach($result as $results){
														    echo '<tr><td>'.$results['name'].'</td><td>'.$results['email'].'</td><td>'.$results['contact_no'].'</td><td>'.$results['query'].'</td><td>'.$results['replied_at'].'</td><td>'.$results['reply'].'</td><td>'.$results['reply_from'].'</td><td>'.$results['created_at'].'</td>';

														      echo '<td><form action="uac_queryreply.php" method="POST">&nbsp;<input type="hidden" name="id" value="'.$results['id'].'"><button type="submit" class="btn btn-success">'.$results['status'].'</button></form></td></tr>';

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
		$sql="select * from contact where status ='$j' ORDER BY created_at DESC;";
		$result=mysqli_query($conn, $sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck<1){
		  echo '<h3>Sorry...There Are No Queries Closed...!<h3>';
		}else{
		  echo '     <h2 style="text-center">Queries(s) closed : '.$resultCheck.'</h2> <table class="table table-hover">
		    <thead>
		      <tr>
					<th>Name</th>
					<th>Email</th>
					<th>Contact Number</th>
					<th>Query</th>
					<th>Replied At</th>
					<th>Reply</th>
					<th>Reply From</th>
					<th>Replied At</th>
					<th>Status</th>
		      </tr>
		    </thead>
		    <tbody>';
		foreach($result as $results){
			echo '<tr><td>'.$results['name'].'</td><td>'.$results['email'].'</td><td>'.$results['contact_no'].'</td><td>'.$results['query'].'</td><td>'.$results['replied_at'].'</td><td>'.$results['reply'].'</td><td>'.$results['reply_from'].'</td><td>'.$results['created_at'].'</td>';
		        echo '<td><form action="uac_queryreply.php" method="POST">&nbsp;<input type="hidden" name="id" value="'.$results['id'].'"><button type="submit" class="btn btn-danger">'.$results['status'].'</button></form></td></tr>';
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
