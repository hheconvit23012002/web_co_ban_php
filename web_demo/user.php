<?php 
session_start();
if(empty($_SESSION['id'])){
	header("location:signin.php?error=dang nhap di");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	 
	<h1>
		Cho mung <?php echo $_SESSION['name'] ?> den voi binh nguyen vo tan
	</h1>
</body>
</html>