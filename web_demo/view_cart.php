<?php 
session_start();
$cart=[];
if(isset($_SESSION['cart'])){
	$cart = $_SESSION['cart'];
}
$total=0;
$id = $_SESSION['id'];
require 'admin/connect.php';
$sql = "select * from customers where ID = '$id'";
$result = mysqli_query($connect,$sql);
$customer = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<table border="1" width="100%">
		<tr>
			<td>Ảnh</td>
			<td>Tên sản phẩm</td>
			<td>Giá</td>
			<td>Số lượng</td>
			<td>Tổng tiền</td>
			<td>Xóa</td>
		</tr>
		<?php foreach ($cart as $id => $each): ?>
			<tr>
				<td>
					<img height="100" src="admin/products/<?php echo $each['photo'] ?>" alt="">
				</td>
				<td>
					<p>
						<?php echo $each['name'] ?>
					</p>
				</td>
				<td>
					<span class="span-price">
						<?php  echo $each['price'] ?>
					</span>
				</td>
				<td>
					<button class="btn-update-quantity" data-id="<?php echo $id ?>" data-type="decre">
						-
					</button>
					<span class="span-quantity">
						<?php echo $each['quantity'] ?>
					</span>
					<button class="btn-update-quantity" data-id="<?php echo $id ?>" data-type="incre">
						+
					</button>
				</td>
				<td>
					<span class="span-sum">
						<?php
						$tmp = $each['quantity']*$each['price'];
						$total+=$tmp;
						echo $tmp;
						?>
					</span>
					
				</td>
				<td>
					<button class="btn-delete" data-id="<?php echo $id ?>">X</button>
				</td>
			</tr>
			
		<?php endforeach ?>
	</table>
	<h1>Tong tien hoa don: $
		<span id="span-total">
			<?php echo "$total"; ?>
		</span>
	</h1>
	<form method="post" action="process_checkout.php">
		Tên người nhận
		<input type="text" name="name_receiver" value="<?php echo $customer['name'] ?>">
		<br>
		Số điện thoại người nhận
		<input type="text" name="phone_receiver" value="<?php echo $customer['phone_customer'] ?>">
		<br>
		Địa chỉ nhận
		<input type="text" name="address_receiver" value="<?php echo $customer['address_customer'] ?>">
		<br>
		<button>Submit</button>
	</form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.btn-update-quantity').click(function (e) {
			let btn = $(this);
			let id = btn.data('id');
			let type = btn.data('type');
			$.ajax({
				url: 'change_quantity_item_in_cart.php',
				type: 'GET',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: {id,type},
			})
			.done(function() {
				let parent_tr = btn.parents('tr');
				let price = parent_tr.find('.span-price').text();
				let quantity = parent_tr.find('.span-quantity').text();
				if(type=="incre"){
					quantity++;
				}else{
					quantity--;
				}
				if(quantity === 0){
					parent_tr.remove();
				}else{
					parent_tr.find('.span-quantity').text(quantity);
					let sum = price*quantity;
					parent_tr.find('.span-sum').text(sum);
				}
				getTotal();
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		});
		$('.btn-delete').click(function (e) {
			let btn = $(this);
			let id = btn.data('id');
			$.ajax({
				url: 'delete_item_in_cart.php',
				type: 'GET',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: {id},
			})
			.done(function() {
				let parent_tr = btn.parents('tr');
				parent_tr.remove();
				getTotal();
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		});
		function getTotal(){
			let total = 0;
			$('.span-sum').each( function() {
				total+=parseFloat($(this).text());
			});
			$('#span-total').text(total);
		};
	});
</script>
</html>