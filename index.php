<?php include('settings.php'); 
 include('header.php');  	
?> 


}

	<div id="page-area">

<?php    
			global $action;
			
			switch ($action) {
				case "":
					include('mainpage.php');
					break;
				case "register":
					include('register.php');
					break;
				case "login":
					include('login.php');
					break;
				case "recovery":
					include('recovery.php');
					break;
				case "profile":
					include('profile.php');
					break;
					break;
				case "contact":
					include('contact.php');
					break;
				case "searchresults":
				    include('searchresults.php');
				    break;
				case "view_cart":
				    include('view_cart.php');
				    break;
				case "empty":
				    include('empty.php');
				    break;
				case "manageproducts":
				    include('manageproducts.php');
				    break;
				 case "manageusers":
				   include('manageusers.php');
				   break;
				 case "checkout":
				  include('checkout.php');
				  break;
				 case "managecart":
				 include('managecart.php');
				 break;
				 case "viewmessages":
				 include('viewmessages.php');
				 break;
				 case "newpass":
				 include('newpass.php');
				 break;
				 case "404":
				 include('404.php');
				 break;
			}
			
		
		
		?>

	
	</div>

 <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="index.php?action=contact">About Us</a></li>
						<li><a href="index.php?action=contact">Customer Service</a></li>
						<li><a href="index.php?action-contact"><span>Contact Us</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="index.php?action=contact">About Us</a></li>
						<li><a href="index.php?action=contact">Customer Service</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<?php 
							 if ($_SESSION["islogged"]!="default")
							 echo "<li><a href='index.php?action=register'>Sign In</a></li>";
							else
							 echo "<li><a href='index.php?action=view_cart'>View Cart</a></li>"; ?>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+30-222-666444</span></li>
							<li><span>+00-000-000000</span></li>
						</ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>Company Name E - Store All rights Reseverd | Design by  Chris Katopis John Kyriazis Baggelis Malamas
		   </div>
     </div>
    </div>	






 </body>
</html>