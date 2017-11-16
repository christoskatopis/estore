
<?php 
if (($_SESSION["access"]==0)||($_SESSION["islogged"]!="default")) {
   header('Location:index.php?action=404');
}

$results = mysql_query("SELECT * FROM products"); 

if (isset($_POST['update'])){
  $query="UPDATE products SET product_code='".$_POST['product_code']."' , product_name='".$_POST['product_name']."', product_desc='".$_POST['product_desc']."' , product_price='".$_POST['product_price']."' WHERE id='".$_POST['id']."'";
   mysql_query($query);
   echo "<div id='confirmation'>The database has been updated.<a href='index.php?action=manageproducts'>Refresh</a> the page to view the changes</div>";
}

if (isset($_POST['delete'])){
  $query="DELETE FROM products WHERE id='".$_POST['id']."'";
  mysql_query($query);
   echo "<div id='confirmation'>The database has been updated.<a href='index.php?action=manageproducts'>Refresh</a> the page to view the changes</div>";
}

if(isset($_POST['insert'])){
  $query = "INSERT INTO products (product_code, product_name, product_desc, product_price) VALUES ('".$_POST['product_code']."', '".$_POST['product_name']."','".$_POST['product_desc']."','".$_POST['product_price']."')";
  mysql_query($query);
   echo "<div id='confirmation'>The database has been updated.<a href='index.php?action=manageproducts'>Refresh</a> the page to view the changes</div>";
} ?>

<?php 
if($results){
echo "<h3>PRODUCTS</h3>";
echo "<h2><div class='dtb-title'>Code</div><div class='dtb-title'>Name</div><div class='dtb-title'>Description</div><div class='dtb-title'>Price</div>";
while ($obj = mysql_fetch_object($results))
{
$item .= <<<EOT
<form method="post" action="index.php?action=manageproducts" style="margin-top:10px">
    <tr>
    <input type="hidden" value="$obj->id" name="id" ></input>
    <input type="text" value="$obj->product_code" name="product_code" class="dtb"></input>
    <input type="text" value="$obj->product_name" name="product_name" class="dtb"></input>
    <input type="text" value="$obj->product_desc" name="product_desc" class="dtb"></input>
    <input type="text" value="$obj->product_price" name="product_price" class=
    "dtb"></input>
   </tr>
   <input type="submit" value="Update" name="update" class="button"></input>
   <input type="submit" value="Delete" name="delete" class="button"></input>
   </form>
EOT;
}}
$item .= '<form method="post" action="index.php?action=manageproducts" style="margin-top:20px">
<h2>INSERT A NEW PRODUCT</h2>
 <input type="hidden" name="id"></input>
    <input type="text"  name="product_code" style="margin-top:10px" class=
  "dtb" placeholder="Code"></input>
    <input type="text"  name="product_name" class="dtb" placeholder="Name"></input>
    <input type="text"  name="product_desc" class="dtb" placeholder="Description" </input>
    <input type="text"  name="product_price" class="dtb" placeholder="Price"></input>
    <input type="submit" value="Insert" name="insert" class="button"></input>
    </form>';
echo $item;



?>
