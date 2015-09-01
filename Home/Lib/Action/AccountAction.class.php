<?php
class AccountAction extends Action {
	public function index() {
		$this->display ();
	}
	public function signup() {
		$this->display ();
	}
	public function createAccount() {
		$account = D ( 'Account' );
		$account->create ();
		$lastId = $account->add ();
		if ($lastId) {
			$this->success ( '注册成功', 'signin' );
		} else {
			$this->error ( '用户注册失败' );
		}
	}
	public function signin() {
		$this->display ();
	}
	
	// 记住密码功能
	public function remember($username, $password, $remember) {
		if ($remember == 1) {
			setcookie ( 'username', $username, time () + 3600 );
			setcookie ( 'password', $password, time () + 3600 );
			setcookie ( 'remember', $remember, time () + 3600 );
		} else {
			setcookie ( 'username', $username, time () - 3600 );
			setcookie ( 'password', $password, time () - 3600 );
			setcookie ( 'remember', $remember, time () - 3600 );
		}
	}
	public function login() {
		$this->remember ( $_POST ['username'], $_POST ['password'], $_POST ['remember'] );
		
		$account = M ( 'Account' );
		$data ['username'] = $_POST ['username'];
		$data ['password'] = md5 ( $_POST ['password'] );
		$captcha = $_POST ['captcha'];
		if ($_SESSION ['verify'] !== md5 ( $captcha )) {
			$this->error ( 'Please check your captcha' );
		}
		
		$count = $account->where( $data )->count ();
		
		if ($count >= 1) {
			$user = $account->where($data)->find();
			session ( 'isExist', true );
			session ( 'user' , $user);
			session ( 'username', $_POST ['username'] );
			$this->redirect ( 'Index/index' );
		} else {
			$this->error ( 'Please check your account' );
		}
	}
	
	// 检查用户是否注册过
	public function checkName() {
		$username = $_GET ['username'];
		$user = M ( 'Account' );
		$where ['username'] = $username;
		$count = $user->where ( $where )->count ();
		if ($count) {
			echo 0;
		} else {
			echo 1;
		}
	}
	
	// 注销用户
	public function signout() {
		session ( 'isExist', null );
		session('user',null);
		session('username',null);
		$this->redirect('Index/index');
	}
}
?>