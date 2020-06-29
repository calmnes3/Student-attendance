<?php
session_start();
include_once 'conn.php';
?>
<SCRIPT LANGUAGE="JavaScript" SRC="js/treemenu.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="js/Common.js"></SCRIPT>


<link rel="stylesheet" href="css.css" type="text/css"><body>
<SCRIPT LANGUAGE='JavaScript'>
foldersTree = gFldr('<DIV CLASS=fldrroot><b>系统功能列表</b></DIV>','');



Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>学生信息管理</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=xueshengxinxi_add.php target=main>学生信息添加</a>', '', 'images/editinfo.gif'));
insDoc(Class2, gLnk(1, '<a href=xueshengxinxi_list6.php target=main>学生信息查询</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>考勤查看</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=kaoqinjilu_list4.php target=main>考勤查看</a>', '', 'images/editinfo.gif'));

insDoc(foldersTree, gLnk(1, '<a href=mod.php target=main>修改密码</a>', '', 'images/pwd.GIF'));
insDoc(foldersTree, gLnk(1, '退出', 'logout.php', 'images/exit.GIF'));
initializeDocument(0);</SCRIPT>
