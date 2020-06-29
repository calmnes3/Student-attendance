 <?php
session_start();
include_once 'conn.php';
?>
<SCRIPT LANGUAGE="JavaScript" SRC="js/treemenu.js"></SCRIPT>
<SCRIPT LANGUAGE="JavaScript" SRC="js/Common.js"></SCRIPT>


<link rel="stylesheet" href="css.css" type="text/css"><body>
<SCRIPT LANGUAGE='JavaScript'>
    foldersTree = gFldr('<DIV CLASS=fldrroot><b>系统功能列表</b></DIV>','');

    Class1 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>管理员帐号管理</DIV>', ''));
    insDoc(Class1, gLnk(1, '<a href=yhzhgl.php target=main>管理员帐号管理</a>', '', 'images/editinfo.gif'));
    Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>班级信息管理</DIV>', ''));
    insDoc(Class2, gLnk(1, '<a href=banjixinxi_add.php target=main>添加班级信息</a>', '', 'images/editinfo.gif'));
    insDoc(Class2, gLnk(1, '<a href=banjixinxi_list.php target=main>管理班级信息</a>', '', 'images/editinfo.gif'));
    Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>学生信息管理</DIV>', ''));
    insDoc(Class2, gLnk(1, '<a href=xueshengxinxi_add.php target=main>添加学生信息</a>', '', 'images/editinfo.gif'));
    insDoc(Class2, gLnk(1, '<a href=xueshengxinxi_list.php target=main>管理学生信息</a>', '', 'images/editinfo.gif'));
    Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>课程信息管理</DIV>', ''));
    insDoc(Class2, gLnk(1, '<a href=kechengxinxi_add.php target=main>课程信息添加</a>', '', 'images/editinfo.gif'));
    insDoc(Class2, gLnk(1, '<a href=kechengxinxi_list.php target=main>课程信息查询</a>', '', 'images/editinfo.gif'));
    Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>教师信息管理</DIV>', ''));
    insDoc(Class2, gLnk(1, '<a href=jiaoshixinxi_add.php target=main>教师信息添加</a>', '', 'images/editinfo.gif'));
    insDoc(Class2, gLnk(1, '<a href=jiaoshixinxi_list.php target=main>教师信息查询</a>', '', 'images/editinfo.gif'));
    Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>考勤记录管理</DIV>', ''));
    insDoc(Class2, gLnk(1, '<a href=kaoqinjilu_list.php target=main>考勤记录管理</a>', '', 'images/editinfo.gif'));
    insDoc(Class2, gLnk(1, '<a href=xueshengxinxi_list3.php target=main>考勤统计</a>', '', 'images/editinfo.gif'));

    Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>违纪情况管理</DIV>', ''));
    insDoc(Class2, gLnk(1, '<a href=xueshengxinxi_list4.php target=main>违纪情况添加</a>', '', 'images/editinfo.gif'));
    insDoc(Class2, gLnk(1, '<a href=weijiqingkuang_list.php target=main>违纪情况查询</a>', '', 'images/editinfo.gif'));

    Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>日常表现管理</DIV>', ''));
    insDoc(Class2, gLnk(1, '<a href=xueshengxinxi_list5.php target=main>日常表现添加</a>', '', 'images/editinfo.gif'));
    insDoc(Class2, gLnk(1, '<a href=richangbiaoxian_list.php target=main>日常表现查询</a>', '', 'images/editinfo.gif'));

    Class2 = insFldr(foldersTree, gFldr('<DIV CLASS=fldrroot>活动类型管理</DIV>', ''));
    insDoc(Class2, gLnk(1, '<a href=huodongleixing_add.php target=main>活动类型添加</a>', '', 'images/editinfo.gif'));
    insDoc(Class2, gLnk(1, '<a href=huodongleixing_list.php target=main>活动类型查询</a>', '', 'images/editinfo.gif'));

    insDoc(foldersTree, gLnk(1, '<a href=mod.php target=main>修改密码</a>', '', 'images/pwd.GIF'));
    insDoc(foldersTree, gLnk(1, '退出', 'logout.php', 'images/exit.GIF'));
    initializeDocument(0);</SCRIPT>
