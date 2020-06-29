<?php
session_start();

	//echo $_SESSION['cx'];
	if($_SESSION['cx']=="学生")
	{
		echo "<script>javascript:location.href='left2.php';</script>";
	}
	if($_SESSION['cx']=="教师")
	{
		echo "<script>javascript:location.href='left3.php';</script>";
	}
	if($_SESSION['cx']=="管理员")
	
	{
		echo "<script>javascript:location.href='left.php';</script>";
	}


?>