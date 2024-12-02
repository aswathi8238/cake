<?php
ob_start();
require_once('header.php');
require_once('dbconnection.php');
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
	if (! isset ( $_SESSION ['carts'] )) 
	{
		$_SESSION ['carts'] = array ();
	}
	if (isset($_SESSION['carts']) && is_array($_SESSION['carts'])) {
            if (array_key_exists($cakeId, $_SESSION['carts'])) {
                
				                
				$_SESSION['carts'][$cakeId]['quantity']+=$nos;
            } 
			else 
			{
                // Product is not in carts so add it
                $_SESSION['carts'][$cakeId] = array('cakeId'=>$cakeId,'cakerId'=>$caker_id,'cakeName' => $cakeName, 'totalWeight' => $totalWeight,'quantity'=>$nos,'deliveryDate'=>$deliveryDate,'deliveryTime'=>$deliveryTime,'cakePrice'=>$cakePrice,'totalPrice'=>$totalPrice);
            }
        } else {
            // There are no products in carts, this will add the first product to carts
            $_SESSION['carts'][$cakeId] = array('cakeId'=>$cakeId,'cakerId'=>$caker_id,'cakeName' => $cakeName, 'totalWeight' => $totalWeight,'quantity'=>$nos,'deliveryDate'=>$deliveryDate,'deliveryTime'=>$deliveryTime,'cakePrice'=>$cakePrice,'totalPrice'=>$totalPrice);
        }
	header("location:payment.php");
	//print_r($_SESSION ['carts']);
	//unset($_SESSION ['carts']);
	
}

?>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shopping cart</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="index.php">Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
									<th>Weight</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
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
			$photo = $v['photo'];
			$quantity = $v['quantity'];
			$discountRate = $v['discountRate'];
			$totalWeight = $v['totalWeight'];
			
			?>
			 <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img style="width:75px;height:75px" src="caker/<?php echo $photo;?>" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6><?php echo $cakeName;?></h6>
											
                                            
											<?php
			if($discountRate>0)
			{
			$discountValue = (int)($cakePrice * ($discountRate/100));
			$discountPrice = (int)$cakePrice-(int)$discountValue;
			
			$grandTotal += ($discountPrice*$quantity*$totalWeight);
			?>
			<h5><span class="price" style="text-decoration:line-through;color:grey">₹<?php echo $cakePrice.'</span><br><span class="price" style="color:green">₹';echo $discountPrice; ?></span></h5>
			
			<?php
			}
			else
			{
			
			$grandTotal += ($cakePrice*$quantity*$totalWeight);
				?>
				<h5>₹<?php echo $cakePrice;?></h5>
			<?php
			}
			?>
                                        </div>
                                    </td>
									 <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="">
                                              <b><?php echo $totalWeight.' Kg ';?></b> 
                                            </div>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="">
                                              <b><?php echo $quantity;?></b> 
                                            </div>
                                        </div>
                                    </td>
									<?php
									if($discountRate>0)
									{
									?>
									<td class="cart__price">₹ <?php echo ($totalWeight*$quantity*$discountPrice)?></td>	
									<?php
									}
									else
									{
									?>
										<td class="cart__price">₹ <?php echo ($totalWeight*$quantity*$cakePrice)?></td>
										<td><?php echo $quantity;?></td>
									<?php
									}
									?>
                                    
                                    <td class="cart__close"><a href="shoping-cart.php?removeid=<?php echo $cakeId;?>"><span class="icon_close"></a></span></td>
                                </tr>

			<?php
		}
	  }
	 
	  ?>
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="shop.php">Continue Shopping</a>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-4">
                   
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>₹ <?php echo $grandTotal;?></span></li>
                            <li>Total <span>₹ <?php echo $grandTotal;?></span></li>
                        </ul>
                        <a href="payment.php" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

<?php
require_once('footer.php');
?>
<script>
$( document ).ready(function() {
var weight = 1;
    $( "#add" ).on( "click", function() {
  var no = parseInt($('#nos').val());
  $('#nos').val(no+1);
  
  var nos = no+1;
  var price = ($('#cakePrice').val());
  
  $("#price").text('Rs. '+(price*nos*weight));
  $("#totalPrice").val(price*nos*weight);
});

$( "#remove" ).on( "click", function() {
  var no = parseInt($('#nos').val());
  if(no>1)
  {
  $('#nos').val(no-1);
  var nos = no-1;
  var price = ($('#cakePrice').val());
  
  $("#price").text('Rs. '+(price*nos*weight));
  $("#totalPrice").val(price*nos*weight);
  }
});

$( ".weight" ).on( "click", function() {
     weight = ($(this).attr('id'));
    var price = ($('#cakePrice').val());
    var nos  = ($('#nos').val());
    var totalPrice  = weight * price * nos;
   
	
	$("#totalPrice").val(totalPrice);
	$("#price").text('Rs. '+totalPrice);
  $(this).css('background-color', 'orange');
  $('.weight').not(this).css('background-color', 'white');
  
  $("#totalWeight").val(weight);
  
});

 

});
</script>
