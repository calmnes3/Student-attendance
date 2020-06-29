<?php
session_start();
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>考勤记录</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>已有考勤记录列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索:  课程名称：
  <input name="kechengmingcheng" type="text" id="kechengmingcheng" /> 任课教师：<input name="renkejiaoshi" type="text" id="renkejiaoshi" />
  状态：
  <select name='zhuangtai' id='zhuangtai' style='border:solid 1px #000000; color:#666666'>
    <option value="">所有</option>
	<option value="迟到">迟到</option>
    <option value="旷课">旷课</option>
    <option value="病假">病假</option>
    <option value="事假">事假</option>
    <option value="早退">早退</option>
  </select>
课堂表现：
<select name='ketangbiaoxian' id='ketangbiaoxian' style='border:solid 1px #000000; color:#666666'>
  <option value="">所有</option>
  <option value="优">优</option>
  <option value="良">良</option>
  <option value="差">差</option>
</select>
<input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666' />
</form>
<br/>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
  <tr>
    <td width="25" bgcolor="#ffffff">序号</td>
    <td bgcolor='#FFFFFF'>学号</td><td bgcolor='#FFFFFF'>姓名</td><td bgcolor='#FFFFFF'>所在班级</td><td bgcolor='#FFFFFF'>性别</td><td bgcolor='#FFFFFF'>课程名称</td><td bgcolor='#FFFFFF'>任课教师</td><td bgcolor='#FFFFFF'>上课时间</td><td bgcolor='#FFFFFF'>状态</td><td bgcolor='#FFFFFF'>课堂表现</td>
    <td width="120" align="center" bgcolor="#FFFFFF">添加时间</td>
  </tr>
  <?php 
    $sql="select * from kaoqinjilu where xuehao='".$_SESSION['username']."'";
  
if ($_POST["xingming"]!=""){$nreqxingming=$_POST["xingming"];$sql=$sql." and xingming like '%$nreqxingming%'";}
if ($_POST["suozaibanji"]!=""){$nreqsuozaibanji=$_POST["suozaibanji"];$sql=$sql." and suozaibanji like '%$nreqsuozaibanji%'";}
if ($_POST["xingbie"]!=""){$nreqxingbie=$_POST["xingbie"];$sql=$sql." and xingbie like '%$nreqxingbie%'";}
if ($_POST["kechengmingcheng"]!=""){$nreqkechengmingcheng=$_POST["kechengmingcheng"];$sql=$sql." and kechengmingcheng like '%$nreqkechengmingcheng%'";}
if ($_POST["renkejiaoshi"]!=""){$nreqrenkejiaoshi=$_POST["renkejiaoshi"];$sql=$sql." and renkejiaoshi like '%$nreqrenkejiaoshi%'";}
if ($_POST["shangkeshijian1"]!=""){$nreqshangkeshijian1=$_POST["shangkeshijian1"];$sql=$sql." and shangkeshijian >= '$nreqshangkeshijian1'";}
if ($_POST["shangkeshijian2"]!=""){$nreqshangkeshijian2=$_POST["shangkeshijian2"];$sql=$sql." and shangkeshijian <= '$nreqshangkeshijian2'";}
if ($_POST["zhuangtai"]!=""){$nreqzhuangtai=$_POST["zhuangtai"];$sql=$sql." and zhuangtai like '%$nreqzhuangtai%'";}
if ($_POST["ketangbiaoxian"]!=""){$nreqketangbiaoxian=$_POST["ketangbiaoxian"];$sql=$sql." and ketangbiaoxian like '%$nreqketangbiaoxian%'";}
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
    <td><?php echo mysql_result($query,$i,xuehao);?></td><td><?php echo mysql_result($query,$i,xingming);?></td><td><?php echo mysql_result($query,$i,suozaibanji);?></td><td><?php echo mysql_result($query,$i,xingbie);?></td><td><?php echo mysql_result($query,$i,kechengmingcheng);?></td><td><?php echo mysql_result($query,$i,renkejiaoshi);?></td><td><?php echo mysql_result($query,$i,shangkeshijian);?></td><td><?php echo mysql_result($query,$i,zhuangtai);?></td><td><?php echo mysql_result($query,$i,ketangbiaoxian);?></td>
    <td width="120" align="center"><?php
echo mysql_result($query,$i,"addtime");
?></td>
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
</p>
<p align="center"><a href="kaoqinjilu_list2.php?pagecurrent=1">首页</a>, <a href="kaoqinjilu_list2.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="kaoqinjilu_list2.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="kaoqinjilu_list2.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>

<p>&nbsp; </p>

</body>
</html>

