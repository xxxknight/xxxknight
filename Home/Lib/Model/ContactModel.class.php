<?php
class ContactModel extends Model{
	protected $_validate=array(
			array('email','require','邮箱必须填写!'),
			array('email','checkEmail','邮箱错误!',0,'callback',1),
			array('title','require','标题必须填写!'),
			//array('title','length','标题c!',0,'1,20',1),
	);
	
	protected function checkEmail($email){
		    $reg = '/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/';
		    return preg_match($reg, $email);
	}
	
	protected $_auto=array(
			array('createtime','setTime',1,'callback'),
			array('flag','setFlag',1,'callback'),
			array('author','setAuthor',1,'callback'),
			array('authorid','setUid',1,'callback'),
	);
	
	protected function setTime(){
		return date('y-m-d h:i:s',time());
	}
	
	protected function setFlag(){
		return 0;
	}

	protected function setAuthor(){
		return $_SESSION['user']['username'];
	}
	
	protected function setUid(){
		return $_SESSION['user']['id'];
	}
}

?>