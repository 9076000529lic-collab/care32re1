<?php
session_start();

$width = 160;
$height = 50;

$image = imagecreatetruecolor($width, $height);

$bg = imagecolorallocate($image, 255, 255, 255);
$text = imagecolorallocate($image, 0, 0, 0);
$line = imagecolorallocate($image, 200, 200, 200);

imagefill($image, 0, 0, $bg);

// Random Captcha
$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
$captcha = '';

for ($i = 0; $i < 6; $i++) {
    $captcha .= $chars[rand(0, strlen($chars)-1)];
}

$_SESSION['captcha'] = $captcha;

// Random Lines
for($i=0;$i<8;$i++){
    imageline(
        $image,
        rand(0,$width),
        rand(0,$height),
        rand(0,$width),
        rand(0,$height),
        $line
    );
}

// Text
imagestring($image, 5, 35, 17, $captcha, $text);

header("Content-Type: image/png");
imagepng($image);
imagedestroy($image);
?>