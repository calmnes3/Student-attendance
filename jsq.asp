<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title> 
<script language="VBSCRIPT"> 
Function Show(m) 
If (Myform.Expression.Value = "" AND InStr(". + - * / ",m)) Then 
Myform.Expression.Value = "" 
ElseIf (InStr("+ - * / . ",Right(Myform.Expression.Value,1)) And InStr("+ - * / ",m)) Then 
ElseIf (m = ".") Then 
If (InStr("+ - * / . ",Right(Myform.Expression.Value,1))) Then 
ElseIf ((InstrRev(Myform.Expression.Value,".") > InstrRev(Myform.Expression.Value,"+")) And (InstrRev(Myform.Expression.Value,".") > InstrRev(Myform.Expression.Value,"-")) And (InstrRev(Myform.Expression.Value,".") > InstrRev(Myform.Expression.Value,"*")) And (InstrRev(Myform.Expression.Value,".") > InstrRev(Myform.Expression.Value,"/"))) Then 
Else 
Myform.Expression.Value = Myform.Expression.Value + m 
End If 
Else 
Myform.Expression.Value = Myform.Expression.Value + m 
END If

End Function

Function Sqrt() 
If (Myform.Expression.Value = "") Then 
Myform.Expression.Value = "" 
ElseIf (InStr(". + - * / ",Right(Myform.Expression.Value,1))) Then 
Else 
Myform.Expression.Value = Eval(Myform.Expression.Value)^2 
End If

End Function 
Function Result() 
If (Myform.Expression.Value = "") Then 
Myform.Expression.Value = "" 
ElseIf (InStr(". + - * / ",Right(Myform.Expression.Value,1))) Then 
Else 
Myform.Expression.Value = Eval(Myform.Expression.Value) 
End If 
End Function 
Function Clean() 
Myform.Expression.Value = "" 
End Function 
</script> 
<style type="text/css"> 
<!-- 
.style5 {font-size: 18px} 
--> 
</style> 
</head> 
<body bgcolor="#ffffee" text=#000000> 
<form name="myform" method="post" action=""> 
<div align="center"> 
<table bgcolor="#C0e0ff" width="214" height="245" border="4"> 
<tr> 
<th width="206" scope="col"><H2><font color="#0000A0"> 计算器 </font></H2></th> 
</tr> 
<tr> 
<th height="36" scope="col"><table width="200" border="1"> 
<tr> 
<td colspan="4"><div align="center"> 
<input name="expression" type="text" value="" size="28" maxlength="28" > 
</div></td> 
</tr> 
<tr> 
<td><div align="center"> 
<INPUT TYPE="button" id="seven" 
onClick="Show('7')" VALUE=" 7 "> 
</div></td> 
<td><div align="center"> 
<INPUT TYPE="button" VALUE=" 8 " 
onClick="Show('8')"> 
</div></td> 
<td><div align="center"> 
<INPUT TYPE="button" VALUE=" 9 " 
onClick="Show('9')"> 
</div></td> 
<td><div align="center"> 
<INPUT TYPE="button" VALUE=" / " 
onClick="Show('/')"> 
</div></td> 
</tr> 
<tr> 
<td><div align="center"> 
<INPUT TYPE="button" VALUE=" 4 " 
onClick="Show('4')"> 
</div></td> 
<td><div align="center"> 
<INPUT TYPE="button" VALUE=" 5 " 
onClick="Show('5')"> 
</div></td> 
<td><div align="center"> 
<INPUT TYPE="button" VALUE=" 6 " 
onClick="Show('6')"> 
</div></td> 
<td><div align="center"> 
<INPUT TYPE="button" VALUE=" * " 
onClick="Show('*')"> 
</div></td> 
</tr> 
<tr> 
<td><div align="center"> 
<INPUT TYPE="button" VALUE=" 1 " 
onClick="Show('1')"> 
</div></td> 
<td><div align="center"> 
<INPUT TYPE="button" VALUE=" 2 " 
onClick="Show('2')"> 
</div></td> 
<td><div align="center"> 
<INPUT TYPE="button" VALUE=" 3 " 
onClick="Show('3')"> 
</div></td> 
<td><div align="center"> 
<INPUT TYPE="button" VALUE=" - " 
onClick="Show('-')"> 
</div></td> 
</tr> 
<tr> 
<td><div align="center"> 
<INPUT TYPE="button" VALUE=" 0 " 
onClick="Show('0')"> 
</div></td> 
<td><div align="center"> 
<INPUT TYPE="button" VALUE=" . " 
onClick="Show('.')"> 
</div></td> 
<td><div align="center"> 
<input type="button" value="sqr" 
onClick="sqrt()"> 
</div></td> 
<td><div align="center"> 
<input type="button" value=" + " 
onClick="Show('+')"> 
</div></td> 
</tr> 
<tr> 
<td colspan="2"><div align="center"> 
<INPUT TYPE="button" VALUE=" AC " 
onClick="clean()"> 
</div></td> 
<td colspan="2"><div align="center"> 
<INPUT TYPE="button" VALUE=" = " 
onClick="result()"> 
</div></td> 
</tr> 
</table></th> 
</tr> 
</table> 
</body>
</html>
