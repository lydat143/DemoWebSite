<?php
	ob_start();//cache output, xử lí lỗi khi dùng header('')
	session_start();//dùng trước khi sử dụng $_SESSION['']
	require('lib/db.php');//chèn file php vào
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

	if(isset($_POST['email'])){
	    $email=mysqli_real_escape_string($link,$_POST['email']);
    	$pass=$_POST['pass'];
    	//ktra trong dlieu
    	$sql="select * from `nn_admin` where `email`='$email' and `active`=1";
    	$rs=mysqli_query($link,$sql);
    	if(mysqli_num_rows($rs)==0)//nếu sai thì
    	{
    		$msg='Email không có trong hệ thống.';
    	}
    	else//ngược lại
    	{
    		$r=mysqli_fetch_assoc($rs);
    		if($r['password']!=$pass)//sai pass
    		{	
    		    $msg='Mật khẩu không đúng';
    		}
    		else
    		{
    			$_SESSION['admin_id']=$r['id'];
    			$_SESSION['admin_name']=$r['name'];
    			header('location:admin_index.php');
    		}
    	}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Hoang Lam Moc - Admin Login</title>
		<link rel="stylesheet" href="css/adminstyles.css">
	</head>
	<body style="background-image: url('New.jpg');">
		<div class="login">
    		<div class="login-form">
    			<h1>HOÀNG LÂM MỘC</h1>
    			<p style="color:red"><?php echo $msg; ?></p>
    			<form method="post" action="" id="login">
    				<input type="text" class="form-group form-control" placeholder="Email" id="UserName" name="email" required>
    				<input type="password" class="form-group form-control" placeholder="Password" id="Passwod" name="pass" required>	
        			<input type="submit" value="Login" class="log-btn" style="cursor: pointer;border:none"><a onclick="document.getElementById('login').submit()" href="#" role="button"></a>
        		</form>
    		</div>
    		<script src='js/jquery-2.2.0.min.js'></script>
    		<script  src="js/admin.js"></script>
    	</div>
	</body>
</html>