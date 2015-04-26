<?php
 	require_once('./library.php');
	$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
	date_default_timezone_set("America/New_York");
function replace($text){
$last = addslashes($text);
$last = htmlspecialchars($last);
$last = trim($last);
return $last;
}

function updatepath ($question)
{
	$query = "";
	$result = mysqli_query($con, $query);
}

function compress($source, $destination, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);

    return $destination;
}
?>