<?php
include "parser/gamercard.php";

function create_sig($gamertag, $filetype)
{
	$card = getGamerCard($gamertag);

	$repstarsgif = imagecreatefromgif("images/gc_repstars_external_" . $card->rep . ".gif");
	$repstars = imagecreatetruecolor(imagesx($repstarsgif), imagesy($repstarsgif));
	imagecopy($repstars, $repstarsgif, 0, 0, 0, 0, imagesx($repstarsgif), imagesy($repstarsgif));
	$starsbg = imagecolorallocate($repstars, 117, 117, 117);
	imagecolortransparent($repstars, $starsbg);

	$image = imagecreatefromjpeg("images/sturgeon.jpg");
	$textcolour = imagecolorallocate($image, 255, 255, 255);
	imagestring($image, 2, 4, 4, $gamertag, $textcolour);
	imagestring($image, 2, 4, 20, "Rep: ", $textcolour);
	imagestring($image, 2, 4, 34, "Score: " . $card->score, $textcolour);
	imagecopymerge($image, $repstars, 28, 22, 0, 0, imagesx($repstars), imagesy($repstars), 100);

	return $image;
}
?>