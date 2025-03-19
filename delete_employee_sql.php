<?php
    include("connectdb.php");
    $id=$_POST["Employee_id_del"];
    $sql="delete from employees where Employee_id='$id'";
    mysqli_query($conn,$sql) or die('sql ผิด');
    echo "ลบข้อมูลเรียบร้อยแล้ว"
?>