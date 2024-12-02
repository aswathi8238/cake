<?php
   session_start();
   include('dbconnection.php');
   require_once('admin-header.php');

if(isset($_GET['deleteid']))
  {
  	
    
    $deleteid = $_GET['deleteid'];
    $query=mysqli_query($con, "delete from tbl_users  where id =".$deleteid);
    if ($query) {
    echo "<script>alert('You have successfully deleted the data');</script>";
    echo "<script type='text/javascript'> document.location ='admin-view-users.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
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
 <th> NAME</th>
 <th>GENDER</th>
 <th>EMAIL</th>
 <th>MOBILE</th>
 <th>PASSWORD</th>
 <th>ADDRESS</th>
<th>DELETE</th>
</tr>
<?php

$ret=mysqli_query($con,"select * from tbl_users");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<tr>
<td><?php echo $cnt; ?></td>
<td><?php  echo $row['name'];?></td>
<td><?php  echo $row['gender'];?></td>
<td><?php  echo $row['email'];?></td>
<td><?php  echo $row['mobile'];?></td>
<td><?php  echo $row['password'];?></td>
<td><?php  echo $row['address'];?></td>
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