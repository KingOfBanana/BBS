<?php
	class InfoModel extends Model{
		protected $_validate = array(
			array('title', 'require', '标题尚未填写！'), 
		    array('qq', 'number', '请填写正确格式的QQ号！'), 
		    array('com', 'require', '评论尚未填写！'), 	
		    array('code', 'codeVerify', '验证码错误！', 1, 'callback'), 
		    array('title', '1,15', '标题长度不符！', 0,'length'),
		    array('title', '1,100', '评论长度不符！', 0,'length'),
		);

		public function codeVerify(){
			return $_SESSION['verify'] == md5($_POST['code']);
		}
		
	}
?>