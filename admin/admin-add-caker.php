<?php
session_start();
if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) 
{
   include('dbconnection.php');
   require_once('admin-header.php');
   $saveButton = 1;
   $edit_firstname_value  = "";
   $edit_location_value  = "";
   $edit_username_value  = ""; 
   $edit_password_value  = ""; 
   if(isset($_POST['save_caker']))
   {
    
     $firstname = $_POST['firstname'];
     $location = $_POST['location'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $query=mysqli_query($con, "insert into tbl_caker(firstname,location,username,password) values('$firstname','$location','$username','$password')");
     if ($query) {
     
     echo "<script>alert('You have successfully inserted the data');</script>";
     echo "<script type='text/javascript'> document.location ='admin-add-caker.php'; </script>";
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
    $ret=mysqli_query($con,"select * from tbl_caker where ID =$editid");
    while ($row=mysqli_fetch_array($ret)) 
    {
        $hfid = $row['id'];
        $edit_firstname_value  = $row['firstname'];
        $edit_location_value  = $row['location'];
        $edit_username_value  = $row['username'];
		$edit_password_value  = $row['password'];
    
        
    }
}

if (isset($_GET['activateid'])) 
{
$activateid = $_GET['activateid'];
$query=mysqli_query($con, "update tbl_caker set status = 'Active' where id =".$activateid);
    if ($query) {
    echo "<script>alert('Caker status activated');</script>";
    echo "<script type='text/javascript'> document.location ='admin-add-caker.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
if (isset($_GET['deactivateid'])) 
{
$deactivateid = $_GET['deactivateid'];
$query=mysqli_query($con, "update tbl_caker set status = 'Deactive'  where id =".$deactivateid);
    if ($query) {
    echo "<script>alert('Caker status deactivated');</script>";
    echo "<script type='text/javascript'> document.location ='admin-add-caker.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}

if(isset($_POST['update_caker']))
  {
    $editid = $_POST['hfid'];
      	
    $firstname = $_POST['firstname'];
    $location = $_POST['location'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query=mysqli_query($con, "update tbl_caker set firstname = '$firstname' , location = '$location' , username = '$username' ,password = '$password' where id =".$editid);
    if ($query) {
    echo "<script>alert('You have successfully updated the data');</script>";
    echo "<script type='text/javascript'> document.location ='admin-add-caker.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
if(isset($_GET['deleteid']))
  {
    $deleteid = $_GET['deleteid'];
   
    $query=mysqli_query($con, "delete from tbl_caker  where id =".$deleteid);
    if ($query) {
      
    echo "<script>alert('You have successfully deleted the data');</script>";
    echo "<script type='text/javascript'> document.location ='admin-add-caker.php'; </script>";
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
            Caker Information
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Caker Information</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Add new caker</h3>
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
                      <label for="cakename">Caker Name</label>
                      
					  <input type="text" class="form-control" name="firstname" placeholder="Name" required value="<?php echo $edit_firstname_value;?>">
                    </div>
                  <div class="form-group">
                  <label for="location">Location</label>
					  <input type="text" class="form-control" name="location" placeholder="Location" required value="<?php echo $edit_location_value;?>">
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="username">Username</label>
        
					  <input type="text" class="form-control" name="username" placeholder="Username" required value="<?php echo $edit_username_value;?>">
                    </div>
                 
                </div>
				<div class="col-md-6">
				<div class="form-group">
				<label for="username">Password</label>
				 <input type="hidden" name="hfid"  value="<?php  echo $hfid;?>"> 
         <input type="text" name="password" placeholder="Password" class="form-control" required value="<?php echo $edit_password_value;?>"> 
				
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
                                   echo ' <input  type="submit" class="btn btn-block btn-primary btn-lg" value="Save" name="save_caker">';
                                }
                                if ($saveButton==2) 
                                {
                                    echo ' <input  type="submit" class="btn btn-block btn-primary btn-lg" value="Update" name="update_caker">';
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
            Registered Cakers
            
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
 <th>CAKER NAME</th>
 <th>GENDER</th>
    <th>ADDRESS</th>
	<th>MOBILE</th>
	<th>EMAIL</th>
    <th>PASSWORD</th>
    <th>STATUS</th>
	<th>CHANGE STATUS</th>
    <th>DELETE</th>
</tr>
<?php

$ret=mysqli_query($con,"select * from tbl_caker");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<tr>
<td><?php echo $cnt; ?></td>
<td><?php  echo $row['firstname'];?></td>
<td><?php  echo $row['gender'];?></td>
<td><?php  echo $row['address'];?></td>
<td><?php  echo $row['mobile'];?></td>
<td><?php  echo $row['email'];?></td>
<td><?php  echo $row['password'];?></td>
<td><?php  echo $row['status'];?></td>
<th>
<?php
if($row['status']=='Active')
{
	?>
<a href="<?php echo "admin-add-caker.php?deactivateid=".$row['id'];?>">Deactivate</a>
<?php
	}
else
{
?>
<a href="<?php echo "admin-add-caker.php?activateid=".$row['id'];?>">Activate</a>
<?php	
}
?>
</th>
<td><a href=<?php echo "admin-add-caker.php?deleteid=".$row['id'];?>>DELETE</a></td>
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