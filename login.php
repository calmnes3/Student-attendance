<?php
session_start();
include_once 'conn.php';
	$login=$_POST["login"];
	$username=$_POST['username'];
	$pwd=md5($_POST['pwd']);
	$cx=$_POST['cx'];


	if($login=="1")
	{
		if ($username!="" && $pwd!="")
		{
		if($cx=="管理员")
		{
			$sql="select * from allusers where username='$username' and pwd='$pwd' and cx='管理员'";
		}

		if($cx=="学生")
		{
			$sql="select * from xueshengxinxi where xuehao='$username' and mima='$pwd' ";
		}



		if($cx=="教师")
		{
			$sql="select * from jiaoshixinxi where gonghao='$username' and mima='$pwd' ";
		}
		$query=mysql_query($sql);
		$rowscount=mysql_num_rows($query);
			if($rowscount>0)
			{
					$_SESSION['username']=$username;
					
					$_SESSION['cx']=$cx;
					
					if($cx=="教师")
					{
						$_SESSION['kc']=mysql_result($query,0,"zhujiaokecheng");
					}
					echo "<script language='javascript'>alert('登陆成功！');location='main.php';</script>";
			}
			else
			{
					echo "<script language='javascript'>alert('用户名或密码错误！');history.back();</script>";
			}
		}
		else
		{
				echo "<script language='javascript'>alert('请输入完整！');history.back();</script>";
		}
	}
	

?>