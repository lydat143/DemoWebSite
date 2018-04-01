
        <section class="signin-signup-form">
            <div class="container loginform">
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-1 signin-form">
                        <div class="userarea">
                            <div class="logintitle">Welcome Back!</div>
                            <hr class="dash-divider" style="width: 65%;">
                            <div class="logintitle"></div>
                            <div class="lastestorder">
                                <div class="userarea-product-header">
                                    Featured Product
                                </div>
                                <div class="row">
                                    <?php 
										$sql="SELECT `product_id`,`product_name`,`img_url`,`price` FROM `nn_product` WHERE `active`=1 ORDER BY `sold` DESC LIMIT 0,3";
										$rs=mysqli_query($link,$sql);
										while ($r=mysqli_fetch_assoc($rs)) {
											
									?>
                                    <div class="col-sm-4 userarea-product hvr-outline-in">
                                        <div class="product-image">
                                            <a href="index.php?mod=details&id=<?php echo $r['product_id'] ?>">
                                                <img src="img/<?php echo $r['img_url'] ?>" class="img-responsive" alt="a" />
                                            </a>
                                        </div>
                                        <div class="user-product-price">
                                            <h6><?php echo $r['price'] ?></h6>
                                        </div>
                                        <div class="user-product-title">
                                            <a href="index.php?mod=details&id=<?php echo $r['product_id'] ?>"><?php echo $r['product_name'] ?></a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 signup-form">
                        <div class="signuparea">
                            <div class="logintitle"><?php if(isset($_SESSION['name'])) echo $_SESSION['name'] ?></div>
                            <hr class="dash-divider" style="width: 65%;">
                            <div class="user-action row">
                                <a href="index.php?mod=cart" class="btn list-order" role="button">
                                    <div class="col-sm-1">
                                        <div class="fa fa-shopping-cart action-icon" aria-hidden="true"></div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1 action-title"> My Cart</div>
                                    
                                </a>
                                <a href="index.php?mod=myorder" class="btn list-order" role="button">
                                    <div class="col-sm-1">
                                        <div class="fa fa-list action-icon" aria-hidden="true"></div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1 action-title"> My Order</div>
                                    
                                </a>
                                <a href="index.php?mod=profile" class="btn list-order" role="button">
                                    <div class="col-sm-1">
                                        <div class="fa fa-user-circle action-icon" aria-hidden="true"></div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1 action-title"> Edit Profile</div>
                                </a>
                                
                                <a href="index.php?mod=logout" class="btn list-order" role="button">
                                    <div class="col-sm-1">
                                        <div class="fa fa-sign-out action-icon" aria-hidden="true"></div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1 action-title"> Logout</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>