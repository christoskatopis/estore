<?php   

if (($_SESSION["access"]==0)||($_SESSION["islogged"]!="default")) {
   header('Location:index.php?action=404');
}

if ($_SESSION["access"]==1)
  $results = mysql_query("SELECT * FROM users WHERE access=0");
else 
  $results = mysql_query("SELECT * FROM users WHERE access=1 OR access=0"); 


?>


<?php

if (isset($_POST['update'])){
  $query1="UPDATE users SET access='".$_POST['access']."' WHERE id='".$_POST['id']."'";
   mysql_query($query1);
 echo "<div id='confirmation'>The database has been updated.<a href='index.php?action=manageusers'>Refresh</a> the page to view the changes</div>";
 }


if (isset($_POST['delete'])){
  $query1="UPDATE users SET deleted=1 WHERE id='".$_POST['id']."'";
  mysql_query($query1);
   echo "<div id='confirmation'>The database has been updated.<a href='index.php?action=manageusers'>Refresh</a> the page to view the changes</div>";
}

if(isset($_POST['insert'])){
  if ($_SESSION["access"]==1)
      $_POST['access']=0;
  $query1 = "INSERT INTO users (username, fullname, password, email, date_registered,access,deleted,pass_changed) VALUES ('".$_POST['username']."', '".$_POST['fullname']."','".md5($_POST['password'])."','".$_POST['email']."','".date( 'Y-m-d H:i:s')."','".$_POST['access']."',0,'".date('Y-m-d')."')";
  mysql_query($query1);
  echo $query1;
  echo "<div id='confirmation'>The database has been updated.<a href='index.php?action=manageusers'>Refresh</a> the page to view the changes</div>";
}


if ($_SESSION["access"]==1){
if($results){
echo "<h3>USERS</h3>";
echo "<h2><div class='dtb-title-2'>Username</div><div class='dtb-title-2'>Full Name</div><div class='dtb-title-2'>E - Mail</div><div class='dtb-title-2'>Date Registered</div><div class='dtb-title-2'>Access</div><div class='dtb-title-2'>Deleted</div>";


while ($obj = mysql_fetch_object($results))
{
$item .= <<<EOT
<form method="post" action="index.php?action=manageusers" style="margin-top:10px">
    <input type="hidden" value="$obj->id" name="id" ></input>
    <input type="text" value="$obj->username" name="username" class="dtb-2"></input>
    <input type="text" value="$obj->fullname" name="fullname" class="dtb-2"></input>
    <input type="text" value="$obj->email" name="email" class="dtb-2"></input>
    <input type="text" value="$obj->date_registered" name="dateregistered" class="dtb-2"></input>
    <input type="text" value="$obj->access" name="access" class="dtb"></input>
    <input type="text" value="$obj->deleted" name="deleted" class=
    "dtb-2"></input>
   <input type="submit" value="Delete" name="delete" class="button"></input>
   </form>
EOT;
} 
} $item .= '<form method="post" action="index.php?action=manageusers" style="margin-top:20px">
<h2>INSERT A NEW USER</h2>
 <input type="hidden" name="id">
    <input type="text"  name="username" style="margin-top:10px" class=
  "dtb" placeholder="Username"></input>
    <input type="text"  name="fullname" class="dtb" placeholder="Fullname"></input>
    <input type="text"  name="password" class="dtb" placeholder="Password"></input>
    <input type="text"  name="email" class="dtb" placeholder="E - Mail"> </input>
    <input type="submit" value="Insert" name="insert" class="button" style="margin-top:10px"></input>
    </form>';

echo $item ;}
else{
if($results){
echo "<h3>USERS</h3>";
echo "<h2><div class='dtb-title-2'>Username</div><div class='dtb-title-2'>Full Name</div><div class='dtb-title-2'>E - Mail</div><div class='dtb-title-2'>Date Registered</div><div class='dtb-title-2'>Access</div><div class='dtb-title-2'>Deleted</div>";


while ($obj = mysql_fetch_object($results))
{
$item .= <<<EOT
<form method="post" action="index.php?action=manageusers" style="margin-top:10px">
    <input type="hidden" value="$obj->id" name="id" ></input>
    <input type="text" value="$obj->username" name="username" class="dtb-2"></input>
    <input type="text" value="$obj->fullname" name="fullname" class="dtb-2"></input>
    <input type="text" value="$obj->email" name="email" class="dtb-2"></input>
    <input type="text" value="$obj->date_registered" name="dateregistered" class="dtb-2"></input>
    <input type="text" value="$obj->access" name="access" class="dtb"></input>
    <input type="text" value="$obj->deleted" name="deleted" class=
    "dtb-2"></input>
   <input type="submit" value="Delete" name="delete" class="button"></input>
   <input type="submit" value="Update Access" name="update" class="button"></input></form>
EOT;
} 
}
$item .= '<form method="post" action="index.php?action=manageusers" style="margin-top:20px">
<h2>INSERT A NEW USER</h2>
 <input type="hidden" name="id">
    <input type="text"  name="username" style="margin-top:10px" class=
  "dtb" placeholder="Username"></input>
    <input type="text"  name="fullname" class="dtb" placeholder="Fullname"></input>
    <input type="text"  name="password" class="dtb" placeholder="Password"></input>
    <input type="text"  name="email" class="dtb" placeholder="E - Mail"> </input>
    <input type="text"  name="access" class="dtb" placeholder="Access"></input>
    <input type="submit" value="Insert" name="insert" class="button" style="margin-top:10px"></input>
    </form>';

echo $item ;
}


?>
