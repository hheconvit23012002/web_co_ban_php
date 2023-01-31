<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<style>
		*{
			border: 0;
			margin: 0;
			box-sizing: border-box;
		}
		#root{
			width: 100%;
			border: none;
			height: 200vh;
			background-color: white;
		}
		#nav_bar{
			display: flex;
			justify-content: flex-start;
			height: 5%;
			width: 100%;
			background-color: white;
		}
		#content{
			float: left;
			width: 100%;
			height: 85%;
			background-color: yellow;
		}
		#footer{
			float: left;
			align-items: center;
			height: 10%;
			width: 100%;
			background-color: blue;
		}
	</style>
</head>
<body>
	<div id="root">
		<?php 
		include 'navbar.php';
		include 'content_id.php';
		include 'footer.php';	
		 ?>
	</div>
</body>
</html>