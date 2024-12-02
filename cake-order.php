<style>
.weight
{
	width:80px;
	margin:3px;
}
</style>
<?php
ob_start();
require_once('header.php');
require_once('dbconnection.php');
$price_reduction = 0;
$cakeid = $_GET['cakeid'];
$ret=mysqli_query($con,"select * from tbl_cake where id = $cakeid");

while ($row=mysqli_fetch_array($ret)) 
{
  $cake_id = $row['id'];
  $caker_id = $row['caker_id'];
  $cake_name = $row['cake_name'];
  $category = $row['category_name'];
  $price = $row['cake_price'];
  $photo = $row['photo'];
  $discountRate  = $row['discount'];

}
	$result = mysqli_query($con,"SELECT * FROM tbl_cake_price_reduction");
    while ($row=mysqli_fetch_array($result)) 
    {
		$price_reduction  = $row['amount'];
	}
if(isset($_POST['buynow']))
{
	$cakeName = $_POST['cakeName'];
	$totalWeight = $_POST['totalWeight'];
	$totalPrice = $_POST['totalPrice'];
	$cakePrice = $_POST['cakePrice'];
	$cakeId = $_POST['cakeId'];
	$nos = $_POST['nos'];
	$deliveryTime = $_POST['deliveryTime'];
	$deliveryDate = $_POST['deliveryDate'];
	$caker_id = $_POST['cakerId'];
    $photo = $_POST['photo'];
	$actualPrice = $_POST['actualPrice'];
	$discountRate = $_POST['discountRate'];
	
	if (! isset ( $_SESSION ['carts'] )) 
	{
		$_SESSION ['carts'] = array ();
	}
	if (isset($_SESSION['carts']) && is_array($_SESSION['carts'])) {
            if (array_key_exists($cakeId, $_SESSION['carts'])) {
                
				                
				$_SESSION['carts'][$cakeId]['quantity']+=$nos;
				$_SESSION['carts'][$cakeId]['totalWeight']+=$totalWeight;
            } 
			else 
			{
                // Product is not in carts so add it
                $_SESSION['carts'][$cakeId] = array('cakeId'=>$cakeId,'cakerId'=>$caker_id,'cakeName' => $cakeName, 'totalWeight' => $totalWeight,'quantity'=>$nos,'deliveryDate'=>$deliveryDate,'deliveryTime'=>$deliveryTime,'cakePrice'=>$cakePrice,'totalPrice'=>$totalPrice,'photo'=>$photo,'actualPrice'=>$actualPrice,'discountRate'=>$discountRate);
            }
        } else {
            // There are no products in carts, this will add the first product to carts
            $_SESSION['carts'][$cakeId] = array('cakeId'=>$cakeId,'cakerId'=>$caker_id,'cakeName' => $cakeName, 'totalWeight' => $totalWeight,'quantity'=>$nos,'deliveryDate'=>$deliveryDate,'deliveryTime'=>$deliveryTime,'cakePrice'=>$cakePrice,'totalPrice'=>$totalPrice,'photo'=>$photo,'actualPrice'=>$actualPrice,'discountRate'=>$discountRate);
        }
	header("location:payment.php");
	//print_r($_SESSION ['carts']);
	//unset($_SESSION ['carts']);
	
}

?>
 <section class="contact spad">
 <form method="post">
<div class="container">

