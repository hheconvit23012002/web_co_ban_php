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
		require '../connect.php';
		$sql = "select 
			orders.*,
			customers.name,
			customers.phone_customer,
			customers.address_customer
			from orders 
			join customers on customers.ID = orders.customer_id
		";
		$result = mysqli_query($connect,$sql);
	 ?>
	<table border="1" width="100%">
		<tr>
			<td>mã</td>
			<td>Thời gian đặt</td>
			<td>Thông tin người nhận</td>
			<td>Thông tin người nhận</td>
			<td>Trạng thái</td>
			<td>Tổng tiền</td>
			<td>Xem</td>
			<td>hanh dong</td>
			
		</tr>
		<?php foreach ($result as  $each): ?>
			<tr>
				<td>
					<?php echo $each['ID'] ?>
				</td>
				<td>
					<?php echo $each['create_at'] ?>
				</td>
				<td>
					<?php echo  $each['name_receiver'] ?>
					<?php echo $each['phone_receiver'] ?>
					<?php echo $each['address_receiver'] ?>
				</td>
				<td>
					<?php echo $each['name'] ?>
					<?php echo $each['phone_customer'] ?>
					<?php echo $each['address_customer'] ?>
				</td>
				<td>
					<?php 
                    switch ($each['status']) {
                    	case 0:
                    		echo "mới đặt";
                    		// code...
                    		break;
                    	case 1:
                    		echo "đã duyệt";
                    		// code...
                    		break;
                    	case 2:
                    		echo "đã hủy";
                    		// code...
                    		break;
                    	default:
                    		// code...
                    		break;
                    }

					 ?>
				</td>
				<td>
					<?php 
					$tmp = $each['sum_price'];
				
					echo $tmp;
					 ?>
				</td>
				<td>
					<a href="detail_order.php?id=<?php echo $each['ID'] ?>" title="">xem chi tiet</a>
				</td>
				<td>
					<button>
						<a style="display:block;text-decoration:none" href="change_status.php?id=<?php echo $each['ID'] ?>&status=1" title="">Duyệt</a>
					</button>
					<br>
					<button>
						<a style="display:block;text-decoration:none" href="change_status.php?id=<?php echo $each['ID'] ?>&status=2" title="">Hủy</a>
					</button>
				</td>
			</tr>
			
		<?php endforeach ?>
	</table>
</body>
</html>