<?php
session_start();
if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) 
{
   include('dbconnection.php');
   require_once('admin-header.php');
   
   $result1=mysqli_query($con,"SELECT * FROM tbl_order_cancel_time");
    while ($row=mysqli_fetch_array($result1)) 
    {
		$cancel_time = $row['cancelling_time'];
	}
	
	$result2 = mysqli_query($con,"SELECT * FROM tbl_order_limit");
    while ($row=mysqli_fetch_array($result2)) 
    {
		$order_limit  = $row['order_limit'];
	}
	
	$result3 = mysqli_query($con,"SELECT * FROM tbl_cake_price_reduction");
    while ($row=mysqli_fetch_array($result3)) 
    {
		$amount  = $row['amount'];
	}
	
   if(isset($_POST['save_time']))
   {
    
     $cancelling_time = $_POST['cancelling_time'];
    
     $query=mysqli_query($con, "update tbl_order_cancel_time  set cancelling_time =  $cancelling_time");
     if ($query) {
     
     echo "<script>alert('You have successfully set  the time');</script>";
     echo "<script type='text/javascript'> document.location ='admin-settings.php'; </script>";
     
   }
   else
     {
       echo "<script>alert('Something Went Wrong. Please try again');</script>";
     }
 }
 
  if(isset($_POST['save_limit']))
   {
    
     $order_limit = $_POST['order_limit'];
    
     $query=mysqli_query($con, "update tbl_order_limit  set order_limit =  $order_limit");
     if ($query) {
     
     echo "<script>alert('You have successfully set  the time');</script>";
     echo "<script type='text/javascript'> document.location ='admin-settings.php'; </script>";
     
   }
   else
     {
       echo "<script>alert('Something Went Wrong. Please try again');</script>";
     }
 }
 
if (isset($_GET['editid'])) 
{
    $saveButton = 2;
    $editid = $_GET['editid'];
    $ret=mysqli_query($con,"select * from tbl_cake where ID =$editid");
    while ($row=mysqli_fetch_array($ret)) 
    {
        $hfid = $row['id'];
        $edit_cake_value  = $row['cake_name'];
        $edit_category_value  = $row['category_name'];
        $edit_price_value  = $row['cake_price'];
    
        
    }
}

if(isset($_POST['update_cake']))
  {
    $editid = $_POST['hfid'];
    $ret=mysqli_query($con,"select * from tbl_cake where ID =$editid");
    while ($row=mysqli_fetch_array($ret)) 
    {
        $edit_photo_value = $row['photo'];
    }
  	
    $cake_name = $_POST['cake_name'];
    $category_name = $_POST['category_name'];
    $price = $_POST['price'];
    $target_dir = "img/shop/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $query=mysqli_query($con, "update tbl_cake set cake_name = '$cake_name' , category_name = '$category_name' , cake_price = $price ,photo = '$target_file' where id =".$editid);
    if ($query) {
      unlink($edit_photo_value);
     
     move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
     
    echo "<script>alert('You have successfully updated the data');</script>";
    echo "<script type='text/javascript'> document.location ='admin-manage-cakes.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
if(isset($_GET['deleteid']))
  {
    $deleteid = $_GET['deleteid'];
    $ret=mysqli_query($con,"select * from tbl_cake where ID =$deleteid");
    while ($row=mysqli_fetch_array($ret)) 
    {
      $photo = $row['photo'];
    }
    
    
    $query=mysqli_query($con, "delete from tbl_cake  where id =".$deleteid);
    if ($query) {
      unlink($photo);
    echo "<script>alert('You have successfully deleted the data');</script>";
    echo "<script type='text/javascript'> document.location ='admin-manage-cakes.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
if(isset($_POST['save_price_reduction']))
   {
    
     $amount = $_POST['amount'];
    
     $query=mysqli_query($con, "update tbl_cake_price_reduction  set amount =  $amount");
     if ($query) {
     
     echo "<script>alert('You have successfully inserted the data');</script>";
     echo "<script type='text/javascript'> document.location ='admin-settings.php'; </script>";
     
   }
   else
     {
       echo "<script>alert('Something Went Wrong. Please try again');</script>";
     }
 }
 


?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Settings
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Settings</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Set order cancelling time</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
			<form method="post" enctype='multipart/form-data'>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="cakename">Time</label>
					<select class="form-control select2" name="cancelling_time" required  style="width: 100%;">
					  <option selected value="">Select Time</option>
                      <option value="10">10 Hour</option>
					  <option value="12">12 Hour</option>
										
									</select><h4>Current Time : <?php echo $cancel_time.' Hours'?></h4>
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
              
              </div><!-- /.row -->
              <div class="row">
              <div class="col-md-10"></div>

              <div class="col-md-2"><br>
				<div class="form-group">
				 
                 <input  type="submit" class="btn btn-block btn-primary btn-lg" value="Save" name="save_time">
                                  
				
				</div>
				</div>
              </div>
			  </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div>
          </div>
		</section>
        
		<section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Set cake order limit</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
			<form method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="limit">Order limit</label>
                      
					  <input type="text" class="form-control" name="order_limit" placeholder="No. of order" required >
					  <h4>Current limit : <?php echo $order_limit ?></h4>
                    </div>
                 
                </div><!-- /.col -->
            
              </div><!-- /.row -->
              <div class="row">
              <div class="col-md-10"></div>

              <div class="col-md-2"><br>
				<div class="form-group">
				 
                 <input  type="submit" class="btn btn-block btn-primary btn-lg" value="Save" name="save_limit">
                                  
				
				</div>
				</div>
              </div>
			  </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div>
          </div>
		</section>
		
		<section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Set cake price reduction</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
			<form method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="limit">Reduction Amount</label>
                      
					  <input type="text" class="form-control" name="amount" placeholder="Amount" required >
					  <h4>Current price reduction : Rs. <?php echo $amount; ?></h4>
                    </div>
                 
                </div><!-- /.col -->
            
              </div><!-- /.row -->
              <div class="row">
              <div class="col-md-10"></div>

              <div class="col-md-2"><br>
				<div class="form-group">
				 
                 <input  type="submit" class="btn btn-block btn-primary btn-lg" value="Save" name="save_price_reduction">
                                  
				
				</div>
				</div>
              </div>
			  </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div>
          </div>
		</section>

        
      </div><!-- /.content-wrapper -->
      
<?php
require_once('admin-footer.php');
   }
else
{
 header("location:admin-login.php");
}
?>