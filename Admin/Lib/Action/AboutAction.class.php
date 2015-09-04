<?php
class AboutAction extends Action {
	public function index() {

		$this->display("about");
	}

	public function about() {
		$this->display();
	}
}

?>