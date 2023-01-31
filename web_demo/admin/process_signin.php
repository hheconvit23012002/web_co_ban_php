<?php 

$email = $_POST['email'];
$password = $_POST['password'];

require 'connect.php';
$sql = "select * from admin where email = '$email' and password = '$password'";
$result = mysqli_query($connect,$sql);
$number_row = mysqli_num_rows($result);


session_start();
if($number_row == 1){
	$each = mysqli_fetch_array($result);
	$id = $each['ID'];
	$_SESSION['id'] = $id;
	$_SESSION['name'] = $each['name'];
	$_SESSION['level'] = $each['level'];
	header("location:root/index.php");
	exit();
}else{
	header("location:index.php");
}

mysqli_close($connect);