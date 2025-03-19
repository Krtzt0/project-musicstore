<?php
include("connectdb.php");
$Order_id=mysqli_real_escape_string ($conn,$_POST["Order_id"]);
$Customer_id=mysqli_real_escape_string ($conn,$_POST["Customer_id"]);
$Product_id=mysqli_real_escape_string ($conn,$_POST["Product_id"]);
$Employee_id=mysqli_real_escape_string ($conn,$_POST["Employee_id"]);
if($Order_id!="")
{

    $sql="update orders set 
    Customer_id='$Customer_id',
    Product_id='$Product_id',
    Employee_id='$Employee_id'
    where 
    Order_id='$Order_id' ";

    mysqli_query($conn,$sql) or die('sql update error');
    
    echo "ปรับปรุงข้อมูลเรียบร้อย";
}
else
{

    $sqlsave="insert into orders(Customer_id,Product_id,Employee_id) values('$Customer_id','$Product_id','$Employee_id')";
    mysqli_query($conn,$sqlsave)or die('sqlsave error');
    echo "บันทึกข้อมูลเรียบร้อย";
}
?>