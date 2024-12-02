<?php
require_once('header.php');
require_once('dbconnection.php');
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) 
{

if(isset($_GET['cancelid']))
{
$query = "SELECT * FROM tbl_order_cancel_time";
$data = mysqli_query($con,$query);
while ($row=mysqli_fetch_array($data)) {
$cancel_time = $row['cancelling_time'];
}
$cancelid = $_GET['cancelid'];
$query2 = "SELECT * FROM tbl_user_order where id = $cancelid ";
$data2 = mysqli_query($con,$query2);
while ($row=mysqli_fetch_array($data2)) {
$order_time = $row['delivery_date'].' '.$row['delivery_time'];
}
$hourdiff = strtotime($order_time) - strtotime(date('Y-m-d H:i a'));
$hours =  $hourdiff/60/60;
if($hours>$cancel_time)
{
	$query  = "update tbl_user_order set status = 'Cancelled' where id = $cancelid";
 $result = mysqli_query($con,$query);
     if ($query) {
     
     echo "<script>alert('You have successfully cancelled the order');</script>";
	 }
}
else
{
echo "<script>alert('Sorry..The order cannot be cancel right now.It must be cancel before $cancel_time hours.');</script>";
}
 
}
?>
 <section class="contact spad">
<div class="container">
<div class="row">
 <div class="col-lg-12">
 <div style="float:left;height:20px;width:20px;background-color:#F7AFAF"></div>Delayed Orders<br>
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered table-striped" id="hidden-table-info">
               
<tbody>
<tr>
 <th>SL NO</th>
 <th>CAKE INFO</th>
 <th>WEIGHT</th>
 <th>QUANTITY</th>
 <th>DELIVERY DATE</th>
 <th>DELIVERY TIME</th>
 <th>PRICE</th>
 <th>TOTAL</th>
<th>STATUS</th>
<th>ACTION</th>

</tr>
<?php
$_SESSION['my-order-visited'] = "yes";
$id = $_SESSION['user_id'];
$ret=mysqli_query($con,"select * from tbl_user_order where user_id = $id  and status = 'Ordered' order by delivery_date");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
$today = date("Y-m-d H.i A");
$delivery_date = $row['delivery_date'].' '.$row['delivery_time'];
if($today>$delivery_date)
{
	$color = "#F7AFAF";
}
else
{
	$color = "";
}
?>
<tr style="background-color:<?php echo $color;?>">

<td><?php  echo $cnt; ?></td>
<td><?php  echo $row['cake_info'];?></td>
<td><?php  echo $row['weight'];?></td>
<td><?php  echo $row['quantity'];?></td>
<td><?php  echo date("d-M-Y", strtotime($row['delivery_date'])); ?></td>
<td><?php  echo $row['delivery_time'];?></td>
<td><?php  echo $row['price'];?></td>
<td><?php  echo $row['total'];?></td>
<td><?php  echo $row['status'];?></td>
<td><a href="my-order.php?cancelid=<?php  echo $row['id'];?>">Cancel</a></td>
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
require_once('footer.php');

}
else
{
header("location:index.php");
}
?>
	
