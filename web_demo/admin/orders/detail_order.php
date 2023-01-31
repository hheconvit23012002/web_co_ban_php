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
		$id = $_GET['id'];
		require '../connect.php';
		$sql = "select 
			*
			from  orders_products
			join products on products.ID = orders_products.product_id
			where order_id = '$id';
		";
		$result = mysqli_query($connect,$sql);
		$sum=0;
	 ?>
	<table border="1" width="100%">
		<tr>
			<td>Ảnh</td>
			<td>Tên sản phẩm</td>
			<td>Giá</td>
			<td>Số lượng</td>
			<td>Tổng tiền</td>
		</tr>
		<?php foreach ($result as  $each): ?>
			<tr>
				<td>
					<img height="100" src="../products/<?php echo $each['photo'] ?>" alt="">
				</td>
				<td>
					<p>
						<?php echo $each['name'] ?>
					</p>
				</td>
				<td>
					<?php  echo $each['price'] ?>
				</td>
				<td>
					
					<?php echo $each['quantity'] ?>
				
				</td>
				<td>
					<?php
					$tmp = $each['quantity']*$each['price'];
					$sum+=$tmp;
					 echo $tmp;
					 ?>
				</td>
			</tr>
			
		<?php endforeach ?>
	</table>
	<h1>Tong tien hoa don: $<?php echo "$sum"; ?></h1>
	<script type="text/javascript">
		
	</script>
</body>
</html>