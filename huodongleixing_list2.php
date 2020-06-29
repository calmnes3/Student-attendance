<?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>活动类型</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>已有活动类型列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索: 类型：<input name="leixing" type="text" id="leixing" />
        地点：<input name="didian" type="text" id="didian" />
    &nbsp;
  <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666' />
</form>
<br/>
<table width="100%" border="1" align="center" cellpadding="4" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
  <tr>
    <td width="25" bgcolor="#FFFFFF">序号</td>
    <td bgcolor='#FFFFFF'>类型</td>
    <td width="240" bgcolor="#ffffff">地点及时间</td>
    <td width="120" align="center" bgcolor="#FFFFFF">添加时间</td>
  </tr>
  <?php 
    $sql="select * from huodongleixing where 1=1";
  
if ($_POST["leixing"]!=""){$nreqleixing=$_POST["leixing"];$sql=$sql." and leixing like '%$nreqleixing%'";}
if ($_POST["didian"]!=""){$nreqdidian=$_POST["didian"];$sql=$sql." and didian like '%$nreqdidian%'";}

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
    <td><?php echo mysql_result($query,$i,leixing);?></td>
    <td><?php echo mysql_result($query,$i,didian);?></td>
    <td width="120" align="center"><?php
        echo mysql_result($query,$i,"addtime");
        ?></td>
   <!-- <td width="70" align="center"><a href="del.php?id=<?php
/*        echo mysql_result($query,$i,"id");
        */?>&tablename=huodongleixing" onclick="return confirm('真的要删除？')">删除</a> <a href="huodongleixing_updt.php?id=<?php
/*        echo mysql_result($query,$i,"id");
        */?>">修改</a></td>
    </tr>-->
    <?php
    }
}
?>
</table>
<p>以上数据共<?php
		echo $rowscount;
	?>条,
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" style='border:solid 1px #000000; color:#666666' />
  <input type="button" name="Submit22" onclick="javascript:location.href='huodongleixing_listxls.php';" value="生成EXCEL" style='border:solid 1px #000000; color:#666666' />
</p>
<form id="form2" name="form2" method="post" action="">
  <div align="center"><a href="huodongleixing_list.php?pagecurrent=1">首页</a>, <a href="huodongleixing_list.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="huodongleixing_list.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="huodongleixing_list.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 跳转至
    <input name="pagecurrent" type="text" id="pagecurrent" size="3" />
页
<input type="submit" name="Submit3" value="跳转" />
  </div>
</form>
<p align="center">&nbsp;</p>

</body>
</html>

