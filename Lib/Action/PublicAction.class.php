<?php
session_start();
class PublicAction extends Action{
	public function verify(){
		import("ORG.Util.Image");
		ob_end_clean();
		Image::buildImageVerify();
	}
	/*
	public function _initialize(){
		if (!isset($_SESSION['username'])) {
            $this->error('对不起,您还没有登录!请先登录再进行浏览', U('User/index'), 1);
		}
	}
	*/	
}	
?>