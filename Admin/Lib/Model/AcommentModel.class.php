<?php
class AcommentModel extends RelationModel{
	protected $_validate=array(
			array('aid','require','aid必须有!'),
			//array('content','/^[a-zA-Z0-9-_\s]{1,200}$/','评论必须1个字符以上200字符以下',0,'regex',1),
	);
	
	protected $_auto=array(
			array('createtime','setTime',1,'callback'),
			array('username','setUser',1,'callback'),
			array('uid','setUid',1,'callback'),
			
	);

	protected $_link=array(
			'Articles' =>array(
				'mapping_type' => BELONGS_TO,
				'class_name' => 'Articles',
				'foreign_key' => 'aid',
				'mapping_name' => 'art',
				'mapping_fields' => 'title',
				'as_fields' => 'title',
			),
	);
	
	protected function setTime(){
		return date('Y-m-d H:i:s',time());
	}

	protected function setUser(){
		return $_SESSION['user']['username'];
	}
	
	protected function setUid(){
		return $_SESSION['user']['id'];
	}
}

?>