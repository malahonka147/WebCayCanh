<?php
	include("DataProvider.php");
	session_start();
    $matk=$_SESSION['MaTK'];
    $matkhaucu =$_POST['matkhaucu'];
    $matkhaumoi =$_POST['matkhaumoi'];
	$nhaplaimatkhau=$_POST['nhaplaimatkhau'];
    $result = DataProvider::ExecuteQuery("update taikhoan set MatKhau = '$matkhaumoi' where matk = ".$matk);
	if($result){
		echo ("Thành Công!!!");
	}
    else{
		echo ("Thất Bại ");
	}
?>