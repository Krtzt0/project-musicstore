<?php
session_start();
session_destroy();
	echo "<script>";
	echo "alert('ออกจากระบบเรียบร้อย');";
	echo "window.location.href='index.php';";
	echo "</script>";