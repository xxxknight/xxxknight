<?php
class ArttypeAction extends CommonAction {
    public function index(){
    	$this->display();
    }
    
    public function addArttype(){
    	if(isset($_POST['typename']) && isset($_POST['showname'])){
    		$m = M("Articlestype");
    		$data['typename'] = $_POST['typename'];
    		$data['showname'] = $_POST['showname'];
            $data['rank'] = $_POST['rank'];
            $data['typenum'] = 0;
    		$lastid = $m->add($data);
    		if($lastid){
    			echo "添加成功.";
    		}else{
    			echo "添加失败.";
    		}
    	}else{
    		exit("非法操作！");
    	}	
    }

    public function updateArttype(){
        if(isset($_POST['id'])){
            $m = M('Articlestype');
            $where['id'] = $_POST['id'];

            $data['showname'] = $_POST['showname'];
            $data['rank'] = $_POST['rank'];

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

    public function deleteArttype(){
    	if(isset($_GET['id'])){
			$id = $_GET['id'];
			$where['id'] = $id;
			$m = M("Articlestype");
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

    public function listArttype(){

		$page = intval($_GET['pageNum']);

		$m = M('Articlestype');
        
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
    	if(isset($_GET['typename'])){
    		$typename = $_GET['typename'];
    	 	$m = M('Articlestype');
    	 	$where['typename'] = $typename;
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