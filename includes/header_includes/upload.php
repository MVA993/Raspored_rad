<?php
include "../connection.php";
if ($_FILES["file"]["name"] != '')
{
    $file_name      = $_FILES['file']['name'];  
    $temp_name      = $_FILES['file']['tmp_name'];
    $location       = "../../uploads/".$file_name;
    move_uploaded_file($temp_name, $location);
}

$templine       = '';
$lines          = file($location);
foreach ($lines as $line) {
if (substr($line, 0, 2) == '--' || $line == '')
	continue;
$templine       .= $line;
if (substr(trim($line), -1, 1) == ';') {
	mysqli_query($con, $templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($con) . '<br /><br />');
	$templine = '';
}
}