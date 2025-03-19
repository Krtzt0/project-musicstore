<?php
    include("connectdb.php");
    $id=$_POST["Type_id_del"];
    $sql="delete from producttype where Type_id='$id'";
    mysqli_query($conn,$sql) or die('sql ผิด');
    echo "ลบข้อมูลเรียบร้อยแล้ว"
?>