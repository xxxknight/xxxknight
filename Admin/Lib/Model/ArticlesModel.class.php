<?php
class ArticlesModel extends Model{
	protected $_validate=array(
			array('title','require','文章标题必须有!'),
			array('classid','require','文章类别必须有!'),
			array('typeid','require','分类必须有!'),
			array('flag','require','文章标志必须有!'),
	);
	
	protected $_auto=array(
		    array('viewnum',0),
		    array('commentnum',0),
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