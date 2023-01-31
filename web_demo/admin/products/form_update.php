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
	$ID = $_GET['ID'];
	$sql = "select * from products where ID =$ID";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);
	$sql = "select * from manufacturers";
	$manufacturers = mysqli_query($connect,$sql);
	mysqli_close($connect);
	 ?>
	<form action="process_update.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="ID" value="<?php echo $each['ID'] ?>">
		Tên
		<input type="text" name="name" value="<?php echo $each['name'] ?>">
		<br>
		Mô tả
		<textarea name="description"><?php echo $each['description'] ?></textarea>
		<br>
		Dùng ảnh mới
		<input type="file" name="photo_new">
		<br>
		Ảnh cũ
		<img height="100" src="<?php echo $each['photo'] ?>" alt="">
		<input type="hidden" name="photo_old" value="<?php echo $each['photo'] ?>">
		<br>
		Giá 
		<input type="text" name="price" value="<?php echo $each['price'] ?>">
		<br>
		Nhà sản xuất
		<select name="manufacturer_id">
			<?php foreach ($manufacturers as $manufacturer): ?>

				<option value="<?php echo $manufacturer['ID'] ?>" 
					<?php if ($each['manufacturer_id'] == $manufacturer['ID']): ?>
						selected
					<?php endif ?>	
					>
					
					<?php echo $manufacturer['name'] ?>
						
					</option>
			<?php endforeach ?>
		</select>
		<br>
		<button>Sửa</button>
	</form>
</body>
</html>