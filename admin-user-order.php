<?php
   session_start();
   require_once('dbconnection.php');
   require_once('admin-header.php');
   
   if(!empty($_SESSION['logged_in']))
   {
?>
<section class="contact spad">
<div class="container">
<div class="row">
 <div class="col-lg-12">
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
               
<tbody>
<tr>
 <th>SL NO</th>
 <th>CAKE INFO</th>
 <th>WEIGHT</th>
 <th>QUANTITY</th>
 <th>DELIVERY DATE</th>
 <th>PRICE</th>
 <th>TOTAL</th>
<th>ADDRESS</th>
<th>STATUS</th>
<th>DELETE</th>
</tr>
<?php

$ret=mysqli_query($con,"select * from tbl_user_order");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<tr>
<td><?php echo $cnt; ?></td>
<td><?php  echo $row['cake_info'];?></td>
<td><?php  echo $row['weight'];?></td>
<td><?php  echo $row['quantity'];?></td>
<td><?php  echo $row['delivery_date'];?> - <?php  echo $row['delivery_time'];?></td>
<td><?php  echo $row['price'];?></td>
<td><?php  echo $row['total'];?></td>
<td><?php  echo $row['user_id'];?></td>
<td><select><option>Ordered</option><option>Delivered</option><option>Cancelled</option></select></td>
<td><a href=<?php echo "admin-view-users.php?deleteid=".$row['id'];?>>DELETE</a></td>
</tr>
<?php 
$cnt=$cnt+1;
}
?>
                 
</tbody>
</table>
</div>
</div>
</div>
</section>
<?php
require_once('admin-footer.php');
}
	else
	{
		
		header("location:admin-login.php");

	}
	?>
