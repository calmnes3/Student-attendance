<?php
session_start();
include_once 'conn.php';
?>
<SCRIPT LANGUAGE="JavaScript" SRC="js/treemenu.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="js/Common.js"></SCRIPT>


<link rel="stylesheet" href="css.css" type="text/css"><body>
<SCRIPT LANGUAGE='JavaScript'>
foldersTree = gFldr('<DIV CLASS=fldrroot><b>系统功能列表</b></DIV>','');

Class1 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>个人资料管理</DIV>', ''));
insDoc(Class1, gLnk(1, '<a href=jiaoshixinxi_updt2.php target=main>个人资料管理</a>', '', 'images/editinfo.gif'));
Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>学生考勤管理</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=xueshengxinxi_list2.php target=main>考勤记录添加</a>', '', 'images/editinfo.gif'));
insDoc(Class2, gLnk(1, '<a href=kaoqinjilu_list.php target=main>考勤记录查询</a>', '', 'images/editinfo.gif'));
insDoc(Class2, gLnk(1, '<a href=xueshengxinxi_list3.php target=main>考勤统计</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>违纪情况管理</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=xueshengxinxi_list4.php target=main>课堂违纪添加</a>', '', 'images/editinfo.gif'));
insDoc(Class2, gLnk(1, '<a href=weijiqingkuang_list.php target=main>违纪情况查询</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>课堂表现管理</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=xueshengxinxi_list5.php target=main>课堂表现添加</a>', '', 'images/editinfo.gif'));
insDoc(Class2, gLnk(1, '<a href=richangbiaoxian_list.php target=main>学生表现查询</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>活动类型管理</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=huodongleixing_add.php target=main>课程通知添加</a>', '', 'images/editinfo.gif'));
insDoc(Class2, gLnk(1, '<a href=huodongleixing_list.php target=main>通知查询</a>', '', 'images/editinfo.gif'));



insDoc(foldersTree, gLnk(1, '退出', 'logout.php', 'images/exit.GIF'));
initializeDocument(0);</SCRIPT>
