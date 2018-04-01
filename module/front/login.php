
<?php
	if(isset($_POST['dk_name']))//nếu submit
	{
		$name=$_POST['dk_name'];
		$email=$_POST['dk_email'];
		$pass=$_POST['dk_password'];
		$repass=$_POST['dk_re-password'];
		
		if($pass!=$repass)
			$msg='Mật khẩu nhập lại chưa đúng';
		
		else //nếu dữ liệu h/ lệ
		{	
    		$con='qwertyuiopasdfghjklzxcvbnm123456789';
    		$conf='';
    		for($i=0;$i<6;$i++)
    		{
    			$p=mt_rand(0,strlen($con)-1);
    			$conf=$conf.$con[$p];
    		}
    		//$sql5="insert into `nn_user` values ('NULL','$pass','$email','$name','','','',now(),0,'','')";
    		//mysqli_query($link,$sql5);
    		$from='admin_hoanglammoc@gmail.com';
    		$to=$email;
    		$subject='XÁC NHẬN ĐĂNG KÝ';
    		$content='Xin chào <b>'.$name.'</b>. Mã xác nhận của bạn là: <b>'.$conf.'</b>'; 
    		include('lib/function.php');
    		if(mailer($from,$to,$subject,$content))
    		{
    			$sql9="insert into `nn_user` values ('NULL','$pass','$email','$name','','','',now(),0,'','$conf')";
    			if(mysqli_query($link,$sql9))
    				echo "<script> 
    					alert('Mã xác nhận đã gửi về email của bạn.');
    			</script>";
    			else
    				echo "<script> 
    					alert('Lỗi! Vui lòng kiểm tra lại.');
    			</script>";
    		}
			
			$id=mysqli_insert_id($link); //lay id auto_increment cua cau lenh insert ngay truoc
?>
			<script> 
					setTimeout(window.location="index.php?mod=activation&id=<?php echo $id ?>",3000);
			</script>
<?php	
			
		}
	}
?>	

<?php
	if(isset($_POST['resetemail'])){
	    
    	$email=mysqli_real_escape_string($link,$_POST['resetemail']);
    	$sql6="select * from `nn_user` where `email`='$email'";
    	$sr6=mysqli_query($link,$sql6);
    	if(mysqli_num_rows($sr6)==0)
		    echo "<script> 
					alert('Email không tồn tại !');
			</script>";
    	else
    	{
    		$r6=mysqli_fetch_assoc($sr6);
    		$pass='qwertyuiopasdfghjklzxcvbnm123456789';
    		$newpass='';
    		for($i=0;$i<8;$i++)
    		{
    			$pos=mt_rand(0,strlen($pass)-1);
    			$newpass=$newpass.$pass[$pos];
    		}
    		
    		$from='admin_hoanglammoc@gmail.com';
    		$to=$email;
    		$subject='Reset pasword';
    		$content='Xin chào <b>'.$r6['name'].'</b>. Password mới của bạn là: <b>'.$newpass.'</b>'; 
    		include('lib/function.php');
    		if(mailer($from,$to,$subject,$content))
    		{
    			$sql7="update `nn_user` set `password`='$newpass' where `id`={$r6['id']}";
    			if(mysqli_query($link,$sql7))
    				echo "<script> 
    					alert('Thành công! Vui lòng kiểm tra mail.');
    			</script>";
    			else
    				echo "<script> 
    					alert('Lỗi! Vui lòng kiểm tra lại.');
    			</script>";
    		}
    	}
	}

?>

<section class="signin-signup-form">
    <div class="container loginform">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-1 signin-form">
                <div class="loginarea">
                    <div class="logintitle">Sign in</div>
                    <hr class="dash-divider" style="width: 65%;">
                    
                    <form method="post" action="index.php?mod=login-action" id="login">
                        <input type="text" name="email" placeholder="Email" required></br>
                        <input type="Password" name="password" placeholder="Password" required></br>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="checkbox" name="terms" class="checkbox" style="display: inline-block; width: auto ; height: auto" > Remember me 
                            </div>
                            <div class="col-sm-6">
                                <i class="forgotpassword"><a href="" data-toggle="modal" data-target="#forgot-password"> forgot password? </a></i>
                            </div>
                            
                        </div>
                        <div class="login-reg">
                            <input type="submit" value="Login" class="btn login-reg-btn" style="border:none"><a onclick="document.getElementById('login').submit()" href="#" role="button"></a>
                        </div>
                    </form>
                    <div class="modal fade" id="forgot-password" role="dialog" style="z-index: 99999; margin-top: 150px ">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h5 class="modal-title">Reset password</h5> 
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="" id="reset">
                                        <input type="text" name="resetemail" id="resetemail" placeholder="Email" required></br>
                                        <input type="submit" value="Reset Password" class="btn login-reg-btn" ><a href="#" onclick="document.getElementById('reset').submit()" role="button"></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 signup-form">
                <div class="signuparea">
                    <div class="logintitle">Sign Up</div>
                    <hr class="dash-divider" style="width: 65%;">
                    <p style="color:red"><?php echo $msg ?></p>
                    <form method="post" action="" id="register">
                        <input type="text" name="dk_name" placeholder="Full name" required></br>
                        <input type="text" name="dk_email" placeholder="Email" required></br>
                        <input type="Password" name="dk_password" placeholder="Password" required></br>
                        <input type="Password" name="dk_re-password" placeholder="re-enter password" required></br>
                        <input type="checkbox" name="terms" class="checkbox" style="display: inline-block; width: auto; height: auto" > I have read and agreed to the <a href="#"> terms and condition </a>
                        <div class="login-reg">
                            <input type="submit" value="Sign Up" id="sm" class="btn login-reg-btn" /><a href="#" role="button" onclick="document.getElementById('sm').submit()"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>