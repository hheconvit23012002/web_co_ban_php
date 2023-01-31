<style>
	.item{
		width: 100%;
		align-items: center;
		height: 500px;
		padding: 10px 40%;
		background-color: pink;
	}
</style>

<?php 
$ID = $_GET['ID'];
require 'admin/connect.php';
$sql = "select * from products where ID =$ID";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
mysqli_close($connect);

 ?>


<div id="content">
		<div class="item">
			<h2><?php echo $each['name'] ?></h2>
			<img height="200" src="admin/products/<?php echo $each['photo'] ?>" alt="">
			<p><?php echo $each['description'] ?></p>
			<p><?php echo $each['price'] ?></p>
		</div>
</div>
