<?php
session_start();
if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) 
{

   include('dbconnection.php');
   require_once('admin-header.php');
   $saveButton = 1;
   $edit_cake_value  = "";
   $edit_category_value  = "";
   $edit_price_value  = ""; 
   if(isset($_POST['save_cake']))
   {
    
     $cake_name = $_POST['cake_name'];
     $category_name = $_POST['category_name'];
     $price = $_POST['price'];
     $target_dir = "img/shop/";
     $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
     move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
     $query=mysqli_query($con, "insert into tbl_cake(cake_name,category_name,cake_price,photo) values('$cake_name','$category_name',$price,'$target_file')");
     if ($query) {
     
     echo "<script>alert('You have successfully inserted the data');</script>";
     echo "<script type='text/javascript'> document.location ='admin-manage-cakes.php'; </script>";
     echo $target_file;
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


?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cake Information
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cake Information</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Add new cake</h3>
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
                      <label for="cakename">Cake Name</label>
                      
					  <input type="text" class="form-control" name="cake_name" placeholder="Name" required value="<?php echo $edit_cake_value;?>">
                    </div>
                  <div class="form-group">
                  <label for="cakename">Category</label>
					<select class="form-control select2" name="category_name"  style="width: 100%;">
					  <option >Select Category</option>
                                <?php
                                $ret=mysqli_query($con,"select * from tbl_category");
                                
                                while ($row=mysqli_fetch_array($ret)) {
                                    $cat = $row['category_name'];
                                ?>
                                    
                                    <option <?php if($edit_category_value == $cat){echo "selected";}?> value="<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></option>		
										
								<?php
                                }
                                ?>		
										
									</select>
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="cakename">Price</label>
        
					  <input type="text" class="form-control" name="price" placeholder="Price" required value="<?php echo $edit_price_value;?>">
                    </div>
                 
                </div>
				<div class="col-md-6"><br>
				<div class="form-group">
				 <input type="hidden" name="hfid" value="<?php  echo $hfid;?>"> 
         <input type="file" name="fileToUpload" class="form-control" required> 
				
				</div>
				</div>
              </div><!-- /.row -->
              <div class="row">
              <div class="col-md-10"></div>

              <div class="col-md-2"><br>
				<div class="form-group">
				 <input type="hidden" name="hfid" value="<?php  echo $hfid;?>"> 
                                <?php
                                if ($saveButton==1) 
                                {
                                   echo ' <input  type="submit" class="btn btn-block btn-primary btn-lg" value="Save" name="save_cake">';
                                }
                                if ($saveButton==2) 
                                {
                                    echo ' <input  type="submit" class="btn btn-block btn-primary btn-lg" value="Update" name="update_cake">';
                                }
                                ?>  
				
				</div>
				</div>
              </div>
			  </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div>
          </div>
		
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Available Cakes
            
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
 <th>CAKE NAME</th>
 <th>PHOTO</th>
    <th>CATEGORY NAME</th>
    <th>PRICE</th>
    <th>EDIT</th>
    <th>DELETE</th>
</tr>
<?php

$ret=mysqli_query($con,"select * from tbl_cake");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<tr>
<td><?php echo $cnt; ?></td>
<td><?php  echo $row['cake_name'];?></td>
<td><img src="<?php  echo $row['photo'];?>" alt="" style="width:50px;height:50px"></td>
<td><?php  echo $row['category_name'];?></td>
<td><?php  echo $row['cake_price'];?></td>
<td><a href=<?php echo "admin-manage-cakes.php?editid=".$row['id'];?>>EDIT</a></td>
<td><a href=<?php echo "admin-manage-cakes.php?deleteid=".$row['id'];?>>DELETE</a></td>
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
require_once('admin-footer.php');
  }
else
{
 header("location:admin-login.php");
}
?>