<?php 
include_once 'conn.php';
header("Content-Type: application/vnd.ms-execl");   
header("Content-Disposition: attachment; filename=班级信息.xls");   
header("Pragma: no-cache");   
header("Expires: 0");  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>班级信息</title><script language="javascript" src="js/Calendar.js"></script>
</head>

<body>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
  <tr>
    <td width="30" bgcolor="#FFFFFF">序号</td>
    <td width="112" bgcolor='#FFFFFF'>班级</td><td width="117" bgcolor='#FFFFFF'>人数</td><td width="164" bgcolor='#FFFFFF'>班主任</td><td width="117" bgcolor='#FFFFFF'>院校</td><td width="117" bgcolor='#FFFFFF'>专业</td><td width="122" bgcolor='#FFFFFF'>备注</td>
    <td width="120" align="center" bgcolor="#FFFFFF">添加时间</td>
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
    <td width="30"><?php
	echo $i+1;
?></td>
    <td><?php echo mysql_result($query,$i,banji);?></td><td><?php echo mysql_result($query,$i,renshu);?></td><td><?php echo mysql_result($query,$i,banzhuren);?></td><td><?php echo mysql_result($query,$i,yuanxiao);?></td><td><?php echo mysql_result($query,$i,zhuanye);?></td><td><?php echo mysql_result($query,$i,beizhu);?></td>
    <td width="120" align="center"><?php
echo mysql_result($query,$i,"addtime");
?></td>
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

