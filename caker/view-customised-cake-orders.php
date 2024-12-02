<?php
session_start();
if(isset($_SESSION['caker_id']) && !empty($_SESSION['caker_id'])) 
{
   include('dbconnection.php');
   require_once('header.php');
   if(isset($_GET['deleteid']))
{
	$order_id = $_GET['deleteid'];
	$query = "delete from tbl_customised_cake  where id = $order_id";
	$ret=mysqli_query($con,$query);
	echo $query;
}
if(isset($_GET['orderid']))
{
	$order_id = $_GET['orderid'];
	$status = $_GET['status'];
	$query = "update tbl_customised_cake set status = '$status' where id = $order_id";
	$ret=mysqli_query($con,$query);
	echo $query;
}
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Customised Cake Queries
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Customised Cake Queries</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
            
		
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Orders
            
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  
              <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
               
<tbody>
<tr>
 <th>SL NO</th>
 <th>FIRSTNAME</th>
 <th>PHONE</th>
    <th>EMAIL</th>
    <th>REQUIREMENTS</th>
	<th>STATUS</th>
	<th>DELETE</th>
    
</tr>
<?php
$query = "select * from tbl_customised_cake";


$ret=mysqli_query($con,$query);
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<tr>

<td><?php echo $cnt; ?></td>
<td><?php  echo $row['firstname'];?></td>
<td><?php  echo $row['phone'];?></td>
<td><?php  echo $row['email'];?></td>
<td><?php  echo $row['requirements'];?></td>
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
						
                        <li><a href="view-customised-cake-orders.php?orderid=<?php echo $row['id'];?>&status=Ordered">Ordered</a></li>
						<li><a href="view-customised-cake-orders.php?orderid=<?php echo $row['id'];?>&status=Pending">Pending</a></li>
                        <li><a href="view-customised-cake-orders.php?orderid=<?php echo $row['id'];?>&status=Delivered">Delivered</a></li>
                        <li><a href="view-customised-cake-orders.php?orderid=<?php echo $row['id'];?>&status=Cancelled">Cancelled</a></li>
                     
                      </ul>
                    </div>
</td>
<td><a href=<?php echo "view-customised-cake-orders.php?deleteid=".$row['id'];?>>DELETE</a></td>
</tr>
<?php 
$cnt=$cnt+1;
}?>
                 
</tbody>
</table>

                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
<?php
require_once('footer.php');
}
else
{
header("location:cakers-login.php");
}
?>