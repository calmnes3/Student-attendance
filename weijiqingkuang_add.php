<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$xuehao=$_POST["xuehao"];$xingming=$_POST["xingming"];$suozaibanji=$_POST["suozaibanji"];$weijishijian=$_POST["weijishijian"];$weijiqingkuang=$_POST["weijiqingkuang"];
	//ischongfu("select id from weijiqingkuang where xuehao='".$xuehao."'");
	$sql="insert into weijiqingkuang(xuehao,xingming,suozaibanji,weijishijian,weijiqingkuang) values('$xuehao','$xingming','$suozaibanji','$weijishijian','$weijiqingkuang') ";
	mysql_query($sql);
	echo "<script>javascript:alert('添加成功!');location.href='weijiqingkuang_list.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>违纪情况</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
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
<p>添加违纪情况： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.xuehao.value==""){alert("请输入学号");document.form1.xuehao.focus();return false;}if(document.form1.xingming.value==""){alert("请输入姓名");document.form1.xingming.focus();return false;}if(document.form1.suozaibanji.value==""){alert("请输入所在班级");document.form1.suozaibanji.focus();return false;}if(document.form1.weijishijian.value==""){alert("请输入违纪时间");document.form1.weijishijian.focus();return false;}
}
	function gow()
	{
		location.href='peixunccccailiao_add.php?jihuabifffanhao='+document.form1.jihuabifffanhao.value;
	}
</script>
 <?php
 $sql="select * from xueshengxinxi where id=".$_GET["id"];
 $query=mysql_query($sql);
 $rowscount=mysql_num_rows($query);
 if($rowscount>0)
 {
 	$xuehao=mysql_result($query,0,xuehao);
$xingming=mysql_result($query,0,xingming);
$suozaibanji=mysql_result($query,0,suozaibanji);

 }
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
	<tr><td>学号：</td><td><input name='xuehao' type='text' id='xuehao' value='<?php echo $_SESSION['username'];?>' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><script language="javascript">document.form1.xuehao.value='<?php echo $xuehao?>';</script><tr><td>姓名：</td><td><input name='xingming' type='text' id='xingming' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><script language="javascript">document.form1.xingming.value='<?php echo $xingming?>';</script><tr><td>所在班级：</td><td><input name='suozaibanji' type='text' id='suozaibanji' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><script language="javascript">document.form1.suozaibanji.value='<?php echo $suozaibanji?>';</script><tr><td>违纪时间：</td><td><input name='weijishijian' type='text' id='weijishijian' value='' onclick="getDate(form1.weijishijian,'2')" need="1" style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><tr><td>违纪情况：</td><td><textarea name='weijiqingkuang' cols='50' rows='8' id='weijiqingkuang' style='border:solid 1px #000000; color:#666666'></textarea></td></tr>

    <tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="addnew" value="1" />
        <input type="submit" name="Submit" value="添加" onclick="return check();"  style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php
	function ischongfu($sql)
	{
		$query=mysql_query($sql);
 		$rowscount=mysql_num_rows($query);
		if($rowscount>0)
		{
			echo "<script>javascript:alert('对不起，该学号已经存在，请换其他学号!');history.back();</script>";
		}
		
	}
?>
</body>
</html>

