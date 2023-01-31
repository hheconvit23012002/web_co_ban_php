<?php 
session_start();
 ?>
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
		/*#nav_bar{
			display: flex;
			justify-content: flex-start;
			height: 5%;
			width: 100%;
			background-color: white;
		}*/
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
		.style-input{
			/*border: none;*/
			border:  1px solid black;
		}
	</style>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<body>
	<div id="root">
		<?php 
		include 'navbar.php';
		include 'content.php';
		include 'footer.php';	
		 ?>
	</div>
</body>

<script type="text/javascript">
	$(document).ready(function() {
		$('.btn-add-to-cart').click(function () {
			let id = $(this).data('id');
			$.ajax({
				url: 'add_to_cart.php',
				type: 'GET',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: {id},
			})
			.done(function(responsive) {
				if(responsive == 1){
					alert('thanh cong');
				}else{
					alert(responsive);
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});
	});
</script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>