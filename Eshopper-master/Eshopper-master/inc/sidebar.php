<div class="col-sm-3">
					<div class="left-sidebar visible-lg">
						<h2>Categorias</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<?php
						$select = "select * from category";
						$run = mysqli_query($con,$select);
						while($row=mysqli_fetch_array($run)){
							$cat_id = $row['id'];
							$cat_name = $row['name'];
							
							$select_sub = "select * from sub_category where cat_id='$cat_id'";
							$run_sub = mysqli_query($con,$select_sub);
							$check = mysqli_num_rows($run_sub);
							
							if($check>0){	
								
								
								?>
								
								     <div class='panel panel-default'>
								<div class='panel-heading'>
									<h4 class='panel-title'>
										<a data-toggle='collapse' data-parent='#accordian' href='#<?php echo $cat_name;?>'>
											<span class='badge pull-right'><i class='fa fa-plus'></i></span>
											<?php echo "$cat_name";  ?>
										</a>
									</h4>
								</div>
								<div id='<?php echo $cat_name;?>' class='panel-collapse collapse'>
									<div class='panel-body'>
										<ul>
										<?php 
										  while($fetch_sub = mysqli_fetch_array($run_sub)){
											  $sub_id = $fetch_sub['id'];
								              $sub_cat = $fetch_sub['cat_id'];
										     $sub_name = $fetch_sub['name'];
											echo "<li><a href='shop.php?sub=$sub_id '>$sub_name </a></li>";
										  }
											?>
										</ul>
									</div>
								</div>
							</div>
								
								<?php
								
								
							}else{
								echo "<div class='panel panel-default'>
								<div class='panel-heading'>
									<h4 class='panel-title'><a href='shop.php?c_id=$cat_id'>$cat_name</a></h4>
								</div>
							</div>";
							}
							
							
						}
						
						
						?>
							
						
						</div><!--/category-products-->
					
						<!--/brands_products-->
						
						<!--price-range-->
						<!--- <div class="price-range">
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div>  -->
						
						
						
					
					</div>
					
					
				</div>
				
