
<?php
    
	if(!isset($_SESSION['id']) || $_SESSION['id']=='') $_SESSION['id']=0;
	$id=$_SESSION['id'];
	
		if(isset($_POST['name']))
		{
			if($_POST['name']!=='' && $_POST['email']!=='' && $_POST['phone']!=='' && $_POST['address']!=='' && $_POST['city']!=='')
			{
				$name=$_POST['name'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];	
				$city=$_POST['city'];
				$address=$_POST['address'];
				$remark=$_POST['remark'];
			
				//insert vào đơn hàng (cha)
				$sql="insert into `nn_order` values(NULL,'$id',now(),'$name','$address','$city','$email','$phone','$remark','1','12.218809', '109.195445')";
				mysqli_query($link,$sql);
				
				//insert vào đơn hàng chi tiết (con)
				$cart=$_SESSION['cart'];
				$order_id=mysqli_insert_id($link);//lay id auto_increment cua cau lenh insert ngay truoc
				foreach($cart as $k=>$v)
				{
					$product_id=$k;
					$qty=$v;
					//Lấy giá sp tại th/diem h/tai
					$sql='select `price` from `nn_product` where `product_id`='.$k;
					$rs=mysqli_query($link,$sql);
					$r=mysqli_fetch_assoc($rs);
					$price=$r['price']*$v;
					
					$sql13='select `ship` from `nn_cart` where `user_id`='.$id;
					$rs13=mysqli_query($link,$sql13);
					$r13=mysqli_fetch_assoc($rs13);
					$ship=$r13['ship'];
					//bắt dầu insert 
					$sql="insert into `nn_order_detail` values ('$order_id','$product_id','$qty','$price','$ship')";
					mysqli_query($link,$sql);
					unset($cart[$k]);
				};
				//xóa giỏ hàng
				$sql1='delete from `nn_cart` where `user_id`='.$id;
				mysqli_query($link,$sql1);
				//xóa
		
				
				$_SESSION['cart']=$cart;
				//echo '<h3>Đặt hàng thành công ! Đợi trong giây lát để quay về trang chủ.</h3>';
?>
	<script> 
	            alert("Đặt hàng thành công.");
                setTimeout(window.location="index.php?mod=myorder",9000);
    </script>
<?php
		}
	};
		
?>
        <section class="cart-cover">
            <div class="containerBox">
                <div class="home-title cover-text">
                    <span style=" font-weight: 700; text-align: left !important; "> Check </span> Out
                    
                </div>
                <img src="img/cartcover.jpg" class="img-responsive cover-img" alt="a" />
            </div>
        </section>
        <section class="checkout-page">
            <div class="container">
                <div class="notification">
                    returning customer? <a href="index.php?mod=login"> Login here </a>
                </div>
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-1 ">
                        <div class="checkout">
                            <div class="shop-item-title">
                                Billing
                                <span style=" font-weight: 700;"> Details </span>
                            </div>
                            <form class="check-out-form" id="ship" action="" method="post">
                                <input type="text" name="name" placeholder="Full name" required></br>
                                
                                <input type="text" name="address" placeholder="address" required></br>
                                <input type="text" name="city" placeholder="Town / City" required></br>
                                <input type="email" name="email" placeholder="Email" required></br>
                                <input type="text" name="phone" placeholder="phone" style=" width: 58%;" required>
                                <input type="text" name="zip" placeholder="Postal code / zip" style="width: 40%; margin-left:0.3em;"></br>
                                <textarea name="remark" placeholder="Note"></textarea>
                                
                            </form>
                            <div>
                                <a href="index.php?mod=login">Create account?</a>
                            </div><br>
                            <div class="shop-item-title">
                            Payment
                                <span style=" font-weight: 700;"> Methods </span>
                            </div>
                            <form class="payment-method-form">
                                <input type="radio" name="payment-method" value="creditcard"checked> Credit Card
                                <input type="radio" name="payment-method" value="paypal"> Paypal Express Checkout
                                <input type="radio" name="payment-method" value="internal"> Internal Card
                            </form>
                        </div>
                    </div>
                <div class="col-sm-5 tableproperties">
                    <div class="shop-item-title">
                        Your
                        <span style=" font-weight: 700;"> order </span>
                    </div>
                    <table class="table cart-details">
                        <tbody>
                            <form action="" method="post" id="cart">
                                <?php
                                    
                                    $money=0;
                                    $cart=$_SESSION['cart']; 
                                    
                					if (is_array($cart))
                                    {
                							if(count($cart)>0)
                						{
                							foreach($cart as $k=>$v)
                							{
                								//lấy th/tin sp
                								$sql='select `product_id`,`product_name`,`price`,`img_url` from `nn_product` where `product_id`='.$k;
                								$rs=mysqli_query($link,$sql);
                								$r=mysqli_fetch_assoc($rs);
                							
                				?>
                            <tr>
                                <td style="top: 0; width: 145px; right: 20px;">
                                    <img src="img/<?php echo $r['img_url'] ?>" class="img-responsive cart-image" alt="a" />
                                </td>
                                <td><?php echo $r['product_name'] ?></td>
                                <td>
                                    <div id="total" class="price-in-cart"><?php echo number_format($r['price']*$v); ?></div>
                                </td>
                            </tr>
                                <?php
                        
                                            $money=$money+($r['price']*$v);
                							}
                						}
                						else 
                							echo 'Không có sản phẩm nào trong giỏ hàng';
                					}
                					else 
                						echo 'Không có sản phẩm nào trong giỏ hàng';
                                ?>
                            </form>
                        </tbody>
        
                    </table>
                    <table class="table sidebar-cart">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-6">Subtotal</div>
                                        <div class="col-sm-6 price-in-cart"><?php echo number_format($money) ?></div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                            <div class="col-sm-3">Shipping</div>
                                            <div class="col-sm-8" style="float:right">
                                            <select onchange="validateSelectBox()" id="txt" style="float:right">
                                                <option value="0" disabled selected>Hình thức giao...</option>
                                                <option <?php if($money==0) echo 'disabled' ?> value="60000" class="nhanh">Giao nhanh - 60.000 VNĐ</option>
                                                <option <?php if($money==0) echo 'disabled' ?> value="50000" class="nhanh">Giao chậm - 50.000 VNĐ</option>
                                            </select>
                                            
                                            </div>
                                            
                                        </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-6">Total</div>
                                        <div id="result" class="col-sm-6 price-in-cart"><?php echo number_format($money) ?></div>
                                        <script language="javascript">
                                            
                                            function validateSelectBox(){
                                                let tien=<?php echo $money ?>;
                                                tien = Number(tien);
                                                
                                                let tienShip = document.getElementById('txt').value;
                                                tienShip = Number(tienShip);
                                                let tongTien = tienShip + tien;
                                                document.getElementById('result').innerHTML =tongTien.toLocaleString('en-US');
                    					        
                                        		$.ajax({
                                        			url:'ajax.php',
                                        			type:'POST',
                                        			dataType:"text",
                                        			data:{'ship':tienShip},
                                        			
                                        		})
                                        		.done(function(data)
                                        		{console.log(data);
                                        			
                                        		});
                                            }
                                            
                                        </script>
                                        
                                    </div>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-button">
                        <a href="javascript:document.getElementById('ship').submit()" class="btn btn-continue " role="button" >Proceed to check out</a>
                    </div>
                </div>
            </div>
        </div>
    </section>