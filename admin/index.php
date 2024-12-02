<?php
session_start();
if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) 
{

   require_once('dbconnection.php');
require_once('admin-header.php');
$newOrders = "";
$totalProducts = "";
$totalUsers = "";
$totalCakers = "";

$countProducts=mysqli_query($con,"SELECT count(*) as total  FROM tbl_cake");
while ($row=mysqli_fetch_array($countProducts)) 
{
$totalProducts = $row['total'];
}

$countUsers=mysqli_query($con,"SELECT count(*) as total FROM tbl_users");
while ($row=mysqli_fetch_array($countUsers)) 
{
$totalUsers = $row['total'];
}

$countOrders=mysqli_query($con,"select count(*) as total from tbl_user_order");
while ($row=mysqli_fetch_array($countOrders)) 
{
$newOrders = $row['total'];
}
$countCakers=mysqli_query($con,"select count(*) as total from tbl_caker");
while ($row=mysqli_fetch_array($countCakers)) 
{
$totalCakers = $row['total'];
}

?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $newOrders;?></h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="admin-view-orders.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo $totalProducts;?><sup style="font-size: 20px"></sup></h3>
                  <p>Total Products</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="admin-manage-cakes.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $totalUsers; ?></h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="admin-view-users.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $totalCakers;?></h3>
                  <p>Cakers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="admin-add-caker.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
          
            </div><!-- /.row (main row) -->

        </section>
		<section class="content">
          <!-- Info boxes -->
          <div class="row">
         
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
             
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Orders</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Item</th>
                          <th>Status</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
					  <?php
				  $ret=mysqli_query($con,"SELECT * FROM tbl_user_order order by id desc limit 7");

					while ($row=mysqli_fetch_array($ret)) {
				  ?>
                     <tr>
                          <td><a href="admin-view-orders.php">ORD<?php echo $row['id'];?></a></td>
                          <td><?php echo $row['cake_info'];?></td>
                          <td>
						  <?php 
						  $status = $row['status'];
						  if($status == 'Ordered')
						  {
							echo '<span class="label label-success">';
						  }
						  if($status == 'Delivered')
						  {
							echo '<span class="label label-danger">';
						  }
						   if($status == 'Received')
						  {
						  echo '<span class="label label-primary">';
						  }
						    if($status == 'Cancelled')
						  {
						  echo '<span class="label label-warning">';
						  }
						 
						  ?>
						  <?php echo $row['status'];?></span>
						  </td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20"> <?php echo $row['delivery_date'];?></div></td>
                        </tr>
					<?php
					}
					?>
                       
                        
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  
                  <a href="admin-view-orders.php" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->

            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->
             
              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recently Added Products</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
				  <?php
				  $ret=mysqli_query($con,"select * from tbl_cake order by id desc limit 4");

					while ($row=mysqli_fetch_array($ret)) {
				  ?>
                    <li class="item">
                      <div class="product-img">
                        <img src="../caker/<?php echo $row['photo']; ?>" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title"><?php echo $row['cake_name']; ?> <span class="label label-info pull-right">₹ <?php echo $row['cake_price']; ?></span></a>
                        <span class="product-description">
                          <?php echo $row['category_name']; ?>
                        </span>
                      </div>
                    </li>
					<?php
					}
					?>
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="admin-manage-cakes.php" class="uppercase">View All Products</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php
require_once('admin-footer.php');

   }
else
{
 header("location:admin-login.php");
}
