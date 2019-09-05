<?php
ob_start();
ini_set('max_execution_time', 3000); //300 seconds = 5 minutes
ini_set('upload_max_filesize', '250M');
ini_set('post_max_size', '250M');




/*Basic Url*/
$currenturl = 'http://'.$_SERVER['SERVER_NAME']  . $_SERVER['REQUEST_URI'];
$baseurl 	= $_SERVER['SERVER_NAME']."/portal/" ;
//$baseurlval = "http://".$_SERVER['SERVER_NAME']."/portal/" ;
$baseurlval = "http://".$_SERVER['SERVER_NAME']."/portal/" ;

$serverurl = $_SERVER['DOCUMENT_ROOT']."/portal/";	//For Including File


/*Admin Url*/
$serveradminurl = $_SERVER['DOCUMENT_ROOT']."/portal/administrator/";	//For Including File In Admin
$adminbaseurlval = "http://".$_SERVER['SERVER_NAME']."/portal/administrator" ;





/*Divider FUnctions*/
//require_once $serverurl.'config/functions.php';



/*Date/Time Config*/
//require_once $serverurl.'config/dates.php';


//----------------------------------------------------------------
/*Database Connectivity*/
$username = "root";
$password = "";
$hostname = "localhost";
$dbname   = "bullying";

//connection to the database
$con = mysqli_connect($hostname, $username, $password,$dbname)
  or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

/*require_once '../plugin/dompdf/autoload.inc.php';*/


/*$sql= "SELECT * FROM metas WHERE url='".$currenturl."'";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($result)) {
	$meta = $row;
}
*/
session_start();

/*$subsidemenu = array();*/
?>
