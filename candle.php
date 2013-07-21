#!/usr/bin/php
<?php

require "hue.php";

while (true) {
	$target = 2;
	$command = array('ct' => rand(350,500), 'bri' => rand(25,75));
	setLight($target, $command);
	usleep(100000);
}
?>