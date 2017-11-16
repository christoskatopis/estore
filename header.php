
<div id="header">
	<div id="logo">
		<a href="index.php">
			<img src="images/estore-logo.png" />
		</a>
	</div>
	<div id="navbar">
		<ul>
			<li><a href="index.php">Main</a></li>
			<li><a href="index.php?action=contact">Contact Us</a></li>
			
			
			<?php
				if (!isset($_SESSION["islogged"]))
					echo "
						<li><a href='index.php?action=login'>Log In</a></li>
						<li><a href='index.php?action=register'>Register</a></li>
					";
				else {
					echo "
						<li><a href='index.php?action=view_cart'>View Cart</a></li>
						<li><a href='logout.php'>Log Out</a></li>	
					";
                if($_SESSION["access"]>=1)
                	{ echo "<li><a href='index.php?action=manageproducts'>Manage Products</a></li>";
                    echo "<li><a href='index.php?action=managecart'>Manage Orders</a></li>";
                    echo "<li><a href='index.php?action=viewmessages'>View Messages</a></li>";
                    echo "<li><a href='index.php?action=manageusers'>Manage Users</a></li>";
                    }

                }


			?>
			<li><form name="search" method="post" action="index.php?action=searchresults" id="searchbar"/>
<input name="search" type="text" size="40" maxlength="50" placeholder="Search for products..."/>
<input type="submit" name ="Submit" value="" id="searchbutton"/></form></li>	
			
		</ul>
	</div>
	
</div>