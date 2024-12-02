<?php
require_once('header.php');
require_once('dbconnection.php');
		$firstname = "";
		$mobile = "";
		$email = "";
		$address = "";
		$city = "";
		$state = "";
		$zip = "";
		$mode = "";
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) 
{
	  if(isset($_POST["ok"]))
	  {
		$firstname = $_POST["firstname"];
		$mobile = $_POST["mobile"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$zip = $_POST["zip"];
		$mode = $_POST["mode"];
	  }
  	  if(isset($_SESSION['carts']))
	  {
	  	  $grandTotal = 0;
		  foreach($_SESSION['carts'] as $v)
		{
			$cakeName = $v['cakeName'];
			$cakePrice = $v['cakePrice'];
			$cakeId = $v['cakeId'];
			$photo = $v['photo'];
			$quantity = $v['quantity'];
			$totalWeight = $v['totalWeight'];
			$discountRate = $v['discountRate'];
			if($discountRate>0)
			{
			$discountValue = (int)($cakePrice * ($discountRate/100));
			$discountPrice = (int)$cakePrice-(int)$discountValue;
			$totalPrice = $discountPrice*$quantity*$totalWeight;
			$grandTotal += $discountPrice*$quantity*$totalWeight;
			}
			else
			{
			$totalPrice = $cakePrice*$quantity*$totalWeight;	
			$grandTotal += $cakePrice*$quantity*$totalWeight;	
			}
			
			
			$deliveryDate = $v['deliveryDate'];
			$deliveryTime =  $v['deliveryTime'];
			
			$userId = $_SESSION['user_id'];
			$cakerId = $v['cakerId'];
			$sql =  "insert into tbl_user_order(caker_id,cake_info,weight,quantity,delivery_date,delivery_time,price,total,user_id,status,firstname,mobile,email,address,city,state,zip,modeOfPayment) values($cakerId,'$cakeName',$totalWeight,$quantity,'$deliveryDate','$deliveryTime',$cakePrice,$totalPrice,$userId,'Ordered','$firstname','$mobile','$email','$address','$city','$state',$zip,'$mode')";
			$query=mysqli_query($con,$sql);
			
			
		}
}		

	
	  
     if ($query) {
     unset($_SESSION ['carts']);
     echo "<script>alert('Your order has been successfully placed..!');</script>";
     echo "<script type='text/javascript'> document.location ='my-order.php'; </script>";

   }
   else
     {
       echo "<script>alert('Something Went Wrong. Please try again');</script>";
	     echo "<script type='text/javascript'> document.location ='payment.php'; </script>";
     }
	
}
else
{
header("location:index.php");
}
?>
 