<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$xuehao=$_POST["xuehao"];$xingming=$_POST["xingming"];$suozaibanji=$_POST["suozaibanji"];$xingbie=$_POST["xingbie"];$kechengmingcheng=$_POST["kechengmingcheng"];$renkejiaoshi=$_POST["renkejiaoshi"];$shangkeshijian=$_POST["shangkeshijian"];$zhuangtai=$_POST["zhuangtai"];$ketangbiaoxian=$_POST["ketangbiaoxian"];
	//ischongfu("select id from kaoqinjilu where xuehao='".$xuehao."'");
	$sql="insert into kaoqinjilu(xuehao,xingming,suozaibanji,xingbie,kechengmingcheng,renkejiaoshi,shangkeshijian,zhuangtai,ketangbiaoxian) values('$xuehao','$xingming','$suozaibanji','$xingbie','$kechengmingcheng','$renkejiaoshi','$shangkeshijian','$zhuangtai','$ketangbiaoxian') ";
	mysql_query($sql);
	echo "<script>javascript:alert('添加成功!');location.href='kaoqinjilu_list.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
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
<p>添加考勤记录： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.xuehao.value==""){alert("请输入学号");document.form1.xuehao.focus();return false;}if(document.form1.xingming.value==""){alert("请输入姓名");document.form1.xingming.focus();return false;}
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
$xingbie=mysql_result($query,0,xingbie);

 }
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
	<tr><td>学号：</td><td><input name='xuehao' type='text' id='xuehao' style='border:solid 1px #000000; color:#666666' />
&nbsp;*</td></tr><script language="javascript">document.form1.xuehao.value='<?php echo $xuehao?>';</script><tr><td>姓名：</td><td><input name='xingming' type='text' id='xingming' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><script language="javascript">document.form1.xingming.value='<?php echo $xingming?>';</script><tr><td>所在班级：</td><td><input name='suozaibanji' type='text' id='suozaibanji' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><script language="javascript">document.form1.suozaibanji.value='<?php echo $suozaibanji?>';</script><tr><td>性别：</td><td><input name='xingbie' type='text' id='xingbie' value='' style='border:solid 1px #000000; color:#666666' /></td></tr><script language="javascript">document.form1.xingbie.value='<?php echo $xingbie?>';</script>
<tr><td>课程名称：</td><td><input name='kechengmingcheng' type='text' id='kechengmingcheng' value='<?php echo $_SESSION['kc'];?>' style='border:solid 1px #000000; color:#666666' /></td></tr><tr><td>任课教师：</td><td><input name='renkejiaoshi' type='text' id='renkejiaoshi' value='<?php echo $_SESSION['username'];?>' style='border:solid 1px #000000; color:#666666' /></td></tr><tr><td>上课时间：</td><td><input name='shangkeshijian' type='text' id='shangkeshijian' value='' onclick="getDate(form1.shangkeshijian,'2')" need="1" style='border:solid 1px #000000; color:#666666' /></td></tr><tr><td>状态：</td><td><select name='zhuangtai' id='zhuangtai' style='border:solid 1px #000000; color:#666666'>
  <option value="迟到">迟到</option>
  <option value="旷课">旷课</option>
  <option value="病假">病假</option>
  <option value="事假">事假</option>
  <option value="早退">早退</option>
</select></td></tr><tr><td>课堂表现：</td><td><select name='ketangbiaoxian' id='ketangbiaoxian' style='border:solid 1px #000000; color:#666666'>
  <option value="优">优</option>
  <option value="良">良</option>
  <option value="差">差</option>
</select></td></tr>

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

