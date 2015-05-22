<?php
use PHPImageWorkshop\ImageWorkshop;

// include PHPImageWorkshop library
require_once('PHPImageWorkshop/ImageWorkshop.php'); 

// remove the previous files of the user before generating new one
@unlink('uploads/' . $userID . 's.jpg'); // small size image
@unlink('uploads/' . $userID . 'b.jpg'); // big size image

// generate jpeg image from user user profile picture via url
$fbUserPic = 'http://graph.facebook.com/'.$userName.'/picture?width=500&height=500';
$img = imagecreatefromjpeg($fbUserPic);
$path = 'uploads/' . $userID . 's.jpg';
imagejpeg($img, $path);

// Initialization of layers
$mainLayer = ImageWorkshop::initFromPath(__DIR__. '/uploads/' . $userID . 's.jpg');
$childLayer = ImageWorkshop::initFromPath(__DIR__. '/image/badge2.png');
$logoLayer = ImageWorkshop::initFromPath(__DIR__. '/image/yfb_logo.png');
$textLayer1 = ImageWorkshop::initTextLayer($blood_group, 'font/providence.ttf', 13, '000000', 0);

if(strtoupper($position) == 'RB') {

	$mainLayer->addLayerOnTop($childLayer, 0, 30, strtoupper($position));	
	
} else {

	$mainLayer->addLayerOnTop($childLayer, 0, 0, strtoupper($position));
	
}

$mainLayer->addLayerOnTop($logoLayer, 0, 0, 'RB');
	
if(strtoupper($position) == 'LT') {

	$mainLayer->addLayerOnTop($textLayer1, 48, 90, 'LT');
	
} elseif(strtoupper($position) == 'RT' ) {

	$mainLayer->addLayerOnTop($textLayer1, 100, 88, 'RT');
	
} elseif(strtoupper($position) == 'LB' ) {

	$mainLayer->addLayerOnTop($textLayer1, 48, 100, 'LB');
	
} elseif(strtoupper($position) == 'RB' ) {

	$mainLayer->addLayerOnTop($textLayer1, 100, 130, 'RB');
	
}

// Saving the result in a folder
$mainLayer->save(__DIR__."/uploads", $userID . 'b.jpg', true, null, 95);

$image = $mainLayer->getResult("ffffff");