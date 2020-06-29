<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{

	$banji=$_POST["banji"];$renshu=$_POST["renshu"];$banzhuren=$_POST["banzhuren"];$yuanxiao=$_POST["yuanxiao"];$zhuanye=$_POST["zhuanye"];$beizhu=$_POST["beizhu"];
	$sql="update banjixinxi set banji='$banji',renshu='$renshu',banzhuren='$banzhuren',yuanxiao='$yuanxiao',zhuanye='$zhuanye',beizhu='$beizhu' where id= ".$id;
	mysql_query($sql);
	echo "<script>javascript:alert('修改成功!');location.href='banjixinxi_list.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>修改班级信息</title><link rel="stylesheet" href="css.css" type="text/css"><script language="javascript" src="js/Calendar.js"></script>
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
<p>修改班级信息： 当前日期： <?php echo $ndate; ?></p>
<?php
$sql="select * from banjixinxi where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">

      <tr><td>班级：</td><td><input name='banji' type='text' id='banji' value='<?php echo mysql_result($query,$i,banji);?>' /></td></tr><tr><td>人数：</td><td><input name='renshu' type='text' id='renshu' value='<?php echo mysql_result($query,$i,renshu);?>' /></td></tr><tr><td>班主任：</td><td><input name='banzhuren' type='text' id='banzhuren' value='<?php echo mysql_result($query,$i,banzhuren);?>' /></td></tr><tr><td>院校：</td>
        <td>
          <input name="yuanxiao" type="text" id="yuanxiao" /></td>
      </tr>
	  <script language="javascript">document.form1.yuanxiao.value='<?php echo mysql_result($query,$i,yuanxiao);?>';</script>
	  <tr><td>专业：</td>
	    <td><input name="zhuanye" type="text" id="zhuanye" />
        </td>
	  </tr><script language="javascript">document.form1.zhuanye.value='<?php echo mysql_result($query,$i,zhuanye);?>';</script><tr><td>备注：</td><td><textarea name='beizhu' cols='50' rows='8' id='beizhu'><?php echo mysql_result($query,$i,beizhu);?></textarea></td></tr>
   
   
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

