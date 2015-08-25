<?php
class AccountModel extends Model{
	protected $_validate=array(
			array('username','require','用户必须填写!'),
			array('username','','用户已经存在',0,'unique',1),
			array('username','/^[a-zA-Z0-9-_]{6,20}$/','用户名必须6个字符以上20字符以下',0,'regex',1),
			array('email','require','邮箱必须填写!'),
			array('email','checkEmail','邮箱错误!',0,'callback',1),
			array('password','/^[a-zA-Z0-9-_]{6,20}$/','密码必须6个字符以上20字符以下',0,'regex',1),
	);
	
	protected function checkEmail($email){
		    $reg = '/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/';
		    return preg_match($reg, $email);
	}
	
	protected $_auto=array(
			array('createtime','setTime',1,'callback'),
			array('flag','setFlag',1,'callback'),
			array('password','md5',1,'function') , // 对password字段在新增的时候使md5函数处理
	);
	
	protected function setTime(){
		return date('y-m-d h:i:s',time());
	}
	
	protected function setFlag(){
		return 1;
	}
}

?>