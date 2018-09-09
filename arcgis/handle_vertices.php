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
	echo "we write $str";
}
?> 
