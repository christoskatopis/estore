<?php

include('settings.php');
$ldap_cn = "cn=admin,dc=store,dc=com";
$ldap_pass = "password";
$username = $_POST["username"];
$password=  $_POST["password"];

$ldap_con = ldap_connect("localhost");

ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
if (ldap_bind($ldap_con, $ldap_cn, $ldap_pass)){
	$filter ="(& (cn=$username) (userpassword=$password))";
        $ldap_tree = "cn=Customers,ou=Users,dc=store,dc=com";   
	$result = ldap_search($ldap_con,$ldap_tree , $filter) or exit("Unable to search");
	$entries = ldap_get_entries($ldap_con, $result);
	if ($entries["count"] == 1) 
          { $_SESSION["username"]=$username;
           $_SESSION["access"]=0;
           $_SESSION["islogged"]="default";
           echo "<script language='Javascript'>alert('Welcome $username!');";
           echo "window.location='index.php';";
           echo "</script>";
}   

else { $ldap_tree= "cn=Employees,ou=Users,dc=store,dc=com";
       $result = ldap_search($ldap_con,$ldap_tree , $filter) or exit("Unable to search");
       $entries = ldap_get_entries($ldap_con, $result);
	if ($entries["count"] == 1) 
          { $_SESSION["username"]=$username;
           $_SESSION["access"]=1;
           $_SESSION["islogged"]="default";
           echo "<script language='Javascript'>alert('Welcome $username!');";
           echo "window.location='index.php';";
           echo "</script>";
}   
     else {  $ldap_tree= "cn=Admins,ou=Users,dc=store,dc=com";    
             $result = ldap_search($ldap_con,$ldap_tree , $filter) or exit("Unable to search");
             $entries = ldap_get_entries($ldap_con, $result);
           if ($entries["count"] == 1) 
          { $_SESSION["username"]=$username;
           $_SESSION["access"]=2;
           $_SESSION["islogged"]="default";
           echo "<script language='Javascript'>alert('Welcome $username!');";
           echo "window.location='index.php';";
           echo "</script>";
} 
          else {
           $_SESSION["ldap"]="fail";
           header('Location:index.php?action=login');
           /*echo "<script language='Javascript'>alert('Username and password don't match. Please try again.');";
           echo "window.location='index.php?action=login';";
           echo "</script>";*/

}
            

    } } }


else{header('Location:index.php?action=login'); 
     $_SESSION["ldap"]="confail";}



?>

