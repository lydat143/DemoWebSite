<?php
	ob_start();//cache output, xử lí lỗi khi dùng header('')
	session_start();//dùng trước khi sử dụng $_SESSION['']
	require('lib/db.php');//chèn file php vào
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	unset($_SESSION['admin_id']);//hủy session
	unset($_SESSION['admin_name']);
	header('location:admin.php');//chuyển đến trang login
?>