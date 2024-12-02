<?php
require_once('header.php');
require_once('dbconnection.php');
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) 
{



foreach($_SESSION['carts'] as  $k)
	 {
			 
		$deliveryTime =  $k['deliveryTime'];
		$deliveryDate =  $k['deliveryDate'];
		$nos =  $k['quantity'];
		$cakeName =  $k['cakeName'];
		$totalWeight = $k['totalWeight'];
		$totalPrice = $k['totalPrice'];
		$cakePrice = $k['cakePrice'];
		$cakeId =  $k['cakeId'];
		$cakerId =  $k['cakerId'];
		$totalItems = count($_SESSION['carts']);
		$grandTotal = $totalPrice;
	 }

 ?>
<style>
    


* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}


input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
 
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: green;
  font-weight:bold;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}


    </style>
 <section class="contact spad">
<div class="container">

<div class="row">
<div class="col-75">
<input type="radio" value="Cash On Delivery" id="cod" checked name="pay">&nbsp; Cash on delivery &nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" value="Online Payment" id="op" name="pay">&nbsp; Online payment
</div>
</div><br>
<div class="row">
  <div class="col-75" id="divCOD">
    <div class="container" style=" background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;">
      <form action="checkout.php" method="POST">
       
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Name" required>
			<label for="mobile"><i class="fa fa-user"></i> Mobile Number</label>
            <input type="text" id="mobile" name="mobile" placeholder="Mobile" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text"  id="email" name="email" placeholder="Email" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="Address" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="City" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="State" required>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text"  id="zip" name="zip" placeholder="Pincode" required onkeypress="return isNumber(event)" maxlength="6">
              </div>
            </div>
          </div>

          
          
        </div>
       <input type="hidden" name="deliveryTime" value="<?php echo $deliveryTime;?>">
	   <input type="hidden" name="deliveryDate" value="<?php echo $deliveryDate;?>">
	   <input type="hidden" name="nos" value="<?php echo $nos;?>">
	   <input type="hidden" name="cakeName" value="<?php echo $cakeName;?>">
	   <input type="hidden" name="totalWeight" value="<?php echo $totalWeight;?>">
	   <input type="hidden" name="totalPrice" value="<?php echo $totalPrice;?>">
	   <input type="hidden" name="cakePrice" value="<?php echo $cakePrice;?>">
	   <input type="hidden" name="userId" value="<?php echo $_SESSION['user_id'];?>">
	   <input type="hidden" name="cakerId" value="<?php echo $cakerId;?>">
	   <input type="hidden" name="mode" id="mode" value="Cash On Delivery">
	   
	    
        <input type="submit" name="ok" value="Continue to checkout" class="btn" style=" background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;">
      </form>
    </div>
  </div>
  
  <div class="col-75" id="divOP" style="display:none">
    <div class="container" style=" background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;">
      <form action="checkout.php" method="POST">
       
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Name" required>
			<label for="mobile"><i class="fa fa-user"></i> Mobile Number</label>
            <input type="text" id="mobile" name="mobile" placeholder="Mobile" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="Email" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="Address" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="City" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="State" required>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="Pincode" required maxlength="6" onkeypress="return isNumber(event)>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Cardname" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="Card Number" required>
            
            <!-- <input type="text" id="expmonth" name="expmonth" placeholder="Month" required> -->

            <div class="row">
              <div class="col-25">
                <label for="expmonth">Exp Month</label>
                <select name="expmonth" id="expmonth" required>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>


            </select>
              </div>
              <div class="col-25">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="Year" required>
              </div>
              <div class="col-25">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="CVV" required maxlength="3" minlength="3" onkeypress="return isNumber(event)">
              </div>
            </div>
          </div>
          
        </div>
       <input type="hidden" name="deliveryTime" value="<?php echo $deliveryTime;?>">
	   <input type="hidden" name="deliveryDate" value="<?php echo $deliveryDate;?>">
	   <input type="hidden" name="nos" value="<?php echo $nos;?>">
	   <input type="hidden" name="cakeName" value="<?php echo $cakeName;?>">
	   <input type="hidden" name="totalWeight" value="<?php echo $totalWeight;?>">
	   <input type="hidden" name="totalPrice" value="<?php echo $totalPrice;?>">
	   <input type="hidden" name="cakePrice" value="<?php echo $cakePrice;?>">
	   <input type="hidden" name="userId" value="<?php echo $_SESSION['user_id'];?>">
	   <input type="hidden" name="cakerId" value="<?php echo $cakerId;?>">
	   <input type="hidden" name="mode" id="mode" value="Cash On Delivery">
	   
	    
        <input type="submit" name="ok" value="Continue to checkout" class="btn" style=" background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;">
      </form>
    </div>
  </div>
  
  
  <div class="col-25">
    <div class="container">
	<?php
	if(isset($_SESSION['carts']))
	{
		$totalItems = count($_SESSION['carts']);
	}
	
	?>
      <h4><span style="color:#000">Cart</span><span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo $totalItems;?></b></span></h4>
      <hr>
      <?php
	  if(isset($_SESSION['carts']))
	  {
	  	  $grandTotal = 0;
		  foreach($_SESSION['carts'] as $v)
		{
			$cakeName = $v['cakeName'];
			$cakePrice = $v['cakePrice'];
			$totalPrice = $v['totalPrice'];
			$cakeId = $v['cakeId'];
			$quantity = $v['quantity'];
			$discountRate = $v['discountRate'];
			$totalWeight = $v['totalWeight'];
			
			if($discountRate>0)
			{
			$discountValue = (int)($cakePrice * ($discountRate/100));
			$discountPrice = (int)$cakePrice-(int)$discountValue;
			$grandTotal += ($discountPrice*$quantity*$totalWeight);
			?>
			<p><a href="cake-order.php?cakeid=<?php echo $cakeId; ?>"><?php echo $cakeName; ?></a><span class="price" style="text-decoration:line-through;color:grey"><?php echo $cakePrice.'</span><br><span class="price" style="color:green">';echo $discountPrice; ?></span></p><br>
			<?php
			}
			else
			{
			
			$grandTotal += ($cakePrice*$quantity*$totalWeight);
				?>
				<p><a href="cake-order.php?cakeid=<?php echo $cakeId; ?>"><?php echo $cakeName; ?></a><span class="price"><?php echo $cakePrice; ?></span></p><br>
			<?php
			}
			
			
		}
	  }
	 
	  ?>
	  <br>
      <hr>
      <p><span  style="color:black;font-size:20px;font-weight:bold">Total</span><span class="price" style="color:black;font-size:24px"><?php echo $grandTotal;?></span></p>
    </div>
  </div>
</div>

</div>
</div>
</section>
<?php
require_once('footer.php');
?>
<script>
$(document).ready(function(){
$('#cod').change(function() {
    $('#divCOD').css('display','block');
	$('#divOP').css('display','none');
	$('#mode').val('Cash On Delivery');
});
$('#op').change(function() {
    $('#divOP').css('display','block');
	$('#divCOD').css('display','none');
	$('#mode').val('Online Payment');
});

});
</script>
<?php	
}
else
{
header("location:index.php");
}
?>

<script type="text/javascript">
  
  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>