<?php
require_once('header.php');
include('dbconnection.php');
 
if(isset($_POST['user_registration']))
{
 
  $first_name = $_POST['firstname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $mobile = $_POST['mobile'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  
  $query=mysqli_query($con, "insert into tbl_caker(firstname,email,password,mobile,gender,address)
   values('$first_name','$email','$password',$mobile,'$gender','$address')");
  if ($query) {
  echo "<script>alert('You have successfully registered..!');</script>";
  echo "<script type='text/javascript'> document.location ='index.php'; </script>";
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
                            <span>Caker Registration</span>
                            
                        </div>
                        <form method="post" autocomplete="off">
						<div class="row">
							
							<div class="col-lg-4 form-group">
								<label">Name</label>
							</div>
							<div class="col-lg-8 form-group">
								<input type="text" class="form-control" placeholder="NAME" name="firstname" required onkeypress="return onlyAlphabets(event,this);">
							</div>
							<div class="col-lg-4 form-group">
								<label>Email</label>
							</div>
							<div class="col-lg-8 form-group">
								<input autocomplete="off" type="email" class="form-control" placeholder="EMAIL" name="email" required>
							</div>
							<div class="col-lg-4">
								<label>Password</label>
							</div>
							<div class="col-lg-8 form-group">
								<input autocomplete="new-password" type="password" class="form-control"placeholder="PASSWORD" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" title="Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character:" required id="password-field">
<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="font-size:24px;float: right;margin-left: -25px;margin-top: -30px;position: relative;z-index: 2;"></span>
							</div>
							<div class="col-lg-4">
								<label>Mobile Number</label>
							</div>
							<div class="col-lg-8 form-group">
								<input type="text" class="form-control"placeholder="MOBILE NUMBER" name="mobile" pattern="(0|91)?[6-9][0-9]{9}" required>
							</div>
							<div class="col-lg-4">
								<label>Gender</label>
							</div>
							<div class="col-lg-3">
								<input type="radio" name="gender" value="male" required>
								<label>Male</label>
							</div>
							<div class="col-lg-3">
								<input type="radio" name="gender" value="female" required>
								<label>Female</label><br>
							</div>
							<div class="col-lg-4">
								<label>Address</label>
							</div>
							<div class="col-lg-8 form-group">
								<textarea class="form-control"  name="address" required></textarea>
							</div>
							<div class="col-lg-4">
							</div>
							<div class="col-lg-8">
								<input type="submit" class="site-btn" value="Registration" name="user_registration">
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
<script language="Javascript" type="text/javascript">

        function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }

    </script>