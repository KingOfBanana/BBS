<?php
session_start();
class UserAction extends PublicAction{
	public function index(){
		$this->display();
	}
	public function login(){
		if(isset($_SESSION['username'])){
				$this->error('您已登陆', U('Index/index'), 1);
		}
		if ($this->isPost()) {
			$User = D('User');
			$con = array('username'=>$_POST['username'], 'passwd'=>$_POST['passwd']);
			$list = $User->where($con)->find();
			if($list){
				session('username', $list['username']);
				session('nickname', $list['nickname']);
				$this->success('登陆成功', U('Index/index'), 1);
			}else{
				$this->error('账号或密码错误', U('User/index'), 1);
			}
		}
	}

	public function logout(){
		if(!isset($_SESSION['username'])){
				$this->error('您还未登陆', U('User/index'), 1);
		}else{
			session(null);
			redirect(U('User/index'), 1, '正在退出登录...');
		}

	}
}
?>