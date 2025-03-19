<?php
    include("connectdb.php");
    $id=$_REQUEST['id'];
    $sql="select * from employees where Employee_id='$id'";
    $result=mysqli_query($conn,$sql) or die('sql error');
    $row=mysqli_fetch_array($result);
    echo json_encode($row);
?>