<?php 
require '../check_supper_admin.php';
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
	if(empty($_GET['ID'])){
		header("location:index.php?error=phải truyền mã để sửa");
	};
	
	$ma = $_GET['ID'];
	include '../menu.php';
	include '../connect.php';
	$sql = "select * from manufacturers where ID = $ma";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);
	mysqli_close($connect);
	 ?>
	<form action="process_update.php" method="post">
		<input type="hidden" name="ID" value="<?php echo $each['ID'] ?>">
		Tên
		<input type="text" name="name" value="<?php echo $each['name'] ?>">
		<br>
		Địa chỉ
		<textarea name="address"><?php echo $each['address'] ?></textarea>
		<br>
		Điện thoại
		<input type="text" name="phone" value="<?php echo $each['phone'] ?>">
		<br>
		Ảnh
		<input type="text" name="photo" value="<?php echo $each['photo'] ?>">
		<br>
		<button>Sua</button>
	</form>
</body>
</html>