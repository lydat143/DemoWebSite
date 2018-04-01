<?php
	$cart=$_SESSION['cart'];
	$act=$_GET['act'];//1.thêm,2.sửa,3.xóa
	$user_id=$_SESSION['id'];
	$order_id=$_GET['id'];
	$now=date('Y-m-d',time());//thời điểm hiện tại
	if(!isset($_SESSION['id']) || $_SESSION['id']=='' ) {
	    echo "<script> 
                alert('Bạn phải đăng nhập trước.');
        </script>';";
	    echo '<script> 
                setTimeout(window.location="index.php?mod=login",10000);
        </script>';
	}
	else {
        if($act==1)
    	{
    	
    		//thêm
    		$id=$_GET['id'];//lấy id của sp cần xử li
    		$qty=max(1,intval($_GET['qty']));//s/luong cần thêm
    		//thêm $qty sp $id vào giỏ hàng
    		$cart[$id]=$cart[$id]+$qty;
    		$sql="insert into `nn_cart` (`order_id`,`user_id`,`time`,`ship`) values ('$order_id','$user_id','$now',0)";
    		mysqli_query($link,$sql);
        	
    	}
    	
    	if($act==2)
    	{
    		//sửa
    		foreach($cart as $k=>$v)
    		$cart[$k]=max(1,intval($_POST[$k]));
    	}
    	
    	if($act==3)
    	{
    		//xóa giỏ hàng
    		$sql1="delete from `nn_cart` where `order_id`=$order_id";
    		mysqli_query($link,$sql1);
    		//xóa
    		$id=$_GET['id'];//lấy id của sp cần xử li
    		unset($cart[$id]);
    	}
    	
    	$_SESSION['cart']=$cart;
    	header('location:index.php?mod=cart');
	}
	
?>