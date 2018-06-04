<?php
	$host = '127.0.0.1';
	$user = 'web-HOANGLAMMOC';
	$pass = 'web-HOANGLAMMOC';
	$db = 'web-HOANGLAMMOC';
	$link = mysqli_connect($host,$user,$pass,$db) or die ('Lỗi kết nối');
	mysqli_query($link,'set names utf8');
?>
