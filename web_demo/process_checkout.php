<?php 

$name_receiver = $_POST['name_receiver'];
$phone_receiver = $_POST['phone_receiver'];
$address_receiver = $_POST['address_receiver'];

session_start();
require 'admin/connect.php';

if(empty($_SESSION['cart'])){
	echo "giở hàng trống";
	
}else{
	$customer_id = $_SESSION['id'];
	$total_price =0;
	$cart = $_SESSION['cart'];
	foreach ($cart as $id => $each) {
		// code...
		$total_price += $each['quantity']*$each['price'];
	}
	$status =0;
	$sql = "insert into orders( customer_id, name_receiver, phone_receiver, address_receiver, status, sum_price) values ('$customer_id','$name_receiver','$phone_receiver','$address_receiver','$status','$total_price')";
	mysqli_query($connect,$sql);

	$sql = "select max(ID) from orders where customer_id = '$customer_id' ";
	$result = mysqli_query($connect,$sql);
	$order_id = mysqli_fetch_array($result)['max(ID)'];
	foreach ($cart as $id => $each) {
		// code...
		$quantity = $each['quantity'];
		$sql = "insert into orders_products(order_id,product_id,quantity) values('$order_id','$id','$quantity')";
		mysqli_query($connect,$sql);
		unset($_SESSION['cart']);
	}
	
}
mysqli_close($connect);