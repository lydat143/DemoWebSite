<!-- Slider -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="img/slider1.jpg" alt="Los Angeles">
				</div>
				<div class="item">
					<img src="img/slider2.png" alt="Chicago">
				</div>
				<div class="item">
					<img src="img/slider3.png" alt="New York">
				</div>
			</div>
			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="fa fa-angle-left fa-3x" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="fa fa-angle-right fa-3x" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<!-- END Slider -->
		<section class="news">
			<div class="row " style="margin:0px !important">
				<?php 
					$sql2="select `id`,`title`,`desc`,`img_url` from `nn_blog` where `active`=1 order by `create_at` desc limit 0,2";
					$rs2=mysqli_query($link,$sql2);
					while ($r2=mysqli_fetch_assoc($rs2)) {
				?>
				<div class="col-sm-3 home-post left">
					<p class="title">
						<a href="index.php?mod=single&id=<?php echo $r2['id'] ?>" style="color: rgb(151, 186, 101) !important;"><?php echo $r2['title']; ?></a>
					</p>
					<p class="post">
						<?php echo $r2['desc']; ?>
						<br>
						<p><a href="index.php?mod=single&id=<?php echo $r2['id'] ?>" style="color: rgb(151, 186, 101) !important;">XEM CHI TIẾT >>></a></p>
					</p>
				</div>
				<div class="col-sm-3 home-post right">
					<a href="index.php?mod=single&id=<?php echo $r2['id'] ?>"><img class="home-post-image" src="img/<?php echo $r2['img_url']; ?>"></a>
				</div>
				<?php } ?>
			</div>
			<div class="row " style="margin:0px !important;">
				<?php 
					$sql3="select `id`,`title`,`desc`,`img_url` from `nn_blog` where `active`=1 order by `create_at` desc limit 2,2";
					$rs3=mysqli_query($link,$sql3);
					while ($r3=mysqli_fetch_assoc($rs3)) {
				?>
				<div class="col-sm-3 home-post left">
					<a href="index.php?mod=single&id=<?php echo $r3['id'] ?>"><img class="home-post-image-left" src="img/<?php echo $r3['img_url']; ?>"></a>
				</div>
				<div class="col-sm-3 home-post left">
					<p class="title">
						<a href="index.php?mod=single&id=<?php echo $r3['id'] ?>" style="color: rgb(151, 186, 101) !important;"><?php echo $r3['title']; ?></a>
					</p>
					<p class="post">
						<?php echo $r3['desc']; ?>
						<br>
						<p><a href="index.php?mod=single&id=<?php echo $r3['id'] ?>" style="color: rgb(151, 186, 101) !important;">XEM CHI TIẾT >>></a></p>
					</p>
				</div>
				<?php } ?>
			</div>
		</section>
		<section class="featured-product">
			<div class="home-title">
				<span style=" font-weight: 700;"> featured </span> products
				
			</div>
			<div class="tcb-product-slider">
				<div class="container-fluid">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Wrapper for slides -->
						<div class="row">
							<div class="col-sm-1 carousel-button">
								<a class="left carousel-product-control" href="#carousel-example-generic" role="button" data-slide="prev">
									<span class="fa fa-angle-left fa-3x" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
							</div>
							<div class="col-sm-10">
								<div class="carousel-inner" role="listbox">
									<?php 
										$sql="SELECT `product_name`,`img_url` FROM `nn_product` WHERE `active`=1 ORDER BY `sold` DESC LIMIT 0,9";
										$rs=mysqli_query($link,$sql);
										$i=1;
										while ($r=mysqli_fetch_assoc($rs)) {
											if ($i<=3) {
											
									?>
									<div class="item <?php if($i==1) echo 'active'; ?>">
										<div class="row">
											<?php

												for($j=0;$j<=6;$j=$j+3){
												if ($j==0 && $i==1) {	 
												$sql1='SELECT `product_name`,`img_url`,`product_id` FROM `nn_product` WHERE `active`=1 ORDER BY `sold` DESC LIMIT 0,3';
												$rs1=mysqli_query($link,$sql1);
												}
												if ($j==3 && $i==2) {	 
												$sql1='SELECT `product_name`,`img_url`,`product_id` FROM `nn_product` WHERE `active`=1 ORDER BY `sold` DESC LIMIT 3,3';
												$rs1=mysqli_query($link,$sql1);
												}
												if ($j==6 && $i==3) {	 
												$sql1='SELECT `product_name`,`img_url`,`product_id` FROM `nn_product` WHERE `active`=1 ORDER BY `sold` DESC LIMIT 6,3';
												$rs1=mysqli_query($link,$sql1);
												}

												while ($r1=mysqli_fetch_assoc($rs1)) {
															
											?>
											<div class="col-xs-6 col-sm-4 ">
												<div class="tcb-product-item hvr-outline-in">
													<div class="tcb-product-photo">
														<a href="index.php?mod=details&id=<?php echo $r1['product_id'] ?>">
															<img src="img/<?php echo $r1['img_url'] ?>" class="img-responsive" alt="a" />
														</a>
													</div>
													<div class="tcb-product-title">
														<h4>
														<a href="index.php?mod=details&id=<?php echo $r1['product_id'] ?>"><?php echo $r1['product_name'] ?> </a>
														</h4>
													</div>
												</div>
											</div>
											<?php }} ?>
										</div>
									</div>
									<?php 
										$i++;}
										} 
									?>
								</div>
							</div>
							<div class="col-sm-1 carousel-button">
								<a class="right carousel-product-control" href="#carousel-example-generic" role="button" data-slide="next">
									<span class="fa fa-angle-right fa-3x" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="home-button">
				<a href="index.php?mod=allproduct" class="btn btn-home" role="button">ALL PRODUCTS</a>
			</div>
		</section>
		<section class="featured-category">
			<div class="home-title">
				featured <span style=" font-weight: 700;"> categories </span>
			</div>
			<div class="container">
				<?php 
					$sql4="SELECT DISTINCT `category_name`,a.id,`product_id`,`product_name`,`img_url`,MAX(sold) FROM nn_category a, nn_product b WHERE a.id=b.category_id and a.active=1 and b.active=1 GROUP BY a.id LIMIT 0,2";
					$rs4=mysqli_query($link,$sql4);
					$i=1;
					while ($r4=mysqli_fetch_assoc($rs4)) {
						
				?>
				<div class="row">
					
					<div class="col-sm-4 col-sm-offset-2 home-categories" style="<?php if ($i==2) echo 'display: none;'?>">
						<img class="img-responsive " src="img/interior.jpg">
						<div class="categories-title categories-title-left"><?php echo $r4['category_name'] ?></div>
						</img>
					</div>
					<div class="col-sm-4 home-product-categories <?php if ($i==2) echo 'col-sm-offset-2'?>">
						<div class="products-title products-title-<?php if ($i==2) echo 'left';else echo 'right' ?> ">
							<a class="hvr-underline-from-<?php if ($i==1) echo 'left';else echo 'right' ?> " href="index.php?mod=details&id=<?php echo $r4['product_id'] ?>"><?php echo $r4['product_name'] ?></a>
						</div>
						<img src="img/<?php echo $r4['img_url'] ?>" class="img-responsive featured-product-category" />
						<a class="products-title-right <?php if ($i==2) echo 'products-title-left-a';else echo 'products-title-right-a' ?>" href="index.php?mod=product&cate=<?php echo $r4['id'] ?>"> See all products </a>
					</div>
					<div class="col-sm-4 home-categories" style="<?php if ($i==1) echo 'display: none;'?>">
						<img class="img-responsive " src="img/exterior.jpg">
						<div class="categories-title categories-title-right"><?php echo $r4['category_name'] ?></div>
						</img>
					</div>
					
				</div>
				<?php $i=2;} ?>
				
				<div class="home-button">
					<a href="index.php?mod=allcategory" class="btn btn-home" role="button">ALL CATEGORIES</a>
				</div>
			</div>
		</section>