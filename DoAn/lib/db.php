<?php
	$host='localhost';
	$user='goeenvoc_hlm';
	$pass='SnQ1HwIm]=%@';
	$db='goeenvoc_hlm';
	$link=mysqli_connect($host,$user,$pass,$db) or die ('Lỗi kết nối');
	mysqli_query($link,'set names utf8');
?>