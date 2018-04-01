<?php
	ob_start();//cache output, xử lí lỗi khi dùng header('')
	session_start();//dùng trước khi sử dụng $_SESSION['']
	require('lib/db.php');//chèn file php vào
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	if(!isset($_SESSION['cart'])) $_SESSION['cart']='';
	if(!isset($_GET['page'])) $_GET['page']='';
	if(!isset($_GET['cate'])) $_GET['cate']='';
	if(!isset($msg)) $msg='';
	if(!isset($_POST['category_name'])) $_POST['category_name']='';
	if(!isset($_POST['product_name'])) $_POST['product_name']='';
	if(!isset($_POST['email'])) $_POST['email']='';
	if(!isset($_POST['pass'])) $_POST['pass']='';
	if(!isset($_POST['repass'])) $_POST['repass']='';
	if(!isset($_POST['mobile'])) $_POST['mobile']='';
	if(!isset($_POST['ship_at'])) $_POST['ship_at']='';
	if(!isset($_POST['address'])) $_POST['address']='';
	if(!isset($_POST['remark'])) $_POST['remark']='';
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Vật Liệu Xây Dựng Hoàng Lâm Mộc</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		
		<link rel="stylesheet" type="text/css" href="css/menu/animated.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<script src="js/jquery-2.2.0.min.js" type="text/javascript"></script>
		<script src='js/bootstrap.min.js'></script>
		<script language="javascript" src='js/js.js'></script>
	</head>
	<body>
		<nav class=" topnav" style="background-color: rgb(159, 191, 112);">
			<div class="container" style="width: 100% !important">
				<div class="row">
				    	
					<div class="col-sm-6 col-sm-offset-2 left top">
					    <?php 
						
						if(isset($_SESSION['name'])) echo 'Chào '.$_SESSION['name'].'&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'; 
						else echo 'Bạn chưa đăng nhập&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'; 
					    ?>
						<?php
							if(!isset($_SESSION['id']) || $_SESSION['id']=='' )
	                		    
	                		    echo '<i class="fa fa-sign-in" aria-hidden="true"></i><a href="index.php?mod=login" style="color:#fff">&nbsp;Đăng nhập</a>';
							else
							{
							    echo '<i class="fa fa-user-circle" aria-hidden="true"></i><a href="index.php?mod=user" style="color:#fff">&nbsp;My account</a>'.'&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
							    echo '<i class="fa fa-sign-out" aria-hidden="true"></i><a href="index.php?mod=logout"  style="color:#fff">&nbsp;Đăng xuất</a>';
							}
                    	?>
					</div>
					
				</div>
			</div>
		</nav>
		<nav class=" navbar mainmenu " role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a href="index.php"><img class="logo" src="img/logo.png" alt="VXLD Hoàng Lâm Mộc"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Trang Chủ</a></li>
						<li><a href="index.php?mod=color">Màu Sắc</a></li>
						<li>	
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">Sản Phẩm <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php
									$mod=$_GET['mod'];
									if($mod=='') $mod='home';
										//Lấy danh sách chủng loại
										$sql='select `id`,`category_name` from `nn_category` where `active`=1 order by `order`';
										$rs=mysqli_query($link,$sql);
										while($r=mysqli_fetch_assoc($rs))
										{
								?>
                                <li class="dir"><a href="index.php?mod=product&cate=<?php echo $r['id'] ?>&sp=<?php echo str_replace(' ','-',$r['category_name']) ?>.html"><?php echo $r['category_name'] ?></a></li>
		                        <?php
									}
								?>
							</ul>
						</li>
						<li><a href="index.php?mod=blog">Blog</a></li>
						<li><a href="index.php?mod=contact">Liên Hệ</a></li>
						<?php
							if(!isset($_SESSION['id']) || $_SESSION['id']=='') $_SESSION['id']=0;
							
							$sql7="select count(*) as `tong` from `nn_cart` where `user_id`=".$_SESSION['id'];
							$rs7=mysqli_query($link,$sql7);
							$r7=mysqli_fetch_assoc($rs7);
						?>
						<li class="dropdown"><a href="index.php?mod=cart" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-2x fa-shopping-cart" aria-hidden="true"></i><span class="badge"><?php echo $r7['tong'] ?></span></a>
							<ul class="dropdown-menu cart-list" style="color: #97ba65;overflow-y: scroll;max-height: 500px;min-width: 230px">
						<?php                                    
                            $money=0;     
                            if (!isset($_SESSION['cart'])) $cart='';
                            else $cart = $_SESSION['cart'];
                                if(count($cart)>0 && $cart!='')
                                {
                                    foreach($cart as $k=>$v)
                                    {
                                        //lấy th/tin sp
                                        $sql8='select `product_id`,`product_name`,`price`,`img_url` from `nn_product` where `product_id`='.$k;
                                        $rs8=mysqli_query($link,$sql8);
                                        $r8=mysqli_fetch_assoc($rs8);                               
                        ?>
                        <li style="text-align: center;">
							<h6><a href="index.php?mod=details&id=<?php echo $r8['product_id'] ?>" target="_blank"><?php echo $r8['product_name'] ?></a></h6>
							<p><?php echo $v ?> (sp) - <span class="price"><?php echo number_format($r8['price']*$v); ?> VNĐ</span></p> 
						</li><br>
						<?php
                            
                                    $money=$money+($r8['price']*$v);
                                }
                            }
                            else 
                                echo '<br>&nbsp;&nbsp;Giỏ hàng trống !<br><br>';  
                        ?>
					      <li class="total">
							<span class="pull-left">&nbsp;&nbsp;<strong>Tổng tiền : </strong><br>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($money) ?> VNĐ&nbsp;&nbsp;<br><br><br></span>
							<a href="index.php?mod=cart" class="btn btn-default btn-cart">Giỏ hàng</a> 
					      </li> 
					     </ul> 

					    </li>
					</ul>
				</div>
			</div>
		</nav>
		

		<?php
			if(!isset($_GET['mod']))$_GET['mod']='';
			$mod=$_GET['mod'];
			if($mod=='')$mod='home';
			//Xoa cac ky tu . trong $mod
			$mod=str_replace('.','',$mod);
			if(is_file("module/front/{$mod}.php"))include("module/front/$mod.php");//kiểm tra đường dẫn cho tồn tại không trước khi include
			else echo 'Lỗi: Đường dẫn không tồn tại.';
		?>

		<footer>
            <div class="row footer" style="margin:0px !important; padding: 50px 0 0;">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="footer-first-col">
                        <div class="footer-title">VLXD Hoàng Lâm Mộc</div>
                        <div class="info" style="text-align: center;">
                            <a class="fa fa-facebook social fa-2x" aria-hidden="true" href="#" title="FaceBook"></a>
                            <a class="fa fa-twitter social fa-2x" title="Twitter" aria-hidden="true" href="#"></a>
                            <a class="fa fa-google-plus social fa-2x" title="Google Plus" aria-hidden="true" href="#"></a>
                            <a class="fa fa-pinterest-p social fa-2x" title="Pinterest" aria-hidden="true" href="#"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-2">
                    <div class="footer-second-col">
                        <div class="footer-title" style="text-align: left; !important;">contact</div>
                        <div class="info">
                            <div class="phone" aria-hidden="true">0986 37 88 89</div>
                            <div class="email" aria-hidden="true">hoanglammoc.info1@gmail.com</div>
                            <div class="location" aria-hidden="true">Nguyễn Thị Định, P.Phước Long, TP. Nha Trang</div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
	</body>
</html>