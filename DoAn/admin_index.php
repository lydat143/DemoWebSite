<?php
	ob_start();//cache output, xử lí lỗi khi dùng header('')
	session_start();//dùng trước khi sử dụng $_SESSION['']
	require('lib/db.php');//chèn file php vào
	error_reporting(E_ERROR | E_WARNING | E_PARSE); 
	if(!isset($_SESSION['admin_name'])) header('location: admin.php');
    
// 	if(!isset($_SESSION['cart'])) $_SESSION['cart']='';
// 	if(!isset($_GET['page'])) $_GET['page']='';
// 	if(!isset($_GET['sort'])) $_GET['sort']='';
// 	if(!isset($_GET['cate'])) $_GET['cate']='';
// 	if(!isset($msg)) $msg='';
// 	if(!isset($_POST['name'])) $_POST['name']='';
// 	if(!isset($_POST['email'])) $_POST['email']='';
// 	if(!isset($_POST['pass'])) $_POST['pass']='';
// 	if(!isset($_POST['repass'])) $_POST['repass']='';
// 	if(!isset($_POST['mobile'])) $_POST['mobile']='';
// 	if(!isset($_POST['ship_at'])) $_POST['ship_at']='';
// 	if(!isset($_POST['address'])) $_POST['address']='';
// 	if(!isset($_POST['remark'])) $_POST['remark']='';
?>
<html>
    <head>
    	<meta charset="UTF-8">
    	<title>Hoang Lam Moc - Admin Login</title>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    	<link rel="stylesheet" href="css/bootstrap.css">
    	<script src="js/jquery-2.2.0.min.js" type="text/javascript"></script>
    	<script src='js/bootstrap.min.js'></script>
    	<script src='js/script.js'></script>
    	<link rel="stylesheet" href="css/adminstyles.css">
    </head>
    <body>
    	<div class="topnavbar">
    	    <a>
    	        <?php 
						
					if(isset($_SESSION['admin_name'])) echo 'Chào '.$_SESSION['admin_name'];  else echo 'Bạn chưa đăng nhập';
				?>
    	    </a>
    	    <a>
    	        <?php
					if(isset($_SESSION['admin_name']))
						echo '<a href="logout_admin.php">Đăng xuất</a>';
                    else
                		echo '<a href="admin.php">Đăng nhập</a>';
                ?>
    	    </a>
    		<!--<a href="#home">VLXD Hoàng Lâm</a>-->
    		<!--<a href="#news">News</a>-->
    		<!--<a href="#contact">Contact</a>-->
    	</div>
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-sm-2 navi">
    				<nav class="navigation">
    					<div class="navbar-header">
    						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
    						<span class="sr-only">Toggle navigation</span>
    						<span class="icon-bar"></span>
    						<span class="icon-bar"></span>
    						<span class="icon-bar"></span>
    						</button>
    					</div>
    					<div class="collapse navbar-collapse" id="top-navbar-1">
    						<div id='cssmenu'>
    							<ul>
    								<li class='active'>
    									<a href='admin_index.php'>
    										<i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard
    									</a>
    								</li>
    								<li class='has-sub'>
    									<a href='#'>
    										<i class="fa fa-paint-brush" aria-hidden="true"></i>Product
    									</a>
    									<ul>
    										<li>
    											<a href='admin_index.php?mod=allproduct'>All Product</a>
    										</li>
    										<li>
    											<a href='#'>Add Product</a>
    										</li>
    										<li>
    											<a href='admin_index.php?mod=categories'>Category</a>
    										</li>
    										<li class='last'>
    											<a href='#'>Colors</a>
    										</li>
    									</ul>
    								</li>
    								<li class='has-sub'>
    									<a href='#'>
    										<i class="fa fa-paper-plane-o" aria-hidden="true"></i>Post
    									</a>
    									<ul>
    										<li>
    											<a href='admin_index.php?mod=post'>All Post</a>
    										</li>
    										<li>
    											<a href='#'>Add Post</a>
    										</li>
    										<li class='last'>
    											<a href='admin_index.php?mod=tags'>Tags</a>
    										</li>
    									</ul>
    								</li>
    								<li>
    									<a href='#'>
    										<i class="fa fa-shopping-cart" aria-hidden="true"></i>Order
    									</a>
    								</li>
    								<li class="has-sub">
    									<a href='#'>
    										<i class="fa fa-users" aria-hidden="true"></i>User
    									</a>
    									<ul>
    										<li>
    											<a href='admin_index.php?mod=user'>All User</a>
    										</li>
    										<li class='last'>
    											<a href='admin_index.php?mod=adduser'>Add User</a>
    										</li>
    									</ul>
    								</li>
    								<li class='last'>
    									<a href='admin_index.php?mod=setting'>
    										<i class="fa fa-wrench" aria-hidden="true"></i>Setting
    									</a>
    								</li>
    							</ul>
    						</div>
    					</div>
    				</nav>
    			</div>
    			
    			<?php
    				
    				    $mod=$_GET['mod'];
    				    if($mod=='') $mod='home';
        				if(is_file("module/back/{$mod}.php"))include("module/back/{$mod}.php");
        				else echo 'Lỗi: Đường dẫn không tồn tại.';
    				
    			?>
    		</div>
    	</div>
    </body>
</html>