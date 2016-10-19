<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板</title>
</head>

<body>
<table width="562" border="0" align="center">
<tr>
    <td colspan="2" align="center">留言板</td>
</tr>
<tr>
	<table align="center">
		<tr>
		    <td ><a href="__URL__/index">浏览留言</a></td>
		    <td ><a href="__URL__/add">发布留言</a></td>
		    <td >用户：<?php echo ($nickname); ?></a></td>
		    <td ><a href="__APP__/User/logout"><?php echo ($status); ?></a></td>
		 </tr>
	</table>
</tr>
</table>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form action="__APP__/Index/modify" method="post">
<table width="562" border="1" align="center">
<tr>
    <td width="155" rowspan="7">图像预留</td>
    <!--
    <td width="88">留言人</td>
    <td width="297"><input type="text" name="name" id="name"/></td>
    -->
</tr>
<!--
<tr>
    <td>Email</td>
    <td><input type="text" name="email" /></td>
</tr>
-->
<tr>
    <td>评论编号</td>
    <td><input type="text" readonly="readonly" name="id" value="<?php echo ($vo["id"]); ?>"/></td>
</tr>
<tr>
    <td>留言主题(15字以内)</td>
    <td><input type="text" name="title" value="<?php echo ($vo["title"]); ?>"/></td>
</tr>
<tr>
    <td>QQ</td>
    <td><input type="text" name="qq" value="<?php echo ($vo["qq"]); ?>"></input></td>
</tr>
<tr>
    <td>留言内容(100字以内)</td>
    <td><textarea name="com" cols="40" rows="5" ><?php echo ($vo["com"]); ?></textarea></td>
</tr>
   <tr>
    <td>验证码</td>
    <td><input type="text" name="code" /><img src="__APP__/Public/verify" onclick="this.src=this.src+'?'+Math.random()"/></td>
</tr>

<tr>
    <td colspan="2" align="center"><input type="submit" value=" 修改 " />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value=" 重 置 " /></td>
    </tr>
</table>
</form><?php endforeach; endif; else: echo "" ;endif; ?>
<table width="562" border="1" align="center">
<tr>
    <td colspan="2" align="center">技术支持：黄鹭。版权所有：2016——&nbsp;Cloakok网络公司</td>
</tr>
</table>
</body>
</html>