<?php
    $id=$_GET['id'];
    if($id=='') $id=1;
    $sql="select `product_id`,`product_name`,`price`,`img_url`,`desc`,`detail` from `nn_product` where `product_id`=$id";
    $rs=mysqli_query($link,$sql);
    $r=mysqli_fetch_assoc($rs)
?>
		<section class="cart-cover">
			<div class="containerBox">
				<div class="home-title cover-text">
					<span style=" font-weight: 700;"> SHOP </span>
				</div>
				<img src="img/cartcover.jpg" class="img-responsive cover-img"/>
			</div>
		</section>
		<section class="main-item">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-1">
						<div class="item-image">
							<img src="img/<?php echo $r['img_url'] ?>" class="img-responsive" alt="a" />
						</div>
					</div>
					<!-- /col-sm-6 -->
					<div class="col-sm-6">
						<div class="shop-item-title">
							<span style=" font-weight: 700;"> <?php echo $r['product_name'] ?> </span>
						</div>
						
						<div class="item-price" >
							<h6 id="show_message"><span style=" font-weight: bold;"> <?php echo number_format($r['price']) ?> </span></h6>
						</div>
						<p><?php echo $r['desc'] ?></p>
						QTY: <input type="number" min="1" id="quantity" placeholder="Nhập số lượng..." value="1">
						<a href="javascript:window.location='index.php?mod=cart_process&act=1&id=<?php echo $id ?>&qty='+document.getElementById('quantity').value"><input type="button" value="Thêm vào giỏ hàng" id="button"></a>
						
					</div>
					<!-- /col-sm-6 -->
				</div>
				<!-- /row -->
				<hr class="devide">
				<br>
				<div class="row item-detail">
					<div class="col-sm-offset-1 col-sm-10">
						<div class="shop-item-title">
							<span style=" font-weight: 700;"> Chi tiết </span> sản phẩm
							
						</div>
						<p><?php echo $r['detail'] ?></p>
						
					</div>
				</div>
				<hr class="devide">
				<br>
				
			</div>
		</section>
		
	