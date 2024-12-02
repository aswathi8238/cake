<?php
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
if(isset($_POST['edit_profile']))
{
  $user_id = $_SESSION['user_id'];
  $first_name = $_POST['firstname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $mobile = $_POST['mobile'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  
  $query=mysqli_query($con, "update  tbl_users set name = '$first_name' ,email = '$email',password = '$password',
  mobile  = $mobile,gender = '$gender' ,address = '$address' where id  = {$user_id}");
  if ($query) {
  echo "<script>alert('You have successfully updated the profile..!');</script>";
  echo "<script type='text/javascript'> document.location ='my-profile.php'; </script>";
}
else
  {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
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
                            <span>Class cakes</span>
                            <h2>Edit your <br />profile</h2>
                        </div>
                        <form method="post">
						<div class="row">
							
							<div class="col-lg-4 form-group">
								<label>Name</label>
							</div>
							<div class="col-lg-8 form-group">
								<input type="text" class="form-control" placeholder="NAME" name="firstname" required value="<?php echo $first_name;?>">
							</div>
							<div class="col-lg-4 form-group">
								<label>Email</label>
							</div>
							<div class="col-lg-8 form-group">
								<input type="email" class="form-control" placeholder="EMAIL" name="email" required value="<?php echo $email;?>">
							</div>
							<div class="col-lg-4">
								<label>Password</label>
							</div>
							<div class="col-lg-8 form-group">
								<input autocomplete="new-password" type="password" class="form-control"placeholder="PASSWORD" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character:" required id="password-field" value="<?php echo $password;?>">
<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="font-size:24px;float: right;margin-left: -25px;margin-top: -30px;position: relative;z-index: 2;"></span>
							</div>
							<div class="col-lg-4">
								<label>Mobile Number</label>
							</div>
							<div class="col-lg-8 form-group">
								<input type="text" class="form-control"placeholder="MOBILE NUMBER" name="mobile" pattern="(0|91)?[6-9][0-9]{9}" required value="<?php echo $mobile;?>">
							</div>
							<div class="col-lg-4">
								<label>Gender</label>
							</div>
							<div class="col-lg-2">
								<input type="radio"  name="gender" value="Male" <?php if($gender=='Male'){echo 'checked';}?> required>
								<label>Male</label>
							</div>
							<div class="col-lg-3">
								<input type="radio" name="gender" value="Female" <?php if($gender=='Female'){echo 'checked';}?> required>
								<label>Female</label><br>
							</div>
							<div class="col-lg-3">
								<input type="radio" name="gender" <?php if($gender=='Other'){echo 'checked';}?> value="Other" required>
								<label>Other</label><br>
							</div>
							<div class="col-lg-4">
								<label>Address</label>
							</div>
							<div class="col-lg-8 form-group">
								<textarea class="form-control"  name="address" required><?php echo $address;?></textarea>
							</div>
							<div class="col-lg-4">
							</div>
							<div class="col-lg-8">
								<input type="submit" class="site-btn" value="Update" name="edit_profile">
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
?>
<script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>	