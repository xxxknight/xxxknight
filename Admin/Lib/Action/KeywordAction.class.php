<?php
// 本类由系统自动生成，仅供测试用途
class KeywordAction extends CommonAction {
    public function index(){
    	$this->display();
    }
    
    public function addKeyword(){
    	if(isset($_POST['name']) && isset($_POST['value'])){
    		$m = M("Keyword");
    		$keyword['name'] = $_POST['name'];
    		$keyword['value'] = $_POST['value'];
    		$keyword['flag'] = $_POST['flag'];
            $keyword['type'] = $_POST['type'];
    		$lastid = $m->add($keyword);
    		if($lastid){
    			echo "添加成功.";
    		}else{
    			echo "添加失败.";
    		}
    	}else{
    		exit("非法操作！");
    	}	
    }

    public function updateKeyword(){
        if(isset($_POST['id'])){
            $m = M('Keyword');
            $where['id'] = $_POST['id'];

            $data['name'] = $_POST['name'];
            $data['value'] = $_POST['value'];
            $data['type'] = $_POST['type'];
            $data['flag'] = $_POST['flag'];

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

    public function deleteKeyword(){
    	if(isset($_GET['id'])){
			$id = $_GET['id'];
			$where['id'] = $id;
			$m = M("Keyword");
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

    public function listKeyword(){

		$page = intval($_GET['pageNum']);

		$m = M('Keyword');
        
		$total = $m->count();
		$pageSize = 20; //每页显示数
		$totalPage = ceil($total/$pageSize); //总页数
		$startPage = $page*$pageSize;

		$arr['total'] = $total;
		$arr['pageSize'] = $pageSize;
		$arr['totalPage'] = $totalPage;

		$list= $m->order("value desc")->limit($startPage,$pageSize)->select();

        $arr['list'] = $list;
        $this->ajaxReturn($arr);

    }

    public function selName(){
    	if(isset($_GET['name'])){
    		$name = $_GET['name'];
    	 	$m = M('Keyword');
    	 	$where['name'] = $name;
    	 	$count = $m->where($where)->count();
    	 	if($count){
    	 		echo 1;
    	 	}else{
    	 		echo 0;
    	 	}

    	}else{
    		exit("非法操作！");
    	}

    }
}
?>