<?php
// 本类由系统自动生成，仅供测试用途
class ContactAction extends Action {
    public function index(){
    	if(session("?user")){
    		$this->assign("email",$_SESSION['user']['email']);
    	}
    	$this->display("contact");
    }
    
    public function show(){
    	//echo "欢迎你".$_GET['name']."年龄".$_GET['age'];
    }

    public function submitContact(){
    	$con = D("Contact");
    	$con->create();
    	$con->problem = $_POST['option'];
    	

    	$lastid = $con->add($data);
    	if ($lastid) {
			echo "提交成功.";
		} else {
			exit($con->getError());
		}

    	//dump($_POST);
    }
}