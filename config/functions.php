<?php
/*Divider Functions*/
function section_divider_main_start() {
  $val = '<div class="col-md-9 col-sm-8 col-xs-12">';
  echo $val;
}

function section_divider_main_end() {
  $val	= '</div>';
  echo $val;
}

function assets($path) {	//Create Path for Assets from Base URL
	$asseturl = $GLOBALS['baseurlval']."assets/".$path;
	echo $asseturl;
	//echo $GLOBALS['baseurlval'];
}

function assets_get($path) {  //Create Path for Assets from Base URL
  $asseturl = $GLOBALS['baseurlval']."assets/".$path;
  return $asseturl;
  //echo $GLOBALS['baseurlval'];
}

function route($path) {	//Create Path for Assets from Base URL
	$routeurl = $GLOBALS['baseurlval'].$path;
	echo $routeurl;
	//echo $GLOBALS['baseurlval'];
}

function getroute($path) { //Create Path for Assets from Base URL
  $routeurl = $GLOBALS['baseurlval'].$path;
  return $routeurl;
}

function adminroute($path) { //Create Path for Assets from Base URL
  $routeurl = $GLOBALS['baseurlval'].'administrator/'.$path;
  echo $routeurl;
  //echo $GLOBALS['baseurlval'];
}

function seoUrl($string) {
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
}

function checkFile($path,$filename) {
  $fileurl = $GLOBALS['serverurl'].$path.$filename;
  return(file_exists($fileurl));
}

function fileUpload($requestname, $path, $filename, $type = "Any") {
  //Reflects File Upload Path
  //$requestname contain file name from form
  if($type != "Any") {
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
      $filename = $_FILES["image"]["name"];
      $filetype = $_FILES["image"]["type"];
      $filesize = $_FILES["image"]["size"];
      // Verify file size - 1MB maximum
      $maxsize = 1024 * 1024;
      if($filesize > $maxsize) return "Error: File size is larger than the allowed limit.";
    }
  } 
  if(checkFile("assets/jnu-docs/course-stucture/" , $filename)){
      //echo $filename . " is already exists.";
      return $filename . " is already exists.";
  } else{
      $fileurl = $GLOBALS['serverurl'].$path;
      move_uploaded_file($requestname["tmp_name"], $fileurl . $filename);
      return "Your file was uploaded successfully.";
  } 
}

function dd($var) {
  echo "<pre>";
  var_dump($var);
  echo "</pre>";
  die();
}

function array_to_object($array) {
    return (object) $array;
}

function object_to_array($object) {
    return (array) $object;
}

function pageEncode($page) {
  $data = base64_encode($page);
  $data = str_replace(array('+','/','='),array('-','_',''),$data);
  return $data;
}

function pageDecode($page) {
  $data = str_replace(array('-','_'),array('+','/'),$page);
  $mod4 = strlen($data) % 4;
  if ($mod4) {
      $data .= substr('====', $mod4);
  }
  return base64_decode($data);
}

function indianStates() {

  $indian_all_states  = array (
   'AP' => 'Andhra Pradesh',
   'AR' => 'Arunachal Pradesh',
   'AS' => 'Assam',
   'BR' => 'Bihar',
   'CT' => 'Chhattisgarh',
   'GA' => 'Goa',
   'GJ' => 'Gujarat',
   'HR' => 'Haryana',
   'HP' => 'Himachal Pradesh',
   'JK' => 'Jammu & Kashmir',
   'JH' => 'Jharkhand',
   'KA' => 'Karnataka',
   'KL' => 'Kerala',
   'MP' => 'Madhya Pradesh',
   'MH' => 'Maharashtra',
   'MN' => 'Manipur',
   'ML' => 'Meghalaya',
   'MZ' => 'Mizoram',
   'NL' => 'Nagaland',
   'OR' => 'Odisha',
   'PB' => 'Punjab',
   'RJ' => 'Rajasthan',
   'SK' => 'Sikkim',
   'TN' => 'Tamil Nadu',
   'TR' => 'Tripura',
   'UK' => 'Uttarakhand',
   'UP' => 'Uttar Pradesh',
   'WB' => 'West Bengal',
   'AN' => 'Andaman & Nicobar',
   'CH' => 'Chandigarh',
   'DN' => 'Dadra and Nagar Haveli',
   'DD' => 'Daman & Diu',
   'DL' => 'Delhi',
   'LD' => 'Lakshadweep',
   'PY' => 'Puducherry',
  );
  return $indian_all_states;
}

/*File*/
function get_extension($file) {
 $extension = end(explode(".", $file));
 return $extension ? $extension : false;
}

/*Array*/

function in_array_r($needle, $haystack, $strict = false) {  //In_array for Multidimention
  foreach ($haystack as $item) {
      if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
          return true;
      }
  }

  return false;
}

function self_host() {
  //Self Host Form Submit
  echo htmlspecialchars($_SERVER["PHP_SELF"]);
}

function youtubeEmbed($url) {
  $out = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"100%\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$url);
  return $out;
}
?>