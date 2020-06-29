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
insDoc(Class1, gLnk(1, '<a href=xueshengxinxi_updt2.php target=main>个人资料管理</a>', '', 'images/editinfo.gif'));
Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>考勤记录查看</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=kaoqinjilu_list2.php target=main>考勤记录查看</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>学校活动查看</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=huodongleixing_list2.php target=main>学校活动查看</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>个人违纪查看</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=weijiqingkuang_list2.php target=main>个人违纪查看</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>日常表现查看</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=richangbiaoxian_list2.php target=main>日常表现查看</a>', '', 'images/editinfo.gif'));

Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>关于学校</DIV>', ''));
insDoc(Class2, gLnk(1, '<a href=https://baike.baidu.com/item/%E9%83%91%E5%B7%9E%E7%A7%91%E6%8A%80%E5%AD%A6%E9%99%A2/3275625?fr=aladdin target=main>学校百科</a>', '', 'images/editinfo.gif'));

insDoc(foldersTree, gLnk(1, '退出', 'logout.php', 'images/exit.GIF'));
initializeDocument(0);</SCRIPT>
