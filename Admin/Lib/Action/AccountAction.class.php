<?php
class AccountAction extends CommonAction {
    public function index(){
    	$this->display();
    }

    public function listAccount(){
        $page = intval($_GET['pageNum']);

        $m = M('Account');
        
        $total = $m->count();
        $pageSize = 20; //每页显示数
        $totalPage = ceil($total/$pageSize); //总页数
        $startPage = $page*$pageSize;

        $arr['total'] = $total;
        $arr['pageSize'] = $pageSize;
        $arr['totalPage'] = $totalPage;

        $list= $m->order("id desc")->limit($startPage,$pageSize)->select();

        $arr['list'] = $list;
        $this->ajaxReturn($arr);
    }

    public function setDisable(){
        if(isset($_POST['id'])){
            $m = M('Account');
            $where['id'] = $_POST['id'];

            
            $data['flag'] = $_POST['flag'];

            $updateNum = $m->where($where)->save($data);

            if($updateNum){
                echo "操作成功";
            }else{
                exit("您未做任何更新！");
            }
        }else{
            exit("非法操作！");
        }

    }

    
}
?>