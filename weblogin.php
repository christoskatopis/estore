<?php

		if (isset($_POST["submit"])) {
		
			$username = $_POST["username"];
			$password = $_POST["password"];
			$hashed_pass = md5($password);
			
			$datecheck="SELECT pass_changed FROM users WHERE username='$username'";
            $results=mysql_query($datecheck);
            $obj = mysql_fetch_object($results); 
            $passchanged = strtotime($obj->pass_changed);
            $today = strtotime(date('Y-m-d'));
            $daysunchanged = ($today - $passchanged)/(60*60*24); 
			if (($username == "") || ($password == ""))
				echo "<div id='error'><p>Please enter your credentials.</p></div>";
			

			
			else {
				$query="SELECT * FROM users WHERE username='".$_POST["username"]."' AND password='$hashed_pass' AND deleted=0";
			
				$result = mysql_query($query) or die(mysql_error());
		     
				if (mysql_num_rows($result) == 0) {
					echo "<div id='error'><p>Username and password don't match. Click <a href='index.php?action=recovery'>here</a>to recover your credentials.</p></div>";
					$username = "";
					$password = "";
				}
				
				else {
				
					$user = mysql_fetch_array($result);
					$_SESSION["islogged"] = "default";
					$_SESSION["username"] = $user["username"];
					$_SESSION["myname"] = $user["fullname"];
					$_SESSION["access"] = $user["access"];
					$username=$user["username"];
					if ($daysunchanged > 180)
                      { header('Location:index.php?action=newpass');
                     }
                   else
					  {
                        echo "<script language='Javascript'>alert('Welcome $username!');";
                        echo"window.location='index.php';";
                        echo "</script>";
				}
				
					
				}
			}
			
			
		
		}
		
		else {
		
			$username = "";
			$password = "";
		}
		
		
		?>