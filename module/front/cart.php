
        <section class="cart-cover">
            <div class="containerBox">
                <div class="home-title cover-text">
                    <span style=" font-weight: 700; text-align: left !important; "> View </span> Cart
                    
                </div>
                <img src="img/cartcover.jpg" class="img-responsive cover-img" alt="a" />
            </div>
        </section>
        <section class="cart-page tableproperties">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-7 col-sm-offset-1 list-item-in-cart">
                        <table class="table cart-details">
                            <thead>
                                <tr>
                                    <th>IMAGE</th>
                                    <th>PRODUCT</th>
                                    <th>PRICE</th>
                                    <th>QTY</th>
                                    <th>TOTAL</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <form action="index.php?mod=cart_process&act=2" method="post" id="cart">
                                
                            <tbody>
                                <?php                                    
                                    $money=0; 
                                    
                                    if (!isset($_SESSION['cart'])) $cart='';
                                    else $cart = $_SESSION['cart'];
                                        if(count($cart)>0 && $cart!='')
                                        {
                                            foreach($cart as $k=>$v)
                                            {
                                                //lấy th/tin sp
                                                $sql='select `product_id`,`product_name`,`price`,`img_url` from `nn_product` where `product_id`='.$k;
                                                $rs=mysqli_query($link,$sql);
                                                $r=mysqli_fetch_assoc($rs);
                                        
                                ?>
                                <tr>
                                    <td style="top: 0; width: 145px;">
                                        <img src="img/<?php echo $r['img_url'] ?>" class="img-responsive cart-image" alt="a" />
                                    </td>
                                    <td><?php echo $r['product_name'] ?></td>
                                    <td>
                                        <p id="price" class="price-in-cart"><?php echo number_format($r['price']); ?></p>
                                    </td>
                                    <td>
                                        <input type="number" name="<?php echo $k ?>" min="1" value="<?php echo $v ?>" id="quantity">
                                    </td>
                                    <td>
                                        <div id="total" class="price-in-cart"><?php echo number_format($r['price']*$v); ?></div>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Bạn có muốn xóa ?')" href="index.php?mod=cart_process&act=3&id=<?php echo $k ?>"><i class="fa fa-times remove-item-cart fa-2x" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    
                                            $money=$money+($r['price']*$v);
                                        }
                                    }
                                    else 
                                        echo 'Không có sản phẩm nào trong giỏ hàng';
                                
                                ?>
                            </tbody>     
                            </form>
                            
                        </table>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="cart-button">
                                    <?php 
                                        if(count($cart))//nếu giỏ hàng có sp
                                        {
                                    ?>
                                    <a href="#" class="btn btn-home" role="button" onclick="document.getElementById('cart').submit()">UPDATE CART</a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-6 ">
                                <div class="cart-button">
                                    <a href="index.php?mod=allproduct" class="btn btn-continue " role="button">CONTINUE SHOPPING</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        
                        <table class="table sidebar-cart">
                            <thead>
                                <tr>
                                    <th>Cart Total</th>
                                </tr>
                            </thead>
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
                                        <?php 
                                            if(count($cart))//nếu giỏ hàng có sp
                                            {
                                        ?>
                                            <div class="cart-button">
                                                <a href="index.php?mod=checkout" class="btn btn-home" role="button">Check Out</a>
                                            </div>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>