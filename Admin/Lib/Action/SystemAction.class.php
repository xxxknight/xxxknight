<?php
class SystemAction extends CommonAction {
    public function index(){
    	$this->display();
    }
    
    public function profile(){
    	$admin = session("admin");
    	
    	$where['id'] = $admin['id'];
        $m = M("User");
        $a = $m->where($where)->find();
        dump(a);
    	$this->assign("admin",$a);
    	//$this->display();
    }
}

?>