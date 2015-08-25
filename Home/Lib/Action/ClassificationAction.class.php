<?php
class ClassificationAction extends Action {
	public function index() {
		$this->display ();
	}
	
	public function showPictures() {
		$pictures = M("pictures");
		$arr = $pictures->select();
		$json_data = json_encode($arr);
		$this->assign("data",$json_data);
		$this->display();
	}
	
	public function showArticles() {
		$this->display ();
	}
	
}