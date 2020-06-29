<?php
session_start();
include_once 'conn.php';
?>
<SCRIPT LANGUAGE="JavaScript" SRC="js/treemenu.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="js/Common.js"></SCRIPT>


<link rel="stylesheet" href="css.css" type="text/css"><body>
<SCRIPT LANGUAGE='JavaScript'>
foldersTree = gFldr('<DIV CLASS=fldrroot><b>系统功能列表</b></DIV>','');



Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>违纪情况管理</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=xueshengxinxi_list4.php target=main>违纪情况添加</a>', '', 'images/editinfo.gif'));
insDoc(Class2, gLnk(1, '<a href=weijiqingkuang_list.php target=main>违纪情况查询</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>日常表现管理</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=xueshengxinxi_list5.php target=main>日常表现添加</a>', '', 'images/editinfo.gif'));
insDoc(Class2, gLnk(1, '<a href=richangbiaoxian_list.php target=main>日常表现查询</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>考勤查看</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=kaoqinjilu_list3.php target=main>考勤查看</a>', '', 'images/editinfo.gif'));

insDoc(foldersTree, gLnk(1, '<a href=mod.php target=main>修改密码</a>', '', 'images/pwd.GIF'));
insDoc(foldersTree, gLnk(1, '退出', 'logout.php', 'images/exit.GIF'));
initializeDocument(0);</SCRIPT>
