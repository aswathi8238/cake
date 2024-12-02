 <!-- Footer Section Begin -->
 <?php
 require_once('dbconnection.php');
 if(isset($_POST['subscribe']))
 {
	$email =  $_POST['user_email'];
	 $query=mysqli_query($con, "insert into subscribers(user_email) values('$email')");
     if ($query) {
     
     echo "<script>alert('Thank You \\n Your subscription has been confirmed.');</script>";
    
   }
   else
     {
       echo "<script>alert('Something Went Wrong. Please try again');</script>";
     }
 }
 ?>
    <footer class="footer set-bg" data-setbg="img/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer__widget">
                        <h6>WORKING HOURS</h6>
                        <ul>
                            <li>Monday - Friday: 08:00 am – 08:30 pm</li>
                            <li>Saturday: 10:00 am – 6:30 pm</li>
                            <li>Sunday: 10:00 am – 4:30 pm</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><h3 style="color:#f08632;">Bake N Pack</h3></a>
                        </div>
                        <p>We are not just a bakery, we are not just bakers. In fact, we are just like you, a bunch of food lovers fascinated with sweet indulgence, who dreamt of creating an appetizing fairy land of divine delicacies that relishes the utmost desires.</p>
                        <div class="footer__social">
                           
                        </div>
                    </div>
                </div>
                <!--div class="col-lg-4">
                    <div class="footer__newslatter">
                        <h6>Subscribe</h6>
                        <p>Get latest updates and offers.</p>
                        <form method="POST">
                            <input type="email" placeholder="Email" required name="user_email">
                            <button type="submit" name="subscribe"><i class="fa fa-send-o"></i></button>
                        </form>
                    </div>
                </div-->
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <p class="copyright__text text-white"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  
                      </p>
                  </div>
                  <div class="col-lg-5">
                    <div class="copyright__widget">
                        <!--ul>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Site Map</a></li>
                        </ul-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.barfiller.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/main.js"></script>
<script>
$("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
  .fadeOut(1000)
  .next()
  .fadeIn(1000)
  .end()
  .appendTo('#slideshow');
}, 3000);
</script>
<script type="text/javascript">
  $(function() {
     $( "#cake_category" ).autocomplete({
       source: 'ajax-db-search.php',
     });
  });
</script>
</body>

</html>