<?php
// if data are received via POST, with index of 'test'
ini_set('display_errors', 1); 
error_reporting(E_ALL);
if (isset($_POST['vertices'])) {
    $str = $_POST['vertices'];             // get data
    //echo "The string: '<i>".$str."</i>' contains ". strlen($str). ' characters and '. str_word_count($str, 0). ' words.';
	$myfile = fopen("/home/zxhero/NUS/ArcGIS/vertices_info.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $str);
	fclose($myfile);
	$raw_return_dot = array('dot_count' => 2, 'coordinates' => [[103.78121219018385,1.4021936422769343],[103.93879733422659,1.3592907597157984]]);
	$return_dot = json_encode($raw_return_dot);

	header("Content-type", "application/json");
	echo $return_dot;
}
?> 
