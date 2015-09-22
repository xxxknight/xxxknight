<?php
class ArticlesModel extends RelationModel{
	

	protected $_link=array(
			'Articlestype' =>array(
				'mapping_type' => BELONGS_TO,
				'class_name' => 'Articlestype',
				'foreign_key' => 'typeid',
				'mapping_name' => 'atype',
				'mapping_fields' => 'showname,description',
			),
	);
	
	
}

?>