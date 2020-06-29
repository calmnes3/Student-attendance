<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{

	$xuehao=$_POST["xuehao"];$xingming=$_POST["xingming"];$suozaibanji=$_POST["suozaibanji"];$weijishijian=$_POST["weijishijian"];$weijiqingkuang=$_POST["weijiqingkuang"];
	$sql="update weijiqingkuang set xuehao='$xuehao',xingming='$xingming',suozaibanji='$suozaibanji',weijishijian='$weijishijian',weijiqingkuang='$weijiqingkuang' where id= ".$id;
	mysql_query($sql);
	echo "<script>javascript:alert('修改成功!');location.href='weijiqingkuang_list.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>修改违纪情况</title><link rel="stylesheet" href="css.css" type="text/css"><script language="javascript" src="js/Calendar.js"></script>
</head>
<script language="javascript">
	
	
	function OpenScript(url,width,height)
{
  var win = window.open(url,"SelectToSort",'width=' + width + ',height=' + height + ',resizable=1,scrollbars=yes,menubar=no,status=yes' );
}
	function OpenDialog(sURL, iWidth, iHeight)
{
   var oDialog = window.open(sURL, "_EditorDialog", "width=" + iWidth.toString() + ",height=" + iHeight.toString() + ",resizable=no,left=0,top=0,scrollbars=no,status=no,titlebar=no,toolbar=no,menubar=no,location=no");
   oDialog.focus();
}
</script>
<body>
<p>修改违纪情况： 当前日期： <?php echo $ndate; ?></p>
<?php
$sql="select * from weijiqingkuang where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 

      <tr><td>学号：</td><td><input name='xuehao' type='text' id='xuehao' value='<?php echo mysql_result($query,$i,xuehao);?>' /></td></tr><tr><td>姓名：</td><td><input name='xingming' type='text' id='xingming' value='<?php echo mysql_result($query,$i,xingming);?>' /></td></tr><tr><td>所在班级：</td><td><input name='suozaibanji' type='text' id='suozaibanji' value='<?php echo mysql_result($query,$i,suozaibanji);?>' /></td></tr><tr><td>违纪时间：</td><td><input name='weijishijian' type='text' id='weijishijian' value='<?php echo mysql_result($query,$i,weijishijian);?>' onclick="getDate(form1.weijishijian,'2')" need="1" /></td></tr><tr><td>违纪情况：</td><td><textarea name='weijiqingkuang' cols='50' rows='8' id='weijiqingkuang'><?php echo mysql_result($query,$i,weijiqingkuang);?></textarea></td></tr>
   
   
    <tr>
      <td>&nbsp;</td>
      <td><input name="addnew" type="hidden" id="addnew" value="1" />
      <input type="submit" name="Submit" value="修改" style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>
<?php
	}
?>
<p>&nbsp;</p>
</body>
</html>

