<?php
require_once('header.php');
include('dbconnection.php');
 
if(isset($_POST['send']))
{
 
  $first_name = $_POST['customer_name'];
  $email = $_POST['customer_email'];
  $type = $_POST['type'];
  $message = $_POST['message'];
  $place = $_POST['place'];
 
  
  $query=mysqli_query($con, "insert into user_feedback(name,email,type,message,place)
   values('$first_name','$email','$type','$message','$place')");
  if ($query) {
  echo "<script>alert('You have successfully sent the $type');</script>";
  
}
else
  {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
  }
}
?>
  <!-- Breadcrumb Begin -->
  <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Contact</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="map">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-4 col-md-7">
                            <div class="map__inner">
                                <h6>COlorado</h6>
                                <ul>
                                    <li>1000 Lakepoint Dr, Frisco, CO 80443, USA</li>
                                    <li>Sweetcake@support.com</li>
                                    <li>+1 800-786-1000</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
               <!--  <div class="map__iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10784.188505644011!2d19.053119335158936!3d47.48899529453826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1543907528304" height="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div> -->
            </div>
           <div class="row">
                <div class="col-lg-4">
                    <div class="contact__text">
                        <h3>Contact With us</h3>
                        <ul>
                            <li>Representatives or Advisors are available:</li>
                            <li>Mon-Fri: 5:00am to 9:00pm</li>
                            <li>Sat-Sun: 6:00am to 9:00pm</li>
                        </ul>
                        <img src="img/cake-piece.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact__form">  
                        <?php
                        $name= "";
                        $email = "";
                        if(isset($_SESSION['user_id']))
                        {
                            $user_id =  $_SESSION['user_id'];
                            $result  =mysqli_query($con,"select * from tbl_users where id = $user_id"); 
                        
                        while ($row=mysqli_fetch_array($result)) {
                            $name = $row['name'];
                            $email = $row['email'];
                        }
                        
                        }
                        
                        ?>
                        <form method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input style="border:1px solid orange" type="text" placeholder="Name" name="customer_name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input style="border:1px solid orange" type="text" placeholder="Email" name="customer_email" required>
                                </div>
								
                               
								<div class="col-lg-12">
								<input style="border:1px solid orange" type="text" placeholder="Place" name="customer_place" required>
								</div>
								
                              
                                <div class="col-lg-12" style="margin-top:30px">
                                    <textarea style="border:1px solid orange" placeholder="Message" name="message" required></textarea>
                                     </div><div class="col-lg-12">
								<input type="radio" name="type" value="Feedback" style="width:15px;height:15px" required> Feedback
								<input type="radio" name="type" value="Complaint" style="width:15px;height:15px" required> Complaint
                               <!--<select style="border:1px solid orange;width:400px;display:block" name="type" required>
                                   <option selected value="" >Select a type</option>
                                   <option value="feedback">Feedback</option>
                                   <option value="complaint">Complaint</option>
                    </select>-->
                                </div>
								<div class="col-lg-6">
									<button type="submit" name="send" class="site-btn">Send Us</button>
									</div>
                                
								
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
<?php
require_once('footer.php');
?>
	
