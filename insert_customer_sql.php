<?php
include("connectdb.php");
$Customer_id=mysqli_real_escape_string ($conn,$_POST["Customer_id"]);
$Customer_name=mysqli_real_escape_string ($conn,$_POST["Customer_name"]);
$Customer_email=mysqli_real_escape_string ($conn,$_POST["Customer_email"]);
$Customer_phone=mysqli_real_escape_string ($conn,$_POST["Customer_phone"]);
$Customer_birth=mysqli_real_escape_string ($conn,$_POST["Customer_birth"]);
if($Customer_id!="")
{
    $sql="update customer set 
    Customer_name='$Customer_name',
    Customer_email='$Customer_email',
    Customer_phone='$Customer_phone',
    Customer_birth='$Customer_birth'
    where 
    Customer_id='$Customer_id' ";

    mysqli_query($conn,$sql) or die('sql update error');
    
    echo "ปรับปรุงข้อมูลเรียบร้อย";
}
else
{

    $sqlsave="insert into customer(Customer_name,Customer_email,Customer_phone,Customer_birth) values('$Customer_name','$Customer_email','$Customer_phone','$Customer_birth')";
    mysqli_query($conn,$sqlsave)or die('sqlsave error');
    echo "บันทึกข้อมูลเรียบร้อย";
}
?>