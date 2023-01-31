<?php 

$email = $_POST['email'];
$password = $_POST['password'];
if($_POST['remember']){
	$remember = true;
}
else{
	$remember= false;
}
require 'admin/connect.php';
$sql = "select * from customers where email = '$email' and password = '$password'";
$result = mysqli_query($connect,$sql);
$number_row = mysqli_num_rows($result);


session_start();
if($number_row == 1){
	
	$each = mysqli_fetch_array($result);
	$id = $each['ID'];
	$_SESSION['id'] = $id;
	$_SESSION['name'] = $each['name'];
	if($remember){
		$tolen = uniqid('user_',true);
		$sql ="update customers set token = '$tolen' where ID = '$id'";
		mysqli_query($connect,$sql);
		setcookie('remember',$tolen,time()+60*60*24*30);
	}
	
	header("location:user.php");
	exit();
}else{
	$_SESSION['error'] = "sai tai khoan hoac mat khac";
	header("location:signin.php");
}

mysqli_close($connect);