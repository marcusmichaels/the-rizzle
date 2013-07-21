<?php 

require('hue.php');

$targetcup = $_POST['targetcup'];
$killLight = $_POST['killLight'];
if ($killLight == true){
	killLight();
	die("Lights killed");
}

echo "The target cup I must shuffle to is $targetcup";

function letThereBeLight(){
	
#LIGHT ONE

	$lightOne = array();
	$lightOne['on'] = true;
	$lightOne['hue'] = rand(0,65535); # 0 - 65535
	$lightOne['sat'] = 255; # 0-254
	$lightOne['bri'] = 40;  # 0-254
	$lightOne['transitiontime'] = 1;

	setLight(1, $lightOne);
	print 'one complete' . "\n";

#LIGHT TWO

	$lightTwo = array();
	$lightTwo['on'] = true;
	$lightTwo['hue'] = rand(0,65535); # 0 - 65535
	$lightTwo['sat'] = 255; # 0-254
	$lightTwo['bri'] = 40;  # 0-254
	$lightTwo['transitiontime'] = 1;

	setLight(2, $lightTwo);
	print 'two complete' . "\n";

#LIGHT THREE

	$lightThree = array();
	$lightThree['on'] = true;
	$lightThree['hue'] = rand(0,65535); # 0 - 65535
	$lightThree['sat'] = 255;  # 0-254
	$lightThree['bri'] = 40;  # 0-254
	$lightThree['transitiontime'] = 1;

	setLight(3, $lightThree);
	print 'three complete' . "\n";

	usleep(200000);

}

function rizzle($targetcup){

	$rizzleDizzle['hue'] = 0;
	$rizzleDizzle['transitiontime'] = 1;
	$rizzleDizzle['bri'] = 255;  # 0-254

	echo 'The rizzle is ' . $targetcup . "\n";

	setLight($targetcup, $rizzleDizzle);
}

function killLight(){
	
#LIGHT ONE

	$lightOne = array();
	$lightOne['on'] = false;

	setLight(1, $lightOne);
	print 'one complete' . "\n";

#LIGHT TWO

	$lightTwo = array();
	$lightTwo['on'] = false;

	setLight(2, $lightTwo);
	print 'two complete' . "\n";

#LIGHT THREE

	$lightThree = array();
	$lightThree['on'] = false;

	setLight(3, $lightThree);
	print 'three complete' . "\n";

}


	letThereBeLight(); #And on the seventh day, God said let the Hues get all colourful and shit.

	rizzle($targetcup); #Then he cursed a light with THE RIZZLE!

?>