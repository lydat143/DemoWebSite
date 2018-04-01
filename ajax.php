<?php
    session_start();//dùng trước khi sử dụng $_SESSION['']
	require('lib/db.php');//ket noi db
	if(!isset($_POST['ship'])||$_POST['ship']=='') $_POST['ship']=0;
	$ship=$_POST['ship'];
	if($ship!=0){
	    $id=$_SESSION['id'];
	    $sql11="select `order_id` from `nn_cart` where `user_id`=$id";
	    $rs11=mysqli_query($link,$sql11);
	    $r11=mysqli_fetch_assoc($rs11);
	    $sql10="update `nn_cart` set `ship`=$ship where `order_id`=".$r11['order_id'];
	    mysqli_query($link,$sql10);
	}
	echo $ship;
	
    
?>