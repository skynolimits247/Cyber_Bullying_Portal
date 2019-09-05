<?php
require_once('uac_header.php');
include_once('includes/db.inc.php');
$totalcompsql="select * from complaint;";
$totalcompresult=mysqli_query($conn, $totalcompsql);
$totalcomp=mysqli_num_rows($totalcompresult);

$opencompsql="select * from complaint where status= 'open';";
$opencompresult=mysqli_query($conn, $opencompsql);
$opencomp=mysqli_num_rows($opencompresult);

$closedcomp= $totalcomp-$opencomp;

$totalcounssql="select * from counsellor_info;";
$totalcounsresult=mysqli_query($conn, $totalcounssql);
$totalcouns=mysqli_num_rows($totalcounsresult);

$opencounssql="select * from counsellor_info where status= 1;";
$opencounsresult=mysqli_query($conn, $opencounssql);
$opencouns=mysqli_num_rows($opencounsresult);

$awaitinscouns= $totalcouns-$opencouns;

$totalquerysql="select * from contact;";
$totalqueryresult=mysqli_query($conn, $totalquerysql);
$totalquery=mysqli_num_rows($totalqueryresult);

$openquerysql="select * from contact where status= 'open';";
$openqueryresult=mysqli_query($conn, $openquerysql);
$openquery=mysqli_num_rows($openqueryresult);

$pendingquery= $totalquery-$openquery;


?>


<div class="container">

  <h2><i class="fa fa-tachometer fa-4x" aria-hidden="true"></i> ADMIN DASHBOARD</h2>
  <table class="table table-hover">
    <tbody>

				<?php
        echo '<tr><td><strong><a href="uac_complaintconsole.php">Complaint Console</a></strong></td>
        <td><strong><a href="uac_complaintconsole.php">Total Complaints : '.$totalcomp.'</a></strong></td>
        <td><strong><a href="uac_complaintconsole.php"><font color="red">Pending Complaints : '.$opencomp.'</font></a></strong></td>
				<td><strong><a href="uac_complaintconsole.php"><font color="green">Closed Complaints : '.$closedcomp.'</font></strong></a></td>
      </tr>
      <tr>
        <td><strong><a href="uac_counsellorconsole.php">Counsellor Console</strong></a></td>
        <td><strong><a href="uac_counsellorconsole.php">Total Volunteer Counsellors : '.$totalcouns.'</strong></a></td>
        <td><strong><a href="uac_counsellorconsole.php"><font color="red">Total Counsellors Awaiting Apporval : '.$awaitinscouns.'</font></strong></a></td>
				<td><strong><a href="uac_counsellorconsole.php"><font color="green">Total Counsellors Active : '.$opencouns.'</font></strong></a></td>
      </tr>
			<tr>
				<td><strong><a href="uac_query.php">General Queries Console</strong></a></td>
				<td><strong><a href="uac_query.php">Total Queries : '.$totalquery.'</strong></a></td>
				<td><strong><a href="uac_query.php"><font color="red">Total Unanswered Queries : '.$openquery.'</font></strong></a></td>
				<td><strong><a href="uac_query.php"><font color="green">Total Answered Queries : '.$pendingquery.'</font></strong></a></td>
			</tr>';
			?>
    </tbody>
  </table>
</div>


<?php
require_once('footer.php');
?>
