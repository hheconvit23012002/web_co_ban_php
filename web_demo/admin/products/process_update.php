<?php 
require '../check_admin.php';

$ID = $_POST['ID'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$manufacturer_id = $_POST['manufacturer_id'];
$photo_new = $_FILES['photo_new'];
if($photo_new['size'] > 0){
	$folder = "photo/";
	$file_extention = explode('.', $photo_new["name"])[1];
	$path_file = $folder . time() .'.' . $file_extention;
	move_uploaded_file($photo_new["tmp_name"], $path_file);
}else{
	$path_file = $_POST['photo_old'];
}

require '../connect.php';
$sql = "update products
set
name = '$name',
description = '$description',
manufacturer_id = '$manufacturer_id',
price ='$price',
photo = '$path_file'
where
ID = '$ID'
";
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
echo $error;
mysqli_close($connect);

// header('location:index.php?success=Sửa thành công');
