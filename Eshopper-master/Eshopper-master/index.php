    <!---Header Starts--->
	<?php include "inc/header.php"; ?>
	<!---Header Ends--->
	
	<!---Slider Starts--->
	<?php include "inc/slider.php"; ?>
    <!---Slider Ends---->
	
	
	<section>
		<div class="container">
			<div class="row">
			<!---Sidebar Starts--->
				  <?php include "inc/sidebar.php"; ?>
		 <!---Sidebar Ends--->
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
				        
						
						<?php
						$select = "select * from product ORDER BY RAND() LIMIT 0,6";
						$run = mysqli_query($con,$select);
						
							
						
						while($row=mysqli_fetch_array($run)){
							$id = $row['id'];
							$name = $row['p_name'];
							$image = $row['p_image'];
							$price = $row['p_price'];
							
							
							
						
						
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="admin/images/<?php echo $image; ?>" alt="" >
										<h2><span>Rs.</span><?php echo $price; ?></h2>
										<p><?php echo $name; ?></p>
										<a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="cart(<?php echo $id; ?>)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										<a href="<?php echo $add_wish ?>" class="btn btn-default add-to-cart wish" data-user="<?php echo $s_email; ?>" onclick="wish(<?php echo $id; ?>)"><i class="glyphicon glyphicon-heart"></i> Wishlist</a>
									</div>
									
									<img src="images/home/new.png" class="new" alt="" />
								</div>
								
							</div>
						</div>
						<?php } ?>
						
						
					</div><!--features_items-->
				
					
				</div>
			</div>
		</div>
	</section>
	
	<!---Footer Starts--->
	<?php include "inc/footer.php"; ?>
	<!---Footer Ends--->
	<script>
		function cart($pro_id){
		var p_id = $pro_id;
		
		$.ajax({
			url:"function.php",
			method:"post",
			data:{p_id:p_id},
			success: function($data){
			    if($data > 0){
					notif({
						msg:"Product Already Added !!!",
						type:"warning",
						width:330,
						height:40,
						timeout:1000,
						
					})
					
				}else{
					notif({
						msg:"Added to Cart",
						type:"success",
						width:330,
						height:40,
						timeout:1000,
						
					})
				}
				   	
			}
			
		})
		
	}
	
	function wish($p_id){
		var w_id = $p_id;
		var email = $(".wish").data("user");
		
		if(email != 0){
		$.ajax({
			url:"function.php",
			method:"post",
			data:{w_id:w_id,email:email},
			success: function($wish){
				    if($wish > 0){
					notif({
						msg:"Product Already Added to wishlist!!!",
						type:"warning",
						width:330,
						height:40,
						timeout:1000,
						
					})
					
				}else{
					notif({
						msg:"Added to wishlist",
						type:"success",
						width:330,
						height:40,
						timeout:1000,
						
					})
				}
			}
		})
		}
	}
	

	
	</script>
	<?php
	if(isset($_GET['logout'])){
		echo "<script>
		notif({
				        msg:'You Have logged out Successfully !!',
						type:'warning',
						width:330,
						height:40,
						timeout:2000,
						
					})
					</script>
		";
		
	}
	
	if(isset($_GET['login'])){
		echo "<script>
		notif({
				        msg:'You Have logged in Successfully !!',
						type:'success',
						width:330,
						height:40,
						timeout:2000,
						
					})
					</script>
		";
		
	}
		if(isset($_GET['account'])){
		echo "<script>
		notif({
				        msg:'Your Account has been created Successfully !!',
						type:'success',
						width:330,
						height:40,
						timeout:2000,
						
					})
					</script>
		";
		
	}
	
	if(isset($_GET['thank'])){
		echo "<script>
		notif({
				        msg:'Thank you for shopping with us!!',
						type:'success',
						width:330,
						height:40,
						timeout:2000,
						
					})
					</script>
		";
		
	}
	
	
	?>