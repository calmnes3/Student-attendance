<?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>班级信息</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>已有班级信息列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索: 班级：<input name="banji" type="text" id="banji" /> 班主任：<input name="banzhuren" type="text" id="banzhuren" /> 院校：
  <input name="yuanxiao" type="text" id="yuanxiao" />
  </select>
专业：
<input name="zhuanye" type="text" id="zhuanye" />
</select>
  <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666' />
</form>
<br/>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
  <tr>
    <td width="25" bgcolor="#FFFFFF">序号</td>
    <td bgcolor='#FFFFFF'>班级</td><td bgcolor='#FFFFFF'>人数</td><td bgcolor='#FFFFFF'>班主任</td><td bgcolor='#FFFFFF'>院校</td><td bgcolor='#FFFFFF'>专业</td><td bgcolor='#FFFFFF'>备注</td>
    <td width="120" align="center" bgcolor="#FFFFFF">添加时间</td>
    <td width="70" align="center" bgcolor="#FFFFFF">操作</td>
  </tr>
  <?php 
    $sql="select * from banjixinxi where 1=1";
  
if ($_POST["banji"]!=""){$nreqbanji=$_POST["banji"];$sql=$sql." and banji like '%$nreqbanji%'";}
if ($_POST["banzhuren"]!=""){$nreqbanzhuren=$_POST["banzhuren"];$sql=$sql." and banzhuren like '%$nreqbanzhuren%'";}
if ($_POST["yuanxiao"]!=""){$nreqyuanxiao=$_POST["yuanxiao"];$sql=$sql." and yuanxiao like '%$nreqyuanxiao%'";}
if ($_POST["zhuanye"]!=""){$nreqzhuanye=$_POST["zhuanye"];$sql=$sql." and zhuanye like '%$nreqzhuanye%'";}
  $sql=$sql." order by id desc";
  
$query=mysql_query($sql);
  $rowscount=mysql_num_rows($query);
  if($rowscount==0)
  {}
  else
  {
  $pagelarge=20;//每页行数；
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
    <td><?php echo mysql_result($query,$i,banji);?></td><td><?php echo mysql_result($query,$i,renshu);?></td><td><?php echo mysql_result($query,$i,banzhuren);?></td><td><?php echo mysql_result($query,$i,yuanxiao);?></td><td><?php echo mysql_result($query,$i,zhuanye);?></td><td><?php echo mysql_result($query,$i,beizhu);?></td>
    <td width="120" align="center"><?php
echo mysql_result($query,$i,"addtime");
?></td>
    <td width="70" align="center"><a href="del.php?id=<?php
		echo mysql_result($query,$i,"id");
	?>&tablename=banjixinxi" onclick="return confirm('真的要删除？')">删除</a> <a href="banjixinxi_updt.php?id=<?php
		echo mysql_result($query,$i,"id");
	?>">修改</a></td>
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
  <input type="button" name="Submit22" onclick="javascript:location.href='banjixinxi_listxls.php';" value="生成EXCEL" style='border:solid 1px #000000; color:#666666' />
</p>
<form id="form2" name="form2" method="post" action="">
  <div align="center"><a href="banjixinxi_list.php?pagecurrent=1">首页</a>, <a href="banjixinxi_list.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="banjixinxi_list.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="banjixinxi_list.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 跳转至
    <input name="pagecurrent" type="text" id="pagecurrent" size="3" />
页
<input type="submit" name="Submit3" value="跳转" />
  </div>
</form>
<p align="center">&nbsp;</p>

<p>&nbsp; </p>

</body>
</html>

