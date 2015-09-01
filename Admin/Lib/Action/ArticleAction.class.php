<?php
class ArticleAction extends Action {
	public function index() {
		$this->display ();
	}

	public function createArt(){

		$types = R('Public/showTypes');
		$tags = $this->showArtTags();
		$this->assign("types" , $types);
		$this->assign("tags" , $tags);
		$this->display ("newArt");
	}

	public function addArt(){
		$art = D("Articles");
        $art->create();
        $typeid = $_POST['typeid'];
    	$lastid = $art->add();
    	if ($lastid) {
    		$this->incTypeNum($typeid);
			echo "文章创建成功.";
		} else {
			exit($con->getError());
		}
	}

	protected function incTypeNum($typeid){
	    $m = M("Articlestype");
	    $where['id'] = $typeid;
	    $m->where($where)->setInc('typenum',1); 
	}

	protected function decTypeNum($typeid){
	    $m = M("Articlestype");
	    $where['id'] = $typeid;
	    $m->where($where)->setDec('typenum',1); 
	}


	public function showArtTags(){
		$m = M("Tag");
		$where['type']="article";
		$list = $m->field("name")->where($where)->select();
		return $list;
	}

	public function manageArt(){
		$types = R('Public/showTypes');
		$this->assign("types" , $types);

		$this->display();
	}

	public function showAllArts(){
		$m = M("Articles");
		$artlist = $m->select();
		return $artlist;

	}

	public function showArts(){
		$classid = $_GET['classid'];
		$typeid = $_GET['typeid'];
		if($classid){
			$where['classid'] = intval($classid);
		}

		if($typeid){
			$where['typeid'] = intval($typeid);
		}

		$page = intval($_GET['pageNum']);

		$arts = M('Articles');
        
		$total = $arts->where($where)->count();
		$pageSize = 20; //每页显示数
		$totalPage = ceil($total/$pageSize); //总页数
		$startPage = $page*$pageSize;

		$arr['total'] = $total;
		$arr['pageSize'] = $pageSize;
		$arr['totalPage'] = $totalPage;

		$list= $arts->where($where)->order('createtime desc')->limit($startPage,$pageSize)->select();

        $arr['list'] = $list;
        $this->ajaxReturn($arr);

	}

	public function deleteArt(){
		if(isset($_GET['id'])){

			$aid = $_GET['id'];
			if($this->delAllCommentsById($aid)===false){
				exit("删除失败out！");
				
			}else{
				$where['id'] = $aid;
				$m = M("Articles");
				$deleteNum = $m->where($where)->delete();
				if($deleteNum){
					$this->decTypeNum($typeid);
					echo "删除成功！";
				}else{
					exit("删除失败in！");
				}
			}
			
		}else{
			exit("非法操作！");
		}
		
	}

	public function updateArt(){
		if(isset($_GET['id'])){
			$types = R('Public/showTypes');
			$tags = $this->showArtTags();
			$this->assign("types" , $types);
			$this->assign("tags" , $tags);

			$m = M("Articles");
			$where['id'] = $_GET['id'];
			
			$art = $m->where($where)->find();
			$this->assign("art",$art);
			$this->display();

		}else{
			exit("非法操作");

		}

	}

	public function saveUpdateArt(){
		if(isset($_POST['id'])){
			$m = M('Articles');
			$where['id'] = $_POST['id'];

			$data['title'] = $_POST['title'];
			$data['classid'] = $_POST['classid'];
			$data['typeid'] = $_POST['typeid'];
			$data['tags'] = $_POST['tags'];
			$data['flag'] = $_POST['flag'];
			$data['content'] = $_POST['content'];

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

	public function cloud(){
		$types = R('Public/showTypes');
		$this->assign("types" , $types);
		$this->display();
	}

	public function tag(){
		$types = R('Public/showTypes');
		$this->assign("types" , $types);
		$this->display();
	}

	public function arttype(){
		$this->display();
	}

	public function comment(){
		$types = R('Public/showTypes');
		$this->assign("types" , $types);
		$this->display();
	}

	public function delAllCommentsById($aid){
		$where['aid'] = $aid;
		$m = M("Acomment");
		$deleteNum = $m->where($where)->delete();
		return $deleteNum;
	}

}

?>