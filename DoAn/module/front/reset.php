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
    			$sql7="update `nn_user` set `password`='$newpass' where `email`=$email";
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
	header('location:index.php?mod=login');
?>