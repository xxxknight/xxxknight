<?php
class ArtcommentAction extends CommonAction {
    public function index(){
    	$this->display();
    }
    
    public function deleteComment(){
    	if(isset($_GET['id'])){
			$id = $_GET['id'];
			$where['id'] = $id;
			$m = M("Acomment");
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

    public function listComment(){

		$page = intval($_GET['pageNum']);

		$d = D('Acomment');
        
		$total = $d->count();
		$pageSize = 20; //每页显示数
		$totalPage = ceil($total/$pageSize); //总页数
		$startPage = $page*$pageSize;

		$arr['total'] = $total;
		$arr['pageSize'] = $pageSize;
		$arr['totalPage'] = $totalPage;

		$list= $d->relation(true)->order("id desc")->limit($startPage,$pageSize)->select();

        $arr['list'] = $list;
        $this->ajaxReturn($arr);

    }

}
?>