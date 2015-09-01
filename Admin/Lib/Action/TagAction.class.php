<?php
class TagAction extends CommonAction {
    public function index(){
    	$this->display();
    }
    
    public function addTag(){
    	if(isset($_POST['name']) && isset($_POST['type'])){
    		$m = M("Tag");
    		$tag['name'] = $_POST['name'];
    		$tag['flag'] = $_POST['flag'];
            $tag['type'] = $_POST['type'];
    		$lastid = $m->add($tag);
    		if($lastid){
    			echo "添加成功.";
    		}else{
    			echo "添加失败.";
    		}
    	}else{
    		exit("非法操作！");
    	}	
    }

    public function updateTag(){
        if(isset($_POST['id'])){
            $m = M('Tag');
            $where['id'] = $_POST['id'];

            $data['name'] = $_POST['name'];
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

    public function deleteTag(){
    	if(isset($_GET['id'])){
			$id = $_GET['id'];
			$where['id'] = $id;
			$m = M("Tag");
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

    public function listTag(){

		$page = intval($_GET['pageNum']);

		$m = M('Tag');
        
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

    public function selName(){
    	if(isset($_GET['name'])){
    		$name = $_GET['name'];
    	 	$m = M('Tag');
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