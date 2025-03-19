<?php
include("connectdb.php");
$Type_id=mysqli_real_escape_string ($conn,$_POST["Type_id"]);
$Type_name=mysqli_real_escape_string ($conn,$_POST["Type_name"]);
if($Type_id!="")
{
    $sql="update producttype set Type_name='$Type_name' where 
    Type_id='$Type_id' ";
    mysqli_query($conn,$sql) or die('sql update error');
    echo "ปรับปรุงข้อมูลเรียบร้อย";
}
else
{
$sql="select * from producttype where Type_name='$Type_name'"; //เช็คข้อมูลซ้ำ
$result= mysqli_query($conn,$sql) or die ('sql error');
$count= mysqli_num_rows($result);
if(count>0)
{
    echo"ชื่อประเภทสินค้ามีอยู่แล้ว";

}
else
{
    $sqlsave="insert into producttype (Type_name) values('$Type_name')";
    mysqli_query($conn,$sqlsave)or die('sqlsave error');
    echo "บันทึกข้อมูลเรียบร้อย";
}
}
?>