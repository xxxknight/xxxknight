<?php
class AlbumtypeModel extends Model{
	protected $_validate=array(
			array('name','require','相册名必须有!'),
	);
	
	protected $_auto=array(
			array('createtime','setTime',1,'callback'),
			array('author','setUser',1,'callback'),
			array('authorid','setUid',1,'callback'),
			
	);
	
	protected function setTime(){
		return date('y-m-d h:i:s',time());
	}

	protected function setUser(){
		return $_SESSION['admin']['username'];
	}
	
	protected function setUid(){
		return $_SESSION['admin']['id'];
	}
}

?>