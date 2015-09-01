<?php
// 本类由系统自动生成，仅供测试用途
class LoginAction extends Action {
    public function login(){
    	$this->display();
    }

    public function doLogin(){
    	$user = M ( 'User' );
		$data ['username'] = $_POST ['username'];
		$data ['password'] = $_POST ['password'];
		
		$count = $user->where( $data )->count ();
		
		if ($count >= 1) {
			$user = $user->where($data)->find();
			session ( 'admin' , $user);
			session ( 'adminname', $_POST ['username'] );
			$this->redirect ( 'Index/index' );
		} else {
			$this->error ( '请检查用户名或密码！' );
		}
    }

    // 注销用户
	public function logout() {
		session("admin",null); // 清空当前的session
		session("adminname",null);
		$this->redirect('login');
	}
    
}
?>