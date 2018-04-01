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
		<section class="maincontent">
			<div class="container-fluid">
				<div class="row product-page">
				
					<?php
			            $cate=$_GET['cate'];//category hiện tại
			            if($cate=='') $cate=1;
			            
			            $ipp=6;
			            
			            $page=$_GET['page'];//trang hiện tại
			            if(''==$page || $page<1)$page=1;
			            //tính số trang
			            $sql='select count(*) as `total` from  `nn_product` where `category_id`='.$cate;
			            $rs=mysqli_query($link,$sql);
			            $r=mysqli_fetch_assoc($rs);
			            $nop=ceil($r['total']/$ipp);//number of page
			            if($page>$nop)$page=$nop;

			            $sql1='select `category_name`,`id` from `nn_category` where `active`=1 and `id`='.$cate;
			            $rs1=mysqli_query($link,$sql1);
			            $r1=mysqli_fetch_assoc($rs1);

			        ?>
					<h1 style="font-weight: bold;text-align: center; color: rgb(93,113,73);padding-bottom: 50px"><?php echo $r1['category_name'] ?></h1>
					<div class="col-sm-8 col-sm-offset-2">
						<?php 
							$pos=($page-1)*$ipp;
            				if($pos<0) $pos=0;
							$sql2="select `product_name`,`price`,`img_url`,`product_id` from `nn_product` where `active`=1 and `category_id`=$cate limit $pos,$ipp";
			            	$rs2=mysqli_query($link,$sql2);
			            	if(mysqli_num_rows($rs2)==0) echo '<h3>Không có sản phẩm nào được tìm thấy.</h3>';
            				else{while ($r2=mysqli_fetch_assoc($rs2)) {
						?>
						<div class="col-sm-4 product-full-item hvr-outline-in">
							<div class="product-image">
								<a href="index.php?mod=details&id=<?php echo $r2['product_id'] ?>"><img src="img/<?php echo $r2['img_url'] ?>" class="img-responsive" /></a>
							</div>
							<div class="product-price">
								<h6><?php echo number_format($r2['price']) ?></h6>
							</div>
							<div class="product-title">
								<a href="index.php?mod=details&id=<?php echo $r2['product_id'] ?>"><?php echo $r2['product_name'] ?></a>
							</div>
						</div>
						<?php 
							} 
						}
						?>
					</div>
				</div>
				
			    <ul class="pagination" style="padding-left: 45%">
                    <li><a title="Trang trước" href="index.php?mod=product&cate=<?php echo $cate?>&page=<?php if($page<=1)echo 1; else echo $page-1 ?>">&laquo;</a></li>
                    <?php
			            for($i=$page-1;$i<=$page+1;$i++)
			            {
			                if($i>=1 && $i<=$nop)
			                {
			        ?>
			                <li <?php if($i==$page)echo 'class="active"' ?>><a href="index.php?mod=product&cate=<?php echo $cate?>&page=<?php echo $i ?>"> <?php echo $i ?> </a></li>
			        <?php
			                }
			            }
			        ?>
                    <li><a title="Trang sau" href="index.php?mod=product&cate=<?php echo $cate?>&page=<?php if($page>=$nop)echo $nop;else echo $page+1 ?>">&raquo;</a></li>
                </ul>
			</div>

		</section>
		
	</body>
</html>