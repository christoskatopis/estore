<?php
	
	if (isset($_GET["action"]))
		$action = $_GET["action"];
	else
		$action = "";
	
	include('db_settings.php');

$currency = '&#8364;'; 
$shipping_cost      = 1.50; 
$taxes              = array( 
                            'VAT' => 12,
                            'Service Tax' => 5
                            );
error_reporting(0);	
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<script src='https://www.google.com/recaptcha/api.js'></script>
	
<title>e - store</title>

	
	
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/cart_style.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Abel|Baloo+Tamma|Open+Sans+Condensed:300|Poiret+One|Titillium+Web" rel="stylesheet">



	





   
</head>

	

	
