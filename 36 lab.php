<?php
// Create a blank image with width 400 and height 200
$image = imagecreatetruecolor(400, 200);

// Allocate colors
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);

// Fill the background with white
imagefilledrectangle($image, 0, 0, 399, 199, $white);

// Add some text
$text = "Hello, GD Library!";
$font = 'arial.ttf'; // Path to a font file
imagettftext($image, 20, 0, 10, 100, $black, $font, $text);

// Output the image
header('Content-type: image/png');
imagepng($image);

// Free up memory
imagedestroy($image);
?>

