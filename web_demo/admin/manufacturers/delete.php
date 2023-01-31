<?php 
require '../check_supper_admin.php';
?>
<?php 
if(empty($_GET['ID'])){
	header('location:index.php?error=nhap id can xoa');
	exit();
}
$ID = $_GET['ID'];
include '../connect.php';
$sql = "delete from manufacturers where ID=$ID";
mysqli_query($connect,$sql);

$error = mysqli_error($connect);
if(empty($error)){
	header('location:index.php?success=Xóa thành công');
}else{
	header('location:index.php?error=loi cu phap');
}
mysqli_close($connect);
