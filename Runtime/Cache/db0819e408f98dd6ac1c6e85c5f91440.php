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
<script language="javascript" type="text/javascript">
	function submitRankMethod()
	{
	   document.forms.f.submit();
	}
	function submitSearchText()
	{
	   document.forms.sform.submit();
	}
</script>
<table width="562" align="center" border="1">
	<tr>
		<td>
			<form id="f" action="__URL__/rank" method="get">
				<table>
					<tr>
						<td>
							按照
						</td>
						<td>
							<select name="sort" id="sort">
					  			<option value="id">评论时间</option>
							</select>
						</td>
						<td>
							<select name="rank" id="rank">
								<option value="asc">升序</option>
					  			<option value="desc">降序</option>
							</select>
						</td>
						<td>
							<input type="button" onclick="submitRankMethod()" value="排列">
						</td>
					</tr>
				</table>
			</form>
		</td>
		<td>
			<form id="sform" action="__URL__/search" method="get">
				<table>
					<tr>
						<td>
							<select name="sType" id="sType">
						  			<option value="title">主题</option>
						  			<option value="qq">QQ</option>
						  			<option value="com">评论</option>
						  			<option value="nickname">昵称</option>
							</select>
						</td>
						<td>
							<input type="text" name="sText" />
						</td>
						<td>
								<input type="button" onclick="submitSearchText()" value="搜索">
						</td>
					</tr>
				</table>
			</form>
		</td>
	</tr>
</table>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table width="562" 	 border="1" align="center">
	<tr>
	    <td width="100" rowspan="1">	
		    <table>
			    <tr>
			    	#<?php echo ($vo["id"]); ?>
			    </tr>
			    <tr>
				    <td><button onclick="location.href='__URL__/edit/id/<?php echo ($vo["id"]); ?>'" type="button">修改</button></td>
				    <td><button onclick="location.href='__URL__/delete/id/<?php echo ($vo["id"]); ?>'" type="button">删除</button></td>
			    </tr>
		    </table>
	    </td>
	    <td width="250" height="36">主题：<?php echo ($vo["title"]); ?></td>
	    <td width="100" height="36">昵称：<?php echo ($vo["nickname"]); ?></td>
	    <td width="125">QQ：<?php echo ($vo["qq"]); ?></td>
	</tr>
	<tr>
	    <td height="74" colspan="4">评论：<?php echo ($vo["com"]); ?>&nbsp;</td>
	</tr>
</table><?php endforeach; endif; else: echo "" ;endif; ?>
<table width="562" height="30" border="1" align="center">
<tr>
<td align="center"><?php echo ($page); ?></td>
</tr>
</table>
<table width="562" border="1" align="center">
<tr>
    <td colspan="2" align="center">技术支持：黄鹭。版权所有：2016——&nbsp;Cloakok网络公司</td>
</tr>
</table>

</body>
</html>