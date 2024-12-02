<?php
session_start();
if(isset($_SESSION['caker_id']) && !empty($_SESSION['caker_id'])) 
{
include('dbconnection.php');
require_once('header.php');
if(isset($_GET['orderid']))
{
	$order_id = $_GET['orderid'];
	$status = $_GET['status'];
	$query = "update tbl_user_order set status = '$status' where id = $order_id";
	$ret=mysqli_query($con,$query);
	echo $query;
}
if(isset($_GET['deleteid']))
{
	$order_id = $_GET['deleteid'];
	$query = "delete from tbl_user_order  where id = $order_id";
	$ret=mysqli_query($con,$query);
	echo $query;
}
?>
<div class="content-wrapper">
  <section class="content-header">
          <h1>
            User Orders
            
          </h1>
      <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User Orders</li>
          </ol>     
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box" style="overflow-x: auto;">
                <div class="box-header">
                  
                </div><!-- /.box-header -->
                <div class="box-body" style="width:1800px">
            <table  cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
               
<tbody>
<tr>
 <th>SL NO</th>
 <th>CAKE INFO</th>
 <th>WEIGHT</th>
 <th>QUANTITY</th>
 <th>DELIVERY DATE</th>
 <th>PRICE</th>
 <th>TOTAL</th>
 <th>FIRSTNAME</th>
 <th>MOBILE</th>
 <th>EMAIL</th>
<th>ADDRESS</th>
<th>CITY</th>
<th>STATE</th>
<th>ZIP CODE</th>
<th>MODE OF PAYMENT</th>
<th style="width:150px">STATUS</th>
<th>DELETE</th>
</tr>
<?php
$caker_id =  $_SESSION['caker_id'];
$ret=mysqli_query($con,"select * from tbl_user_order where caker_id = $caker_id order by delivery_date desc");
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
<td><?php  echo $row['firstname'];?></td>
<td><?php  echo $row['mobile'];?></td>
<td><?php  echo $row['email'];?></td>
<td><?php  echo $row['address'];?></td>
<td><?php  echo $row['city'];?></td>
<td><?php  echo $row['state'];?></td>
<td><?php  echo $row['zip'];?></td>
<td><?php  echo $row['modeOfPayment'];?></td>

<td>
 <div class="btn-group">
 <?php
						  $status = $row['status'];
						  if($status == 'Ordered')
						  {
							echo '<button type="button" class="btn btn-success">'.$row['status'].'</button>
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">';
						  }
						  if($status == 'Delivered')
						  {
							echo '<button type="button" class="btn btn-danger">'.$row['status'].'</button>
                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">';
						  }
						   if($status == 'Pending')
						  {
						  echo '<button type="button" class="btn btn-primary">'.$row['status'].'</button>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">';
						  }
						    if($status == 'Cancelled')
						  {
						  echo '<button type="button" class="btn btn-warning">'.$row['status'].'</button>
                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">';
						  }
						 
						  ?> 
                       <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
						
                        <li><a href="view-orders.php?orderid=<?php echo $row['id'];?>&status=Ordered">Ordered</a></li>
						<li><a href="view-orders.php?orderid=<?php echo $row['id'];?>&status=Pending">Pending</a></li>
                        <li><a href="view-orders.php?orderid=<?php echo $row['id'];?>&status=Delivered">Delivered</a></li>
                        <li><a href="view-orders.php?orderid=<?php echo $row['id'];?>&status=Cancelled">Cancelled</a></li>
                     
                      </ul>
                    </div>
</td>
<td><a href=<?php echo "view-orders.php?deleteid=".$row['id'];?>>DELETE</a></td>
</tr>
<?php 
$cnt=$cnt+1;
}
?>
                 
</tbody>
</table>

                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
		
<?php
require_once('footer.php');
}
else
{
header("location:cakers-login.php");
}
?>