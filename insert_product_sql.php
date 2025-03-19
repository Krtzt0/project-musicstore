<?php
include("connectdb.php");
$Product_id=mysqli_real_escape_string ($conn,$_POST["Product_id"]);
$Product_name=mysqli_real_escape_string ($conn,$_POST["Product_name"]);
$Type_id=mysqli_real_escape_string ($conn,$_POST["Type_id"]);
$Product_price=mysqli_real_escape_string ($conn,$_POST["Product_price"]);
if($Product_id!="")
{
    $sql="update product set  
    Product_name='$Product_name',
    Type_id='$Type_id',
    Product_price='$Product_price'
    where 
    Product_id='$Product_id' ";

    mysqli_query($conn,$sql) or die('sql update error');
    
    echo "ปรับปรุงข้อมูลเรียบร้อย";
}
else
{

    $sqlsave="insert into product(Product_name,Type_id,Product_price) values('$Product_name','$Type_id','$Product_price')";
    mysqli_query($conn,$sqlsave)or die('sqlsave error');
    echo "บันทึกข้อมูลเรียบร้อย";
}
?>