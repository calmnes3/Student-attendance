<?php 
$id=$_GET["id"];
include_once 'conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>内容详细</title><link rel="stylesheet" href="css.css" type="text/css">
</head>
<body>
<p>内容详细： 当前日期： <?php echo $ndate; ?></p>
					<?php
$sql="select * from jiaoshixinxi where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>

<table width="70%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
      <tr>
	  <td width='11%' height=44>工号：</td><td width='39%'><?php echo mysql_result($query,0,gonghao);?></td><!--<td  rowspan=8 align=center><a href=<?php /*echo mysql_result($query,0,zhaopian);*/?> target=_blank><img src=<?php /*echo mysql_result($query,0,zhaopian);*/?> width=228 height=215 border=0></a></td></tr>--><tr><td width='11%' height=44>姓名：</td><td width='39%'><?php echo mysql_result($query,0,xingming);?></td></tr><tr><td width='11%' height=44>出生年月：</td><td width='39%'><?php echo mysql_result($query,0,chushengnianyue);?></td></tr><tr><td width='11%' height=44>身份证：</td><td width='39%'><?php echo mysql_result($query,0,shenfenzheng);?></td></tr><tr><td width='11%' height=44>性别：</td><td width='39%'><?php echo mysql_result($query,0,xingbie);?></td></tr><tr><td width='11%' height=44>职称：</td><td width='39%'><?php echo mysql_result($query,0,zhicheng);?></td></tr><tr><td width='11%' height=44>主教课程：</td><td width='39%'><?php echo mysql_result($query,0,zhujiaokecheng);?></td></tr><tr><td width='11%' height=44>电话：</td><td width='39%'><?php echo mysql_result($query,0,dianhua);?></td></tr><tr><td width='11%' height=100  >备注：</td><td width='39%' colspan=2 height=100 ><?php echo mysql_result($query,0,beizhu);?></td></tr><tr><td colspan=3 align=center><input type=button name=Submit5 value=返回 onClick="javascript:history.back()" style='border:solid 1px #000000; color:#666666'  /></td></tr>
  </table>

<?php
	}
?>
<p>&nbsp;</p>
</body>
</html>

