<?php
 session_start();
 if(isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) 
{
   include('dbconnection.php');
   require_once('admin-header.php');

if(isset($_GET['deleteid']))
  {
  	
    
    $deleteid = $_GET['deleteid'];
    $query=mysqli_query($con, "delete from user_feedback  where id =".$deleteid);
    if ($query) {
    echo "<script>alert('You have successfully deleted the data');</script>";
    echo "<script type='text/javascript'> document.location ='admin-view-feedback.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
if(isset($_GET['yes']))
  {
	$id = $_GET['yes'];
	$query=mysqli_query($con, "update user_feedback  set display ='Yes' where id =".$id);
    if ($query) {
    echo "<script>alert('You have successfully changed the display status.');</script>";
    echo "<script type='text/javascript'> document.location ='admin-view-feedback.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
  }
  if(isset($_GET['no']))
  {
	$id = $_GET['no'];
	$query=mysqli_query($con, "update user_feedback  set display ='No' where id =".$id);
    if ($query) {
    echo "<script>alert('You have successfully changed the display status.');</script>";
    echo "<script type='text/javascript'> document.location ='admin-view-feedback.php'; </script>";
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
            User Feedback
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User Feedback</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

		
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          
            
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
 <th> NAME</th>
 <th>EMAIL</th>
 <th>MESSAGE</th>
 <th>DISPLAY</th>
 <th>CHANGE DISPLAY</th>
 <th>DELETE</th>
</tr>
<?php

$ret=mysqli_query($con,"select * from user_feedback where type = 'feedback'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<tr>
<td><?php echo $cnt; ?></td>
<td><?php  echo $row['name'];?></td>
<td><?php  echo $row['email'];?></td>
<td><?php  echo $row['message'];?></td>
<td><?php  echo $row['display'];?></td>
<?php
if($row['display']=='Yes')
{
	?>
	<td><a href="admin-view-feedback.php?no=<?php  echo $row['id'];?>">No</a></td>
<?php	
}
else
{
	?>
	<td><a href="admin-view-feedback.php?yes=<?php  echo $row['id'];?>">Yes</a></td>
<?php
}
?>
<td><a href=<?php echo "admin-view-feedback.php?deleteid=".$row['id'];?>>DELETE</a></td>
</tr>
<?php 
$cnt=$cnt+1;
}
?>
                 
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