
<html>
<head>
<title>toolbar</title>
<meta charset="gb2312" content="text/html;" http-equiv="Content-Type"/>
<script language="javascript">
 
function switchSysBar()
{
     if (parent.document.getElementById('attachucp').cols=="185,8,*")
     {
        document.getElementById('leftbar').style.display="";
        parent.document.getElementById('attachucp').cols="0,8,*";
     }
    else
    {
        parent.document.getElementById('attachucp').cols="185,8,*";
        document.getElementById('leftbar').style.display="none"
    }
}
function load()
{
    if (parent.document.getElementById('attachucp').cols=="0,8,*")
    {
        document.getElementById('leftbar').style.display="";
    }
}


</script>
</head>
<body marginwidth="0" marginheight="0" bgcolor="#000000" onLoad="load()" topmargin="0" leftmargin="0">
<center>
<table height="100%" cellspacing="0" cellpadding="0" border="0" width="100%">
<tbody>
<tr>
<td bgcolor="#92b1d9" width="1">
<img height="1" width="1" src="swich_files/"/></td>
<td bgcolor="#000000" id="leftbar" style="display: none;">
<a onClick="switchSysBar()" href="javascript:void(0);">
<img height="90" border="0" width="7" alt="展开左侧菜单" src="images/pic24.gif"/></a></td>
<td bgcolor="#000000" id="rightbar">
<a onClick="switchSysBar()" href="javascript:void(0);">
<img height="90" border="0" width="7" alt="隐藏左侧菜单" src="images/pic23.gif"/></a></td>
</tr>
</tbody>
</table>
</center>
</body>
</html>
