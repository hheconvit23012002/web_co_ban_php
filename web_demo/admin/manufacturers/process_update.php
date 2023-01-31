<?php 
require '../check_supper_admin.php';

if(empty($_POST['ID']) ){
	header('location:form_update.php?error=Phải truyền mã để sửa.');
	exit();
}
$ID = $_POST['ID'];

if( empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['photo'])){
	header("location:form_update.php?ID=$ID&error=Phải điền đầy đủ thông tin.");

	exit();
};


$ID = $_POST['ID'];
$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];
require '../connect.php';
$sql = "update manufacturers
set
name = '$name',
address = '$address',
phone = '$phone',
photo = '$photo'
where
ID =$ID
";
mysqli_query($connect,$sql);
$error = mysqli_error($connect);
if(empty($error)){
	header('location:index.php?success=Thêm thành công');
}else{
	header("location:form_update.php?ID=$ID&error=loi cu phap");
}
mysqli_close($connect);


