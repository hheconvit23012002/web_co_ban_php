<?php 
require '../check_admin.php';
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
	include '../menu.php';
	include '../connect.php';
	$sql = "select * from manufacturers";
	$result = mysqli_query($connect,$sql);
	mysqli_close($connect);
	 ?>
	<form action="process_insert.php" method="post" enctype="multipart/form-data">
		Tên
		<input type="text" name="name">
		<br>
		Mô tả
		<textarea name="description"></textarea>
		<br>
		Ảnh
		<input type="file" name="photo">
		<br>
		Giá 
		<input type="text" name="price">
		<br>
		Nhà sản xuất
		<select name="manufacturers_id">
			<?php foreach ($result as $each): ?>
				<option value="<?php echo $each['ID'] ?>"><?php echo $each['name'] ?></option>
			<?php endforeach ?>
		</select>
		<br>
		<button>Thêm</button>
	</form>
</body>
</html>