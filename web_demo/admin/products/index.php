<?php 
require '../check_admin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product</title>
</head>
<body>
	Đây là trang quản lý sản phẩm
	<?php 
	include '../menu.php';
	include '../connect.php';
	$sql = "select products.*,manufacturers.name as manufacturer_name from products join manufacturers on manufacturers.id = products.manufacturer_id";
	$result = mysqli_query($connect,$sql);

	mysqli_close($connect);
	 ?>
	 <table border="1" width="100%">
	 	<a href="form_insert.php" title="">Thêm</a>
	 	<tr>
	 		<td>Ma</td>
	 		<td>Tên</td>
	 		<td>Ảnh</td>
	 		<td>Giá</td>
	 		<td>Nhà sản xuất</td>
	 		<td>Sửa</td>
	 		<td>Xóa</td>
	 	</tr>
	 	<?php foreach ($result as $each): ?>
	 		<tr>
	 			<td><?php echo $each['ID'] ?></td>
	 			<td><?php echo $each['name'] ?></td>
	 			<td>
	 				<img height="100" src="<?php echo $each['photo'] ?>" alt="">
	 			</td>
	 			<td><?php echo $each['price'] ?></td>
	 			<td>
	 				<?php echo $each['manufacturer_name'] ?>
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