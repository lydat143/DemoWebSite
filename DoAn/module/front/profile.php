<?php
//nếu chưa đ/nhap => đến trang đ/nhap
if(!isset($_SESSION['id'])) header('location:index.php?mod=login');
	
	if(isset($_POST['name']))//nếu submit
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$pass=$_POST['pass'];
		$repass=$_POST['repass'];
		$city=$_POST['city'];
		$phone=$_POST['phone'];
		$zip=$_POST['zip'];
		
		if($name=='')
			$msg='Bạn chưa nhập tên';
		
		elseif($pass!=$repass)
			$msg='Mật khẩu nhập lại chưa đúng';
		else //các d/lieu hợp lệ => insert vào db
		{	
			if($pass!='')//thay đổi mật khẩu
				$sql="update `nn_user` set `password`='$pass',`name`='$name',`mobile`='$phone',`address`='$address',`city`='$city',`zip`='$zip' where `id`=".$_SESSION['id'];
			else
				$sql="update `nn_user` set `name`='$name',`mobile`='$phone',`address`='$address',`city`='$city',`zip`='$zip' where `id`=".$_SESSION['id'];
			if(mysqli_query($link,$sql))
				$msg='Cập nhật thông tin thành công.';	
			else
				$msg='Cập nhật không thành công. Vui lòng thử lại !';
		}
		
	}
	//lấy th/tin h/tai của ngdung
	$sql='select * from `nn_user` where `id`='.$_SESSION['id'];
	$rs=mysqli_query($link,$sql);
	$r=mysqli_fetch_assoc($rs);
?>
<section class="signin-signup-form">
    <div class="container loginform">
        <div class="notification" id="profile-change-notify">
            Your Profile Has Been Updated. <a href="/"> Back to your account </a>
        </div>
        <div class="row account-page">
            <div class="col-sm-5 col-sm-offset-1 signin-form">
                <div class="loginarea">
                    <div class="logintitle">Welcome Back!</div>
                    <hr class="dash-divider" style="width: 65%;">
                    <div class="logintitle"><?php echo $r['name'] ?></div>
                </div>
            </div>
            <div class="col-sm-5 signup-form">
                <div class="signuparea">
                    <div class="logintitle">Edit Profile</div>
                    <hr class="dash-divider" style="width: 65%;">
                    <div class="user-action row">
                        <p style="color:red"><?php echo $msg; ?></p>
                        <form class="check-out-form" method="post" action="" id="update">
                            <input type="text" name="name" value="<?php echo $r['name'] ?>" placeholder="Full name" required></br>
                            <input type="text" value="<?php echo $r['email'] ?>" name="email" disabled placeholder="Email" ></br>
                            <input type="password" name="pass" placeholder="password"></br>
                            <input type="password" name="repass" placeholder="Re-password"></br>
                            <input type="text" name="address" placeholder="address"value="<?php echo $r['address'] ?>"  required></br>
                            <input type="text" name="city" placeholder="Town / City" value="<?php echo $r['city'] ?>" required></br>
                            <input type="text" value="<?php echo $r['mobile'] ?>" name="phone" placeholder="phone" style=" width: 58%;" required>
                            <input type="text" value="<?php echo $r['zip'] ?>" name="zip" placeholder="Postal code / zip" style="width: 40%; margin-left:0.3em;" required></br>
                        
                        <div class="login-reg">
                            
                            <input type="submit" value="CHANGE" id="sm" class="btn" /><a href="#" role="button" onclick="document.getElementById('sm').click()"></a>
                        </div></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>