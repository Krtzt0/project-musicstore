<?php
    include("connectdb.php");
    $id=$_POST["Order_id_del"];
    $sql="delete from orders where Order_id='$id'";
    mysqli_query($conn,$sql) or die('sql ผิด');
    echo "ลบข้อมูลเรียบร้อยแล้ว"
?>