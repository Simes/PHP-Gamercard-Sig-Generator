<?php

$params = explode("/", $_SERVER["REQUEST_URI"]);

do
{
	$tmp = array_shift($params);
} while ($tmp != "gamercard");

$sigtype = array_shift($params);
$filename = urldecode(array_pop($params));
$tmp = explode(".", $filename);
$gamertag = $tmp[0];
$filetype = $tmp[1];

	switch ($filetype)
	{
		case "jpg":
		case "jpeg":
			header("Content-type: image/jpeg");
			break;

		case "gif":
			header("Content-type: image/gif");
			break;

		case "png":
			header("Content-type: image/png");
	}


include $sigtype . "_sig.php";

$image = create_sig($gamertag, $filetype);

	switch ($filetype)
	{
		case "jpg":
		case "jpeg":
			imagejpeg($image, "", 95);
			break;

		case "gif":
			imagegif($image);
			break;

		case "png":
			imagepng($image);
	}

	imagedestroy($image);

?>