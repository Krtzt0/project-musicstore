<?php
session_start();
include("connectdb.php");

$user=mysqli_real_escape_string($conn,$_POST["user"]);
$pass=mysqli_real_escape_string($conn,$_POST["userpassword"]);

//ตรวจสอบuser
$sqlcheckuser="select * from users where username ='$user'";
$resultuser=mysqli_query($conn,$sqlcheckuser) or die ('sql มึงผิด');
$num=mysqli_num_rows($resultuser);
if($num>0)
{
	//ตรวจสอบรหัสผ่าน
	$row=mysqli_fetch_array($resultuser);
	if(password_verify($pass,$row["userpassword"]))
	
	{
		$_SESSION["name"]=$row["name"]." ".$row["surname"];
		$_SESSION["userid"]=$row["userid"];
		echo "<script>";
		echo "alert('เข้าสู้ระบบสำเร็จ');";
		echo "window.location.href='index.php';";
		echo "</script>";
	}
	
	else
	{
		echo"<script>";
		echo"alert('รหัสผ่านไม่ถูกต้องกรุณาตรวจสอบ');";
		echo"window.history.back();";
		echo"</script>";
	}
}

else
	{
		echo"<script>";
		echo"alert('ไม่พบ user นี้กรุณาตรวจสอบ');";
		echo"window.history.back();";
		echo"</script>";
	}
	


// if($user=="Mizuki@gmail.com"&&$pass=="123456")
// {
// 	$_SESSION["name"]="ปรเมษฐ์ มีเพียร";
// 	$_SESSION["std_id"]="6240208120";
// 	echo "<>";
// 	echo "alert('เข้าสู้ระบบสำเร็จ');";
// 	echo "window.location.href='index.php';";
// 	echo "</>";
// }
// 	else
// 	{
// 	echo "<>";
// 	echo "alert('เข้าสู้ระบบไม่สำเร็จ กรุณาตรวจสอบ');";
// 	echo "window.history.back();";
// 	echo "</>";
// 	}



?>