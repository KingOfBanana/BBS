<?php
session_start();
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action{
	public function _initialize(){
		if(!isset($_SESSION['username'])){
			$this->error('尚未登录', U('User/index'), 1);
		}
	}

    public function index(){
    	$model = D('InfoView');
		import('ORG.Util.Page');// 导入分页类
		$count = $model->count();// 查询满足要求的总记录数
		$Page  = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show  = $Page->show();// 分页显示输出
		$list = $model->limit($Page->firstRow.','.$Page->listRows)
			->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('nickname',$_SESSION['nickname']);
		$this->assign('status',"退出");
		$this->display(); // 输出模板
	}

	public function add(){
		$this->assign('nickname',$_SESSION['nickname']);
		$this->assign('status',"退出");
		$this->display();
	}

	public function insert(){
		$Info = D('Info');
		if (false === $data = $Info->create()){
			$this->error($Info->getError());
		}
		$data['username'] = $_SESSION['username'];
	    $insert_id = $Info->add($data);
	    if($insert_id){
	    	$this->success('留言成功', '../Index/index');
	    }else{
	    	$this->error('留言失败');
	    }		
	}
	
	public function edit($id){
		$Info = D('Info');
		$con['id'] = $id;
		$list = $Info->where($con)->limit(1)->select();
		$this->assign('list',$list);
		$this->assign('nickname',$_SESSION['nickname']);
		$this->assign('status',"退出");
		$this->display();
	}

	public function modify(){
		$Info = D('Info');
		if (false === $data = $Info->create()){
			$this->error($Info->getError());
		}
	    $effect = $Info->save($data);
	    if($effect){
	    	$this->success('修改成功', '../Index/index');
	    }else{
	    	$this->error('修改失败');
	    }
	}

	public function rank($sort, $rank){	
		$model = D('InfoView');
		import('ORG.Util.Page');// 导入分页类
		$count = $model->count();// 查询满足要求的总记录数
		$Page  = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show  = $Page->show();// 分页显示输出
		$list=$model->order(array($sort=>$rank))
			->limit($Page->firstRow.','.$Page->listRows)
			->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->assign('nickname',$_SESSION['nickname']);
		$this->assign('status',"退出");
		$this->display('index');
	}

	public function search($sType, $sText){
		$model = D('InfoView');
		import('ORG.Util.Page');// 导入分页类
		$count = $model->count();// 查询满足要求的总记录数
		$Page  = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show  = $Page->show();// 分页显示输出
		$list=$model->where(array($sType=>array('like','%'.$sText.'%')))
			->limit($Page->firstRow.','.$Page->listRows)
			->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
		$this->assign('nickname',$_SESSION['nickname']);
		$this->assign('status',"退出");
		$this->display('index');
	}

	public function delete($id){
		$Info = D('Info');
		$con['id'] = $id;
		if(!$Info->where($con)->delete()){
			$this->error('删除失败');
		}else{
			$this->success('删除成功');
		}
	}
	
}
?>

