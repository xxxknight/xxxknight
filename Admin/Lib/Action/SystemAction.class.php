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
        //dump($a);
    	$this->assign("admin",$a);
    	$this->display();
    }

    public function saveProfile(){
        if(isset($_POST['id'])){
            $m = M('User');
            $where['id'] = $_POST['id'];

            $data['username'] = $_POST['username'];
            $data['sex'] = $_POST['sex'];
            $data['email'] = $_POST['email'];
            $data['phone'] = $_POST['phone'];
            $data['birth'] = $_POST['birth'];

            $updateNum = $m->where($where)->save($data);

            if($updateNum){
                echo "更新成功";
            }else{
                exit("您未做任何更新！");
            }
        }else{
            exit("非法操作！");
        }
    }

    public function savePassword(){
        if(isset($_POST['id'])){
            $m = M('User');
            $where['id'] = $_POST['id'];

            $data['password'] = $_POST['password'];

            $updateNum = $m->where($where)->save($data);

            if($updateNum){
                echo "更新成功";
            }else{
                exit("您未做任何更新！");
            }
        }else{
            exit("非法操作！");
        }
    }
}

?>