<?php
class VideoAction extends Action {
	public function index() {
		$this->display ();
	}
	
	public function showVideos() {
		if(isset($_GET['tag'])){
			$videos = M("videos");
			import('ORG.Util.Page');// 导入分页类
			$tag = $_GET['tag'];
			$count= $videos->where('tag1='.'"'.$tag.'"')->count();//获取数据的总数
			$page  = new Page($count,6);//
			
			$page->setConfig('header','条信息');
			$show=$page->show();//返回分页信息
			
			$arr=$videos->where('tag1='.'"'.$tag.'"')->order('createtime desc')->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign('tag',$tag);
			$this->assign('list',$arr);
			$this->assign('show',$show);
			$this->display();
		}else{
			$videos = M("videos");
			import('ORG.Util.Page');// 导入分页类
			$count= $videos->count();//获取数据的总数
			$page  = new Page($count,6);//
			
			$page->setConfig('header','条信息');
			$show=$page->show();//返回分页信息
			
			$arr=$videos->order('createtime desc')->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign('tag',"all");
			$this->assign('list',$arr);
			$this->assign('show',$show);
			$this->display();
		}
	}
	
	public function detail(){
		
		$vid=$_GET['vid'];
		$video= M('videos');
		$where['id']=$vid;
		$v= $video->where($where)->find();
		$this->assign('detail',$v);
		$this->display();
	}

	public function showVcomment(){
		$vid=intval($_GET['vid']);
		$page = intval($_GET['pageNum']);

		$where['vid']=$vid;
		$vc = M('vcomment');
        
		$total = $vc->where($where)->count();
		$pageSize = 6; //每页显示数
		$totalPage = ceil($total/$pageSize); //总页数
		$startPage = $page*$pageSize;

		$arr['total'] = $total;
		$arr['pageSize'] = $pageSize;
		$arr['totalPage'] = $totalPage;

		$list= $vc->where($where)->order('createtime desc')->limit($startPage,$pageSize)->select();

        $arr['list'] = $list;
        $this->ajaxReturn($arr);

	}

	public function submitComment(){
		if(!session("?username")){
			exit("您尚未登陆，请登陆后操作！");
		}
		$vcomment = D ( 'Vcomment' );
		$vcomment->create ();
		$lastId = $vcomment->add ();
		if ($lastId) {
			echo "提交评论成功.";
		} else {
			exit($vcomment->getError());
		}
	}

	

}

?>