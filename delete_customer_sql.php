<?php
    include("connectdb.php");
    $id=$_POST["Customer_id_del"];
    $sql="delete from customer where Customer_id='$id'";
    mysqli_query($conn,$sql) or die('sql ผิด');
    echo "ลบข้อมูลเรียบร้อยแล้ว"
?>