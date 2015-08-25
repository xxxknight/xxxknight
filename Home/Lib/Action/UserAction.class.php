<?php
class UserAction extends Action {
	public function index() {
		$m = M ( 'User' );
		$arr = $m->select ();
		// var_dump($arr);
		$this->assign ( 'data', $arr );
		$this->display ();
	}
	public function del() {
		$m = M ( 'User' );
		$id = $_GET ['id'];
		$count = $m->delete ( $id );
		if ($count > 0) {
			$this->success ( '数据删除成功' );
		} else {
			$this->error ( '数据删除失败' );
		}
	}
	/*
	 * 显示修改页面
	 */
	public function modify() {
		$id = $_GET ['id'];
		$m = M ( 'User' );
		$arr = $m->find ( $id );
		$this->assign ( 'data', $arr );
		$this->display ();
	}
	public function update() {
		$m = M ( 'User' );
		$data ['id'] = $_POST ['id'];
		$data ['username'] = $_POST ['username'];
		$data ['sex'] = $_POST ['sex'];
		$count = $m->save ( $data );
		if ($count > 0) {
			$this->success ( '数据修改成功', 'index' );
		} else {
			$this->error ( '数据修改失败' );
		}
	}
	/*
	 * 添加页面
	 */
	public function add() {
		$this->display ();
	}
	public function create() {
		$m = M ( 'User' );
		$m->username = $_POST ['username'];
		$m->sex = $_POST ['sex'];
		$idNum = $m->add ();
		if ($idNum > 0) {
			$this->success ( '数据添加成功', 'index' );
		} else {
			$this->error ( '数据添加失败' );
		}
	}
	
	// 编写search方法，实现搜索
	public function search() {
		// 获取post的数据，根据数据组装查询的条件，根据条件从数据库中获取数据，返回给页面中遍历
		if (isset ( $_POST ['username'] ) && $_POST ['username'] != null) {
			$where ['username'] = array (
					'like',
					"%{$_POST['username']}%" 
			);
		}
		if (isset ( $_POST ['sex'] ) && $_POST ['sex'] != null) {
			$where ['sex'] = array (
					'eq',
					$_POST ['sex'] 
			);
		}
		$m = M ( 'User' );
		$arr = $m->where ( $where )->select ();
		$this->assign ( 'data', $arr );
		$this->display ( 'index' );
	}
	
	public function demo(){
		$m=M('User');
		$arr=$m->limit(2,5)->order(array('id'=>'desc','sex'=>'asc'))->field('id',true)->select();
		dump($arr);
		$this->show('abc');
	}
}
?>