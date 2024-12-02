<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) 
{
require_once('header.php');
include('dbconnection.php');
 
if(isset($_SESSION['user_id']))
{
  $user_id = $_SESSION['user_id'];
    
  $query=mysqli_query($con, "select * from tbl_users where id = $user_id");
  while ($row=mysqli_fetch_array($query)) {
  
  $first_name = $row['name'];
  $email = $row['email'];
  $password = $row['password'];
  $mobile = $row['mobile'];
  $gender = $row['gender'];
  $address = $row['address'];
}

}
?>
	<br>
	<br>
	<section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    
                        <div class="section-title">
                            
                            <h2>User Information</h2>
                        </div>
                        <form method="post">
						<div class="row">
							
							<div class="col-lg-4 form-group">
								<label"><b>Name</b></label>
							</div>
							<div class="col-lg-8 form-group">
								<p><b><?php echo $first_name;?></b></p>
							</div>
							<div class="col-lg-4 form-group">
								<label><b>Email</b></label>
							</div>
							<div class="col-lg-8 form-group">
								<p><b><?php echo $email;?></b></p>
							</div>
							<div class="col-lg-4">
								<label><b>Password</b></label>
							</div>
							<div class="col-lg-8 form-group">
								<p><b><?php echo $password;?></b></p>
							</div>
							<div class="col-lg-4">
								<label><b>Mobile Number</b></label>
							</div>
							<div class="col-lg-8 form-group">
								<p><b><?php echo $mobile;?></b></p>
							</div>
							<div class="col-lg-4">
								<label><b>Gender</b></label>
							</div>
							<div class="col-lg-3">
								
								<p><b><?php echo $gender;?></b></p>
							</div>
							<div class="col-lg-3">
							</div>
							<div class="col-lg-4">
								<label><b>Address</b></label>
							</div>
							<div class="col-lg-8 form-group">
								<p><b><?php echo $address;?></b></p>
							</div>
							<div class="col-lg-4">
							</div>
							<div class="col-lg-8">
							<a href="edit-profile.php"><input type="button" class="site-btn btn-primary" value="Edit Profile" name="user_registration"></a>
							</div>
							</div>
                        </form>
                    
                </div>
            
            <div class="col-lg-6" style="background-image:url('img/hero/hero-1.jpg')">
                
            </div>
			</div>
        </div>
    </section>
	<br>
    <?php
require_once('footer.php');

}
else
{
header("location:index.php");
}
?>