<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$banji=$_POST["banji"];$renshu=$_POST["renshu"];$banzhuren=$_POST["banzhuren"];$yuanxiao=$_POST["yuanxiao"];$zhuanye=$_POST["zhuanye"];$beizhu=$_POST["beizhu"];
	//ischongfu("select id from banjixinxi where banji='".$banji."'");
	$sql="insert into banjixinxi(banji,renshu,banzhuren,yuanxiao,zhuanye,beizhu) values('$banji','$renshu','$banzhuren','$yuanxiao','$zhuanye','$beizhu') ";
	mysql_query($sql);
	echo "<script>javascript:alert('添加成功!');location.href='banjixinxi_add.php';</script>";
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
<p>添加班级信息： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.banji.value==""){alert("请输入班级");document.form1.banji.focus();return false;}if(document.form1.renshu.value==""){alert("请输入人数");document.form1.renshu.focus();return false;}if(document.form1.banzhuren.value==""){alert("请输入班主任");document.form1.banzhuren.focus();return false;}
}
	function gow()
	{
		location.href='peixunccccailiao_add.php?jihuabifffanhao='+document.form1.jihuabifffanhao.value;
	}
</script>
 <?php
//islbdq $sql="select * from melieibaoduqubiaoiguo where id=".$_GET["id"];
//islbdq $query=mysql_query($sql);
//islbdq $rowscount=mysql_num_rows($query);
//islbdq if($rowscount>0)
//islbdq {
//islbdq 	lelelelelele
//islbdq }
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">
	<tr><td>班级：</td><td><input name='banji' type='text' id='banji' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><tr><td>人数：</td><td><input name='renshu' type='text' id='renshu' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr><tr><td>班主任：</td>
	  <td><input name="banzhuren" type="text" id="banzhuren" />	    
	  &nbsp;*</td>
	</tr><tr><td>院校：</td>
	  <td><input name="yuanxiao" type="text" id="yuanxiao" /></td>
	</tr><tr><td>专业：</td>
	  <td><input name="zhuanye" type="text" id="zhuanye" /></td>
	</tr><tr><td>备注：</td><td><textarea name='beizhu' cols='50' rows='8' id='beizhu' style='border:solid 1px #000000; color:#666666'></textarea></td></tr>

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
			echo "<script>javascript:alert('对不起，该班级已经存在，请换其他班级!');history.back();</script>";
		}
		
	}
?>
</body>
</html>

