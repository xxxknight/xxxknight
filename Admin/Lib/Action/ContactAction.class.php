<?php
class ContactAction extends CommonAction {
    public function index(){
    	$this->display();
    }

    public function contact(){
        $this->display();
    }

    public function listContact(){
        $page = intval($_GET['pageNum']);

        $m = M('Contact');
        
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

    public function deleteContact(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $where['id'] = $id;
            $m = M("Contact");
            $deleteNum = $m->where($where)->delete();
            if($deleteNum){
                echo "删除成功！";
            }else{
                exit("删除失败！");
            }

        }else{
            exit("非法操作！");
        }

    }

    public function sendFeedback(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];

            $address = $_POST['email'];
            $fromName = session("adminname");
            $toName = $_POST['author'];
            $subject = "答复反馈问题";
            $body = $_POST['reply'];
            if(sendMail1($address,$fromName,$toName,$subject,$body)){
                if($this->updateContact($id,$_POST['reply']) === false){
                    exit("操作数据库失败。");
                }
                echo "邮件发送成功";
            }else{
                echo "邮件发送失败，请检查邮箱设置及网络情况。";
            }

        }else{
            exit("非法操作！");
        }
        
    }

    protected function updateContact($id,$reply){
        
        $m = M("Contact");
        $where['id'] = $id;
        $data['flag'] = 1;
        $data['reply'] = $reply;
        $updateNum = $m->where($where)->save($data);

        return $updateNum;
    }
}
?>