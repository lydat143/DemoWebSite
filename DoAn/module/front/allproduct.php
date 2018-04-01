
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

<?php
	
	$page=intval($_GET['page']);//current page
	if($page<1)$page=1;
	
	//Lay keyword
	$kw=$_REQUEST['kw'];
	$cond="`active` =1 AND `product_name` like '%$kw%'";
	
	//Lay loai
	if(!isset($_REQUEST['cate']))$_REQUEST['cate']='';
	$cate=$_REQUEST['cate'];
	if($cate>0)//Co tim theo loai
	$cond=$cond." AND `category_id`=$cate";
	
	//Lay khoang gia
	if(!isset($_REQUEST['price']))$_REQUEST['price']='';
	$price=$_REQUEST['price'];
	if($price==1)$cond=$cond." AND `price` < 500000";
	if($price==2)$cond=$cond." AND `price` between 500000 and 1500000";
	if($price==3)$cond=$cond." AND `price` between 1500000 and 3000000";
	if($price==4)$cond=$cond." AND `price` > 3000000";
	
	//sắp xếp
	if(!isset($_REQUEST['sort']))$_REQUEST['sort']='';
	$sort=$_REQUEST['sort'];
	if($sort<1)$sort=5;
	$order="`product_name` ASC";//default
	if($sort==9)
	$order="`product_name` DESC";
	if($sort==8)
	$order="`create_at` DESC";
	if($sort==6)
	$order="`price` ASC";
	if($sort==7)
	$order="`price` DESC";
	$cond=$cond." ORDER BY $order";
	
	//Tinh so trang
	$sql3="SELECT count(*)
			FROM `nn_product`
			WHERE $cond";
	$rs3=mysqli_query($link,$sql3);
	$r3=mysqli_fetch_row($rs3);
	$ipp=6;
	$noi=$r3[0];
	$nop=ceil($noi/6);//number of pages
?>
<section class="maincontent">
<div class="container-fluid">
	<div class="row product-page">
			<div class="product-top-title">
				Tất cả 
				<span style=" font-weight: 700;"> Sản Phẩm  </span>
			</div>
			<div class="col-sm-2 col-sm-offset-2 leftsidebar">
			    <form action="" method="post">
				<input type="text" name="kw" id="search" placeholder="Search" class="search-input" value="<?php echo $kw?>" >
				
				<div class="filter-product">
					<div class="filter-title">
						FILTER
					</div>
					<hr class="devide">
					<ul class="filter-option">
						<li>Có tổng cộng: <?php echo $noi ?> sản phẩm </li>
						<li>SORT BY: </li>
						<li>
							<select name="sort">
								<option <?php if(5==$sort)echo 'selected' ?> value="5">Sản phẩm mới nhất</option>
								<option <?php if(6==$sort)echo 'selected' ?> value="6">Price up</option>
								<option <?php if(7==$sort)echo 'selected' ?> value="7">Price down</option>
								<option <?php if(8==$sort)echo 'selected' ?> value="8">A -> Z</option>
								<option <?php if(9==$sort)echo 'selected' ?> value="9">Z -> A</option>
							</select>
						</li>
						<li>PRICE: </li>
						<li>
							<select  name="price">
								<option <?php if(0==$price)echo 'selected' ?> value="0">-- Tìm theo giá --</option>
								<option <?php if(1==$price)echo 'selected' ?> value="1">Bé hơn 500k VND</option>
								<option <?php if(2==$price)echo 'selected' ?> value="2">500k VND - 1500k VND</option>
								<option <?php if(3==$price)echo 'selected' ?> value="3">1500k VND - 3000k VND</option>
								<option <?php if(4==$price)echo 'selected' ?> value="4">Lớn hơn 3000k VND</option>
							</select>
						</li>
						<li>CATEGORY: </li>
						<li>
							<select name="cate">
								<option value="0">-- Tìm theo danh mục --</option>
								<?php
                                //Lay danh sach loai san pham hien tai
                                $sql1='select `id`,`category_name` from `nn_category`';
                                $rs1=mysqli_query($link,$sql1);
                                while($r1=mysqli_fetch_assoc($rs1))
                                {
                                ?>
                                    <option <?php if($r1['id']==$cate) echo 'selected' ?> value="<?php echo $r1['id']?>"><?php echo $r1['category_name']?></option>
                                <?php
                                    }
                                ?>
							</select>
						</li>
					</ul>
				</div>
				<button type="submit" class="btn btn-success" style="padding: 3px;margin-top:20px">Tìm kiếm</button>
				</form>
			</div>
		
			<div class="col-sm-7">
				<?php
				
                	
                	if($page>$nop)$page=$nop;
                    $pos=($page-1)*$ipp;
        			if($pos<0) $pos=0;
					$sql2="select `product_name`,`price`,`img_url`,`product_id` from `nn_product` where $cond limit $pos,$ipp";
		            $rs2=mysqli_query($link,$sql2);
		            if(mysqli_num_rows($rs2)==0) echo '<h3>Không có sản phẩm nào được tìm thấy.</h3>';
		            else{
		                while ($r2=mysqli_fetch_assoc($rs2)) {
			    ?>
    				<div class="col-sm-4 product-full-item-all hvr-outline-in">
    					<div class="product-image">
    						<a href="index.php?mod=details&id=<?php echo $r2['product_id'] ?>">
    							<img src="img/<?php echo $r2['img_url'] ?>" class="img-responsive" alt="a" />
    						</a>
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
            <li><a title="Trang trước" href="index.php?mod=allproduct&kw=<?php echo $kw?>&cate=<?php echo $cate?>&page=<?php if($page<=1)echo 1; else echo $page-1 ?>&sort=<?php echo $sort ?>">&laquo;</a></li>
            <?php
	            for($i=$page-1;$i<=$page+1;$i++)
	            {
	                if($i>=1 && $i<=$nop)
	                {
	        ?>
	                <li <?php if($i==$page)echo 'class="active"' ?>><a href="index.php?mod=allproduct&kw=<?php echo $kw?>&cate=<?php echo $cate?>&page=<?php echo $i?>&sort=<?php echo $sort ?>"> <?php echo $i ?> </a></li>
	        <?php
	                }
	            }
	        ?>
            <li><a title="Trang sau" href="index.php?mod=allproduct&kw=<?php echo $kw?>&cate=<?php echo $cate?>&page=<?php if($page>=$nop)echo $nop;else echo $page+1 ?>&sort=<?php echo $sort ?>">&raquo;</a></li>
        </ul>
	</div>
</section>