<?php 

$id = $_GET['id'];
$status = $_GET['status'];

require '../connect.php';
$sql = "update orders set status = '$status' where ID = '$id'";
mysqli_query($connect,$sql);
header("location:index.php");