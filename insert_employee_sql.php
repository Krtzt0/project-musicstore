<?php
include("connectdb.php");
$Employee_id=mysqli_real_escape_string ($conn,$_POST["Employee_id"]);
$Employee_firstname=mysqli_real_escape_string ($conn,$_POST["Employee_firstname"]);
$Employee_lastname=mysqli_real_escape_string ($conn,$_POST["Employee_lastname"]);
$Employee_birth=mysqli_real_escape_string ($conn,$_POST["Employee_birth"]);
if($Employee_id!="")
{
    $sql="update employees set 
    Employee_firstname='$Employee_firstname',
    Employee_lastname='$Employee_lastname',
    Employee_birth='$Employee_birth'
    where 
    Employee_id='$Employee_id' ";

    mysqli_query($conn,$sql) or die('sql update error');
    
    echo "ปรับปรุงข้อมูลเรียบร้อย";
}
else
{

    $sqlsave="insert into employees(Employee_firstname,Employee_lastname,Employee_birth) values('$Employee_firstname','$Employee_lastname','$Employee_birth')";
    mysqli_query($conn,$sqlsave)or die('sqlsave error');
    echo "บันทึกข้อมูลเรียบร้อย";
}
?>