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
$sql="select * from xueshengxinxi where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>

<table width="70%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
      <tr>
	  <td width='18%' height=25>学号：</td>
	  <td width='32%' height="25"><?php echo mysql_result($query,0,xuehao);?></td>
	  <!--<td width="50%"  rowspan=9 align=center><a href=<?php echo mysql_result($query,0,gerenzhaopian);?> target=_blank></a><a href="<?php echo mysql_result($query,0,gerenzhaopian);?>" target="_blank"><img src="<?php echo mysql_result($query,0,gerenzhaopian);?>" width="228" height="215" border="0" /></a></td>-->
      </tr>
    <tr>
        <td width='18%' height=25>姓名：</td>
	  <td width='32%' height="25"><?php echo mysql_result($query,0,xingming);?></td>
	  </tr>
    <tr>
        <td width='18%' height=25>性别：</td>
	  <td width='32%' height="25"><?php echo mysql_result($query,0,xingbie);?></td>
	  </tr>
    <tr>
        <td width='18%' height=25>民族：</td>
	  <td width='32%' height="25"><?php echo mysql_result($query,0,minzu);?></td>
	  </tr>
    <tr>
        <td width='18%' height=25>政治面貌：</td>
	  <td width='32%' height="25"><?php echo mysql_result($query,0,zhengzhimianmao);?></td>
	  </tr>
    <tr>
        <td width='18%' height=25>类别：</td>
	  <td width='32%' height="25"><?php echo mysql_result($query,0,leibie);?></td>
	  </tr>
    <tr>
        <td width='18%' height=25>所在班级：</td>
	  <td width='32%' height="25"><?php echo mysql_result($query,0,suozaibanji);?></td>
	  </tr>
    <tr>
        <td width='18%' height=25>联系方式：</td>
	  <td width='32%' height="25"><?php echo mysql_result($query,0,lianxifangshi);?></td>
	  </tr>
	  <tr>
	    <td height=25>密码：</td>
	    <td height="25"><?php echo mysql_result($query,0,mima);?></td>
  </tr>
	  <tr><td width='18%' height=25>身份证号码：</td>
	  <td height="25" width="18%"><?php echo mysql_result($query,0,shenfenzhenghaoma);?></td>
	  </tr>
    <tr>
        <td width='18%' height=25>家庭详细住址：</td>
	  <td height="25" width="18%"><?php echo mysql_result($query,0,jiatingxiangxizhuzhi);?></td>
	  </tr>
    <tr>
        <td width='18%' height=25>父亲姓名：</td>
	  <td width='18%' height="25"><?php echo mysql_result($query,0,fuqinxingming);?></td>
    </tr>
    <tr>
        <td width="18%" align=left>父亲联系电话：</td>
          <td height="25" width="18%"><?php echo mysql_result($query,0,fuqinlianxidianhua);?></td>
      </tr>
    <tr>
        <td width='18%' height=25>父亲工作单位：</td>
	  <td height="25" width="18%"><?php echo mysql_result($query,0,fuqingongzuodanwei);?></td>
	  </tr>
    <tr>
        <td width='18%' height=25>家庭联系电话：</td>
	  <td width='18%' height="25"><?php echo mysql_result($query,0,jiatinglianxidianhua);?></td>
    </tr>
    <tr>
      <td width="18%" align=left>母亲姓名：</td>
       <td width='18%' height="25"><?php echo mysql_result($query,0,muqinxingming);?></td>
      </tr>
    <tr>
        <td width='18%' height=25>母亲工作单位：</td>
	  <td height="25" width="18%"><?php echo mysql_result($query,0,muqingongzuodanwei);?></td>
	  </tr>
    <tr>
        <td width='18%' height=25>母亲联系电话：</td>
	  <td width='18%' height="25"><?php echo mysql_result($query,0,muqinlianxidianhua);?></td>
	  </td>
      </tr>
    <tr>
        <td colspan=3 align=center><input type=button name=Submit5 value="返回" onClick="javascript:history.back()" style='border:solid 1px #000000; color:#666666'  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="button" name="Submit52" value="打印" onclick="javascript:window.print();" style='border:solid 1px #000000; color:#666666'></td>
    </tr>
</table>

<?php
	}
?>
<p>&nbsp;</p>
</body>
</html>

