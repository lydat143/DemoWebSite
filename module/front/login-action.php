<?php
//xóa giỏ hàng
    $sql1="delete from `nn_cart` where `user_id`=".$_SESSION['id'];
	mysqli_query($link,$sql1);
	
	if(isset($_SESSION['cart'])) unset($_SESSION['cart']);
	$email=mysqli_real_escape_string($link,$_POST['email']);
	$pass=$_POST['password'];
	//ktra trong dlieu
	$sql="select * from `nn_user` where `email`='$email' and `active`=1";
	$rs=mysqli_query($link,$sql);
	if(mysqli_num_rows($rs)==0)//nếu sai thì
	{
		echo '<script>alert("Email không có trong hệ thống.")</script>';
?>
		<script> 
                setTimeout(window.location="index.php?mod=login",3000);
        </script>
<?php	
	}
	else//ngược lại
	{
		$r=mysqli_fetch_assoc($rs);
		if($r['password']!=$pass)//sai pass
		{	echo '<script>alert("Mật khẩu không đúng.")</script>';
			echo '<script> 
                setTimeout(window.location="index.php?mod=login",3000);
        </script>';
		}
		else
		{
			$_SESSION['id']=$r['id'];
			$_SESSION['name']=$r['name'];
			header('location:index.php');
		}
	}
?>
