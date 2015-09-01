<?php
class PublicAction extends Action {
	Public function verify() {
		$w = isset ( $_GET ['w'] ) ? $_GET ['w'] : 30;
		$h = isset ( $_GET ['h'] ) ? $_GET ['h'] : 30;
		import ( 'ORG.Util.Image' );
		Image::buildImageVerify ( 4, 1, 'png', $w, $h );
	}

	public function showTypes(){
		$m = M("Articlestype");
		$list = $m->field("id,showname")->select();
		return $list;
	}
}

?>