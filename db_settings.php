<?php

        error_reporting(0);
	$hostname = 'localhost';	
	$dbname = 'store';		
	$username = 'root';			
	$password = '';				
	mysql_connect($hostname, $username, $password) or die(mysql_error());
	mysql_select_db($dbname) or die(mysql_error());	
	mysql_set_charset('greek');
	$mysql= mysql_connect($hostname, $username, $password);
	$mysqli = new mysqli($hostname, $username, $password, $dbname);	
?>
