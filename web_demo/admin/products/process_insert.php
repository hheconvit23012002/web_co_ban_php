<?php 
require '../check_admin.php';

if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price']) || empty($_FILES['photo']) || empty($_POST['manufacturers_id'])  ){
	header('location:form_insert.php?error=Phải điền đầy đủ thông tin.');
	exit();
};
$name = addslashes($_POST['name']);
$description = addslashes($_POST['description']);
$price = $_POST['price'];
$manufacturers_id = $_POST['manufacturers_id'];
$photo = $_FILES['photo'];
$folder = "photo/";
$file_extention = explode('.', $photo["name"])[1];
$path_file = $folder . time() .'.' . $file_extention;
move_uploaded_file($photo["tmp_name"], $path_file);

require '../connect.php';
$sql = "insert into products(name,photo,description,price,manufacturer_id) 
values('$name','$path_file','$description','$price','$manufacturers_id')";
mysqli_query($connect,$sql);

mysqli_close($connect);

header('location:index.php?success=Thêm thành công');
