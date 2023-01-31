<?php 
session_start();
try {
	if(empty($_GET['id'])){
		throw new Exception("Khong ton tai id");
	}
	$id = $_GET['id'];
	require 'admin/connect.php';
	if(empty($_SESSION['cart'][$id])){
		$sql = "select * from products where ID = '$id'";
		$result = mysqli_query($connect,$sql);
		$each = mysqli_fetch_array($result);
		$_SESSION['cart'][$id]['name']=$each['name'];
		$_SESSION['cart'][$id]['photo'] = $each['photo'];
		$_SESSION['cart'][$id]['quantity'] = 1;
		$_SESSION['cart'][$id]['price'] = $each['price'];
	}else{
		$_SESSION['cart'][$id]['quantity']++;
	}
	echo 1;
} catch (Exception $e) {
	echo $e;
}


// echo json_encode($_SESSION['cart']);