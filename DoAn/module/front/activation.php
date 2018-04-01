<?php
if(isset($_POST['activecode']))
{
    $id=$_GET['id'];
    $code=$_POST['activecode'];
    $sql="select `confirm` from `nn_user` where `active`=0 and `id`=$id";
    $rs=mysqli_query($link,$sql);
    $r=mysqli_fetch_assoc($rs);
    if($code!=$r['confirm'])
		$msg='Mã xác nhận không đúng. Vui lòng nhập lại';
    else
    {
        $sql7="update `nn_user` set `active`=1 where `id`=$id";
        if(mysqli_query($link,$sql7))
        {
            echo "<script> 
        		alert('Đăng ký thành công.');
        	</script>";
?>
    <script> 
    		setTimeout(window.location="index.php?mod=login",3000);
    </script>
<?php
        }
        else
        	echo "<script> 
        		alert('Lỗi! Vui lòng kiểm tra lại.');
        	</script>";
    }
}
?>
        <section class="signin-signup-form">
            <div class="container loginform">
                <div class="notification" id="password-change-notify">
                    Please active your account before login
                </div>
                <div class="row account-page">
                    <div class="col-sm-5 col-sm-offset-1 signin-form">
                        <div class="loginarea">
                            <div class="logintitle">Hi!</div>
                            <hr class="dash-divider" style="width: 65%;">
                            <div class="logintitle">Your Account Hasn't Active Yet. Please active now</div>
                        </div>
                    </div>
                    <div class="col-sm-5 signup-form">
                        <div class="signuparea">
                            <div class="logintitle">Account Activation</div>
                            <hr class="dash-divider" style="width: 65%;">
                            <div style="color:red" ><?php echo $msg ?></div>
                            <div class="user-action row">
                                <form id="account-activation" action="" method="post">
                                    <input type="text" name="activecode" id="activecode" placeholder="Activation Code" required>
                                    <div class="login-reg">
                                        <input type="submit" value="Active" id="sm" class="btn login-reg-btn" /><a href="#" role="button" onclick="document.getElementById('account-activation').submit()"></a>
                                    </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    