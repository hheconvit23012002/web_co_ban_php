

<div id="nav_bar">
	<ul>
		<li>
			<a href="index.php" title="">Trang chu</a>
		</li>
		<?php if(isset($_SESSION['id'])){ ?>
			<li>
				<a href="signout.php" title="">Đăng xuất</a>
			</li>
		<?php }else{ ?>
			<li>
				<a href="signin.php" title="">Đăng nhập</a>
			</li>
			<li>
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
					Đăng ký
				</button>
			</li>
			
			<!-- <li>
				<a href="signup.php" title="">Đăng ký</a>
			</li> -->
		<?php } ?>
	</ul>			
</div>

<?php if(isset($_SESSION['error'])){ ?>
	<span style="color: red"><?php echo $_SESSION['error']; ?></span>
	<?php unset($_SESSION['error']) ?>
<?php } ?>
<?php if(isset($_SESSION['success'])){ ?>
	<span style="color: green;"><?php echo $_SESSION['success'] ?></span>
	<?php unset($_SESSION['success']) ?>
<?php } ?>
<?php 
include "signup.php";
 ?>
