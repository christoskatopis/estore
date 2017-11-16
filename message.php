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
					
					$query = "INSERT INTO messages (msg_name,msg_email,msg_date) VALUES ('$myname','$email', '$text', '$date')";
					mysql_query($query);
					$message = "Thank you for contacting us. Our team will reply to you soon";	
					echo "<script language='Javascript'>document.location.href='index.php'</script>";
					echo "<div id='confirmation'><p>We have received your message. Return to the <a href='index.php'>main page</p></div>";
			}}
			else  {
				$myname="";
				$email="";
				$text="";
			}
				
				

?>

