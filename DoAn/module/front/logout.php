<?php
// //xóa giỏ hàng
 	$sql1="delete from `nn_cart` where `user_id`=".$_SESSION['id'];
	mysqli_query($link,$sql1);
	
    unset($_SESSION['cart']);
	unset($_SESSION['id']);//hủy session
	unset($_SESSION['name']);
	header('location:index.php?mod=login');//chuyển đến trang login
?>