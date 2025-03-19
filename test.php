<?php 
    $pass="123456789";
    $hash=password_hash($pass,PASSWORD_BCRYPT);
    echo $hash;

    if(password_verify("123456789",$hash))
    {
        echo "<br>ok";
    }
    else
    {
        echo "<br>not ok";
    }
?>