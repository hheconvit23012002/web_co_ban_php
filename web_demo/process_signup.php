<?php 
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_customer = $_POST['phone_customer'];
$address_customer = $_POST['address_customer'];
require 'admin/connect.php';
$sql = "select count(*) from customers where email = '$email'";
$result = mysqli_query($connect,$sql);
$number_row = mysqli_fetch_array($result)['count(*)'];
$error = mysqli_error($connect);
// echo $error;
// die();
if($number_row == 1){
	echo "trung mail";
	exit();
}else{
	$sql ="insert into customers(name,email,password,phone_customer,address_customer) values('$name','$email','$password','$phone_customer','$address_customer')";
	mysqli_query($connect,$sql);
	echo 1;

}

mysqli_close($connect);