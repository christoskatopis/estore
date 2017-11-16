<?php

if (($_SESSION["access"]==0)||($_SESSION["islogged"]!="default")) {
   header('Location:index.php?action=404');
}


$query="SELECT * FROM messages ";
$results=mysql_query($query);



if (isset($_POST["delete"]))
 {
   $query="DELETE FROM messages WHERE id='".$_POST["id"]."'";
   mysql_query($query);
   echo "<div id='confirmation'>The database has been updated.<a href='index.php?action=viewmessages'>Refresh</a>the page to view the changes.</div>";
 }

 if($results){
    echo "<h3>MESSAGES</h3>";
    echo "<h2><div class='dtb-title-2'>Username</div><div class='dtb-title-2'>E - Mail</div><div class='dtb-title-2'>Message</div><div class='dtb-title-2'>Date Sent</div>";

   while ($obj = mysql_fetch_object($results))
   {
     $item .= <<<EOT
     <form method="post" action="index.php?action=viewmessages" style="margin-top:10px">
      <input type="hidden" value="$obj->id" name="id" ></input>
      <input type="text" value="$obj->msg_name" name="msg_name" class="dtb-2"></input>
      <input type="text" value="$obj->msg_email" name="msg_email" class="dtb-2"></input>
      <input type="text" value="$obj->msg_text" name="msg_text" class="dtb-2"></input>
      <input type="text" value="$obj->msg_date" name="msg_date" class="dtb-2"></input>
      <input type="submit" value="Delete" name="delete" class="button"></input></form> 
EOT;
  } 
}
echo $item; 
  ?>

