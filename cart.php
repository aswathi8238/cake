<?php
require_once('header.php');
require_once('dbconnection.php');
$cakeid = $_GET['cakeid'];
$ret=mysqli_query($con,"select * from tbl_cake where id = $cakeid");

while ($row=mysqli_fetch_array($ret)) 
{
  $cake_name = $row['cake_name'];
  $category = $row['category_name'];
  $price = $row['cake_price'];
  $photo = $row['photo'];
}


?>
cart
<?php
require_once('footer.php');
?>
	
