<?php  include('checksession.php');
    include('settings.php');
 if (!isset($_POST['search'])) {
 header("Location:index.php");
 }

$results = mysql_query("SELECT * FROM products WHERE product_name LIKE '%".$_POST['search']."%' OR product_desc LIKE '%".$_POST['search']."%' ORDER BY id ASC");
if(mysql_num_rows($results)>0){
echo "<h2>SEARCH RESULTS</h2>";
$products_item = '<ul class="products">';
while($obj = mysql_fetch_object($results))
{
$products_item .= <<<EOT
    <li class="product">
    <form method="post" action="cart_update.php">
    <div class="product-content"><h3>{$obj->product_name}</h3>
    <div class="product-thumb"><img src="images/{$obj->product_img_name}"></div>
    <div class="product-desc">{$obj->product_desc}</div>
    <div class="product-info">
    Price {$currency}{$obj->product_price}
   
    <fieldset>
   
    <label>
        <span>Color</span>
        <select name="product_color">
        <option value="Black">Black</option>
        <option value="Silver">Silver</option>
        </select>
    </label>
   
    <label>
        <span>Quantity</span>
        <input type="text" size="2" maxlength="2" name="product_qty" value="1" />
    </label>
   
    </fieldset>
    <input type="hidden" name="product_code" value="{$obj->product_code}" />
    <input type="hidden" name="type" value="add" />
    <input type="hidden" name="return_url" value="{$current_url}" />
    <div align="center"><button type="submit" class="add_to_cart">Add to Cart</button></div>
    </div></div>
    </form>
    </li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
else
{echo "There are not results matching your search.";}
 ?>