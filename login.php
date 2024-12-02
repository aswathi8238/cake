<?php
ob_start();
require_once('header.php');
require_once('dbconnection.php');
if(isset($_POST['user_login']))
  {
	
    $username=$_POST['username'];
    $password=$_POST['password'];
	$query = "select * from tbl_users where email ='$username' and password='$password'";
	$result=mysqli_query($con,$query);
	
	if(mysqli_num_rows($result) > 0)
	{
       
		while ($row=mysqli_fetch_array($result)) {
			$_SESSION['user_id']=$row['id'];	
		}
	
		$_SESSION['user']=$username;
		header("location:http://localhost/cake/index.php");
    }
	else
	{
	//echo "<script>alert('Incorrect username or password. Please try again');</script>";
	?>
	
		

<div class="container">
  
  
  

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title text-danger">Error!</h4>
        </div>
        <div class="modal-body">
          <p>Incorrect username or password. Please try again</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
		<script> 
		$('#myModal').modal('show');
		</script>
		
		<?php
	
	} 
}
?>
   <!-- Header Section End -->
	<br>
	<br>
	<section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    
                        <div class="section-title">
                            <span>Class cakes</span>
                            <h2>Made from your <br />own hands</h2>
                        </div>
                        <form method="post">
						<div class="row">
							
							<div class="col-lg-4 form-group">
								<label>Username</label>
							</div>
							<div class="col-lg-8 form-group">
								<input type="mail" class="form-control" placeholder="Email address" name="username" required>
							</div>
							<div class="col-lg-4">
								<label>Password</label>
							</div>
							<div class="col-lg-8 form-group">
								<input autocomplete="new-password" type="password" class="form-control"placeholder="Password" name="password" id="password-field" required>
								
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password" style="font-size:24px;float: right;margin-left: -25px;margin-top: -30px;position: relative;z-index: 2;"></span>
							</div>
							
							<div class="col-lg-8">
								<input type="submit" class="site-btn" value="Login" name="user_login">
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
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	  
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
