<?php 
require '../check_supper_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quan ly nha san xuat</title>
</head>
<body>
	Đây là khu vực quản lý nhà sản xuất
	
	<?php 
	require '../menu.php';
	?>
	<?php 
	echo 'Current PHP version: ' . phpversion();
	 ?>
	<?php 
	include '../connect.php';
	$sql = "select * from manufacturers";
	$result = mysqli_query($connect,$sql);
	mysqli_close($connect);
	?>
	<table border="1" width="100%">
		<br>
			<a href="form_insert.php" >Thêm</a>
		<br>
		<tr>
			<th>ID</th>
			<th>Tên</th>
			<th>Địa chỉ</th>
			<th>Điện thoại</th>
			<th>Ảnh</th>
			<th>Sửa</th>
			<th>Xoá</th>
		</tr>
		<?php foreach ($result as $each): ?>
			<tr>
				<td><?php echo $each['ID']; ?></td>
				<td><?php echo $each['name']; ?></td>
				<td><?php echo $each['address']; ?></td>
				<td><?php echo $each['phone']; ?></td>
				<td>
					<img height="100" src="<?php echo $each['photo'] ?>" alt="">
				</td>
				<td>
					<a href="form_update.php?ID=<?php echo $each['ID'] ?>" title="">Sửa</a>
				</td>
				<td>
					<a href="delete.php?ID=<?php echo $each['ID'] ?>" title="">Xóa</a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>