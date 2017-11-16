passwird<?php 
include('settings.php');

if (isset($_POST["validatecc"])){
$query="SELECT creditcard FROM users WHERE username='".$_SESSION['username']."'";

$results=mysql_query($query);

$obj=mysql_fetch_object($results);

$creditcard=$obj->creditcard;

if ($creditcard==md5($_POST["creditcard"])){
	$dateoforder=date( 'Y-m-d H:i:s');
	$buyersname=$_SESSION["username"];
	$value=$_SESSION["amountpayable"];
	$query2="INSERT INTO cart  (username, value, dateoforder) VALUES ('$buyersname','$value','$dateoforder')";
	mysql_query($query2);
	echo "<div id='confirmation'>Your order will be processed. Please return to the <a href='index.php'>main page</a></div>";
    unset($_SESSION["cart_products"]);}
else {
   echo"<div id='error'>The credit card number you entered doesn't match your username. Please try again or contact your bank</div>
    ";
    $creditcard="";
}

}

?>



<div id="npost-area">
<h1>Please validate your credit card number to finish your order</h1>

<div class="gap"></div>
<form action="index.php?action=checkout" method="POST" id="np-form">
<div class="inp">
<input type="text" name="creditcard"></input></div>
<div class="gap"></div>
<input type="submit" name="validatecc" class="button" value="Submit" id="submit"></input>
</form>
</div>

