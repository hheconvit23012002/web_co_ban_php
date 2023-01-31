<ul>
	<li>
		<a href="../manufacturers" title="">Quản lý nhà sản xuất</a>
	</li>
	<li>
		<a href="../products" title="">Quản lý sản phẩm</a>
	</li>
	<li>
		<a href="../orders" title="">hoá đơn</a>
	</li>
	<li>
		<a href="../signout.php" title="">Đăng xuất</a>
	</li>
</ul>

<?php if(isset($_GET['error'])){ ?>
	<span style="color: red"><?php echo $_GET['error']; ?></span>
<?php } ?>
<?php if(isset($_GET['success'])){ ?>
	<span style="color: green;"><?php echo $_GET['success']; ?></span>
<?php } ?>
