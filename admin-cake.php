
<?php
   session_start();
   include('dbconnection.php');
   require_once('admin-header.php');
   $saveButton = 1;
    
   if(isset($_POST['save_cake']))
   {
    
     $cake_name = $_POST['cake_name'];
     $category_name = $_POST['category_name'];
     $price = $_POST['price'];
     
     $query=mysqli_query($con, "insert into tbl_cake(cake_name,category_name,cake_price) values('$cake_name','$category_name',$price)");
     if ($query) {
      if (!file_exists('img/shop/'.$cake_name)) {
        mkdir('img/shop/'.$cake_name, 0777);
       
      }
     echo "<script>alert('You have successfully inserted the data');</script>";
     echo "<script type='text/javascript'> document.location ='admin-cake.php'; </script>";
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
  	
    $cake_name = $_POST['cake_name'];
    $category_name = $_POST['category_name'];
    $price = $_POST['price'];
    $editid = $_POST['hfid'];
    $query=mysqli_query($con, "update tbl_cake set cake_name = '$cake_name' , category_name = '$category_name' , cake_price = $price where id =".$editid);
    if ($query) {
    echo "<script>alert('You have successfully updated the data');</script>";
    echo "<script type='text/javascript'> document.location ='admin-cake.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
if(isset($_GET['deleteid']))
  {
  	
    
    $deleteid = $_GET['deleteid'];
    $query=mysqli_query($con, "delete from tbl_cake  where id =".$deleteid);
    if ($query) {
    echo "<script>alert('You have successfully deleted the data');</script>";
    echo "<script type='text/javascript'> document.location ='admin-cake.php'; </script>";
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
<div class="container">Add cake
<div class="row">
 <div class="col-lg-12">
                    <div class="contact__form">
                        <form method="post">
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="text" name="cake_name" placeholder="Name" required value="<?php echo $edit_cake_value;?>">
                                </div>
                                <div class="col-lg-3">
                                <select name="category_name">
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
                                </div>
                                <div class="col-lg-3">
                                   <input type="text" name="price" placeholder="Price" required value="<?php echo $edit_price_value;?>">
                                    
                                </div>
								<div class="col-lg-2">
                                <input type="hidden" name="hfid" value="<?php  echo $hfid;?>"> 
                                <?php
                                if ($saveButton==1) 
                                {
                                   echo ' <input  type="submit" class="site-btn" value="Save" name="save_cake">';
                                }
                                if ($saveButton==2) 
                                {
                                    echo ' <input  type="submit" class="site-btn" value="Update" name="update_cake">';
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
 <th>CAKE NAME</th>
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
<td><?php  echo $row['category_name'];?></td>
<td><?php  echo $row['cake_price'];?></td>
<td><a href=<?php echo "admin-cake.php?editid=".$row['id'];?>>EDIT</a></td>
<td><a href=<?php echo "admin-cake.php?deleteid=".$row['id'];?>>DELETE</a></td>
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
