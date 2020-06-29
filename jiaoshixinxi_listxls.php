<?php 
include_once 'conn.php';
header("Content-Type: application/vnd.ms-execl");   
header("Content-Disposition: attachment; filename=教师信息.xls");   
header("Pragma: no-cache");   
header("Expires: 0"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>教师信息</title>
</head>

<body>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
  <tr>
    <td width="35" bgcolor="#FFFFFF">序号</td>
    <td width="55" bgcolor='#FFFFFF'>工号</td><td width="65" bgcolor='#FFFFFF'>姓名</td><td width="65" bgcolor='#FFFFFF'>密码</td><td width="120" bgcolor='#FFFFFF'>出生年月</td><td width="93" bgcolor='#FFFFFF'>身份证</td><td width="65" bgcolor='#FFFFFF'>性别</td><td width="65" bgcolor='#FFFFFF'>职称</td><td width="120" bgcolor='#FFFFFF'>主教课程</td><td width="69" bgcolor='#FFFFFF'>电话</td>
    <td width="120" align="center" bgcolor="#FFFFFF">添加时间</td>
  </tr>
  <?php 
    $sql="select * from jiaoshixinxi where 1=1";
  
if ($_POST["gonghao"]!=""){$nreqgonghao=$_POST["gonghao"];$sql=$sql." and gonghao like '%$nreqgonghao%'";}
if ($_POST["xingming"]!=""){$nreqxingming=$_POST["xingming"];$sql=$sql." and xingming like '%$nreqxingming%'";}
if ($_POST["chushengnianyue1"]!=""){$nreqchushengnianyue1=$_POST["chushengnianyue1"];$sql=$sql." and chushengnianyue >= '$nreqchushengnianyue1'";}
if ($_POST["chushengnianyue2"]!=""){$nreqchushengnianyue2=$_POST["chushengnianyue2"];$sql=$sql." and chushengnianyue <= '$nreqchushengnianyue2'";}
if ($_POST["shenfenzheng"]!=""){$nreqshenfenzheng=$_POST["shenfenzheng"];$sql=$sql." and shenfenzheng like '%$nreqshenfenzheng%'";}
if ($_POST["xingbie"]!=""){$nreqxingbie=$_POST["xingbie"];$sql=$sql." and xingbie like '%$nreqxingbie%'";}
if ($_POST["zhujiaokecheng"]!=""){$nreqzhujiaokecheng=$_POST["zhujiaokecheng"];$sql=$sql." and zhujiaokecheng like '%$nreqzhujiaokecheng%'";}
if ($_POST["dianhua"]!=""){$nreqdianhua=$_POST["dianhua"];$sql=$sql." and dianhua like '%$nreqdianhua%'";}
  $sql=$sql." order by id desc";
  
$query=mysql_query($sql);
  $rowscount=mysql_num_rows($query);
  if($rowscount==0)
  {}
  else
  {
  $pagelarge=10;//每页行数；
  $pagecurrent=$_GET["pagecurrent"];
  if($rowscount%$pagelarge==0)
  {
		$pagecount=$rowscount/$pagelarge;
  }
  else
  {
   		$pagecount=intval($rowscount/$pagelarge)+1;
  }
  if($pagecurrent=="" || $pagecurrent<=0)
{
	$pagecurrent=1;
}
 
if($pagecurrent>$pagecount)
{
	$pagecurrent=$pagecount;
}
		$ddddd=$pagecurrent*$pagelarge;
	if($pagecurrent==$pagecount)
	{
		if($rowscount%$pagelarge==0)
		{
		$ddddd=$pagecurrent*$pagelarge;
		}
		else
		{
		$ddddd=$pagecurrent*$pagelarge-$pagelarge+$rowscount%$pagelarge;
		}
	}

	for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$ddddd;$i++)
{
  ?>
  <tr>
    <td width="35"><?php
	echo $i+1;
?></td>
    <td><?php echo mysql_result($query,$i,gonghao);?></td><td><?php echo mysql_result($query,$i,xingming);?></td><td><?php echo mysql_result($query,$i,mima);?></td><td><?php echo mysql_result($query,$i,chushengnianyue);?></td><td><?php echo mysql_result($query,$i,shenfenzheng);?></td><td><?php echo mysql_result($query,$i,xingbie);?></td><td><?php echo mysql_result($query,$i,zhicheng);?></td><td><?php echo mysql_result($query,$i,zhujiaokecheng);?></td><td><?php echo mysql_result($query,$i,dianhua);?></td>
    <td width="120" align="center"><?php
echo mysql_result($query,$i,"addtime");
?></td>
  </tr>
  	<?php
	}
}
?>
</table>
<p>&nbsp; </p>

</body>
</html>

