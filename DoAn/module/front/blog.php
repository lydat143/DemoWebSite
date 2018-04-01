
        <section class="cart-cover">
            <div class="containerBox">
                <div class="home-title cover-text">
                    <span style=" font-weight: 700; text-align: left !important; "> Blog </span>
                    
                </div>
                <img src="img/cartcover.jpg" class="img-responsive cover-img" alt="a" />
            </div>
        </section>
        <section class="blog-page">
            <div class="container">
                
                <div class="row">
                    <?php  
                        $sql="select * from `nn_blog` where `active`=1 order by `create_at` desc limit 0,3";
                        $rs=mysqli_query($link,$sql);
                        while ($r=mysqli_fetch_assoc($rs)) {
                        
                    ?>
                    <div class="blog-post col-sm-3  hvr-outline-in">
                        <div class="blog-item-image">
                            <a href="index.php?mod=single&id=<?php echo $r['id'] ?>">
                                <img src="img/<?php echo $r['img_url'] ?>" class="img-responsive" alt="a" />
                            </a>
                        </div>
                        <div class="blog-item-detail">
                            <div class="blog-item-date">
                                <?php echo $r['create_at'] ?>
                            </div>
                            <div class="blog-item-title">
                                <a href="index.php?mod=single&id=<?php echo $r['id'] ?>">
                                    <?php echo $r['title'] ?>
                                </a>
                            </div>
                            <div class="blog-item-excerpt">
                                <p><?php echo $r['desc'] ?></p>
                            </div>
                            <div class="blog-readmore">
                                <a class="hvr-underline-from-left" href="index.php?mod=single&id=<?php echo $r['id'] ?>">XEM CHI TIẾT >>></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <?php  
                        $sql1="select * from `nn_blog` where `active`=1 order by `create_at` desc limit 3,3";
                        $rs1=mysqli_query($link,$sql1);
                        while ($r1=mysqli_fetch_assoc($rs1)) {
                        
                    ?>
                    <div class="blog-post col-sm-3  hvr-outline-in">
                        <div class="blog-item-image">
                            <a href="index.php?mod=single&id=<?php echo $r1['id'] ?>">
                                <img src="img/<?php echo $r1['img_url'] ?>" class="img-responsive" alt="a" />
                            </a>
                        </div>
                        <div class="blog-item-detail">
                            <div class="blog-item-date">
                                <?php echo $r1['create_at'] ?>
                            </div>
                            <div class="blog-item-title">
                                <a href="index.php?mod=single&id=<?php echo $r1['id'] ?>">
                                    <?php echo $r1['title'] ?>
                                </a>
                            </div>
                            <div class="blog-item-excerpt">
                                <p><?php echo $r1['desc'] ?></p>
                            </div>
                            <div class="blog-readmore">
                                <a class="hvr-underline-from-left" href="index.php?mod=single&id=<?php echo $r1['id'] ?>">XEM CHI TIẾT >>></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>