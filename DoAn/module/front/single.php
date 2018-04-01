<?php
    $id=$_GET['id'];
    $id_user=session_id();//id của người đang onl
	$now=time();//thời điểm hiện tại
    $sql1='update `nn_blog` set `view`=`view`+1 where `active`=1 and `id`='.$id;
    mysqli_query($link,$sql1);
    $sql="select * from `nn_blog` where `id`=$id and `active`=1";
    $rs=mysqli_query($link,$sql);
    $r=mysqli_fetch_assoc($rs)
?>
<section class="cart-cover">
    <div class="containerBox">
        <div class="home-title cover-text">
            <span style=" font-weight: 700; text-align: left !important; "> Blog </span>
            
        </div>
        <img src="img/cartcover.jpg" class="img-responsive cover-img" alt="a" />
    </div>
</section>
<section class="blog-content">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?mod=blog">Blog</a></li>
        <li><?php echo $r['title'] ?> </li>
    </ul>
    <div class="container single-post">
        <figure>
            <figcaption >
                <div class="share-blog-icon">
                            <div class="share-blog-post"> Share this post: </div>
                            <a class="fa fa-facebook " aria-hidden="true" href="#"></a>
                            <a class="fa fa-twitter " aria-hidden="true" href="#"></a>
                            <a class="fa fa-google-plus " aria-hidden="true" href="#"></a>
                            <a class="fa fa-pinterest-p " aria-hidden="true" href="#"></a>
                        </div>
            </figcaption>
        </figure>
        <div class="single-post-title">
            <?php echo $r['title'] ?>
        </div>
        <div class="single-post-meta">
            <div class="single-post-date">
                <?php echo $r['create_at'] ?>
            </div>
            <div class="single-post-view">
                <?php echo $r['view'] ?>
            </div>
        </div>
        <div class="single-post-content">
            <?php echo $r['detail'] ?>
        </div>
        <hr class="devide">
        <div class="single-title">TAGS</div>
        <ul class="post-tags">
            <li><a href=""> Lưu ý </a></li>
            <li><a href=""> Hướng dẫn </a></li>
            <li><a href=""> cách sơn </a></li>
            <li><a href=""> Sơn </a></li>
            <li><a href=""> sơn nippon </a></li>
            <li><a href=""> ngoại thất </a></li>
        </ul>
        <hr class="devide">
        <div class="single-title">COMMENTS</div>
        <?php
            
            $sql3="select * from `nn_comment` where `active`=1 and `id_cha`=0 and `id_blog`=$id";
            $rs3=mysqli_query($link,$sql3);
            
        ?>
        <div class="single-post-comment" >
            
            <div class="post-comment row" style="<?php if(mysqli_num_rows($rs3)==0) echo 'display:none;' ?>">
                <?php while($r3=mysqli_fetch_assoc($rs3)){ ?>
                <div class="col-sm-1">
                    <img src="img/avatar.png" class="img-responsive user-avatar-sm " alt="a" />
                </div>
                <div class="col-sm-11">
                    <div class="first-comment">
                        <div class="comment-meta">
                            <div class="comment-user-name">
                                <?php echo $r3['name'].' - ' ?>
                            </div>
                            <div class="comment-time">
                                <?php echo $r3['time'] ?>
                            </div>
                        </div>
                        <div class="user-comment">
                            <?php echo $r3['cmt'] ?>
                        </div>
                        <ul class="comment-action">
                            <li><a href=""> Reply </a></li>
                            <li><a href=""> Edit </a></li>
                            <li><a href=""> Delele </a></li>
                        </ul>
                        
                    </div>
                    <!--reply-->
                    <?php
                        
                        $sql2="select * from `nn_comment` where `active`=1 and `id_blog`=$id and `id_cha`=".$r3['id_cmt'];
                        $rs2=mysqli_query($link,$sql2);
                        
                    ?>
                    <div class="row second-level-comment" style="<?php if(mysqli_num_rows($rs2)==0) echo 'display:none;' ?>">
                        <?php while($r2=mysqli_fetch_assoc($rs2)){ ?>
                        <div class="col-sm-1">
                            <img src="img/avatar.png" class="img-responsive " alt="a" />
                        </div>
                        
                        <div class=" col-sm-11">
                            <div class="comment-meta">
                                <div class="comment-user-name">
                                    <?php echo $r2['name'] ?>
                                </div>
                                <div class="comment-time">
                                    <?php echo $r2['time'] ?>
                                </div>
                            </div>
                            <div class="user-comment">
                                <?php echo $r2['cmt'] ?>
                            </div>
                            <ul class="comment-action">
                                <li><a href=""> Reply </a></li>
                                <li><a href=""> Edit </a></li>
                                <li><a href=""> Delele </a></li>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                    
                </div>
                <?php } ?>
            </div>
            
            <div class="submit-comment row">
                <div class="col-sm-1">
                    <img src="img/avatar.png" class="img-responsive user-avatar-sm " alt="a" />
                </div>
                <div class="col-sm-11">
                    <div class="first-comment-reply">
                        <div class="comment-meta">
                            <div class="comment-user-name">
                                <?php 
						
            						if(isset($_SESSION['name'])) 
            						    echo $_SESSION['name'];  
            						else echo 'GUEST_'.$id_user; 
            					?>
                            </div>
                            <!--<div class="comment-time">-->
                            <!--    19:30 Wednesday, October 11th, 2017-->
                            <!--</div>-->
                        </div>
                        
                        <textarea name="comment" form="post-comment" placeholder="Your Comment"></textarea>
                        <ul class="comment-action">
                            <li><a href="" class="btn btn-continue " role="button"> Send </a></li>
                            
                        </ul>
                        
                    </div>
                    </div> <!--row -->
                </div>
                <hr class="devide">
                <div class="single-title">RELATIVE POST</div>
                <div class="relative-post">
                    <div class="row">
                        <?php
                            $sql="select `id`,`title`,`desc`,`img_url`,`create_at` from `nn_blog` where `active`=1 and `id`!=$id order by `view` desc limit 0,4";
                            $rs=mysqli_query($link,$sql);
                            while($r=mysqli_fetch_assoc($rs)){
                        ?>
                        <div class="relative-blog-post col-sm-3 ">
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
                                
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>