<div class="row">
  
  <div class="col-sm-3" style="">
    <img src="<?php echo $photo;?>" alt="">
  </div>
  <div class="col-sm-5" style="">
    <div style="border-bottom: 1px solid gray;height:75px"><h3><span style="color:orange;font-weight:bold"><?php echo $cake_name;?></span></h3></div>
	
    <div style="border-bottom: 1px solid #fff;height:75px;">
	
							<?php
								if($discountRate>0)
								{
									
									
									$discountValue = (int)($price * ($discountRate/100));
									$discountPrice = (int)$price-(int)$discountValue;
									$grandTotal = $discountPrice;
									?>
									
									<br><span  style="color:#3E3B3B ;text-decoration: line-through;font-weight:bold;font-size:22px"  id="price">Rs.  <?php echo $price;?></span>&nbsp;&nbsp;&nbsp;
									<span class="product__item__price text-danger" style="font-weight:bold;font-size:18px"><?php echo $discountRate;?> %Off</span>&nbsp;&nbsp;&nbsp;&nbsp;
									<span id="discountPrice" class="product__item__price text-success" style="font-weight:bold;font-size:22px">₹<?php echo $discountPrice;?></span><br><br>
								<?php
								}
								else
								{
								$grandTotal = $price;
									?>
									<br>
									<span  style="font-weight:bold;font-size:22px;color:red;text-decoration:line-through"  id="price2" ></span>
									<span  style="font-weight:bold;font-size:22px"  id="price">Rs.  <?php echo $price;?></span>
									<br><br>
									<?php
								}
							?>
	
	
    <span><input type="button" id="add" value="+" class="btn btn-success"></span>
    
    <span><input type="text" id="nos" name="nos" value="1" class="" style="width:50px" name="totalNo"></span>
    <span><input type="button" id="remove" value="-" class="btn btn-danger"></span>
   </div><br><br>
    <div style="border-bottom: 1px solid #fff;height:75px;margin-top:20px">Weight <br>
    <button type="button" id="0.5"  style="border:1px solid orange" class="weight btn btn-default">0.5 Kg</button>
    <button type="button" id="1" style="border:1px solid orange;background-color:orange" class="weight btn btn-default">1 Kg</button>
    <button type="button" id="1.5" style="border:1px solid orange" class="weight btn btn-default">1.5 Kg</button>
    <button type="button" id="2" style="border:1px solid orange" class="weight btn btn-default">2 Kg</button>
	<button type="button" id="2.5" style="border:1px solid orange;" class="weight btn btn-default">2.5 Kg</button>
	<button type="button" id="3" style="border:1px solid orange;margin-top:8px" class="weight btn btn-default">3 Kg</button>
	<button type="button" id="3.5" style="border:1px solid orange;margin-top:8px" class="weight btn btn-default">3.5 Kg</button>
	<button type="button" id="4" style="border:1px solid orange;margin-top:8px" class="weight btn btn-default">4 Kg</button>
	<button type="button" id="4.5" style="border:1px solid orange;margin-top:8px" class="weight btn btn-default">4.5 Kg</button>
	<button type="button" id="5" style="border:1px solid orange;margin-top:8px" class="weight btn btn-default">5 Kg</button>    

    </div>
  </div>
  <div class="col-sm-4" style="">
    <u><h4>Delivery Options</h4></u>
    <div style="margin-top:10px">Select Date</div>
    <input type="date" name="deliveryDate" id="" required min="<?php echo date("Y-m-d"); ?>">
    <div style="margin-top:10px">Select Time</div>
    <div>
    <select name="deliveryTime" id="" required>
	<option selected value="">Select time</option>
      <option value="10.00 AM">10.00 AM</option>
      <option value="12.00 PM">12.00 PM</option>
      <option value="02.00 PM">02.00 PM</option>
      <option value="04.00 PM">04.00 PM</option>
	  <option value="06 PM">06.00 PM</option>
      <option value="08.00 PM">08.00 PM</option>
    </select>
    </div><br><br><br>
    <div>
	
	<input type="hidden" name="cakeName" value="<?php echo $cake_name;?>">
	<input type="hidden" name="totalWeight" id="totalWeight" value="1">
	<input type="hidden" id="totalPrice" name="totalPrice" value="<?php echo $price;?>">
	<input type="hidden" name="cakePrice" id="cakePrice" value="<?php echo $price;?>">
	<input type="hidden" name="cakeId" value="<?php echo $cake_id;?>">
	<input type="hidden" name="cakerId" value="<?php echo $caker_id;?>">
	<input type="hidden" name="photo" value="<?php echo $photo;?>">
	<input type="hidden" name="discountRate" id="discountRate" value="<?php echo $discountRate;?>">
	<input type="hidden" name="actualPrice" id="actualPrice" value="">
	<input type="hidden" name="grandTotal" id="grandTotal" value="<?php echo $grandTotal;?>">
	<input type="hidden" name="priceReduction" id="priceReduction" value="<?php echo $price_reduction;?>">
	
	
	
	<?php
	if(isset($_SESSION['user_id']))
	{
	?>
	 <button type="submit"  name="buynow" class="btn btn-warning">Buy Now</button>
    <button type="submit" name="addtocart" class="btn btn-info">Add To Cart</button>
	<?php
	}
	else
	{
		?>
		 <button type="submit" disabled title="Please login to buy an item" name="buynow" class="btn btn-warning">Buy Now</button>
    <button type="submit" disabled title="Please login to buy an item" name="addtocart" class="btn btn-info">Add To Cart</button>
		<?php
	}
	?>
   

</div>
  </div>

