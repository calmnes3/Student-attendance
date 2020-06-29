<?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>教师信息</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>已有教师信息列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索: 工号：<input name="gonghao" type="text" id="gonghao" /> 姓名：<input name="xingming" type="text" id="xingming" /> <!--性别：<select name='xingbie' id='xingbie'><option value="">所有</option><option value="男">男</option><option value="女">女</option></select> -->主教课程：<select name='zhujiaokecheng' id='zhujiaokecheng'><option value="">所有</option><?php getoption("kechengxinxi","kechengmingcheng")?></select></select>
  <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666' />
</form>
<br/>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
  <tr>
    <td width="25" bgcolor="#FFFFFF">序号</td>
    <td bgcolor='#FFFFFF'>工号</td><td bgcolor='#FFFFFF'>姓名</td><td bgcolor='#FFFFFF'>出生年月</td><td bgcolor='#FFFFFF'>身份证</td><td bgcolor='#FFFFFF'>性别</td><td bgcolor='#FFFFFF'>职称</td><td bgcolor='#FFFFFF'>主教课程</td><td bgcolor='#FFFFFF'>电话</td>
    <td width="120" align="center" bgcolor="#FFFFFF">添加时间</td>
    <td width="70" align="center" bgcolor="#FFFFFF">操作</td>
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
    <td><?php echo mysql_result($query,$i,gonghao);?></td><td><?php echo mysql_result($query,$i,xingming);?></td><td><?php echo mysql_result($query,$i,chushengnianyue);?></td><td><?php echo mysql_result($query,$i,shenfenzheng);?></td><td><?php echo mysql_result($query,$i,xingbie);?></td><td><?php echo mysql_result($query,$i,zhicheng);?></td><td><?php echo mysql_result($query,$i,zhujiaokecheng);?></td><td><?php echo mysql_result($query,$i,dianhua);?></td>
    <td width="120" align="center"><?php
echo mysql_result($query,$i,"addtime");
?></td>
    <td width="90" align="center"><a href="del.php?id=<?php echo mysql_result($query,$i,"id");?>&tablename=jiaoshixinxi" onclick="return confirm('真的要删除？')">删除</a> <a href="jiaoshixinxi_updt.php?id=<?php echo mysql_result($query,$i,"id");?>">修改</a> <a href="jiaoshixinxi_detail.php?id=<?php echo mysql_result($query,$i,"id");?>">详细</a></td>
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
  <input type="button" name="Submit22" onclick="javascript:location.href='jiaoshixinxi_listxls.php';" value="生成EXCEL" style='border:solid 1px #000000; color:#666666' />
</p>
<form id="form2" name="form2" method="post" action="">
  <div align="center"><a href="jiaoshixinxi_list.php?pagecurrent=1">首页</a>, <a href="jiaoshixinxi_list.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="jiaoshixinxi_list.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="jiaoshixinxi_list.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 跳转至
    <input name="pagecurrent" type="text" id="pagecurrent" size="3" />
页
<input type="submit" name="Submit3" value="跳转" />
  </div>
</form>
<p align="center">&nbsp;</p>

<p>&nbsp; </p>

</body>
</html>

