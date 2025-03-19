<?php
    include("connectdb.php");
    $id=$_POST["Product_id_del"];
    $sql="delete from product where Product_id='$id'";
    mysqli_query($conn,$sql) or die('sql ผิด');
    echo "ลบข้อมูลเรียบร้อยแล้ว"
?>