</div>
</div>
</form>
</section>
<?php
require_once('footer.php');
?>
<script>
$( document ).ready(function() {
var weight = 1;
//Add count
    $( "#add" ).on( "click", function() {
  var no = parseInt($('#nos').val());
  var discount = parseInt($('#discountRate').val());
  var priceReduction = parseInt($('#priceReduction').val());
  if(discount>0)
  {
  $('#nos').val(no+1);
  var grandTotal = parseInt($('#grandTotal').val());
  var nos = no+1;
  var price = ($('#cakePrice').val());
  var total = price*nos*weight;
  var discountRate = (total*discount/100);
  var discountPrice = parseInt(total-discountRate);
  if(nos>1)
  {
  $("#price").text('Rs. '+((price*nos*weight)-(nos*priceReduction)));
  
  }
  else
  {
  $("#price").text('Rs. '+(price*nos*weight));
  }
  grandTotal = grandTotal + (price*nos*weight);
  $("#grandTotal").val(grandTotal);
  $("#discountPrice").text('Rs. '+(discountPrice));
  $("#actualPrice").val(price*nos*weight);
  $("#totalPrice").val(discountPrice);
  }
  else
  {
  $('#nos').val(no+1);
  
  var nos = no+1;
  var price = ($('#cakePrice').val());
  var grandTotal = parseInt($('#grandTotal').val());
   grandTotal = grandTotal + (price*nos*weight);
  $("#grandTotal").val(grandTotal);
  if(nos>1)
  {
  $("#price").text('Rs. '+((price*nos*weight)-(nos*priceReduction)));
  $("#price2").text('Rs. '+((price*nos*weight)));
  }
  else
  {
  $("#price").text('Rs. '+(price*nos*weight));
  $("#price2").text('');
  }
  $("#totalPrice").val(price*nos*weight);
  $("#actualPrice").val(price*nos*weight);
  }
});

//Remove count
$( "#remove" ).on( "click", function() {
  var no = parseInt($('#nos').val());
  var priceReduction = parseInt($('#priceReduction').val());
  if(no>1)
  {
  
  var discount = parseInt($('#discountRate').val());
  if(discount>0)
  {
	$('#nos').val(no-1);
  var nos = no-1;
  var price = ($('#cakePrice').val());
  var total = price*nos*weight;
  var discountRate = (total*discount/100);
  var discountPrice = parseInt(total-discountRate);
  $("#price").text('Rs. '+(price*nos*weight));
  $("#discountPrice").text('Rs. '+(discountPrice));
  
  $("#actualPrice").val(price*nos*weight);
  $("#totalPrice").val(discountPrice);
  var grandTotal = parseInt($('#grandTotal').val());
    grandTotal = grandTotal + (price*nos*weight);
  $("#grandTotal").val(grandTotal);
  }
  else
  {
  $('#nos').val(no-1);
  var nos = no-1;
  var price = ($('#cakePrice').val());
  if(nos>1)
  {
	
  $("#price").text('Rs. '+((price*nos*weight)-(nos*priceReduction)));
  $("#price2").text('Rs. '+((price*nos*weight)));
  $("#totalPrice").val(((price*nos*weight)-(nos*priceReduction)));
  $("#actualPrice").val(((price*nos*weight)-(nos*priceReduction)));
  var grandTotal = parseInt($('#grandTotal').val());
    grandTotal = grandTotal + (((price*nos*weight)-(nos*priceReduction)));
  $("#grandTotal").val(grandTotal);
  }
  else
  {
  $("#price").text('Rs. '+(price*nos*weight));
  $("#price2").text('');
  $("#totalPrice").val(price*nos*weight);
  $("#actualPrice").val(price*nos*weight);
  var grandTotal = parseInt($('#grandTotal').val());
    grandTotal = grandTotal + (price*nos*weight);
  $("#grandTotal").val(grandTotal);
  }
  }
  }
});

$( ".weight" ).on( "click", function() {
     weight = ($(this).attr('id'));
    var nos  = ($('#nos').val());
    var discount = parseInt($('#discountRate').val());
	var priceReduction = parseInt($('#priceReduction').val());
   if(discount>0)
  {
	
  var price = ($('#cakePrice').val());
  var total = price*nos*weight;
  var discountRate = (total*discount/100);
  var discountPrice = parseInt(total-discountRate);
  $("#price").text('Rs. '+(price*nos*weight));
  $("#discountPrice").text('Rs. '+(discountPrice));
  
  $("#totalPrice").val(discountPrice);
   $(this).css('background-color', 'orange');
  $('.weight').not(this).css('background-color', 'white');
  $("#actualPrice").val(price*nos*weight);
  $("#totalWeight").val(weight);
  var grandTotal = parseInt($('#grandTotal').val());
    grandTotal = grandTotal + (price*nos*weight);
  $("#grandTotal").val(grandTotal);
  }
  else
  {
  
  var price = ($('#cakePrice').val());
  if(nos>1)
  {
  $("#price").text('Rs. '+((price*nos*weight)-(nos*priceReduction)));
  $("#price2").text('Rs. '+((price*nos*weight)));
  $("#totalPrice").val(((price*nos*weight)-(nos*priceReduction)));
  $(this).css('background-color', 'orange');
  $('.weight').not(this).css('background-color', 'white');
  $("#actualPrice").val(((price*nos*weight)-(nos*priceReduction)));
  $("#totalWeight").val(weight);
  var grandTotal = parseInt($('#grandTotal').val());
  grandTotal = grandTotal + (((price*nos*weight)-(nos*priceReduction)));
  $("#grandTotal").val(grandTotal);
  }
  else
  {
	$("#price").text('Rs. '+(price*nos*weight));
	$("#price2").text('');
  $("#totalPrice").val(price*nos*weight);
  $(this).css('background-color', 'orange');
  $('.weight').not(this).css('background-color', 'white');
  $("#actualPrice").val(price*nos*weight);
  $("#totalWeight").val(weight);
  var grandTotal = parseInt($('#grandTotal').val());
  grandTotal = grandTotal + (price*nos*weight);
  $("#grandTotal").val(grandTotal);
  }
  }
	
	
 
  
});

 

});
</script>
