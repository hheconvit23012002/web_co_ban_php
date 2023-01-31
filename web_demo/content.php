<style>
	.item{
		width: 33.33333%;
		height: auto;
		border: 1px solid black;
		float: left;
	}
</style>

<?php 
require 'admin/connect.php';
$sql = "select * from products";
$result = mysqli_query($connect,$sql);
mysqli_close($connect);

 ?>


<div id="content">
	<?php foreach ($result as $each): ?>
		<div class="item">
			<h2><?php echo $each['name'] ?></h2>
			<img height="100" src="admin/products/<?php echo $each['photo'] ?>" alt="">
			<p><?php echo $each['price'] ?></p>
			<a href="product.php?ID=<?php echo $each['ID'] ?>" title="">Xem thêm</a>
			<?php if(isset($_SESSION['id'])){ ?>
				<br>
				<button data-id="<?php echo $each['ID'] ?>" class="btn-add-to-cart" type="button">
					Them san pham
				</button>
			<?php } ?>
		</div>
	<?php endforeach ?>
</div>
