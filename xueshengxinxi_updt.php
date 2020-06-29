<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{

	$xuehao=$_POST["xuehao"];$xingming=$_POST["xingming"];$xingbie=$_POST["xingbie"];
	$minzu=$_POST["minzu"];$zhengzhimianmao=$_POST["zhengzhimianmao"];$leibie=$_POST["leibie"];
	$suozaibanji=$_POST["suozaibanji"];$lianxifangshi=$_POST["lianxifangshi"];$shenfenzhenghaoma=$_POST["shenfenzhenghaoma"];
	$jiatingxiangxizhuzhi=$_POST["jiatingxiangxizhuzhi"];$fuqinxingming=$_POST["fuqinxingming"];
	$fuqingongzuodanwei=$_POST["fuqingongzuodanwei"];$fuqinlianxidianhua=$_POST["fuqinlianxidianhua"];$jiatinglianxidianhua=$_POST["jiatinglianxidianhua"];
	$muqinxingming=$_POST["muqinxingming"];$muqingongzuodanwei=$_POST["muqingongzuodanwei"];$muqinlianxidianhua=$_POST["muqinlianxidianhua"];
	$mima=$_POST["mima"];
	if ($mima=="")
	{
		$sql="update xueshengxinxi set xuehao='$xuehao',xingming='$xingming',xingbie='$xingbie',minzu='$minzu',zhengzhimianmao='$zhengzhimianmao',leibie='$leibie',suozaibanji='$suozaibanji',lianxifangshi='$lianxifangshi',shenfenzhenghaoma='$shenfenzhenghaoma',jiatingxiangxizhuzhi='$jiatingxiangxizhuzhi',fuqinxingming='$fuqinxingming',fuqingongzuodanwei='$fuqingongzuodanwei',fuqinlianxidianhua='$fuqinlianxidianhua',jiatinglianxidianhua='$jiatinglianxidianhua',muqinxingming='$muqinxingming',muqingongzuodanwei='$muqingongzuodanwei',muqinlianxidianhua='$muqinlianxidianhua' where id= ".$id;
	}
	else
	{
		$mima=md5($mima);
		$sql="update xueshengxinxi set xuehao='$xuehao',xingming='$xingming',xingbie='$xingbie',minzu='$minzu',zhengzhimianmao='$zhengzhimianmao',leibie='$leibie',suozaibanji='$suozaibanji',lianxifangshi='$lianxifangshi',shenfenzhenghaoma='$shenfenzhenghaoma',jiatingxiangxizhuzhi='$jiatingxiangxizhuzhi',fuqinxingming='$fuqinxingming',fuqingongzuodanwei='$fuqingongzuodanwei',fuqinlianxidianhua='$fuqinlianxidianhua',jiatinglianxidianhua='$jiatinglianxidianhua',muqinxingming='$muqinxingming',muqingongzuodanwei='$muqingongzuodanwei',muqinlianxidianhua='$muqinlianxidianhua',mima='$mima' where id= ".$id;

	}
	
	
	mysql_query($sql);
	echo "<script>javascript:alert('修改成功!');location.href='xueshengxinxi_list.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>修改学生信息</title><link rel="stylesheet" href="css.css" type="text/css"><script language="javascript" src="js/Calendar.js"></script>
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
<p>修改学生信息： 当前日期： <?php echo $ndate; ?></p>
<?php
$sql="select * from xueshengxinxi where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#000000" style="border-collapse:collapse">

      <tr><td>学号：</td><td><input name='xuehao' type='text' id='xuehao' value='<?php echo mysql_result($query,$i,xuehao);?>' /></td></tr><tr><td>姓名：</td><td><input name='xingming' type='text' id='xingming' value='<?php echo mysql_result($query,$i,xingming);?>' /></td></tr><tr><td>性别：</td><td><select name='xingbie' id='xingbie'><option value="男">男</option><option value="女">女</option></select></td></tr><script language="javascript">document.form1.xingbie.value='<?php echo mysql_result($query,$i,xingbie);?>';</script><tr><td>民族：</td><td><select name='minzu' id='minzu' style='border:solid 1px #000000; color:#666666'>
        <option value="汉族">汉族</option>
        <option value="苗族">苗族</option>
      </select></td></tr><script language="javascript">document.form1.minzu.value='<?php echo mysql_result($query,$i,minzu);?>';</script><tr><td>政治面貌：</td><td><select name='zhengzhimianmao' id='zhengzhimianmao' style='border:solid 1px #000000; color:#666666'>
        <option value="党员">党员</option>
        <option value="团员">团员</option>
        <option value="群众">群众</option>
      </select></td></tr><script language="javascript">document.form1.zhengzhimianmao.value='<?php echo mysql_result($query,$i,zhengzhimianmao);?>';</script><tr><td>类别：</td><td><select name='leibie' id='leibie' style='border:solid 1px #000000; color:#666666'>
        <option value="学生干部">学生干部</option>
        <option value="积极分子">积极分子</option>
        <option value="学干且积极分子">学干且积极分子</option>
      </select></td></tr><script language="javascript">document.form1.leibie.value='<?php echo mysql_result($query,$i,leibie);?>';</script><tr><td>所在班级：</td><td><select name='suozaibanji' id='suozaibanji'><?php getoption("banjixinxi","banji")?></select></select></td></tr><script language="javascript">document.form1.suozaibanji.value='<?php echo mysql_result($query,$i,suozaibanji);?>';</script><tr><td>联系方式：</td><td><input name='lianxifangshi' type='text' id='lianxifangshi' value='<?php echo mysql_result($query,$i,lianxifangshi);?>' /></td></tr><tr><td>身份证号码：</td><td><input name='shenfenzhenghaoma' type='text' id='shenfenzhenghaoma' size='50' value='<?php echo mysql_result($query,$i,shenfenzhenghaoma);?>' /></td></tr><tr><td>家庭详细住址：</td><td><input name='jiatingxiangxizhuzhi' type='text' id='jiatingxiangxizhuzhi' size='50' value='<?php echo mysql_result($query,$i,jiatingxiangxizhuzhi);?>' /></td></tr><!--<tr><td>个人照片：</td><td><input name='gerenzhaopian' type='text' id='gerenzhaopian' size='50'  value='<?php /*echo mysql_result($query,$i,gerenzhaopian);*/?>' /> &nbsp;<a href="javaScript:OpenScript('upfile.php?Result=gerenzhaopian',460,180)"><img src="Images/Upload.gif" width="30" height="16" border="0" align="absmiddle" /></a></td></tr>--><tr><td>父亲姓名：</td><td><input name='fuqinxingming' type='text' id='fuqinxingming' value='<?php echo mysql_result($query,$i,fuqinxingming);?>' /></td></tr><tr><td>父亲工作单位：</td><td><input name='fuqingongzuodanwei' type='text' id='fuqingongzuodanwei' size='50' value='<?php echo mysql_result($query,$i,fuqingongzuodanwei);?>' /></td></tr><tr><td>父亲联系电话：</td><td><input name='fuqinlianxidianhua' type='text' id='fuqinlianxidianhua' value='<?php echo mysql_result($query,$i,fuqinlianxidianhua);?>' /></td></tr><tr><td>家庭联系电话：</td><td><input name='jiatinglianxidianhua' type='text' id='jiatinglianxidianhua' value='<?php echo mysql_result($query,$i,jiatinglianxidianhua);?>' /></td></tr><tr><td>母亲姓名：</td><td><input name='muqinxingming' type='text' id='muqinxingming' value='<?php echo mysql_result($query,$i,muqinxingming);?>' /></td></tr><tr><td>母亲工作单位：</td><td><input name='muqingongzuodanwei' type='text' id='muqingongzuodanwei' size='50' value='<?php echo mysql_result($query,$i,muqingongzuodanwei);?>' /></td></tr><tr><td>母亲联系电话：</td><td><input name='muqinlianxidianhua' type='text' id='muqinlianxidianhua' value='<?php echo mysql_result($query,$i,muqinlianxidianhua);?>' /></td></tr><tr><td>密码：</td><td><input name='mima' type='text' id='mima' />
      不改则空之即可</td>
      </tr>
   
   
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

