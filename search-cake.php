<?php
require_once('header.php');
require_once('dbconnection.php');
?>
  <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shop</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.php">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="shop__option">
                <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <div class="shop__option__search">
                            <!-- <form action="#"> -->
                               
                                <form action="search-cake.php" method="post" style="border:1px solid #fd7e14">
                                <input type="text" placeholder="Search" required name="cake_category">
                                <button type="submit" name="search"><i class="fa fa-search"></i></button>
                                
                            </form>
                        </div>
                    </div>
                   <div class="col-lg-5 col-md-5">
                        <div class="shop__option__right">
						<form method="post" action="search-by-caker.php">
						
                           <select required name="caker_id">
                                    <option value="">Search by Caker</option>
                                    <?php
                                $ret=mysqli_query($con,"SELECT * FROM tbl_caker");
                                
                                while ($row=mysqli_fetch_array($ret)) {
                                    
                                ?>
                                    
                                    <option  value="<?php echo $row['id'];?>"><?php echo $row['firstname'];?></option>		
										
								<?php
                                }
                                ?>		
                                </select>
								<input style="height:35px;background-color:#fd7e14;border:none;font-size:14px" type="submit" value="Search" name="btn_caker" class="btn btn-primary">
								</form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
            <?php
if(isset($_POST['search']))
{
 
  $category = $_POST['cake_category'];
  
  
}

$ret=mysqli_query($con,"select * from tbl_cake where category_name  = '$category'");

if(mysqli_num_rows($ret) > 0)
{
    $result = $ret;
}
else
{
    $ret=mysqli_query($con,"select * from tbl_cake"); 
    $result = $ret;

} 
while ($row=mysqli_fetch_array($result)) {


?>


                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="caker/<?php  echo $row['photo'];?>">
                            <div class="product__label">
                                <span><?php  echo $row['category_name'];?></span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?php  echo $row['cake_name'];?></a></h6>
                            <?php
								if($row['discount']>0)
								{
									$price = $row['cake_price'];
									$discountRate = $row['discount'];
									$discountValue = (int)($price * ($discountRate/100));
									$discountPrice = (int)$price-(int)$discountValue;
									?>
									<div class="product__item__price" style="color:grey;text-decoration: line-through;">₹<?php echo $row['cake_price'];?></div>
									<div class="product__item__price text-danger"><?php echo $row['discount'];?> %Off</div>
									<div class="product__item__price text-success">₹<?php echo $discountPrice;?></div>
								<?php
								}
								else
								{
									?>
									<div class="product__item__price">₹<?php echo $row['cake_price'];?></div>
									<?php
								}
							?>
                            <div class="cart_add">
                                <a href="<?php echo "cake-order.php?cakeid=".$row['id'];?>">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
 
<?php 

}?>               
            </div>
            <div class="shop__last__option">
                <div class="row">
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
<?php
require_once('footer.php');
?>
	
