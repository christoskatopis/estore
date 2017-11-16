
<?php  

if (($_SESSION["access"]==0)||($_SESSION["islogged"]!="default")) {
   header('Location:index.php?action=404');
}

$results = mysql_query("SELECT * FROM cart"); 
if (isset($_POST['delete'])){
  $query="DELETE FROM cart WHERE id='".$_POST['id']."'";
  mysql_query($query);
  echo"<div id='confirmation'>The database has been updated.<a href='index.php?action=managecart'>Refresh</a>the page to view the changes.</div>";
}

if($results){
echo "<h3>ORDERS</h3>";
echo "<h2><div class='dtb-title-3'>Id</div><div class='dtb-title-3'>Username</div><div class='dtb-title-3'>Amount Payable</div>Date of Order</h2>";
while ($obj = mysql_fetch_object($results))
{
$item .= <<<EOT
<form method="post" action="index.php?action=managecart" style="margin-top:10px">
    <tr>
    <input type="text" value="$obj->id" name="id" class="dtb-2" ></input>
    <input type="text" value="$obj->username" name="username" class="dtb-2"></input>
    <input type="text" value="$obj->value" name="value" class="dtb-2"></input>
    <input type="text" value="$obj->dateoforder" name="dateoforder" class="dtb-2"></input>
   </tr>
   <input type="submit" value="Delete" name="delete" class="button" style="margin-left:10px"></input>
   </form>
EOT;
}
echo $item;
}


?>
