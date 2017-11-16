<?php 
include('login-func.php');


if (isset($_POST["newpass"])) {
$password=$_POST["password"];


if(validate_password($password)!= "OK") {
				$error = validate_password($password);
				echo "<div id='error'><p>$error</p></div>";
				$password = "";}
else{
$query="UPDATE users SET password='".md5($_POST['password'])."', pass_changed='".date('Y-m-d')."'' WHERE username='".$_SESSION['username']."' ";	
mysql_query($query);
header('Location:index.php'); 
$_SESSION["daysunchanged"]=0;}
}

?>

<div id="npost-area">
<h2>Your password has expired. Please enter a new password</h2>
<div class="gap"></div>
<form action="index.php?action=newpass" method="POST" id="np-form">
<div class="inp">
<input type="password" name="password"></input></div>
<div class="gap"></div>
<input type="submit" name="newpass" class="button" value="Submit" id="submit"></input>
</form>
</div>

