<?php

	$link = mysqli_connect('localhost', 'root', '');
	if (!$link)
	    die('Not connected : ' . mysql_error());
	
	$db_selected = mysqli_select_db($link,'social_networking_site');

	if (!$db_selected)
    	die ('Can\'t use database : ' . mysqli_error());
	
?>
