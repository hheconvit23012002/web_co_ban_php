<?php 
session_start();
if(isset($_COOKIE['remember'])){
	include 'admin/connect.php';
	$token = $_COOKIE['remember'];
	$sql = "select * from customers where token = '$token' limit 1";
	$result = mysqli_query($connect,$sql);
	$number_row = mysqli_num_rows($result);
	if($number_row==1){
		$each = mysqli_fetch_array($result);
		$_SESSION['id'] = $each['ID'];
		$_SESSION['name'] = $each['name'];
	}
}
	
if(isset($_SESSION['id'])){
	header("location:user.php");
	exit();
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 
	include 'navbar.php';
	 ?>
	<form action="process_signin.php" method="post">
		Email
		<input type="text" name="email">
		<br>
		Mật khẩu
		<input type="password" name="password">
		<br>
		Ghi nhớ đăng nhập
		<input type="checkbox" name="remember">
		<br>
		<button>submit</button>
	</form>
</body>
</html>