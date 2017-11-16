<?php 

include('login-func.php');


		if (isset($_POST["submit"])){
			$myname = $_POST["myname"];
			$email = $_POST["email"];
			$text= $_POST["text"];

			if ($myname == "")
				echo "<div id='error'><p>Please insert your name.</p></div>";
			elseif (!validate_email($email)) {
				echo "<div id='error'><p>Please insert a valid e-mail</p></div>";
				$email = "";}
		    elseif ($text=="")
		    	echo "<div id='error'><p>Please enter a message</p></div>";
		    else {
				
					$date = date( 'Y-m-d H:i:s');
					
					$query = "INSERT INTO messages (msg_name,msg_email,msg_text,msg_date) VALUES ('$myname','$email', '$text', '$date')";
					mysql_query($query) or die(mysql_error());
					echo "<div id='confirmation'><p>We have received your message. Return to the <a href='index.php'>main page</p></div>";
			}}
			else  {
				$myname="";
				$email="";
				$text="";
			}
				

?>

<div class="main-content">
<div class="column-1" style="margin-top:30px">
<h3>Live Support</h3>
<h2>24 hours | 7 days a week | 365 days a year    Live Technical Support</h2>
<div style="text-align:left">Immediate Service, refunds.Expert technicians  to your place.</div>
<form method="post" action="index.php?action=contact" id="np-form" style="margin-top:10px">
<h3 style="margin-top:30px">Contact Us</h3>
	<div class="inp">		
	<label for="name">Name</label>
			<input type="text" name="myname" value="<?php echo $myname; ?>" style="width:150%"/>
		</div>
		
		<div class="inp">
			<label for="email">e-mail</label>
			<input type="text" name="email" value="<?php echo $email; ?>" style="width:150%"/>
		</div>
		<div class="inp">
			<label for="Message">Message</label>
		<input type="text" name="text" style="height:60px" style="width:150%"/>
		</div>
		
		<div style="margin-top:5px;">
			<input class="button" type="submit" name="submit" value="Submit" id="submit"/>
		</div>
		</form>
		</div>
<div class="column-2">
<img src="images/contact.png">
<h2>Company Information:</h2><br>
<h2>Address:</h2>
80 Karaoli Dimitriou Street,Pireus,Athens,GR
<h2>Phone:</h2>(0030) 222 666 444
<h2>Fax:</h2>(000) 000 00 00 0
<h2>Email:</h2>info@e-store.com
</div>
</div>

