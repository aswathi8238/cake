<?php
   session_start();
   include('dbconnection.php');
   require_once('admin-header.php');
   $saveButton = 1;
   if(isset($_POST['save_category']))
  {
  	
    $category_name = $_POST['category_name'];
    
   
  // Query for data insertion
     $query=mysqli_query($con, "insert into tbl_category(category_name) values('$category_name')");
    if ($query) {
    echo "<script>alert('You have successfully inserted the data');</script>";
    echo "<script type='text/javascript'> document.location ='admin-categories.php'; </script>";
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
    echo "<script type='text/javascript'> document.location ='admin-categories.php'; </script>";
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
    echo "<script type='text/javascript'> document.location ='admin-categories.php'; </script>";
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
<div class="container">Add categories
<div class="row">
 <div class="col-lg-10">
                    <div class="contact__form">
                        <form method="post">
                            <div class="row">
                                <div class="col-lg-8">
                                    <input type="text" name="category_name" placeholder="Category" required value="<?php echo $edit_category_value;?>">
                                </div>
                               
                             
								<div class="col-lg-2">
                                <input type="hidden" name="hfid" value="<?php  echo $hfid;?>">
                                <?php
                                if ($saveButton==1) 
                                {
                                   echo ' <input  type="submit" class="site-btn" value="Save" name="save_category">';
                                }
                                if ($saveButton==2) 
                                {
                                    echo ' <input  type="submit" class="site-btn" value="Update" name="update_category">';
                                }
                                ?>  
                                   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				</div>
</div>

<div class="container">
<div class="row">
 <div class="col-lg-12">
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
<td><a href=<?php echo "admin-categories.php?editid=".$row['id'];?>>EDIT</a></td>
<td><a href=<?php echo "admin-categories.php?deleteid=".$row['id'];?>>DELETE</a></td>
</tr>
<?php 
$cnt=$cnt+1;
}?>
                 
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
