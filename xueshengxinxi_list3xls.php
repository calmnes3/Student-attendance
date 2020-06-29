<?php 
include_once 'conn.php';
header("Content-Type: application/vnd.ms-execl");   
header("Content-Disposition: attachment; filename=myExcel.xls");   
header("Pragma: no-cache");   
header("Expires: 0");  



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>学生信息</title>
</head>

<body>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
  <tr>
    <td width="25" bgcolor="#FFFFFF">序号</td>
    <td bgcolor='#FFFFFF'>学号</td><td bgcolor='#FFFFFF'>姓名</td><td bgcolor='#FFFFFF'>性别</td><td bgcolor='#FFFFFF'>所在班级</td>
    <td bgcolor='#FFFFFF'>旷课</td>
    <td bgcolor='#FFFFFF'>早退</td>
    <td bgcolor='#FFFFFF'>迟到</td>
    <td width="70" align="center" bgcolor="#FFFFFF">病假</td>
    <td width="70" align="center" bgcolor="#FFFFFF">事假</td>
  </tr>
  <?php 
    $sql="select * from xueshengxinxi where 1=1";
  
if ($_POST["xuehao"]!=""){$nreqxuehao=$_POST["xuehao"];$sql=$sql." and xuehao like '%$nreqxuehao%'";}
if ($_POST["xingming"]!=""){$nreqxingming=$_POST["xingming"];$sql=$sql." and xingming like '%$nreqxingming%'";}
if ($_POST["xingbie"]!=""){$nreqxingbie=$_POST["xingbie"];$sql=$sql." and xingbie like '%$nreqxingbie%'";}
if ($_POST["minzu"]!=""){$nreqminzu=$_POST["minzu"];$sql=$sql." and minzu like '%$nreqminzu%'";}
if ($_POST["zhengzhimianmao"]!=""){$nreqzhengzhimianmao=$_POST["zhengzhimianmao"];$sql=$sql." and zhengzhimianmao like '%$nreqzhengzhimianmao%'";}
if ($_POST["leibie"]!=""){$nreqleibie=$_POST["leibie"];$sql=$sql." and leibie like '%$nreqleibie%'";}
if ($_POST["suozaibanji"]!=""){$nreqsuozaibanji=$_POST["suozaibanji"];$sql=$sql." and suozaibanji like '%$nreqsuozaibanji%'";}
if ($_POST["lianxifangshi"]!=""){$nreqlianxifangshi=$_POST["lianxifangshi"];$sql=$sql." and lianxifangshi like '%$nreqlianxifangshi%'";}
if ($_POST["shenfenzhenghaoma"]!=""){$nreqshenfenzhenghaoma=$_POST["shenfenzhenghaoma"];$sql=$sql." and shenfenzhenghaoma like '%$nreqshenfenzhenghaoma%'";}
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
    <td width="25"><?php
	echo $i+1;
?></td>
    <td><?php echo mysql_result($query,$i,xuehao);?></td><td><?php echo mysql_result($query,$i,xingming);?></td><td><?php echo mysql_result($query,$i,xingbie);?></td><td><?php echo mysql_result($query,$i,suozaibanji);?></td><td><?php echo getkqcs(mysql_result($query,$i,xuehao),"旷课")?></td><td><?php echo getkqcs(mysql_result($query,$i,xuehao),"早退")?></td><td width='80'><?php echo getkqcs(mysql_result($query,$i,xuehao),"迟到")?></td>
    <td width="90" align="center"><?php echo getkqcs(mysql_result($query,$i,xuehao),"病假")?></td>
    <td width="90" align="center"><?php echo getkqcs(mysql_result($query,$i,xuehao),"事假")?></td>
  </tr>
  	<?php
	}
}
?>
</table>
<p>&nbsp;</p>
<p>&nbsp; </p>

</body>
</html>
<?php
function getkqcs($nxh,$nzt)
{
	$hsgsql="select count(id) as ss from kaoqinjilu where xuehao='".$nxh."' and zhuangtai='".$nzt."'";
$hsgquery=mysql_query($hsgsql);
  $hsgrowscount=mysql_num_rows($hsgquery);
  echo mysql_result($hsgquery,0,0);
}

?>
