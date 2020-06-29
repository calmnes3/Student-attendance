<?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>学生信息</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>已有学生信息列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索: 学号：<input name="xuehao" type="text" id="xuehao" /> 姓名：<input name="xingming" type="text" id="xingming" /> 性别：<select name='xingbie' id='xingbie'><option value="">所有</option><option value="男">男</option><option value="女">女</option></select>  
  所在班级：
  <select name='suozaibanji' id='suozaibanji'><option value="">所有</option><?php getoption("banjixinxi","banji")?></select></select>
  <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666' />
</form>
<br/>
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
<p>以上数据共<?php
		echo $rowscount;
	?>条,
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" style='border:solid 1px #000000; color:#666666' />
  <input type="button" name="Submit22" onclick="javascript:location.href='xueshengxinxi_list3xls.php';" value="生成EXCEL" style='border:solid 1px #000000; color:#666666' />
</p>
<p align="center"><a href="xueshengxinxi_list3.php?pagecurrent=1">首页</a>, <a href="xueshengxinxi_list3.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="xueshengxinxi_list3.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="xueshengxinxi_list3.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>

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
