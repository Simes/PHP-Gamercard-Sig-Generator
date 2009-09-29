<?php
include "parser/gamercard.php";

function create_sig($gamertag, $filetype)
{	
	$card = getGamerCard($gamertag);

	if ($card != "")
	{
		$image = imagecreatefrompng("images/bioshock/background.png");
//	$image = imagecreatetruecolor(imagesx($imageorig), imagesy($imageorig));
//	imagecopy($image, $imageorig, 0, 0, 0, 0, imagesx($imageorig), imagesy($imageorig));

		$digits = imagecreatefrompng("images/bioshock/digits.png");

		$digitwidth = 13;
		$digitheight = 18;

		$offsetY = 117;
		$offsetX100k = 27;
		$offsetX10k = 41;
		$offsetX1k = 56;
		$offsetX100 = 70;
		$offsetX10 = 84;
		$offsetX1 = 99;

		$score = $card->score;

		$digit = $score/100000 % 10;
		imagecopymerge($image, $digits, $offsetX100k, $offsetY, ($digit * $digitwidth) + 1, 0, $digitwidth, $digitheight, 100);
		$digit = ($score/10000) % 10;
		imagecopymerge($image, $digits, $offsetX10k, $offsetY, ($digit * $digitwidth) + 1, 0, $digitwidth, $digitheight, 100);
		$digit = ($score/1000) % 10;
		imagecopymerge($image, $digits, $offsetX1k, $offsetY, ($digit * $digitwidth) + 1, 0, $digitwidth, $digitheight, 100);
		$digit = ($score/100) % 10;
		imagecopymerge($image, $digits, $offsetX100, $offsetY, ($digit * $digitwidth) + 1, 0, $digitwidth, $digitheight, 100);
		$digit = ($score/10) % 10;
		imagecopymerge($image, $digits, $offsetX10, $offsetY, ($digit * $digitwidth) + 1, 0, $digitwidth, $digitheight, 100);
		$digit = ($score) % 10;
		imagecopymerge($image, $digits, $offsetX1, $offsetY, ($digit * $digitwidth) + 1, 0, $digitwidth, $digitheight, 100);

		imagedestroy($digits);

//	imagedestroy($imageorig);
	}


	return $image;
}
?>