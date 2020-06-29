<?php 
include_once 'conn.php';
header("Content-Type: application/vnd.ms-execl");   
header("Content-Disposition: attachment; filename=日常信息.xls");   
header("Pragma: no-cache");   
header("Expires: 0"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>日常表现</title>
</head>

<body>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
  <tr>
    <td width="25" bgcolor="#FFFFFF">序号</td>
    <td bgcolor='#FFFFFF'>学号</td><td bgcolor='#FFFFFF'>姓名</td><td bgcolor='#FFFFFF'>所在班级</td><td bgcolor='#FFFFFF'>获得时间</td><td bgcolor='#FFFFFF'>参加活动类型</td><td bgcolor='#FFFFFF'>外语等级</td><td bgcolor='#FFFFFF'>个人荣誉</td><td bgcolor='#FFFFFF'>突出贡献</td>
    <td width="120" align="center" bgcolor="#FFFFFF">添加时间</td>
  </tr>
  <?php 
    $sql="select * from richangbiaoxian where 1=1";
  
if ($_POST["xuehao"]!=""){$nreqxuehao=$_POST["xuehao"];$sql=$sql." and xuehao like '%$nreqxuehao%'";}
if ($_POST["xingming"]!=""){$nreqxingming=$_POST["xingming"];$sql=$sql." and xingming like '%$nreqxingming%'";}
if ($_POST["suozaibanji"]!=""){$nreqsuozaibanji=$_POST["suozaibanji"];$sql=$sql." and suozaibanji like '%$nreqsuozaibanji%'";}
if ($_POST["huodeshijian1"]!=""){$nreqhuodeshijian1=$_POST["huodeshijian1"];$sql=$sql." and huodeshijian >= '$nreqhuodeshijian1'";}
if ($_POST["huodeshijian2"]!=""){$nreqhuodeshijian2=$_POST["huodeshijian2"];$sql=$sql." and huodeshijian <= '$nreqhuodeshijian2'";}
if ($_POST["canjiahuodongleixing"]!=""){$nreqcanjiahuodongleixing=$_POST["canjiahuodongleixing"];$sql=$sql." and canjiahuodongleixing like '%$nreqcanjiahuodongleixing%'";}
if ($_POST["waiyudengji"]!=""){$nreqwaiyudengji=$_POST["waiyudengji"];$sql=$sql." and waiyudengji like '%$nreqwaiyudengji%'";}
if ($_POST["tuchugongxian"]!=""){$nreqtuchugongxian=$_POST["tuchugongxian"];$sql=$sql." and tuchugongxian like '%$nreqtuchugongxian%'";}
  $sql=$sql." order by id desc";
  
$query=mysql_query($sql);
  $rowscount=mysql_num_rows($query);
  if($rowscount==0)
  {}
  else
  {
  $pagelarge=10;//每页行数；
  $pagecurrent=$_GET["pagecurrent"];
    if($pagecurrent==""){$pagecurrent=$_POST["pagecurrent"];}

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
    <td width="25"><?php
	echo $i+1;
?></td>
    <td><?php echo mysql_result($query,$i,xuehao);?></td><td><?php echo mysql_result($query,$i,xingming);?></td><td><?php echo mysql_result($query,$i,suozaibanji);?></td><td><?php echo mysql_result($query,$i,huodeshijian);?></td><td><?php echo mysql_result($query,$i,canjiahuodongleixing);?></td><td><?php echo mysql_result($query,$i,waiyudengji);?></td><td><?php echo mysql_result($query,$i,gerenrongyu);?></td><td><?php echo mysql_result($query,$i,tuchugongxian);?></td>
    <td width="120" align="center"><?php
echo mysql_result($query,$i,"addtime");
?></td>
  </tr>
  	<?php
	}
}
?>
</table>
</body>
</html>

