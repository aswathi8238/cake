<?php
 session_start();
 if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) 
{

   include('dbconnection.php');
   require_once('admin-header.php');
   $saveButton = 1;
   $edit_category_value = "";
   if(isset($_POST['save_category']))
  {
  	
    $category_name = $_POST['category_name'];
    
   
  // Query for data insertion
     $query=mysqli_query($con, "insert into tbl_category(category_name) values('$category_name')");
    if ($query) {
    echo "<script>alert('You have successfully inserted the data');</script>";
    echo "<script type='text/javascript'> document.location ='admin-manage-categories.php'; </script>";
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
    $ret=mysqli_query($con,"select * from tbl_category where ID =$editid");
    while ($row=mysqli_fetch_array($ret)) 
    {
        $hfid = $row['id'];;
        $edit_category_value  = $row['category_name'];
        
    }
}

if(isset($_POST['update_category']))
  {
  	
    $category_name = $_POST['category_name'];
    $editid = $_POST['hfid'];
    $query=mysqli_query($con, "update tbl_category set category_name = '$category_name' where id =".$editid);
    if ($query) {
    echo "<script>alert('You have successfully updated the data');</script>";
    echo "<script type='text/javascript'> document.location ='admin-manage-categories.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}

if(isset($_GET['deleteid']))
  {
  	
    
    $deleteid = $_GET['deleteid'];
    $query=mysqli_query($con, "delete from tbl_category  where id =".$deleteid);
    if ($query) {
    echo "<script>alert('You have successfully deleted the data');</script>";
    echo "<script type='text/javascript'> document.location ='admin-manage-categories.php'; </script>";
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
            Cake Category
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cake Category</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Add new category</h3>
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
                      <label for="cakename">Category</label>
                      
					  <input type="text" class="form-control" name="category_name" placeholder="Name" required value="<?php echo $edit_category_value;?>">
                    </div>
                  
                </div><!-- /.col -->
               
				<div class="col-md-2"><br>
				<div class="form-group">
				 <input type="hidden" name="hfid" value="<?php  echo $hfid;?>"> 
                                <?php
                                if ($saveButton==1) 
                                {
                                   echo ' <input  type="submit" class="btn btn-block btn-primary btn-lg" value="Save" name="save_category">';
                                }
                                if ($saveButton==2) 
                                {
                                    echo ' <input  type="submit" class="btn btn-block btn-primary btn-lg" value="Update" name="update_category">';
                                }
                                ?>  
				
				</div>
				</div>
              </div><!-- /.row -->
			  </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div>
          </div>
		
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Added Cakes
            
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
    <th>CATEGORY NAME</th>
    <th>EDIT</th>
    <th>DELETE</th>
</tr>
<?php

$ret=mysqli_query($con,"select * from tbl_category");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<tr>
<td><?php echo $cnt; ?></td>
<td><?php  echo $row['category_name'];?></td>
<td><a href=<?php echo "admin-manage-categories.php?editid=".$row['id'];?>>EDIT</a></td>
<td><a href=<?php echo "admin-manage-categories.php?deleteid=".$row['id'];?>>DELETE</a></td>
</tr>
<?php 
$cnt=$cnt+1;
}?>
                 
</tbody>
</table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
<?php
require_once('admin-footer.php');
   }
else
{
 header("location:admin-login.php");
}
?>