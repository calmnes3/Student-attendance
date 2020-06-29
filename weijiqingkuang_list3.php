<?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>违纪情况</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>已有违纪情况列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索: 学号：<input name="xuehao" type="text" id="xuehao" /> 姓名：<input name="xingming" type="text" id="xingming" /> 所在班级：<input name="suozaibanji" type="text" id="suozaibanji" /> 违纪时间：<input name="weijishijian1" type="text" id="weijishijian1"  value='' onclick="getDate(form1.weijishijian1,'2')" size="10" need="1" />-<input name="weijishijian2" type="text" id="weijishijian2"  value='' onclick="getDate(form1.weijishijian2,'2')" size="10" need="1" />
  <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666' />
</form>
<br/>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
  <tr>
    <td width="25" bgcolor="#ffffff">序号</td>
    <td bgcolor='#FFFFFF'>学号</td><td bgcolor='#FFFFFF'>姓名</td><td bgcolor='#FFFFFF'>所在班级</td><td bgcolor='#FFFFFF'>违纪时间</td><td bgcolor='#FFFFFF'>违纪情况</td>
    <td width="120" align="center" bgcolor="#FFFFFF">添加时间</td>
  </tr>
  <?php 
    $sql="select * from weijiqingkuang where 1=1";
  
if ($_POST["xuehao"]!=""){$nreqxuehao=$_POST["xuehao"];$sql=$sql." and xuehao like '%$nreqxuehao%'";}
if ($_POST["xingming"]!=""){$nreqxingming=$_POST["xingming"];$sql=$sql." and xingming like '%$nreqxingming%'";}
if ($_POST["suozaibanji"]!=""){$nreqsuozaibanji=$_POST["suozaibanji"];$sql=$sql." and suozaibanji like '%$nreqsuozaibanji%'";}
if ($_POST["weijishijian1"]!=""){$nreqweijishijian1=$_POST["weijishijian1"];$sql=$sql." and weijishijian >= '$nreqweijishijian1'";}
if ($_POST["weijishijian2"]!=""){$nreqweijishijian2=$_POST["weijishijian2"];$sql=$sql." and weijishijian <= '$nreqweijishijian2'";}
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
    <td><?php echo mysql_result($query,$i,xuehao);?></td><td><?php echo mysql_result($query,$i,xingming);?></td><td><?php echo mysql_result($query,$i,suozaibanji);?></td><td><?php echo mysql_result($query,$i,weijishijian);?></td><td><?php echo mysql_result($query,$i,weijiqingkuang);?></td>
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
  <input type="button" name="Submit22" onclick="javascript:location.href='weijiqingkuang_listxls.php';" value="生成EXCEL" style='border:solid 1px #000000; color:#666666' />
</p>
<form id="form2" name="form2" method="post" action="">
  <div align="center"><a href="weijiqingkuang_list.php?pagecurrent=1">首页</a>, <a href="weijiqingkuang_list.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="weijiqingkuang_list.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="weijiqingkuang_list.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 跳转至
    <input name="pagecurrent" type="text" id="pagecurrent" size="3" />
页
<input type="submit" name="Submit3" value="跳转" />
  </div>
</form>
<p align="center">&nbsp;</p>

<p>&nbsp; </p>

</body>
</html>

